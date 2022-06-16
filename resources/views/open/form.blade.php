@extends('layouts.open')

<div class="container mt-3">
<div class="panel panel-default">
	<div class="panel-body">

		<form class="form-horizontal" role="form" name="frm_event" id="frm_event">
			{{csrf_field()}}
			<input type="hidden" name="no" id="no" value="{{ $event['e_no'] ?? "" }}">

			<div class="col-xs-12 mt-3">
				<label>제목</label>
				<input name="title" id="title" value="{{ $event['e_title'] ?? ""  }}" class="input_partner form-control form-control-sm mb-3 col-6" type="text" placeholder="파트너본명/파트너본명">
			</div>

			<div class="col-xs-12 mt-3">
				<label>내용</label>
				<textarea name="cont" id="cont" class="form-control" style="height:500px;" placeholder="아룀제목">{{ $event['e_cont'] ?? ""  }}</textarea>

				<div id="count_txt2"></div>
			</div>


			<div class="col-xs-12 mt-3" id="eventDetail_msg" style="color:red">

			</div>


			<div class="col-xs-12 mt-3 text-center">
				<button type="button" class="btn btn-sm btn-primary" id="btn_event_update">저장</button>
			</div>
			</form>

	</div>
  </div>

</div>

@section('javascript')	
<!-- summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>

<script>

	$(document).ready(function () {

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$(document).ready(function () {
			$('#cont').summernote({
				placeholder: '내용을 작성하세요',
				height: 400,
				maxHeight: 400
			});
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