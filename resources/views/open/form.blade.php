@extends('layouts.open')

<div class="container mt-3">
<div class="panel panel-default">
	<div class="panel-body">

		<form class="form-horizontal" role="form" name="frm_event" id="frm_event">
			{{csrf_field()}}
			<input type="hidden" name="no" id="no" value="{{ $event['e_no'] ?? "" }}">
			<div class="col-xs-12 mt-3">
				<label>본명을 입력해주세요  예) 김온달/이평강</label>
				<input name="name" id="name" value="{{ $event['e_name'] ?? ""  }}" style="ime-mode:disabled;" class="input_partner form-control form-control-sm mb-3 col-6" type="text" placeholder="파트너본명/파트너본명">
			</div>

			<!--div class="col-xs-12 mt-3">
				<select name="type" id="type" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
					<option value="A">일반</option>
					<option value="S">긴급</option>
				</select>
			</div-->

			<div class="col-xs-12 mt-3">
				<label>달력에 표기될 이름을 입력해주세요(원하는 경우 입력)</label>
				<input type="text" name="name_view" id="name_view" value="{{ $event['e_name_view'] ?? ""  }}" placeholder="표기될이름/표기될이름" class="form-control form-control-sm col-12">
			</div>

			<div class="col-xs-12 mt-3">
				<label>이달의 뉴스 1,000 자 이내로 입력해주세요(<span id="count_txt">0자</span>)</label>
				<textarea name="cont" id="cont" class="form-control" style="height:200px;" placeholder="이달의 뉴스를 입력해주세요.">{{ $event['e_cont'] ?? ""  }}</textarea>

				<div id="count_txt2"></div>
			</div>

			<div class="col-xs-12 mt-3" id="eventDetail_msg" style="color:red">

			</div>


			<div class="col-xs-12 mt-3 text-center">
				<button type="button" class="btn btn-sm btn-primary" id="btn_event_update">보내기</button>
			</div>
			</form>

	</div>
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

		$(document).on("keyup", "#cont", function () {
			var count_txt = getTextLength($("#cont").val());

			$("#count_txt").html(count_txt+"자");
			if( count_txt > 1000 ) {
				//$("#count_txt").append("<br>글자수를 초과하였습니다.");
				$("#cont").css("color","red");
				$("#count_txt").css("color","red");
				$("#eventDetail_msg").html("글자수를 초과하였습니다.");
			} else {
				$("#count_txt").html(count_txt+"자");
				$("#cont").css("color","");
				$("#count_txt").css("color","");
				$("#eventDetail_msg").html("");
			}

		});

		$(document).on("click", "#btn_event_delete", function () {
			if (confirm("삭제하시겠습니까?") == true) {
				event_delete();
			}
		});

	});


	var getTextLength = function(str) {
		var len = 0;
		len = str.length;
		{{--  for (var i = 0; i < str.length; i++) {
			if (escape(str.charAt(i)).length == 6) {
				len++;
			}
			len++;
		}  --}}
		return len;
	}



	function event_update() {

		if( $("#name").val() < 3 ) {
			$("#name").focus();
			return false;
		}
		if( $("#cont").val() < 2 ) {
			$("#cont").focus();
			return false;
		}
		var req = $("#frm_event").serialize();
		console.log(req);
		$.ajax({
			url: '/reg',
			type: 'POST',
			async: true,
			beforeSend: function (xhr) {
				$("#eventDetail_msg").html("");
			},
			data: req,
			success: function (res, textStatus, xhr) {
				console.log(res);
				if (res.result == true) {
					location.href=res.rURL
				} else {
					$("#eventDetail_msg").html(xhr.message);
				}
			},
			error: function (xhr, textStatus, errorThrown) {
				$("#eventDetail_msg").html(xhr.responseJSON.message);
			}
		});
	}

</script>
@endsection	