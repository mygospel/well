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
	<link href="../css/ui.css" rel="stylesheet" type="text/css"/>
	<link href="../css/style.css" rel="stylesheet" type="text/css"/>
	<link href="../css/swiper.min.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="container" style="background-color: #F9F9FA;">

	<header>
		<div class="wrap">
			<article class="header-page-group">
				<a href="#none" class="back-btn"></a>
				<div class="page-txt">매장 찾기</div>
			</article>
		</div>
	</header>

	<section class="map-search">

		<div class="inner wrap">

			<div class="search-area">
				<article class="map-search-box">
					<input type="text" placeholder="매장을 검색해 주세요.">
					<i class="ic ic-search"></i>
				</article>
			</div>

			<div class="current-search">

				<div class="tit-box">최근 검색</div>

				<div class="list-box">

					<div class="list-item-box">
						<a href="#none" class="item-btn">
							<i class="ic ic-search"></i>
							<div class="txt">스터디 카페</div>
						</a>
					</div>

					<div class="list-item-box">
						<a href="#none" class="item-btn">
							<i class="ic ic-search"></i>
							<div class="txt">공부 스터디 카페</div>
						</a>
					</div>

				</div>

			</div>

		</div>

	</section>

	<article class="page-footer">
		<div class="page-nav-group">

			<div class="nav-list">
				<a class="nav-btn" href="#none">
					<div class="ic-box"><i class="ic ic-home"></i></div>
					<div class="txt-box">홈</div>
				</a>

				<a class="nav-btn on" href="#none">
					<div class="ic-box"><i class="ic ic-search"></i></div>
					<div class="txt-box">매장 찾기</div>
				</a>

				<a class="nav-btn " href="#none">
					<div class="ic-box"><i class="ic ic-like"></i></div>
					<div class="txt-box">찜 목록</div>
				</a>

				<a class="nav-btn  " href="#none">
					<div class="ic-box"><i class="ic ic-my"></i></div>
					<div class="txt-box">마이페이지</div>
				</a>

				<a class="nav-btn " href="#none">
					<div class="ic-box"><i class="ic ic-more"></i></div>
					<div class="txt-box">더보기</div>
				</a>
			</div>

		</div>

	</article>




</div>

<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/jquery-ui-1.12.1.js"></script>
<script src="../js/swiper.min.js"></script>
<script src="../js/ui.js"></script>
<script>

	$('.hp-certify-box input').on('keyup',function (){

		if($(this).val().length == 0){
			$(this).parents('.hp-certify-box').removeClass('type-error').removeClass('type-success');
		}else{
			$(this).parents('.hp-certify-box').removeClass('type-error').addClass('type-success');
		}
	});

	$('.map-search-box input').on('keyup',function (){

		if($(this).val().length == 0){
			$(this).removeClass('type-success');
		}else{
			$(this).addClass('type-success');
		}


	})
</script>

</body>
</html>