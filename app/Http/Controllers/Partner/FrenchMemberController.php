<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\FrenchMember;
use App\Models\FrenchProductOrder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Carbon;

use Illuminate\Support\Facades\Auth;

class FrenchMemberController extends Controller
{

    public $FrenchMember;
    public $FrenchProductOrder;

    public function __construct()
    {
        $this->FrenchMember = new FrenchMember();
        $this->FrenchProductOrder = new FrenchProductOrder();
    }


    ## 삭제
    public function delete(Request $request)
    {
        Config::set('database.connections.partner.database',"boss_".$request->account);        
        $result = [];

        if( $request->no ) {
            $FrenchMember = \App\Models\FrenchMember::where('mb_no', $request->no)->firstOrFail();
            $result['result'] = $FrenchMember->delete();
        } else {
            $result = [
                'result' => false,
                'message' => "정보가 존재하지 않습니다."];
        }

        return response($result);

    }

    ## 저장
    public function update(Request $request)
    {      
        Config::set('database.connections.partner.database',"boss_".$request->account);        
/*
        if($request->$ajax())
        {
            return "True request!";
        }
*/
        $result = [];

        if( $request->no ) {
            
            $FrenchMember = \App\Models\FrenchMember::where('mb_no', $request->no)->first();
            $FrenchMember2 = \App\Models\FrenchMember::where('mb_no', '<>', $FrenchMember->mb_no )->where('mb_phone', $request->phone)->first();
            if( $FrenchMember2 ) {
                $result = [
                    'result' => false,
                    'message' => '중복된 휴대폰이 있습니다.( '.$FrenchMember2->mb_name.' / '.$FrenchMember2->mb_phone.' / '.$FrenchMember2->created_at.' ) '
                ]; 
                return response($result);                
            }   

            $FrenchMember2 = \App\Models\FrenchMember::where('mb_no', '<>', $FrenchMember->mb_no )->where('mb_email', $request->email)->first();
            if( $FrenchMember2 ) {
                $result = [
                    'result' => false,
                    'message' => '중복된 이메일이 있습니다.( '.$FrenchMember2->mb_name.' / '.$FrenchMember2->mb_phone.' / '.$FrenchMember2->created_at.' ) '
                ]; 
                return response($result);                
            }
           

        } elseif( $request->name && $request->phone ) {

            $FrenchMember = \App\Models\FrenchMember::where('mb_name', $request->name)->where('mb_phone', $request->phone)->first();
            if( $FrenchMember ) {
                $result = [
                    'result' => false,
                    'message' => '이미 존재하는 회원입니다.( '.$FrenchMember->mb_name.' / '.$FrenchMember->mb_phone.' / '.$FrenchMember->created_at.' ) '
                ]; 
                return response($result);                
            }

            $FrenchMember = \App\Models\FrenchMember::where('mb_phone', $request->phone)->first();
            if( $FrenchMember ) {
                $result = [
                    'result' => false,
                    'message' => '중복된 휴대폰이 있습니다.( '.$FrenchMember->mb_name.' / '.$FrenchMember->mb_phone.' / '.$FrenchMember->created_at.' ) '
                ]; 
                return response($result);                
            }
        
            $FrenchMember = \App\Models\FrenchMember::where('mb_email', $request->email)->first();
            if( $FrenchMember ) {
                $result = [
                    'result' => false,
                    'message' => '중복된 이메일이 있습니다.( '.$FrenchMember->mb_name.' / '.$FrenchMember->mb_phone.' / '.$FrenchMember->created_at.' ) '
                ]; 
                return response($result);                
            }

            $FrenchMember = new FrenchMember;

        }

        if( !$request->no ) {
            $FrenchMember->mb_id = "mb_".uniqid();
        } 

        $FrenchMember->mb_name = $request->name ?? "";
        if( $request->passwd ) {
            $FrenchMember->password = Hash::make($request->passwd);
        } 

        $FrenchMember->mb_birth = $request->birth ?? "";
        $FrenchMember->mb_sex = $request->sex ?? "";
        $FrenchMember->mb_email = $request->email ?? "";
        $FrenchMember->mb_phone = $request->phone ?? "";
        $FrenchMember->mb_state = $request->state ?? "N"; 
        $FrenchMember->mb_tags = implode(",", $request->tags); 
        $FrenchMember->mb_memo = $request->memo ?? ""; 

        //DB::enableQueryLog();	//query log 시작 선언부   
        
        if( $FrenchMember->mb_no ) {

            $result = [
                'result' => false,
                'message' => '11111'
            ]; 
            return response($result);         

            $result['result'] = $FrenchMember->update();
        } else {
            $result['result'] = $FrenchMember->save();
        }
 

        if( $result['result'] ) {
            $result['member'] = [
                'no' => $FrenchMember->mb_no,
                'birth' => $FrenchMember->mb_birth,
                'phone' => $FrenchMember->mb_phone,
                'name' => $FrenchMember->mb_name
            ]; 
        } else {
            $result['message'] = "관리자에게 문의해주세요."; 
        }
        return response($result);

    }

    ## 목록
    public function index(Request $request){

        Config::set('database.connections.partner.database',"boss_".$request->account);        
        //DB::enableQueryLog();	//query log 시작 선언부
        $data["q"] = $request->q ?? "";
        $data["members"] = [];
        $data["members"] = $this->FrenchMember->select()
            ->where(function ($query) use ($request) {
                if ($request->kind) {

                    if( $request->kind == "") {

                    }
                    if( $request->kind == "m") {
                        //$query->where("mb_name", "like", "%".$request->q."%");
                    }
                    if( $request->kind == "p") {
                        //$query->where("mb_phone", "like", "%".$request->q."%");
                    }

                }
                if ($request->fd) {

                    if( $request->fd == "all") {
                        $query->where("mb_name", "like", "%".$request->q."%")
                        ->orwhere("mb_email", "like", "%".$request->q."%")
                        ->orwhere("mb_phone", "like", "%".$request->q."%");
                    }
                    if( $request->fd == "id") {
                        $query->where("mb_id", "like", "%".$request->q."%");
                    }
                    if( $request->fd == "name") {
                        $query->where("mb_name", "like", "%".$request->q."%");
                    }
                    if( $request->fd == "phone") {
                        $query->where("mb_phone", "like", "%".$request->q."%");
                    }
                    if( $request->fd == "email") {
                        $query->where("mb_email", "like", "%".$request->q."%");
                    }

                }

           
            })
            ->orderBy("mb_no","desc")->paginate(10);
        //dd(DB::getQueryLog());

        $data['query'] = $request->query;
        //$i = $this->board->perPage() * ($this->board->currentPage() - 1);
        $data['start'] = $data["members"]->total() - $data["members"]->perPage() * ($data["members"]->currentPage() - 1);
        $data['total'] = $data["members"]->total();
        $data['param'] = ['state' => $request->state, 'fd' => $request->fd, 'q' => $request->q];



        return view('partner.member.list', $data);
    }    
    
    ## 목록
    public function search(Request $request){

        Config::set('database.connections.partner.database',"boss_".$request->account);        
        //DB::enableQueryLog();	//query log 시작 선언부
        $data["q"] = $request->q ?? "";
        $data["members"] = [];
        $data["members"] = $this->FrenchMember->select(["mb_no","mb_name","mb_sex","mb_birth","mb_phone","mb_tags"])
            ->where(function ($query) use ($request) {
                if ($request->q) {
                        $query->where("mb_name", "like", "%".$request->q."%")
                        ->orwhere("mb_email", "like", "%".$request->q."%")
                        ->orwhere("mb_phone", "like", "%".$request->q."%");
                }
          
            })
            ->orderBy("mb_no","desc")->get();

        return response($data);
    } 

    ## 폼을 위한 정보
    public function getInfo(Request $request){
        Config::set('database.connections.partner.database',"boss_".$request->account);

        $data["result"] = true;
        $data["member"] = $this->FrenchMember->select([
            'mb_no as no', 
            'mb_id as id', 
            'mb_name as name', 
            'mb_birth as birth', 
            'mb_email as email', 
            'mb_phone as phone', 
            'mb_state as state'])
            ->where("mb_no",  $request->no)->first();

        if( $data['member']['birth'] && $data['member']['birth']!="0000-00-00" ) {
            $data['member']['age'] = \Carbon\Carbon::createFromFormat('Y-m-d', $data['member']['birth'])->age;
            if( $data['member']['age'] > 18 ) $data['member']['ageType'] = "A";
            else $data['member']['ageType'] = "S";
        } else {
            $data['member']['ageType'] = "A";
        }
        if( $data['member']['ageType'] == "A") {
            $data['member']['ageTypeText'] = "성인";
        } elseif( $data['member']['ageType'] == "S") {
            $data['member']['ageTypeText'] = "학생";
        }
        response($data['member']);

        return response($data);
    }    


    ## 폼을 위한 정보
    public function viewInfo(Request $request){
        Config::set('database.connections.partner.database',"boss_".$request->account);

        $data["result"] = true;
        $data["member"] = $this->FrenchMember->select([
            'mb_no as no', 
            'mb_id as id', 
            'mb_name as name', 
            'mb_birth as birth',
            'mb_tags as tags', 
            'mb_email as email', 
            'mb_phone as phone', 
            'mb_sex as sex', 
            'mb_state as state', 
            'mb_memo as memo'])
            ->where("mb_no",  $request->no)->first();

        if( $data['member']['birth'] && $data['member']['birth']!="0000-00-00" ) {
            $data['member']['age'] = \Carbon\Carbon::createFromFormat('Y-m-d', $data['member']['birth'])->age;
            if( $data['member']['age'] > 18 ) $data['member']['ageType'] = "A";
            else $data['member']['ageType'] = "S";
        } else {
            $data['member']['ageType'] = "A";
        }
        if( $data['member']['ageType'] == "A") {
            $data['member']['ageTypeText'] = "성인";
        } elseif( $data['member']['ageType'] == "S") {
            $data['member']['ageTypeText'] = "학생";
        }
        if( $data['member']['tags'] ) {
            $data['member']['tags_arr'] = explode(",",$data['member']['tags']);
        } else {
            $data['member']['tags_arr'] = [];
        }
        
        return view('partner.member.popupView', $data);
    }  

    ## 폼을 위한 정보
    public function regForm(Request $request){
        Config::set('database.connections.partner.database',"boss_".$request->account);

        $data["result"] = true;
        $data["nextStep"] = $request->nextStep;
        
        return view('partner.member.popupView', $data);
    }  
    

    
    ## 폼을 위한 정보
    public function productsList(Request $request){

        Config::set('database.connections.partner.database',"boss_".$request->account);        
        //DB::enableQueryLog();	//query log 시작 선언부

        $data["result"] = true;
        $data["products"] = [];
        $data["products"] = $this->FrenchProductOrder->where("o_member",$request->no)->orderBy("o_no","desc")->get();

        $productType = config('product.productType');

        for( $i = 0; $i<=count($data["products"])-1; $i++ ) {

            if( $data["products"][$i]['o_product_kind'] == "P" )  {
                $duration = $data["products"][$i]['o_duration'] . "원";
            } if( $data["products"][$i]['o_product_kind'] == "T" )  {
                $data["products"][$i]['o_remainder'] = $data["products"][$i]['o_remainder_time'];
                $duration = $data["products"][$i]['o_remainder_time'] . "/" . $data["products"][$i]['o_duration'] . "시간";
            } else {
                $data["products"][$i]['o_remainder'] = $data["products"][$i]['o_remainder_day'];
                $duration = $data["products"][$i]['o_remainder_day'] . "/" . $data["products"][$i]['o_duration'] . "일";
            }

            // $data["products"][$i]['o_product_name'] = $productType[$data["products"][$i]['o_product_kind']] . "( ".$duration." )";   
            
            $data["products"][$i]['o_product_name'] = $productType[ $data["products"][$i]['o_product_kind'] ]. "(".$duration.")";    

 
        }

        return response($data);
    }    


    ## 회원 구매 상품상태
    public function productState(Request $request){

        Config::set('database.connections.partner.database',"boss_".$request->account);        
        //DB::enableQueryLog();	//query log 시작 선언부

        if( !$request->m ) {
            $result = [
                "result" => false,
                "message" => "이용자를 선택해 주세요."];
            return response($result);
        }
        if( !$request->s ) {
            $result = [
                "result" => false,
                "message" => "좌석을 선택해 주세요."];
            return response($result);
        }
        if( !$request->o ) {
            $result = [
                "result" => false,
                "message" => "이용자의 상품을 선택해 주세요."];
            return response($result);
        }

        $data["result"] = true;
        $data["product"] = $this->FrenchProductOrder
            ->where("o_member",$request->m)
            ->where("o_no",$request->o)->orderBy("o_no","desc")->first();

        if( $data["product"]['o_product_kind'] == "P" )  {
            $data["product"]['o_remainder']  = $data["product"]['o_remainder_point'];
        } else if( $data["product"]['o_product_kind'] == "D" || $data["product"]['o_product_kind'] == "A" )  {
            $data["product"]['o_remainder']  = $data["product"]['o_remainder_day'];
        } else if( $data["product"]['o_product_kind'] == "T" )  {
            $data["product"]['o_remainder']  = $data["product"]['o_duration_time'];
        }

        return response($data);            

    }    

}
