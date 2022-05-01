<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('password')->comment('비밀번호');
            $table->unsignedSmallInteger('user_level')->comment('권한'); // 요기 추가
            $table->string('name',50)->default('')->comment('이름');
            $table->string('sex', 1)->default('A')->comment('성별');
            $table->date('birth')->comment('생년월일');
            $table->string('phone',50)->default('')->comment('연락처');
            $table->string('email')->unique()->comment('이메일');
            $table->string('nickname',50)->default('')->comment('닉네임');
            $table->string('qr_pass',100)->default('')->comment('출입문QR');
            $table->string('door_pass',4)->default('')->comment('출입문비번');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_pass',6)->comment('휴대폰인증번호');
            $table->timestamp('phone_pass_at',6)->comment('휴대폰인증번호 제한시간');
            $table->unsignedInteger('login_count')->default(0)->comment('로그인횟수');
            $table->string('login_ip', 20)->default('')->comment('로그인IP');
            $table->timestamp('login_last')->comment('최근로그인');
            $table->string('state',1)->default('A')->comment('상태');
            $table->string('memo')->default('')->comment('메모');
            $table->string('tags',10)->default('')->comment('태그');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
