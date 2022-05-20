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
				<a href="javascript:popupOpen('back')" class="back-btn"></a>
				<div class="page-txt">날짜 선택</div>
			</article>
		</div>
	</header>

	<section class="voucher-calendar">

		<div class="inner wrap">

			<article class="history-detail-head">
				<div class="detail-head-box">
					<div class="head-txt">인터서브 스터디 카페 대흥점</div>
				</div>
				<div class="detail-sub-box">예약을 <b>시작하고 싶은 날짜</b>를 선택해 주세요!</div>
			</article>

			<article class="voucher-calendar-group">

				<div class="voucher-calendar-box">
					<div class="date-calendar"></div>
				</div>

			</article>

		</div>

	</section>

	<article class="page-with-btn">
		<article class="menu-btn-box">
			<a href="#none" class="menu-btn type-1">다음</a>
		</article>
	</article>

	<article class="time-foot-item">

		<div class="wrap">

			<a href="#none" class="bar"></a>

			<div class="item-wrap">

				<div class="tit-box">예약 시작 시간</div>
				<div class="item-list">
					<div class="item-box"><a href="javascript:timeSelectOff();" class="item-btn">9:00</a></div>
					<div class="item-box"><a href="javascript:timeSelectOff();" class="item-btn type-off">10:00</a></div>
					<div class="item-box"><a href="javascript:timeSelectOff();" class="item-btn type-off">11:00</a></div>
					<div class="item-box"><a href="javascript:timeSelectOff();" class="item-btn type-off">12:00</a></div>
					<div class="item-box"><a href="javascript:timeSelectOff();" class="item-btn">13:00</a></div>
					<div class="item-box"><a href="javascript:timeSelectOff();" class="item-btn">14:00</a></div>
					<div class="item-box"><a href="javascript:timeSelectOff();" class="item-btn">15:00</a></div>
					<div class="item-box"><a href="javascript:timeSelectOff();" class="item-btn">16:00</a></div>
					<div class="item-box"><a href="javascript:timeSelectOff();" class="item-btn">17:00</a></div>
					<div class="item-box"><a href="javascript:timeSelectOff();" class="item-btn">18:00</a></div>
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



	var w = $(document).innerWidth();
	var h = $(document).innerHeight();

	$(function() {
		$( ".time-foot-item" ).resizable({
			maxWidth : w,
			minWidth : w,
			minHeight : 30,
			maxHeight : h / 1.5,
			handles: 'n',
		});
	});

	function timeSelectOn(){
		$('.container').addClass('overlay');
		scrollDisable();
		$('.time-foot-item').addClass('on');
	}

	function timeSelectOff(){
		$('.container').removeClass('overlay');
		scrollAble();
		$('.time-foot-item').removeClass('on');
	}

	$(function (){

		if($('.time-foot-item').length){

			$(document).on('click',function (){
				if($('.time-foot-item').hasClass('on')){

					if($(event.target).parents('.time-foot-item').length){

					}else{
						timeSelectOff();
					}
				}
			})
		}

	})

</script>

</body>
</html>