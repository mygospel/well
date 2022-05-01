<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCashBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_cash_buys', function (Blueprint $table) {
            $table->id('cb_no')->comment('일련번호');
            $table->unsignedInteger('cb_member')->default(0)->comment('회원');
            $table->BigInteger('cb_cash')->default(0)->comment('캐쉬');
            $table->BigInteger('cb_price')->default(0)->comment('구매금액');
            $table->char('cb_pay',1)->default('N')->comment('구매/결제여부');
            $table->string('cb_pay_method',10)->default('')->comment('구매방법');
            $table->string('cb_pay_code',50)->default('')->comment('결제코드');
            $table->char('cb_friend',50)->default('N')->comment('요청하기');
            $table->string('cb_friend_email',50)->default('')->comment('요청대상메일');
            $table->string('cb_friend_phone',20)->default('')->comment('요청대상휴대폰');
            $table->string('cb_friend_link')->default('')->comment('요청링크');
            $table->SoftDeletes();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_cash_buys');
    }
}
