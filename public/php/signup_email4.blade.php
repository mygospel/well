<!DOCTYPE html>
<html lang="ko">
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"
	  name="viewport">
<head>
	<meta charset="UTF-8">
	<title>인터서브</title>
	<link href="../css/reset.css" rel="stylesheet" type="text/css"/>
	<link href="../css/swiper.min.css" rel="stylesheet" type="text/css"/>
	<link href="../css/ui.css" rel="stylesheet" type="text/css"/>
	<link href="../css/style.css" rel="stylesheet" type="text/css"/>



</head>
<body>
<div class="container" style="padding-bottom: 0;">

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
				<i class="ic ic-success" style="display: inline-block;"></i>
				<div class="txt">이메일이 인증되었어요!</div>
			</div>

			<div class="hp-signup-group">

				<div class="hp-certify-box type-success">
					<div class="hp-certify-txt-box">이메일</div>
					<div class="hp-certify-input-box">
						<input type="text" placeholder="이메일 주소를 입력하세요" value="eodilo@eodilo.com" readonly>
					</div>
				</div>

				<div class="hp-btn-box">
					<article class="menu-btn-box">
						<a href="/signup_password" class="menu-btn">다음</a>
					</article>
				</div>
			</div>
		</div>

	</section>



</div>

<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/jquery-ui-1.12.1.js"></script>
<script src="../js/ui.js"></script>
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