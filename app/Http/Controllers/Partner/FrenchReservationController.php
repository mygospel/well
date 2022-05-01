<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\FrenchRoom;
use App\Models\FrenchSeat;
use App\Models\FrenchSeatLevel;
use App\Models\FrenchReservSeat;

use App\Models\FrenchMember;
use App\Models\FrenchProductOrder;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Carbon\Carbon;
use App\Http\Controllers\AlimTalkController;

class FrenchReservationController extends Controller
{
    public $FrenchRerservation;

    public $FrenchRoom;
    public $FrenchSeat;
    public $FrenchSeatLevel;
    public $FrenchReservSeat;

    public function __construct()
    {
        $this->FrenchSeat = new FrenchSeat();
        $this->FrenchSeatLevel = new FrenchSeatLevel();
        $this->FrenchRoom = new FrenchRoom();
        $this->FrenchReservSeat = new FrenchReservSeat();
        
        //$this->FrenchRerservation = new FrenchMember();
    }

    ## 폼을 위한 정보
    public function getSeatInfo(Request $request){
        Config::set('database.connections.partner.database',"boss_".$request->account);

        $data['result'] = true;        

        // 날자가 없다면 오늘
        if( !$request->dt ) $request->dt = Carbon::now()->toDateString();

        // 좌석정보
        $data["seat"] = $this->FrenchSeat->where("s_no",$request->no)->first();
        $seat_level = $this->FrenchSeatLevel->where("sl_no", $data["seat"]["s_level"] )->first();
        $sl_price_day = json_decode($seat_level->sl_price_day, true);
        $sl_price_time = json_decode($seat_level->sl_price_time, true);

        // 좌석의 등급정보
        $data["seat_level"] = [
            "sl_no" => $seat_level->sl_no,
            "sl_name" => $seat_level->sl_name,
            "sl_price_day" => $sl_price_day,
            "sl_price_time" => $sl_price_time,
        ];

        $data["reserved"] = [
            "00" => [],
            "01" => [],
            "02" => [],
            "03" => [],
            "04" => [],
            "05" => [],
            "06" => [],
            "07" => [],
            "08" => [],
            "09" => [],
            "10" => [],
            "11" => [],
            "12" => [],
            "13" => [],
            "14" => [],
            "15" => [],
            "16" => [],
            "17" => [],
            "18" => [],
            "19" => [],
            "20" => [],
            "21" => [],
            "22" => [],
            "23" => []
        ];
        // 좌석 예>약정보
        //DB::connection("partner")->enableQueryLog();
        if( $request->dt ) {
                // 중복체크
                $sdate = $request->rv_sdate . " " . $request->rv_stime;
                $edate = $request->rv_edate . " " . $request->rv_etime;
                //DB::connection("partner")->enableQueryLog();
                $seat_reserved = \App\Models\FrenchReservSeat::
                where('rv_seat', $request->no)->where(function ($query) use ($request) {

                    $query->where(DB::raw("date_format(rv_sdate,'%Y-%m-%d')"), '<=', $request->dt)
                    ->orWhere(DB::raw("date_format(rv_edate,'%Y-%m-%d')"), '>=', $request->dt);

                })->get();  

                //dd(DB::connection("partner")->getQueryLog());
                for( $ri = 0; $ri <= count($seat_reserved)-1; $ri++ ) {
                    $r_sdt = Carbon::createFromFormat('Y-m-d H:i:s', $seat_reserved[$ri]->rv_sdate );
                    $r_edt = Carbon::createFromFormat('Y-m-d H:i:s', $seat_reserved[$ri]->rv_edate );

                    for( $h = 0; $h <= 23; $h++ ){
                        $hh = sprintf("%02d",$h);
                        $sdt = Carbon::createFromFormat('Y-m-d H', $request->dt . ' ' . $hh );
                        $edt = Carbon::createFromFormat('Y-m-d H:i:s', $request->dt .' ' . $hh.':59:59' );

                        ## 00분이 아닐때.
                        if( $r_sdt->timestamp > $sdt->timestamp && $r_sdt->timestamp <= $edt->timestamp ) {

                            $data["reserved"][$hh][] = [
                                "rv_no" => $seat_reserved[$ri]->rv_no,
                                "hi" => substr($r_sdt,11,5),

                                "rsdt" => $r_sdt,
                                "redt" => $r_edt,
                                "sdt" => $sdt->format('Y-m-d H:i'),
                                "edt" => $edt->format('Y-m-d H:i'),
                                "rv_member" => $seat_reserved[$ri]->rv_member,
                                "rv_member_name" => $seat_reserved[$ri]->rv_member_name
                            ];
                        }

                        ## 00 분부터일때 
                        if( $r_sdt->timestamp <= $sdt->timestamp && $r_edt->timestamp >= $sdt->timestamp ) {
                            $data["reserved"][$hh][] = [
                                "rv_no" => $seat_reserved[$ri]->rv_no,
                                "hi" => substr($sdt,11,5),

                                "rsdt" => $r_sdt,
                                "redt" => $r_edt,
                                "sdt" => $sdt->format('Y-m-d H:i'),
                                "edt" => $edt->format('Y-m-d H:i'),
                                "rv_member" => $seat_reserved[$ri]->rv_member,
                                "rv_member_name" => $seat_reserved[$ri]->rv_member_name
                            ];
                        }
                    }
        
                }

                ## 해당시간예약이 없으면 빈배열만들어줌.
                // for( $h = 0; $h <= 23; $h++ ){      
                //     $hh = sprintf("%02d",$h);
     
                //     if( !$data["reserved"][$hh] ) {
                //         $data["reserved"][$hh][] = [
                //             "rv_no" => 0,
                //             "hi" => "$hh:00",
                //         ];
                //     }

                // }
                

        }
        return response($data);
    }    

    ## 폼을 위한 정보
    public function reserveSeat(Request $request){

        Config::set('database.connections.partner.database',"boss_".$request->account);

        $FrenchReservSeat = new FrenchReservSeat;
       
        if( !$request->rv_seat ) {
            $result['result'] = false;
            $result['message'] = "좌석을 선택하지 않습니다."; 
    
            return response($result);
        }

        $FrenchSeat = $this->FrenchSeat->where("s_no",$request->rv_seat)->first();
        if( !$FrenchSeat ) {
            $result['result'] = false;
            $result['message'] = "좌석정보가 존재하지 않습니다."; 
    
            return response($result);
        }        

        if( !$request->rv_member ) {
            $result['result'] = false;
            $result['message'] = "회원정보가 없습니다."; 
            return response($result);
        }
        
        if( !$request->rv_product ) {
            $result['result'] = false;
            $result['message'] = "구매상품이 선택되지 않았습니다."; 
            return response($result);
        }

        $memberProductOrder = new FrenchProductOrder();
        $product_info = $memberProductOrder->where("o_no",$request->rv_product)->first();

        if( !$product_info ) {
            $result['result'] = false;
            $result['message'] = "구매정보가 존재하지 않습니다."; 
            return response($result);
        }

        if( $product_info->o_product_kind == "A" || $product_info->o_product_kind == "D" ) {

            // 1회이용권, 기간권
            $FrenchReservSeat->rv_duration_type = 'D';

            if( $product_info->o_remainder_day <= 0 || $product_info->o_remainder_day < $request->rv_duration ) {
                $result['result'] = false;
                $result['message'] = "잔여 기간은 ".$product_info->o_remainder_day."일 입니다."; 
                return response($result);
            }

        } else if( $product_info->o_product_kind == "T" ) {

            // 시간권
            $FrenchReservSeat->rv_duration_type = 'T';
            if( $product_info->o_remainder_time <= 0 || $product_info->o_remainder_time < $request->rv_duration ) {
                $result['result'] = false;
                $result['message'] = "잔여 시간은 ".$product_info->o_remainder_day."시간 입니다."; 
                return response($result);
            }

        } else {

            // 정액권
            $FrenchReservSeat->rv_duration_type = 'P';
            if( $product_info->o_remainder_point <= 0 || $product_info->o_remainder_point < $request->rv_duration ) {
                $result['result'] = false;
                $result['message'] = "잔여 포인트는 ".$product_info->o_remainder_day."포인트 입니다."; 
                return response($result);
            }

        }

        if( !$request->rv_duration ) {
            $result['result'] = false;
            $result['message'] = "기간을 선택하지 않습니다."; 
            return response($result);
        }
        
        if( !$request->rv_device_from ) {
            $result['result'] = false;
            $result['message'] = "잘못된 디바이스 접근입니다."; 
            return response($result); 
        }
        
        if( !$request->rv_sdate ) {
            $result['result'] = false;
            $result['message'] = "시작 일정을 선택해주세요."; 
            return response($result); 
        }

        //o_duration_type
        if( !$request->rv_stime ) {
            $result['result'] = false;
            $result['message'] = "시작 시간을 선택해주세요."; 
            return response($result); 
        }

        // 1회이용권, 기간권은 종료시간이 당일 영업종료시
        if( $FrenchReservSeat->rv_duration_type == "D" && !$request->rv_etime) {
            $request->rv_edate = $request->rv_sdate;
            $request->rv_duration = 1;
            $request->rv_etime = "23:59:00";           
        }  
        
        if( !$request->rv_edate ) {
            $result['result'] = false;
            $result['message'] = "종료 일정을 선택해주세요."; 
            return response($result); 
        }
        
        if( !$request->rv_etime ) {
            $result['result'] = false;
            $result['message'] = "종료 시간을 선택해주세요."; 
            return response($result); 
        }



        DB::enableQueryLog();	//query log 시작 선언부

        
        // 중복체크
        $sdate = $request->rv_sdate . " " . $request->rv_stime;
        $edate = $request->rv_edate . " " . $request->rv_etime;

        $existFrenchReservSeat = \App\Models\FrenchReservSeat::where("rv_seat", $request->rv_seat)
        ->where(function($query) use( $sdate, $edate ){
                $query->where(function($query2) use( $sdate, $edate ){
                    $query2->where('rv_sdate', '>=', $sdate)->where('rv_sdate', '<=', $edate);
                })
                ->orwhere(function($query2) use( $sdate, $edate ){
                    $query2->where('rv_edate', '>=', $sdate)->where('rv_edate', '<=', $edate);
                });
            })->first();

       
        // ->where(function($query,$sdate,$edate) {
        //     $query->where([
        //         ['rv_sdate', '>=', $sdate],
        //         ['rv_sdate', '<=', $edate],
        //     ]) 
        //     ->orwhere([
        //             ['rv_edate', '>=', $sdate],
        //             ['rv_edate', '<=', $edate],
        //     ]);
        // })
        // ->first();  
        

        if( $existFrenchReservSeat ) {
            $result['result'] = false;
            $result['message'] = "이미 사용 및 예약내역이 있습니다.<br>" . $existFrenchReservSeat->rv_member_name . "님,<br> " . $existFrenchReservSeat->rv_sdate . "~" . $existFrenchReservSeat->rv_edate; 
    
            return response($result); 
        }
        
        $FrenchReservSeat->rv_partner = 0;
        $FrenchReservSeat->rv_order = $request->rv_product;
        $FrenchReservSeat->rv_member_from = "L";

        if( $FrenchReservSeat->rv_member_from == "L" ) {
            $FrenchMember = \App\Models\FrenchMember::where('mb_no', $request->rv_member)->first();  

            $FrenchReservSeat->rv_member = $request->rv_member;       
            $FrenchReservSeat->rv_member_name = $FrenchMember->mb_name;
            $FrenchReservSeat->rv_sex = $FrenchMember->mb_sex;
        } else {
            $result['result'] = false;
            $result['message'] = "회원정보가 존재하지 않습니다."; 
    
            return response($result); 
        }

        $FrenchReservSeat->rv_ageType = $request->rv_ageType;
        
        $FrenchReservSeat->rv_device_from = $request->rv_device_from;
        $FrenchReservSeat->rv_room = $request->rv_room;
        $FrenchReservSeat->rv_seat = $request->rv_seat;
   
        $FrenchReservSeat->rv_seat_name = "";
        $FrenchReservSeat->rv_seat_level = "";

        $FrenchReservSeat->rv_product_kind = '';
        $FrenchReservSeat->rv_product_name = '';
        $FrenchReservSeat->rv_duration  = $request->rv_duration;

        $FrenchReservSeat->rv_type = $request->rv_type;
        $FrenchReservSeat->rv_sdate = $request->rv_sdate . " " . $request->rv_stime;
        $FrenchReservSeat->rv_edate = $request->rv_edate . " " . $request->rv_etime;

        $FrenchReservSeat->rv_state = 'A';
        $FrenchReservSeat->rv_state_seat = '';


        // $AlimTalk = new AlimTalkController("01042040696","");
        // // $AlimTalk->toSensAlimtalk();

        // $result['result'] = false;
        // $result['message'] = "알림톡테스트중..."; 
        // return response($result);


        $result['result'] = $FrenchReservSeat->save();

        if( $result['result'] ) {
            // remainder 삭감.
            if( $product_info->o_product_kind == "A" || $product_info->o_product_kind == "D" ) {
                $product_info->o_remainder_day = $product_info->o_remainder_day - $request->rv_duration;
                $product_info->update();

            } else if( $product_info->o_product_kind == "T" ) {
                $product_info->o_remainder_time = $product_info->o_remainder_time - $request->rv_duration;
                $product_info->update();
            } else {
                // 삭감할부분
            }

            $result['s_no'] = $request->rv_seat; 
            $result['no'] = $FrenchReservSeat->rv_no; 
            $result['message'] = "완료되었습니다.";             
        } else {
            $result['result'] = false;
            $result['message'] = "관리자에게 문의해주세요."; 
        }

        return response($result);
    } 



    ## 현재 예약상태 가져오기
    public function seatState(Request $request){

        Config::set('database.connections.partner.database',"boss_".$request->account);

        $FrenchReservSeat = new FrenchReservSeat;
        
        // 현재시간으로 부터 1시간이내 예약내역
        $sdate = Carbon::now()->format('Y-m-d H:i:s');
        $edate = Carbon::now()->addHours(1)->format('Y-m-d H:i:s');
        
        $result['result'] = false;
        $result['message'] = "$sdate $edate"; 

        $result['result'] = true;
        $result['rsvs'] = \App\Models\FrenchReservSeat::where(function($query) use( $sdate, $edate ){
                // $query->where(function($query2) use( $sdate, $edate ){
                //     $query2->where('rv_sdate', '>=', $sdate)->where('rv_sdate', '<=', $edate);
                // })
                // ->orwhere(function($query2) use( $sdate, $edate ){
                //     $query2->where('rv_edate', '>=', $sdate)->where('rv_edate', '<=', $edate);
                // });
        })->get();
        return response($result);
    } 

}
