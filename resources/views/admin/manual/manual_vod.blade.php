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
                <div class="breadcrumb-title pe-3">온라인메뉴얼</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">동영상메뉴얼</li>
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

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form name="search" action="">
                                <input type="hidden" name="mode" value="list">
                                <div class='row'>
                                    <!--div class="col-md-2 col-sm-3 col-xs-12 mt-1">
                                        <select class="single-select form-control-sm col-12" name="" id="">
                                            <option value="" <?php if( isset($fd) && $fd == "" ) {?> selected<?}?>>전체</option>
                                            <option value="name" <?php if( isset($fd) && $fd == "name" ) {?> selected<?}?>>답변대기</option>
                                            <option value="title" <?php if( isset($fd) && $fd == "title" ) {?> selected<?}?>>답변완료</option>
                                        </select>
                                    </div-->
                                    <div class="col-md-2 col-sm-3 col-xs-12 mt-1">
                                        <select class="single-select form-control-sm col-12" name="fd" id="fd">
                                            <option value="" <?php if( isset($param['fd']) && $param['fd'] == "" ) {?> selected<?}?>>제목+내용+작성자</option>
                                            <option value="title" <?php if( isset($param['fd']) && $param['fd'] == "title" ) {?> selected<?}?>>제목</option>
                                            <option value="cont" <?php if( isset($param['fd']) && $param['fd'] == "cont" ) {?> selected<?}?>>내용</option>
                                            <option value="uname" <?php if( isset($param['fd']) && $param['fd'] == "uname" ) {?> selected<?}?>>작성자</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-5 col-xs-12 mt-1">
                                        <input type="text" name="q" value="{{ $param['q'] ?? '' }}" class="form-control form-control-sm col-12">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-6 mt-1">
                                        <button type="submit" class="btn btn-secondary px-2 btn-sm col-12">찾기</button>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 mt-1 justify-content-right">
                                        <a href="/manual/vod/form" class="btn btn-warning px-2 btn-sm col-12">신규</a>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
                @if( $vodboards )
                @foreach( $vodboards as $bi => $vodboard )
                <div class="col-3">
                    <div class="card">
                        <iframe width="100%"  src="{{ $vodboard['b_vod'] }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="card-body">
                            <h6 class="card-title cursor-pointer"><a href="/manual/vod/form/{{ $vodboard['b_no'] }}">{{ $vodboard['b_title'] }}</a> <span class="btn btn-xs btn-primary btn_manual" rel="{{ $vodboard['b_no'] }}">팝업</span></h6>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>


        </div>
    </div>

    <div class="modal fade" id="manualFormModal" tabindex="-2" aria-labelledby="manualFormModalLabel" style="display: none;z-index:90000;" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="manualFormModalLabel">작성하기</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="col-xs-12 mt-3">
                        <input type="text" name="title" value="" placeholder="제목" class="form-control form-control-sm col-12">
                    </div>
                    <div class="col-xs-12 mt-3">
                        <input type="text" name="point" value="" placeholder="작성자" class="form-control form-control-sm col-12">
                    </div>

                    <div class="col-xs-12 mt-3">
                        <textarea name="seat_memo" class="form-control"></textarea>
                    </div>

                    <div class="col-xs-12 mt-3 text-center">
                        <button type="button" class="btn btn-sm btn-primary">글작성</button>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection


