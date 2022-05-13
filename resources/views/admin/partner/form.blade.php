<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    <!--p>This is appended to the master sidebar.</p-->
@endsection

@section('content')

    <!--start page wrapper -->
    <script language="javaScript" src="/module/nmap/nmap.js" type="text/javascript"></script>
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">파트너정보관리</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">파트너정보</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">

                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">

                <div class="card-body">
                    <h5 class="mb-0 text-primary">
                        @if( $partner && $partner["p_no"] )
                        파트너명 {{ $partner["p_name"] }}
                        @else
                        신규파트너 등록
                        @endif
                    </h5>
                </div>

                <div class="card-body">
                    <ul class="nav nav-tabs nav-primary" role="tablist">
                        <li class="nav-item" role="presentation"
                        onclick="location.href='/partner/form/{{ $partner["p_no"] ?? "" }}'">
                            <a class="nav-link active" data-bs-toggle="tab" href="/partner/form/{{ $partner["p_no"] ?? "" }}"
                               role="tab" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bxs-home font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">파트너정보</div>
                                </div>
                            </a>
                        </li>
                        @if( isset( $partner )  && isset($partner["p_no"]) ) 
                        <li class="nav-item" role="presentation"
                        onclick="location.href='/partner/photo/{{ $partner["p_no"] ?? "" }}'">
                            <a class="nav-link" data-bs-toggle="tab" href="/partner/photo/{{ $partner["p_no"]  ?? "" }}"
                               role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bxs-user-pin font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">파트너사진정보</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#"
                               role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bxs-microphone font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">이용현황</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#"
                               role="tab" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bxs-home font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">1:1문의</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#"
                               role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bxs-user-pin font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">공지사항</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#"
                               role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bxs-microphone font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">이용통계</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#"
                               role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bxs-microphone font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">정산내역</div>
                                </div>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>


                <div class='card-body'>
                    <form enctype="multipart/form-data" method="post" name="form1" id="form1" class="row g-3">
                        {{csrf_field()}}
                        <input type="hidden" name="mode" value="modify">
                        <input type="hidden" name="no" id="no" value="{{ $partner["p_no"] ?? '' }}">
                        <input type="hidden" name="page" value="">
                        @if( $partner )
                        <input type="hidden" name="rURL" value="">
                        @else
                        <input type="hidden" name="rURL" value="/partner">
                        @endif

                        <div class="col-md-6">
                            <label class="form-label">파트너ID</label>
                            <input type="text" name="id" maxlength="50" class="form-control form-control-sm" value="{{ $partner["p_id"] ?? '' }}"@if( isset($partner["p_no"]) ) readonly @endif>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">비빌번호</label>
                            <input type="text" class="form-control form-control-sm" name="passwd" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">파트너명</label>
                            <input type="text" name="name" maxlength="50" class="form-control form-control-sm" value="{{ $partner["p_name"] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">전화번호</label>
                            <input type="text" class="form-control form-control-sm" name="phone" maxlength="50" value="{{ $partner["p_phone"] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="ceo">대표자명</label>
                            <input type="text" class="form-control form-control-sm" name="ceo" id="ceo" maxlength="50" value="{{ $partner["p_ceo"] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">이메일</label>
                            <input type="email" class="form-control form-control-sm" name="email" maxlength="50" value="{{ $partner["p_email"] ?? '' }}">
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">주소</label>                            
                            <input type="text" class="form-control form-control-sm" id="address1" name="address1" value="{{ $partner["p_address1"] ?? '' }}" onclick="execDaumPostcode('partner')">
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">출입문타입</label>
                            <br>
                            <input class="form-check-input" type="radio" name="door" value="Q" @if( $partner && $partner["p_door"] == "Q" ) checked @endif> QR코드
                            <input class="form-check-input" type="radio" name="door" value="S" @if( $partner && $partner["p_door"] == "S" ) checked @endif> 비밀번호
                            <input class="form-check-input" type="radio" name="door" value="B" @if( $partner && $partner["p_door"] == "B" ) checked @endif> 버튼
                            <input class="form-check-input" type="radio" name="door" value="P" @if( $partner && $partner["p_door"] == "P" ) checked @endif> 지문인식
                        </div>
                        <div class="col-12">
                            <label class="form-label">기타소개</label>
                            <textarea class="form-control" id="intro" name="intro" cols="70">{{ $partner["p_intro"] ?? '' }}</textarea>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">메모</label>
                            <textarea class="form-control" name="memo" rows="3">{{ $partner["p_memo"] ?? '' }}</textarea>
                        </div>

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="alert alert-danger d-none" id="partnerErrMsg">

                        </div>

                        <div class="col-12 text-center">
                            <button type="button" class="btn btn-primary px-5" onclick="formcheck()">정보수정</button>
                            <button type="button" class="btn btn-secondary px-5" onclick="location.href='partner_list.html?mode=modify&p_no='">돌아가기</button>
                        </div>
                     
                    </form>

                    @if( isset( $partner )  && isset($partner["p_no"]) ) 
                    <div class="col-12 text-right mt-5 mb-3">
                        <button type="button" class="btn btn-xs btn-danger px-5" id="btn_partner_delete">삭제</button>
                    </div>
                    @endif   
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
    <?
    //include $CFG['module_dir']."/zipcode/zipcode.inc.php";
    ?>
    <!--end page wrapper -->
@endsection


@section('javascript')
    <script src="/assets/js/nmap.js"></script> 
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on("click",".btn_fav",function(){
                console.log("파트너:"+$(this).attr("partner"));
                fn_favorite( $(this).attr("partner"));
            });
            $(document).on("click","#btn_partner_delete",function(){
                delete_partner();
            });
        });

        function formcheck(){
            $("#partnerErrMsg").html("").addClass("d-none");
            /* 요거는 나중에.....
            for(i=0;i<=oEditors.length-1;i++){
                oEditors[i].exec("UPDATE_CONTENTS_FIELD", []);
            }
            */

            formData = $("#form1").serialize();
            $.ajax({
                url: '/partner/update',
                //processData: false,
                //contentType: false,
                data: formData,
                type: 'POST',
                success: function (res) {
                    console.log(res);
                    if (res.result == true) {
                        if (res.rURL != undefined) {
                            document.location.href = res.rURL;
                        } else {
                            document.location.reload();
                        }
                    } else {
                        $("#partnerErrMsg").html(res.message).removeClass("d-none");
                    }
                },
                error: function(xhr, status, msg){
                    ajax_error(xhr.responseJSON)
                }
            });
        }

        function delete_partner(){
            $("#partnerErrMsg").html("").addClass("d-none");
            /* 요거는 나중에.....
            for(i=0;i<=oEditors.length-1;i++){
                oEditors[i].exec("UPDATE_CONTENTS_FIELD", []);
            }
            */
            if( confirm("정말로 삭제하시겠습니까?") == true ) {
                formData = new FormData();
                console.log($("#form1 #no").val()); 
                formData.append("no",$("#form1 #no").val() );
                console.log(formData); 
                $.ajax({
                    url: '/partner/delete',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    processData: false,
                    contentType: false,
                    data: formData,
                    type: 'POST',
                    success: function (res) {
                        console.log(res);
                        if (res.result == true) {
                                document.location.href = "/partner";
                        } else {
                            $("#partnerErrMsg").html(res.message).removeClass("d-none");
                        }
                    },
                    error: function(xhr, status, msg){
                        console.log(xhr);
                        console.log(xhr.responseJSON.file);
                        console.log(xhr.responseJSON.line);
                        console.log(xhr.responseJSON.message);                        
                        ajax_error(xhr.responseJSON)
                    }
                });
            }
        }        

    </script>

@endsection
