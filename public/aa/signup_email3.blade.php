<!DOCTYPE html>
<html lang="ko">
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"
	  name="viewport">
<head>
	<meta charset="UTF-8">
	<title>인터서브</title>
	<link href="/mobile/css/reset.css" rel="stylesheet" type="text/css"/>
	<link href="/mobile/css/swiper.min.css" rel="stylesheet" type="text/css"/>
	<link href="/mobile/css/ui.css" rel="stylesheet" type="text/css"/>
	<link href="/mobile/css/style.css" rel="stylesheet" type="text/css"/>



</head>
<body>
<div class="container overlay" style="padding-bottom: 0;">

	<header>
		<div class="wrap">
			<article class="header-page-group">
				<a href="#none" class="back-btn"></a>
			</article>

		</div>
	</header>

	<section class="signup">

		<article class="progress-box">
			<div class="progress-bar" style="width: 25%;"></div>
		</article>

		<div class="inner wrap">
			<div class="tit-box step-tit-box">
				<i class="ic ic-success"></i>
				<div class="txt">이메일을 입력해주세요!(필수)</div>
			</div>

			<div class="hp-signup-group">
				<div class="hp-certify-box type-success">
					<div class="hp-certify-txt-box">이메일</div>
					<div class="hp-certify-input-box">
						<input type="text" placeholder="이메일 주소를 입력하세요" value="eodilo@eodilo.com">
					</div>
				</div>

				<div class="hp-btn-box">
					<article class="menu-btn-box">
						<a href="#none" class="menu-btn">확인</a>
					</article>
				</div>
			</div>
		</div>

	</section>

	<article class="popup popup-alarm" style="display: block">

		<div class="popup-wrap">

			<div class="popup-msg-group">

				<div class="msg-contents-box">

					<div class="ic-box">
						<i class="ic ic-success"></i>
					</div>
					<div class="contents-box">
						<div class="txt-box">
							이메일로 인증번호를 보냈어요!<br/>
							메일에서 <span class="col_success">인증하기</span> 버튼을 눌러주세요.
						</div>
					</div>

				</div>

				<div class="msg-btn-box">
					<a href="/signup_email4" class="msg-btn" onclick="popupDirectClose(this);">확인</a>
				</div>

			</div>
		</div>

	</article>


</div>

<script src="/mobile/js/jquery-3.1.1.min.js"></script>
<script src="/mobile/js/jquery-ui-1.12.1.js"></script>
<script src="/mobile/js/ui.js"></script>
<script>

	$('.hp-certify-box input').on('keyup',function (){

		if($(this).val().length == 0){
			$(this).parents('.hp-certify-box').removeClass('type-error').removeClass('type-success');
		}else{
			$(this).parents('.hp-certify-box').removeClass('type-error').addClass('type-success');
		}
	});


</script>

</body>
</html>