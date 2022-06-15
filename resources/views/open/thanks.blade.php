@extends('layouts.open')

<div class="container">
	아래와 같이 등록되었습니다. 감사합니다.
	<div class="panel panel-default">
		<div class="panel-body">
	

				<div class="col-xs-12 mt-3">
					<label>본부에서 알고 있는 이름을 입력해주세요</label>
					<input value="{{ $event['e_name'] }}" style="ime-mode:disabled;" disabled=disabled class="input_partner form-control form-control-sm mb-3 col-6 " type="text" placeholder="파트너이름/파트너이름">
				</div>
	
				<!--div class="col-xs-12 mt-3">
					<select name="type" id="type" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
						<option value="A">일반</option>
						<option value="S">긴급</option>
					</select>
				</div-->
	
				<div class="col-xs-12 mt-3">
					<label>달력에 표기될 이름을 입력해주세요(원하는 경우 선택)</label>
					<input type="text" value="{{ $event['e_name_view'] }}" disabled=disabled placeholder="표기될이름/표기될이름" class="form-control form-control-sm col-12">
				</div>
	
				<div class="col-xs-12 mt-3">
					<textarea name="cont" id="cont" class="form-control" disabled=disabled style="height:200px;" placeholder="이달의 제목을 입력해주세요.">{{ $event['e_cont'] }}</textarea>
				</div>
	
				<div class="col-xs-12 mt-3" id="eventDetail_msg">
	
				</div>
	
				<form class="form-horizontal" method="post" role="form" name="frm_event" id="frm_event">
					{{csrf_field()}}
				<input type="hidden" name="e" id="e" value="{{ session('e') }}">
				<div class="col-xs-12 mt-3 text-center">
					<button type="button" class="btn btn-sm btn-primary" onclick="this.form.action='form';this.form.submit()">수정하기</button>
					<button type="button" class="btn btn-sm btn-secondary" onclick="window.close();">닫기</button>
				</div>
				</form>
	
		</div>
	  </div>
	
	</div>
