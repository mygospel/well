<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Http\Classes\NCPdisk;

class EventController extends Controller
{
    public function __construct()
    {
        $this->event = new Event();
    }

    public function index_partner(Request $request){
        //DB::enableQueryLog();	//query log 시작 선언부
        $data["events"] = [];
        $data["events"] = $this->event->select()
        ->select("events.*", "partners.p_name")
            ->leftjoin('partners', 'e_partner', '=', 'partners.p_no')
            ->where(function ($query) use ($request) {
                if ($request->q) {
                    if( $request->fd == "title" ) {
                        $query->where("e_title", "like", "%" . $request->q . "%");
                    }  elseif( $request->fd == "cont" ) {
                        $query->where("e_cont", "like", "%" . $request->q . "%");
                    } else {
                        $query->
                                where("e_title", "like", "%" . $request->q . "%")
                            ->orwhere("e_cont", "like", "%" . $request->q . "%");
                    }
                }
                if ($request->state) {

                    if( $request->state == "A" ) {
                        $query->where("e_sdate",  ">", now());
                    } elseif( $request->state == "I" ) {
                        $query->where("e_sdate",  "<=", now());
                        $query->where("e_edate",  ">=", now());
                    }  elseif( $request->state == "E" ) {
                        $query->where("e_edate",  "<", now());
                    }

                }
            })
            ->orderBy("e_no","desc")->paginate(10);

            $data['query'] = $request->query;
            //$i = $this->board->perPage() * ($this->board->currentPage() - 1);
            $data['start'] = $data["events"]->total() - $data["events"]->perPage() * ($data["events"]->currentPage() - 1);
            $data['total'] = $data["events"]->total();
            $data['param'] = ['state' => $request->state, 'fd' => $request->fd, 'q' => $request->q];
            //dd(DB::getQueryLog());

        return view('admin.event.event_partner', $data);
    }


    public function form(Request $request){

        if( $request->e ) {
            $data["event"] = $this->event->where("e_no", $request->e)->first();
        } else {
            $data["event"] = [];
        }

        return view('open.form', $data);
    }

    public function calendar(Request $request){

            $data = [];
            $data['events'] = [];
            $data['evs2'] = [];

            if( $request->LMON ) $data["LMON"] = $request->LMON;
            else $data["LMON"] = date("m");
           
            if( $request->LYEAR ) $data["LYEAR"] = $request->LYEAR;
            else $data["LYEAR"] = date("m");

            if( !$request->LYEAR ) $data["LYEAR"] = date("Y");
            if( strlen($data["LMON"]) < 2 ) $data["LMON"] = sprintf("%02d",$data["LMON"]);

            if( $data["LMON"] == 1 ) {
                        $data["PRE_LYEAR"] = $data["LYEAR"] - 1;
                        $data["PRE_LMON"]= 12;
            } else {
                        $data["PRE_LYEAR"] = $data["LYEAR"];
                        $data["PRE_LMON"]= (int)ltrim($data["LMON"],0) - 1;

            }

            if( $data["LMON"] == 12 ) {
                        $data["NEXT_LYEAR"]= $data["LYEAR"]+1;
                        $data["NEXT_LMON"]= 1;
            } else {
                        $data["NEXT_LYEAR"]= $data["LYEAR"];
                        $data["NEXT_LMON"]= $data["LMON"] + 1;
            }

            
            $data["cal_url_prev"] = "?LYEAR=".$data["PRE_LYEAR"]."&LMON=".sprintf("%02d",$data["PRE_LMON"]);
            $data["cal_url_next"] = "?LYEAR=".$data["NEXT_LYEAR"]."&LMON=".sprintf("%02d",$data["NEXT_LMON"]);

            $month_s = date("Y-m-d H:i:s",mktime( 0, 0, 0, $data["LMON"], 1, $data["LYEAR"] ) );
            $month_e = date("Y-m-d H:i:s",mktime( 0, 0, 0, $data["LMON"], date("t")+1, $data["LYEAR"] ) );
            $month_e_1 = date("Y-m-d H:i:s",mktime( 0, 0, 0, $data["LMON"], date("t")+2, $data["LYEAR"] ) );

            //---------------------- 해당월의 첫날요일과 마지막 날자를 불러옴 -----------------------//
            $FIRST_WEEKDAY = date("D",mktime(0,0,0,$data["LMON"],1,$data["LYEAR"]));

            $data["LAST_DAY"] = date("t",mktime(0,0,0,$data["LMON"],1,$data["LYEAR"]));
            $data["LAST_WEEKDAY"] = date("D",mktime(0,0,0,$data["LMON"],$data["LAST_DAY"],$data["LYEAR"]));

            //--------------------------    첫째날 전 공백, 마지막 후 공백   --------------------------//
            $data["blank_s"] = "";
            $data["blank_e"] = "";
            switch( $FIRST_WEEKDAY )
            {
                case 'Sun' : $blank_s = 0; break;
                case 'Mon' : $blank_s = 1; break;
                case 'Tue' : $blank_s = 2; break;
                case 'Wed' : $blank_s = 3; break;
                case 'Thu' : $blank_s = 4; break;
                case 'Fri' : $blank_s = 5; break;
                case 'Sat' : $blank_s = 6; break;
            }

            switch( $data["LAST_WEEKDAY"] )
            {
                case 'Sun' : $data["blank_e"] = 6; break;
                case 'Mon' : $data["blank_e"] = 5; break;
                case 'Tue' : $data["blank_e"] = 4; break;
                case 'Wed' : $data["blank_e"] = 3; break;
                case 'Thu' : $data["blank_e"] = 2; break;
                case 'Fri' : $data["blank_e"] = 1; break;
                case 'Sat' : $data["blank_e"] = 0; break;
            }

            $data["LMON"] = sprintf("%02d",$data["LMON"]);

            //DB::enableQueryLog();	//query log 시작 선언부
            $evs = $this->event->select("events.*", "partners.p_name")
            ->leftJoin('partners', 'e_partner', '=', 'partners.p_no')
            ->where("e_type","A")
            ->where("e_open","Y")    
            ->where('partners.p_open', '=', 'Y')
            ->where(function ($query) use ($request) {
                if ($request->q) {
                    if( $request->fd == "title" ) {
                        $query->where("e_title", "like", "%" . $request->q . "%");
                    }  elseif( $request->fd == "cont" ) {
                        $query->where("e_cont", "like", "%" . $request->q . "%");
                    } else {
                        $query->
                                where("e_title", "like", "%" . $request->q . "%")
                            ->orwhere("e_cont", "like", "%" . $request->q . "%");
                    }
                }
                if ($request->state) {

                    if( $request->state == "A" ) {
                        $query->where("e_sdate",  ">", now());
                    } elseif( $request->state == "I" ) {
                        $query->where("e_sdate",  "<=", now());
                        $query->where("e_edate",  ">=", now());
                    }  elseif( $request->state == "E" ) {
                        $query->where("e_edate",  "<", now());
                    }

                }
            })
            ->orderBy("e_no","desc")->get();

            foreach(  $evs as $ev ) {
                if( trim($ev->e_name_view) ) $ev->e_name = $ev->e_name_view;
                if( !$ev->e_name ) $ev->e_name = $ev->p_name;

                if( !$ev->e_cont2 ) $ev->e_cont2 = $ev->e_cont;

                $data['events'][substr($ev->e_sdate,0,10)][] = $ev;
            }  

            //DB::enableQueryLog();	//query log 시작 선언부
            if ( date("Ym") == $data["LYEAR"].$data["LMON"] ) {
                $data['evs2'] = $this->event->select("events.*", "partners.p_name")
                ->leftjoin('partners', 'e_partner', '=', 'partners.p_no')
                ->where("e_type","S")    
                ->where("e_open","Y")    
                ->where('partners.p_open', '=', 'Y')
                ->orderBy("e_no","desc")->get();            
            } 

        return view('open.calendar', $data);
    }

    

    public function update(Request $request)
    {

        #DB::enableQueryLog();	//query log 시작 선언부
        #dd(DB::getQueryLog());
        $result = [];
        if( $request->no ) {
            $event = \App\Models\Event::where('e_no', $request->no)->firstOrFail();
        } else {
            $event = new event();
        }

        $event->e_partner = $request->partner ?? 0;
        $event->e_admin = $request->admin ?? 0;
        $event->e_name = $request->name ?? "";
        $event->e_name_view = $request->name_view ?? "";
        $event->e_manager = $request->manager ?? 0;
        $event->e_sdate = $request->sdate ?? "";
        $event->e_edate = $request->edate ?? "";
        $event->e_type = $request->type ?? "P";
        $event->e_value = $request->value ?? "";
        $event->e_title = $request->title ?? "";
        $event->e_cont = $request->cont ?? "";
        $event->e_cont2 = $request->cont2 ?? "";
        $event->e_open = $request->open ?? "N";
    

        if( $event->e_no ) {
            $result['result'] = $event->update();
        } else {
            $result['result'] = $event->save();
        }
        if( $request->rURL ) {
            $result['rURL'] = $request->rURL;
        } else {
            $result['rURL'] = "";
        }

        return response($result);
    }



    public function reg(Request $request)
    {

        #DB::enableQueryLog();	//query log 시작 선언부
        #dd(DB::getQueryLog());
        $result = [];
        if( $request->no ) {
            $event = \App\Models\Event::where('e_no', $request->no)->firstOrFail();
        } else {
            $event = new event();
        }

        $event->e_partner = $request->partner ?? 0;
        $event->e_admin = $request->admin ?? 0;
        $event->e_name = $request->name ?? "";
        $event->e_name_view = $request->name_view ?? "";
        $event->e_sdate = $request->sdate ?? "";
        $event->e_title = $request->title ?? "";
        $event->e_cont = $request->cont ?? "";

        if( $event->e_no ) {
            $result['result'] = $event->update();
        } else {
            $result['result'] = $event->save();
        }


        $result['rURL'] = "/thanks?e=".$event->e_no;


        return response($result);
    }

    ## 폼을 위한 정보 - 사용자에서 사용할...
    public function thanks(Request $request){

        $data["result"] = true;
        if( $request->e ) {
            $data["event"] = $this->event->where("e_no", $request->e)->first();

        } else {
            $data["event"] = [];
        }
        return view('open.thanks', $data);
    }

    public function delete(Request $request)
    {

        $result = [];

        if( $request->no ) {
            $event = \App\Models\Event::find($request->no);
            $result['result'] = false;
            $result['msg'] = $event;
            if( $result['result'] = $event->delete() ) {

            }
        } else {
            $event = new event();
        }

        return response($result);
    }    

    ## 폼을 위한 정보
    public function getInfo(Request $request){
        $data["result"] = true;
        $data["event"] = $this->event->select(
                [
                    'e_no as no',
                    'e_type as type',
                    'e_sdate as sdate',
                    'e_edate as edate',
                    'e_title as title',
                    'e_name as name',
                    'e_name_view as name_view',
                    'e_cont as cont',
                    'e_cont2 as cont2',
                    'e_img1 as img1',
                    'e_img2 as img2',
                    'e_img3 as img3',
                    'e_partner as partner',
                    'e_open as open',
                    'e_value as value',
                    'partners.p_name as partner_name'
                ]
            )
            ->leftjoin('partners', 'events.e_partner', '=', 'partners.p_no')
            ->where("e_no",  $request->no)->first();


        return response($data);
    }

    ## 폼을 위한 정보 - 사용자에서 사용할...
     public function view(Request $request){

         $data["result"] = true;
         if( $request->no ) {
             $data["event"] = $this->event->select()->where("q_no",  $request->no)->first();

             if( !$data["event"] ) {
                 return redirect()->back()->withErrors(['alert', 'Updated!']);
             }

         } else {
             $data["event"] = [];
         }
         return view('admin.event.event_form.', $data);
     }

}
