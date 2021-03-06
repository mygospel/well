<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    <!--p>This is appended to the master sidebar.</p-->
@endsection

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">TOPIC관리</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">파트너 TOPIC 목록</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col">

                    <div class="card">
                        <div class="card-body">
                            <form name="search" action="?menu={{$menu ?? ''}}">
                                <input type="hidden" name="mode" value="list">
                                <div class='row'>
                                    <div class="col-md-2 col-sm-3 col-xs-12 mt-1">
                                        <select class="single-select form-control-sm col-12" name="state" id="state">
                                            <option value="" @if( isset($param['state']) && $param['state'] == "" ) selected @endif>전체</option>
                                            <option value="A" @if( isset($param['state']) && $param['state'] == "A" ) selected @endif>예정</option>
                                            <option value="I" @if( isset($param['state']) && $param['state'] == "I" ) selected @endif>진행</option>
                                            <option value="E" @if( isset($param['state']) && $param['state'] == "E" ) selected @endif>종료</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-6 col-xs-12 mt-1">
                                        <select class="single-select form-control-sm col-12" name="fd" id="fd">
                                            <option value="" @if( !isset($param['fd']) && $param['fd'] == "" ) selected @endif>제목+내용</option>
                                            <option value="title" @if( isset($param['fd']) && $param['fd'] == "title" ) selected @endif>제목</option>
                                            <option value="cont" @if( isset($param['fd']) && $param['fd'] == "cont" ) selected @endif>내용</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12 mt-1">
                                        <input type="text" name="q" value="{{ $param['q'] ?? ''}}" class="form-control form-control-sm col-12">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-6 mt-1">
                                        <button type="submit" class="btn btn-secondary px-2 btn-sm col-12">찾기</button>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-6 mt-1 justify-content-right">
                                        <a href="javascript:;" class="btn btn-warning px-2 btn-sm col-12" data-bs-toggle="modal" data-bs-target="#eventFormModal">신규작성</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">총 {{ isset($total) ? number_format($total) : '' }} 건</div>
                                <div class="col-sm-6"></div>
                                <div class="col-sm-3"><a href="/calendar" target="_blank" class="btn btn-warning px-2 btn-sm col-12">달력보기</a></div>
                            </div>
                            <table class="table mb-0 table-striped">
                                <thead>
                                <tr>
                                    <th scope="col-sm-1" class="text-center">#</th>
                                    <th scope="col-sm-1" class="text-center">공개</th>
                                    <th scope="col-sm-1" class="text-center">타입</th>
                                    <th scope="col-sm-2" class="text-center">파트너</th>
                                    <th scope="col-sm-2" class="text-center">본명</th>
                                    <th scope="col-sm-2" class="text-center">보여질이름</th>
                                    <th scope="col-sm-2" class="text-center">날자</th>
                                    <th scope="col-sm-4">제목</th>
                                    <th scope="col-sm-2" class="text-center">등록일시</th>
                                    <th scope="col-sm-1" class="text-center">관리</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if( $events )
                                @foreach( $events as $ei => $event )
                                <tr>
                                    <th scope="row" class="text-center">{{ ($start - $ei) }}</th>
                                    <td class="text-center">@if($event['e_open'] == "Y" ) <button type="button" class="btn btn-xs btn-info event_item">공개</button> @elseif($event['e_open'] == "N" ) <button type="button" class="btn btn-xs btn-secondary event_item">비공개</button> @endif</td>
                                    <td class="text-center">@if($event['e_type'] == "A" ) 일반 @elseif($event['e_type'] == "S" ) <button type="button" class="btn btn-xs btn-danger event_item">긴급</button> @endif</td>
                                    <td class="text-center">{{ $event['p_name'] }}</td>
                                    <td class="text-center">{{ $event['e_name']  }}</td>
                                    <td class="text-center">{{ $event['e_name_view']  }}</td>
                                    <td class="text-center">{{ $event['e_sdate'] }}</td>
                                    <td>{{ substr($event['e_cont'],0,50) }}</td>
                                    <td class="text-center">{{ substr($event['created_at'],0,16) }}</td>
                                    <td class="text-center"><button class="btn btn-xs btn-secondary event_item" event="{{ $event['e_no'] }}" data-bs-toggle="modal" data-bs-target="#eventFormModal">관리</button></td>
                                </tr>
                                @endforeach
                                @endif

                                </tbody>
                            </table>
                        </div>
                        @foreach($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                        <div class="card-body d-flex justify-content-center">
                            {{ $events->appends($param)->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!--end row-->
        </div>
    </div>
    <div class="modal fade" id="eventFormModal" tabindex="-2" aria-labelledby="eventFormModalLabel" style="display: none;z-index:90000;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventFormModalLabel">TOPIC</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="overflow:scroll; ">
                
                    <form class="form-horizontal" role="form" name="frm_event" id="frm_event">
                    {{csrf_field()}}
                    <input type="hidden" name="no" id="no" value="">
                    <div class="col-xs-12 mt-3">

                        <label class="form-label col-12">파트너매칭</label>
                        <input type="hidden" name="partner" id="partner" value="">
                        <input name="partner_name" id="partner_name" style="ime-mode:disabled;" class="input_partner form-control form-control-sm mb-3 col-6" type="text" placeholder="클릭하여 파트너검색" aria-label=".form-control-sm example" data-bs-toggle="modal" data-bs-target="#partnerSearchModal" search_mode="event">
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="col-xs-12 mt-3">
                                <label class="form-label col-12">이름</label>
                                <input name="name" id="name" style="ime-mode:disabled;" class="form-control form-control-sm mb-3 col-6" type="text" placeholder="이름">
                            </div>  

                        </div>
                        <div class="col">
                            <div class="col-xs-12 mt-3">
                                <label class="form-label col-12">보여질이름</label>
                                <input name="name_view" id="name_view" style="ime-mode:disabled;" class="form-control form-control-sm mb-3 col-6" type="text" placeholder="보여질이름">
                            </div>  

                        </div>

                    </div>  


                    <div class="row">
                        <div class="col-6">

                                <label class="form-label col-12">달력에표기될날자</label>
                                <input type="date" name="sdate" id="sdate" value="" placeholder="날자시작일" class="form-control form-control-sm datepicker col-12">


                        </div>
                        <div class="col-3">
                            <label class="form-label col-12">공개여부</label>

                            <div class="btn-group btn-group-sm" role="group" aria-label="공개여부선택">
                                <input type="radio" class="btn-check btn-info" name="open" id="open_Y" value="Y" autocomplete="off" checked>
                                <label class="btn btn-outline-info" for="open_Y">&nbsp;&nbsp;공개&nbsp;&nbsp;</label>
                              
                                <input type="radio" class="btn-check" name="open" id="open_N" value="N" autocomplete="off">
                                <label class="btn btn-outline-secondary" for="open_N">비공개</label>

                            </div>                             
                       

                        </div>
                        <div class="col-3">
                            <label class="form-label col-12">구분</label>
                            <select name="type" id="type" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                <option value="A">일반</option>
                                <option value="S">긴급</option>
                            </select>

                        </div>

                    </div>  
                  


                    <div class="col-xs-12 mt-3">

                    </div>

                    <div class="col-6">

                    </div>

                    <div class="col-xs-12 mt-3">
                        <label class="form-label col-12">이름대신 표기할때( 예를 들어 본부에서 '공동체를 위한 기도' 같이 입력할때 )</label>
                        <input type="text" name="title" id="title" value="" placeholder="날자대신 제목을 표기하는 경우" class="form-control form-control-sm col-12">
                    </div>

                    <div class="col-xs-12 mt-3">
                        <label class="form-label col-12">작성한내용</label>
                        <textarea name="cont" id="cont" class="form-control" style="height:200px;"></textarea>
                    </div>

                    <div class="col-xs-12 mt-3">
                        <label class="form-label col-12">정리 - 여기에 입력하시면 이 내용이 나오고 없으면 위에 내용이 캘린더에 나옵니다.</label>
                        <textarea name="cont2" id="cont2" class="form-control" style="height:100px;"></textarea>
                    </div>

                    <div class="col-xs-12 mt-3" id="eventDetail_msg">

                    </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" id="btn_event_update">확인</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-xs btn-danger" id="btn_event_delete">삭제</button>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection



@section('javascript')
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
                url: '/admin/event/update',
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
                url: '/admin/event/delete',
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
            console.log(req);     
            $.ajax({
                url: '/admin/event/getInfo',
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
                        $("#name").val(res.event.name);
                        $("#partner_name").val(res.event.partner_name);
                        $("#name_view").val(res.event.name_view);
                        //$("#aid").val(res.event.id).attr("readonly", true);
                        $("#sdate").val(res.event.sdate);
                        $("#edate").val(res.event.edate);
                        $("#value").val(res.event.value);
                        $("#title").val(res.event.title);
                        $("#cont").val(res.event.cont);
                        $("#cont2").val(res.event.cont2);
                        $("#type").val(res.event.type);
                        $("#open_"+res.event.open).prop("checked", true);

                        $('#cont').summernote({
                            placeholder: '내용을 작성하세요',
                            height: 400,
                            maxHeight: 400
                        });
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

