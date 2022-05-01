<?php
namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\FrenchConfig;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Config;

class FrenchSettingController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->FrenchConfig = new FrenchConfig();
    }




    ## 폼을 위한 정보
    public function getInfo(Request $request){

            Config::set('database.connections.partner.database',"boss_".$request->account);

            $data["result"] = true;
            $data["locker"] = $this->FrenchLocker->select(
                    [
                        'l_no as no',
                        'l_name as name',
                        'l_area as area',
                        'l_dvd_no as dvd_no'
                    ]
                )
                ->where("l_no",  $request->no)->first();
            return response($data);

    }

    public function update(Request $request)
    {
        //DB::enableQueryLog();	//query log 시작 선언부
        //dd(DB::getQueryLog());

        Config::set('database.connections.partner.database',"boss_".$request->account);

        $result = [];
        if( $request->no ) {
            $FrenchLocker = FrenchLocker::where('l_no', $request->no)->firstOrFail();
        } else {
            $FrenchLocker = new FrenchLocker();
        }

        //$FrenchSeat->s_partner = $request->account ?? "";
        $FrenchLocker->l_name = $request->name ?? "";
        $FrenchLocker->l_area = $request->area ?? 0;
        $FrenchLocker->l_dvc_no = $request->dvc_no ?? "";

        if( isset( $FrenchLocker->l_no ) ) {
            $result['result'] = $FrenchLocker->update();
        } else {
            $result['result'] = $FrenchLocker->save();
        }

        if( $request->rURL ) {
            $result['rURL'] = $request->rURL;
        } else {
            $result['rURL'] = "";
        }

        return response($result);
    }


    public function delete(Request $request)
    {
        //DB::enableQueryLog();	//query log 시작 선언부
        //dd(DB::getQueryLog());

        Config::set('database.connections.partner.database',"boss_".$request->account);

        $result = [];
        if( $request->no ) {
            $FrenchLocker = FrenchLocker::where('l_no', $request->no)->firstOrFail();

            if($FrenchLocker->delete()) {
                $result = ['result' => true];
            } else {
                $result = [
                    'result' => false,
                    'message' => "삭제되지 않았습니다."];
                return response($result);
            }
        } else {
            $result = [
                'result' => false,
                'message' => "정보가 존재하지 않습니다."];
            return response($result);
        }

        if( $request->rURL ) {
            $result['rURL'] = $request->rURL;
        } else {
            $result['rURL'] = "";
        }

        return response($result);
    }


}
