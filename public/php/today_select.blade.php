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
	<link href="../css/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<link href="../css/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<link href="../css/datepicker.min.css" rel="stylesheet" type="text/css"/>

</head>
<body>
<div class="container page-with-btn" style=";">

	<header>
		<div class="wrap">
			<article class="header-page-group" style="">
				<a href="#none" class="back-btn"></a>
				<div class="page-txt">이용권 구매</div>
				<div class="right-menu-box">
					<a href="#none" class="txt-btn2">취소</a>
				</div>
			</article>
		</div>
	</header>

	<section class="voucher-calendar">

		<div class="inner wrap">

			<article class="history-detail-head" style="padding-bottom: 10px;">
				<div class="detail-head-box">
					<div class="head-txt">인터서브 스터디 카페 대흥점</div>
					<div class="state-box"></div>
				</div>
				<div class="detail-sub-box">예약하고 싶은 <b>이용 시간, 시작 시간</b>과 <b>날짜</b>를 선택해 주세요!</div>

			</article>


			<article class="voucher-calendar-group">

				<div class="voucher-time-select-box type-row" style="padding-top: 0; margin-top: 0; border:0;">

					<!-- 선택 효과는 active 유무로 구별 -->

					<div class="row">
						<div class="time-box">
							<div class="time-tit-box">예약 시작 시간</div>
							<a href="javascript:selectOn('time1');" class="time-btn" data-select="select1">9:00</a>
						</div>
					</div>

					<div class="row">
						<div class="time-box">
							<div class="time-tit-box">예약 종료 시간</div>
							<a href="javascript:selectOn('time2');" class="time-btn active" data-select="select2">18:00</a>
						</div>
					</div>
				</div>




			</article>

		</div>

	</section>

	<article class="page-with-btn">
		<article class="menu-btn-box">
			<a href="#none" class="menu-btn">다음</a>
		</article>
	</article>

	<article class="time-foot-item" data-foot="time1">

		<div class="wrap">

			<a class="bar" href="#none"></a>

			<div class="item-wrap">

				<div class="tit-box">예약 시작 시간</div>
				<div class="item-list">
					<div class="item-box"><a class="item-btn" href="#none" onclick="selectClick(this,'select1')">9:00</a></div>
					<div class="item-box"><a class="item-btn type-off" href="#none">10:00</a>
					</div>
					<div class="item-box"><a class="item-btn type-off" href="#none">11:00</a>
					</div>
					<div class="item-box"><a class="item-btn type-off" href="#none">12:00</a>
					</div>
					<div class="item-box"><a class="item-btn" href="#none" onclick="selectClick(this,'select1')">13:00</a></div>
					<div class="item-box"><a class="item-btn" href="#none" onclick="selectClick(this,'select1')">14:00</a></div>
					<div class="item-box"><a class="item-btn" href="#none" onclick="selectClick(this,'select1')">15:00</a></div>
					<div class="item-box"><a class="item-btn" href="#none" onclick="selectClick(this,'select1')">16:00</a></div>
					<div class="item-box"><a class="item-btn" href="#none" onclick="selectClick(this,'select1')">17:00</a></div>
					<div class="item-box"><a class="item-btn" href="#none" onclick="selectClick(this,'select1')">18:00</a></div>
				</div>

			</div>
		</div>
	</article>
	<article class="time-foot-item" data-foot="time2">

		<div class="wrap">

			<a class="bar" href="#none"></a>

			<div class="item-wrap">

				<div class="tit-box">예약 종료 시간</div>
				<div class="item-list">
					<div class="item-box"><a class="item-btn" href="#none" onclick="selectClick(this,'select2')">9:00</a></div>
					<div class="item-box"><a class="item-btn type-off" href="#none">10:00</a>
					</div>
					<div class="item-box"><a class="item-btn type-off" href="#none">11:00</a>
					</div>
					<div class="item-box"><a class="item-btn type-off" href="#none">12:00</a>
					</div>
					<div class="item-box"><a class="item-btn" href="#none" onclick="selectClick(this,'select2')">13:00</a></div>
					<div class="item-box"><a class="item-btn" href="#none" onclick="selectClick(this,'select2')">14:00</a></div>
					<div class="item-box"><a class="item-btn" href="#none" onclick="selectClick(this,'select2')">15:00</a></div>
					<div class="item-box"><a class="item-btn" href="#none" onclick="selectClick(this,'select2')">16:00</a></div>
					<div class="item-box"><a class="item-btn" href="#none" onclick="selectClick(this,'select2')">17:00</a></div>
					<div class="item-box"><a class="item-btn" href="#none" onclick="selectClick(this,'select2')">18:00</a></div>
				</div>

			</div>
		</div>
	</article>


</div>

<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/jquery-ui-1.12.1.js"></script>
<script src="../js/swiper.min.js"></script>
<script src="../js/ui.js"></script>
<script src="../js/jquery.ui.touch-punch.min.js"></script>
<script src="../js/datepicker.min.js"></script>
<script src="../js/datepicker.ko.js"></script>


<script>
	$('.date-calendar').datepicker(
		{
			autoClose: true,
			language: 'ko',
			inline: true,
			navTitles: {
				days: '<i>yyyy</i>.MM'
			},
			onChangeYear: false,
		}
	);




</script>

</body>
</html>