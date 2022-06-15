@extends('layouts.open')

<div class="panel panel-default">
	<div class="panel-body">

		<form class="form-horizontal" role="form" name="frm_event" id="frm_event">
			{{csrf_field()}}
			<input type="hidden" name="no" id="no" value="">
			<div class="col-xs-12 mt-3">
				<input type="hidden" name="partner" id="partner" value="">
				<input name="partner_name" id="partner_name" style="ime-mode:disabled;" class="input_partner form-control form-control-sm mb-3 col-6" type="text" placeholder="클릭하여 파트너검색" aria-label=".form-control-sm example" data-bs-toggle="modal" data-bs-target="#partnerSearchModal" search_mode="event">
			</div>

			<div class="col-xs-12 mt-3">
				<input type="date" name="sdate" id="sdate" value="<?=date('Y-m-d')?>" placeholder="날자시작일" class="form-control form-control-sm datepicker col-12">
			</div>

			<div class="col-xs-12 mt-3">
				<select name="type" id="type" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
					<option value="A">일반</option>
					<option value="S">긴급</option>
				</select>
			</div>

			<div class="col-xs-12 mt-3">
				<input type="text" name="name" id="name" value="" placeholder="표기될 이름" class="form-control form-control-sm col-12">
			</div>

			<div class="col-xs-12 mt-3">
				<textarea name="cont" id="cont" class="form-control" style="height:200px;" placeholder="기도제목을 입력해주세요."></textarea>
			</div>

			<div class="col-xs-12 mt-3" id="eventDetail_msg">

			</div>


			<div class="col-xs-12 mt-3 text-center">
				<button type="button" class="btn btn-sm btn-primary" id="btn_event_update">글작성</button>
				<button type="button" class="btn btn-sm btn-secondary" onclick="location.href='/calendar'">취소</button>
			</div>
			</form>

	</div>
  </div>



@section('javascript')	
<script>

	$(document).ready(function () {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$(document).on("click", ".event_item", function () {
			var e_no = $(this).attr("event");
			event_getInfo(e_no);
			console.log(e_no);
		});

		$(document).on("click", "#btn_event_update", function () {
			event_update();
		});

		$(document).on("click", "#btn_event_delete", function () {
			if (confirm("삭제하시겠습니까?") == true) {
				event_delete();
			}
		});

	});

	function event_update() {
		var req = $("#frm_event").serialize();
		$.ajax({
			url: '/event/update',
			type: 'POST',
			async: true,
			beforeSend: function (xhr) {
				$("#eventDetail_msg").html("");
			},
			data: req,
			success: function (res, textStatus, xhr) {
				if (res.result == true) {
					alert("등록되었습니다. 관리자 확인후애 등록됩니다.");
					location.href='/calendar'
				} else {
					$("#eventDetail_msg").html(xhr.message);
				}
			},
			error: function (xhr, textStatus, errorThrown) {
				$("#eventDetail_msg").html(xhr.responseJSON.message);
			}
		});
	}

	function event_delete() {
		var req = $("#frm_event").serialize();
		console.log(req);
		$.ajax({
			url: '/event/delete',
			type: 'POST',
			async: true,
			beforeSend: function (xhr) {
				$("#eventDetail_msg").html("");
			},
			data: req,
			success: function (res, textStatus, xhr) {
				console.log(res);
				if (res.result == true) {
					location.href='/calendar'
				} else {
					$("#eventDetail_msg").html(res.message);
					console.log("실패.");
				}
			},
			error: function (xhr, textStatus, errorThrown) {
				console.log(xhr);
				console.log(xhr.responseJSON.file);
				console.log(xhr.responseJSON.line);
				console.log(xhr.responseJSON.message);     
			}
		});
	}


	function setPartnerSelected_event(no,name){
		$("#frm_event #partner").val(no);
		$("#frm_event #partner_name").val(name);   
	}
</script>
@endsection	