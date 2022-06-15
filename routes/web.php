<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PartnerApplyController;
use App\Http\Controllers\PartnerRegController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\Custom2Controller;
use App\Http\Controllers\CustomdevController;
use App\Http\Controllers\CustomFaqController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\Partner_ReviewController;
use App\Http\Controllers\PartnerCouponController;
use App\Http\Controllers\StandardProductController;
use App\Http\Controllers\StandardPriceController;
use App\Http\Controllers\VodboardController;
use App\Http\Controllers\HelpboardController;
use App\Http\Controllers\UserMessageController;

use App\Http\Controllers\Partner\MainController;
use App\Http\Controllers\Partner\FrenchBoardController;
use App\Http\Controllers\Partner\FrenchNoticeController;
use App\Http\Controllers\Partner\FrenchManagerController;
use App\Http\Controllers\Partner\FrenchEventController;
use App\Http\Controllers\Partner\FrenchCustomController;
use App\Http\Controllers\Partner\FrenchReviewController;
use App\Http\Controllers\Partner\FrenchContactController;
use App\Http\Controllers\Partner\FrenchLaptopController;
use App\Http\Controllers\Partner\FrenchMemberController;
use App\Http\Controllers\Partner\FrenchProductOrderController;
use App\Http\Controllers\Partner\FrenchReservationController;
use App\Http\Controllers\Partner\FrenchHistoryController;
use App\Http\Controllers\Partner\FrenchHelpboardController;
use App\Http\Controllers\Partner\FrenchVodboardController;
use App\Http\Controllers\Partner\FrenchStatisticsController;
use App\Http\Controllers\Partner\FrenchAccountBookController;

use App\Http\Controllers\Partner\SettingController;
use App\Http\Controllers\Partner\SettingIotController;
use App\Http\Controllers\Partner\SettingRoomController;
use App\Http\Controllers\Partner\SettingSeatLevelController;
use App\Http\Controllers\Partner\SettingSeatController;
use App\Http\Controllers\Partner\SettingLockerAreaController;
use App\Http\Controllers\Partner\SettingLockerController;
use App\Http\Controllers\Partner\SettingProductController;

use App\Http\Controllers\Partner\MqttController;

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\MobileController;


use App\Http\Middleware\Authenticate;
use App\Http\Middleware\PartnerAuthenticate;
use App\Http\Middleware\UserAuthenticate;


Route::get('/calendar', [EventController::class, 'calendar']);
Route::get('/form', [EventController::class, 'form']);

Route::prefix('/partner')->group(function () {

    Route::get('/login', [LoginController::class, 'showPartnerLoginForm'])->name("partnerlogin");
    Route::post('/loginok', [LoginController::class, 'partnerLogin']);
    Route::get('/logout', [LoginController::class, 'logout']);
    
    Route::group(['middleware' => ['partner']], function () {

        Route::prefix('/event')->group(function () {
            Route::get('/' ,[FrenchEventController::class, 'index']);
            Route::post('/getInfo', [FrenchEventController::class, 'getInfo']);
            Route::post('/update', [FrenchEventController::class, 'update']);
        });

    });

});

    Route::get('/adminlogin', [LoginController::class, 'showAdminLoginForm'])->name("adminlogin");
    Route::post('/adminloginok', [LoginController::class, 'adminLogin']);
    Route::get('/logout', [AdminController::class, 'logout']);

    //Auth::routes();

    Route::prefix('/api')->group(function () {

        Route::any('/partner/search', [PartnerController::class, 'search']);
        Route::get('/partner/get_list', [PartnerController::class, 'get_list']);
        Route::any('/partner/get_new_last_date', [PartnerController::class, 'get_new_last_date']);

    });

    Route::prefix('/nmap')->group(function () {
        Route::any('/nmap_get_point', [PartnerController::class, 'nmap_get_point']);
    });


    Route::group(['middleware' => ['admin']], function () {

        //Route::get('/', [IndexController::class, 'index'])->name("adminhome");
        
        //Route::get('/', redirect('/partner') );
        Route::redirect('/', '/partner')->name("adminhome");

        Route::get('/history', function () {
            return view('admin.history');
        });

        Route::group(['prefix' => '/partner'],function () {

            //Route::any('/login', [PartnerController::class, 'login']);
            Route::get('/form/{no?}',  [PartnerController::class, 'form']);
            Route::get('/photo/{no?}',  [PartnerController::class, 'photo']);
            Route::post('/photo/{no?}/upload',  [PartnerController::class, 'photo_upload']);
            Route::post('/photo/{no?}/list',  [PartnerController::class, 'photo_list']);
            Route::post('/photo/{no?}/delete',  [PartnerController::class, 'photo_delete']);

            Route::any('/update', [PartnerController::class, 'update']);
            Route::any('/delete', [PartnerController::class, 'delete']);

            Route::get('/apply', [PartnerApplyController::class, 'index']);
            Route::any('/apply/store', [PartnerApplyController::class, 'store']);

            Route::get('/reg', [PartnerRegController::class, 'index']);

            Route::any('/reg/update', [PartnerRegController::class, 'update']);

            // Route::get('/standard', function () {
            //     return view('admin.partner.standard');
            // });

            Route::get('/', [PartnerController::class, 'index'])->name("partner");
            Route::get('/deleted', [PartnerController::class, 'deleted_index']);
        });

        Route::prefix('/event')->group(function () {
            Route::post('/getInfo', [EventController::class, 'getInfo']);

            // TOPIC
            Route::get('/partner', [EventController::class, 'index_partner']);
            Route::post('/delete', [EventController::class, 'delete']);
            Route::post('/update', [EventController::class, 'update']);
        });

        Route::prefix('/customer')->group(function () {
            Route::get('/partner', [Custom2Controller::class, 'index']);
            Route::get('/partner/view/{no}', [Custom2Controller::class, 'view']);
            Route::post('/partner/update', [Custom2Controller::class, 'update']);
            Route::post('/partner/answer', [Custom2Controller::class, 'answer']);

            Route::get('/dev', [CustomdevController::class, 'index']);
            Route::get('/dev/view/{no}', [CustomdevController::class, 'view']);
            Route::get('/dev/form/{no}', [CustomdevController::class, 'form']);
            Route::get('/dev/answerform/{no}', [CustomdevController::class, 'answerform']);
            Route::post('/dev/update', [CustomdevController::class, 'update']);
            Route::post('/dev/delete', [CustomdevController::class, 'delete']);
            Route::post('/dev/answer', [CustomdevController::class, 'answer']);
        });

        Route::prefix('/comments')->group(function () {
            Route::any('update', [CustomdevController::class, 'comm_update']);
            Route::any('delete', [CustomdevController::class, 'comm_delete']);
            Route::any('list', [CustomdevController::class, 'comm_list']);
        });

        Route::prefix('/emp')->group(function () {
            Route::get('/', [AdminController::class, 'index']);
            Route::post('/getInfo', [AdminController::class, 'getInfo']);
            Route::any('/update', [AdminController::class, 'store']);
            Route::post('/delete', [AdminController::class, 'delete']);
        });

    });   


    