@extends('layouts.open')

	<div class="modal-dialog modal-lg modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="eventFormModalLabel">TOPIC</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" enctype="multipart/form-data" role="form" name="frm_event" id="frm_event">
				<input type="hidden" name="partner" id="partner" value="">
				{{csrf_field()}}
				<input type="hidden" name="no" id="no" value="">
				<div class="col-xs-12 mt-3">
					<input name="partner_name" id="partner_name" style="ime-mode:disabled;" class="input_partner form-control form-control-sm mb-3 col-6" type="text" placeholder="클릭하여 파트너검색" aria-label=".form-control-sm example" data-bs-toggle="modal" data-bs-target="#partnerSearchModal" search_mode="event">
				</div>

				<div class="col-xs-12 mt-3">
					<input class="form-control form-control-sm col-12" type="file" placeholder="이미지"  name="img1" id="img1">
					<input type="hidden" name="del_img1" id="del_img1">
					<span class="img_file"></span>
				</div>

				<div class="col-xs-12 mt-3">
					<input class="form-control form-control-sm col-12" type="file" placeholder="이미지"  name="img2" id="img2">
					<input type="hidden" name="del_img2" id="del_img2">
					<span class="img_file"></span>
				</div>

				<div class="col-xs-12 mt-3">
					<input class="form-control form-control-sm col-12" type="file" placeholder="이미지"  name="img3" id="img3">
					<input type="hidden" name="del_img3" id="del_img3">
					<span class="img_file"></span>
				</div>
				
				<div class="col-xs-12 mt-3">
					<input type="date" name="sdate" id="sdate" value="" placeholder="기간시작일" class="form-control form-control-sm datepicker col-12">
				</div>

				<div class="col-xs-12 mt-3">
					<input type="date" name="edate" id="edate" value="" placeholder="기간종료일" class="form-control form-control-sm datepicker col-12">
				</div>

				<div class="col-xs-12 mt-3">
					<select name="type" id="type" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
						<option value="P">할인금액</option>
						<option value="R">할인율</option>
					</select>
				</div>

				<div class="col-xs-12 mt-3">
					<input type="text" name="value" id="value" placeholder="할인금액" class="form-control form-control-sm col-12">
				</div>

				<div class="col-xs-12 mt-3">
					<input type="text" name="uname" id="uname" value="{{ $key ?? '' }}" placeholder="작성자" class="form-control form-control-sm col-12">
				</div>

				<div class="col-xs-12 mt-3">
					<input type="text" name="title" id="title" value="" placeholder="제목" class="form-control form-control-sm col-12">
				</div>

				<div class="col-xs-12 mt-3">
					상세정보
					<textarea name="cont" id="cont" class="form-control" style="height:200px;"></textarea>
				</div>

				<div class="col-xs-12 mt-3">
					TOPIC 유의사항
					<textarea name="cont2" id="cont2" class="form-control" style="height:200px;"></textarea>
				</div>

				<div class="col-xs-12 mt-3" id="eventDetail_msg">

				</div>


				<div class="col-xs-12 mt-3 text-center">
					<button type="button" class="btn btn-sm btn-primary" id="btn_event_update">글작성</button>
				</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>


@section('javascript')	
<script>
	$(document).ready(function(){	
		view_topic('{{ date("Y-m-d") }}');
		view_topic_sp();

		$(document).on("click",".cal_day",function(){
			var dt = $(this).attr("rel");
			console.log(dt);
			view_topic(dt);
		});

	});

	function view_topic_sp(){
		if( $(".att_Sp").length )  {
			$("#sp_tab").show();
			$("#sp_tab #sp_topic").html( $(".att_Sp").html() );
		} else {
			$("#sp_tab").html("").hide();
		}
	}

	function view_topic(dt){

		var html = $(".cal_day[rel='"+dt+"'] .att_date").html();
		console.log(html);
				
		$("#topicInfoModal #topicInfoTitle").html(dt);
		$(".popup_topic").html(html);

		if( html != "" ) {
			$("#topicInfoModal div").removeClass("d-none").removeClass("d-sm-block");
		} else {
			$("#topicInfoModal div").addClass("d-none").addClass("d-sm-block");
		}

		if( html || $(".att_Sp").length ) {
			$("#topicInfoModal").modal("show");
		}
	}
	
	$('#topicInfoModal').on('hide.bs.modal', function (e) {
		$("#sp_tab").hide();
		$(".popup_topic").html("");
		$("#sp_topic").html("");
	});	

</script>	
@endsection

<style>

@media (max-width:439px){.att_date{font-size:9pt;}}
@media (min-width:440px){.att_date{font-size:10pt;}}


/* 달력 */
.event-cal2 {

}
.tt-calendar2 {
	width:100%;
  margin: 0 auto;
}
.cal_month {
	width:100%;
	margin: 0 auto;
	padding: 10px 0 10px 0;
	font-size: 12pt;
	text-align: center;
	font-weight: 700;
}
.cal_month .prev,
.cal_month .next {
  padding: -12px 5px;
  font-size: 12pt;
  font-family: consolas;
  background-color: #fafafa;
  border: 1px solid #dedfe0;
}
.cal_month a {
  font-size: 20px;
  color: #000;
  line-height:20px;
}
.tt-calendar2 thead {
  border: solid #ececec;
  border-width: 2px 2px 0 2px;
}
.tt-calendar2 tbody {
  border: solid #ececec;
  border-width: 0px 2px 2px 2px;
}

.tt-calendar2 td{
	width:13%;
}

/*
.tt-calendar2 .cal_week1{
	width:8%;
}
.tt-calendar2 .cal_week2{
	
	width:50px;
}
*/
.tt-calendar2 .cal_week1,
.tt-calendar2 .cal_week2 {
  color: #fff;
  font-size: 8pt;
  text-align: center;
  background-color: #bdc1c5;
  border: solid #fff;
  border-width: 1px 0 0 1px;
  height:25px;
}
.tt-calendar2 .cal_week2 {
  background-color: #feaa96 !important;
}
.tt-calendar2 .cal_week td {
  padding: 3px;
  color: #555;
  font-size: 8pt;
  text-align: center;
  background-color: #f4f4f4;
  border: solid #fff;
  border-width: 1px 0 0 1px;

}

.tt-calendar2 .cal_day{
	min-height:50px;
}
.tt-calendar2 .cal_day_today {
  background-color: #97caef !important;
}
.tt-calendar2 .cal_day_sunday {
  background-color: #f8f2f2 !important;
}
.tt-calendar2 .cal_day4 {
  background-color: #e6e7ea !important;
}
.tt-calendar2 .cal_dayEvent {
  background-color: #f4f4f5 !important;
}

.tt-calendar2 .cal_week td {
  padding: 4px;
  color: #555;
  font-size: 8pt;
  text-align: left;
  background-color: #f4f4f4;
  border: solid #fff;
  border-width: 1px 0 0 1px;
  min-height:50px;
}



</style>    
