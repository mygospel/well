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
				<input type="date" name="sdate" id="sdate" value="" placeholder="날자시작일" class="form-control form-control-sm datepicker col-12">
			</div>


			<div class="col-xs-12 mt-3">
				<select name="type" id="type" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
					<option value="A">일반</option>
					<option value="S">긴급</option>
				</select>
			</div>

			<div class="col-6">
				<label class="form-label col-12">공개여부</label>
				<div class="form-check-inline col-12">
					<input type="radio" class='form-check-input' name="open" id="open_Y" value="Y"> 공개
					<input type="radio" class='form-check-input' name="open" id="open_N" value="N"> 비공개
				</div>
			</div>

			<div class="col-xs-12 mt-3">
				<input type="text" name="title" id="title" value="" placeholder="날자대신 제목을 표기하는 경우" class="form-control form-control-sm col-12">
			</div>

			<div class="col-xs-12 mt-3">
				<textarea name="cont" id="cont" class="form-control" style="height:200px;"></textarea>
			</div>

			<div class="col-xs-12 mt-3" id="eventDetail_msg">

			</div>


			<div class="col-xs-12 mt-3 text-center">
				<button type="button" class="btn btn-sm btn-primary" id="btn_event_update">글작성</button>
				
			</div>
			</form>
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
					document.location.reload();
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
					document.location.reload();
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

	function event_getInfo(no) {
		var req = "no=" + no;
		$.ajax({
			url: '/event/getInfo',
			type: 'POST',
			async: true,
			beforeSend: function (xhr) {
				$("#eventDetail_msg").html("");
			},
			data: req,
			success: function (res, textStatus, xhr) {
				console.log(res);                    

				if (res.event != null) {
					$("#no").val(res.event.no);
					$("#partner").val(res.event.partner);
					$("#partner_name").val(res.event.partner_name);
					//$("#aid").val(res.event.id).attr("readonly", true);
					$("#sdate").val(res.event.sdate);
					$("#edate").val(res.event.edate);
					$("#value").val(res.event.value);
					$("#title").val(res.event.title);
					$("#cont").val(res.event.cont);
					$("#type").val(res.event.type);
					$("#open_"+res.event.open).prop("checked", true);

				} else {
					$("#eventDetail_msg").html(res.message);
					console.log("실패.");
				}
			},
			error: function (xhr, textStatus, errorThrown) {
				console.log('PUT error.');
			}
		});
	}

	function setPartnerSelected_event(no,name){
		$("#frm_event #partner").val(no);
		$("#frm_event #partner_name").val(name);   
	}
</script>
@endsection	