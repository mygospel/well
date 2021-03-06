<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.manager')

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
                <div class="breadcrumb-title pe-3">업무관리</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">업무마감</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <button class="btn btn-xs btn-danger btn_manual" rel="10"><i class="lni lni-youtube"></i>도움말</button>
                </div>
            </div>
            <!--end breadcrumb-->

            <!--end row-->
            <div class="row">
                <div class="col-12 d-lg-flex align-items-lg-stretch">
                    <div class="card radius-10">
                        <div class="card-body">
                            <h4>2020 년 07월 20일 업무마감</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck2">
                                <label class="form-check-label" for="gridCheck2">고정석 입실된 회원을 모두 퇴실 및 소등 시키고 고정석 회원 상태를 결석으로 초기화</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck2">
                                <label class="form-check-label" for="gridCheck2">좌석 조명을 전체 소등</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck2">
                                <label class="form-check-label" for="gridCheck2">고정석 기간 만료 ID삭제(기간 만료된 회원의 비번/지문을 지문인식기에 삭제합니다.</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck2">
                                <label class="form-check-label" for="gridCheck2">고정석 기간만료 좌석 해제( 환경설정/좌석해제설정의 설정값으로 좌석 해제 합니다.</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck2">
                                <label class="form-check-label" for="gridCheck2">시간제 업무 마감 진행(체크시 시간제를 사용하는 모든 좌석이 퇴실 처리 되며 해당 좌석의 조명이 소등됩니다.)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck2">
                                <label class="form-check-label" for="gridCheck2">IOT 기기 종료</label>
                            </div>

                            <div class="row col-12 mt-3">
                                <div class="col-12">
                                    <div class="alert alert-warning">
                                        <div>* 업무마감 시작 버튼을 클릭후 확인을 누르시면 업무마감이 시작됩니다.</div>
                                        <div>* 지문인식기 명령 미처리건수, 조명 명령 미처리건수가 0이; 되어야 엄무마감 완료입니다.</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-warning px-5">업무마감</button>
                            </div>


                            <div class="row col-12 mt-3">
                                <div class="col-12">
                                    <div class="alert alert-secondary">
                                        <div style="font-size:1.1rem">지문인식기 명령 미처리건수 : 0건</div>
                                        <div style="font-size:1.1rem">조명 명령 미처리건수 : 0건</div>
                                    </div>
                                </div>
                            </div>


                        </div>


                    </div>
                </div>

            </div>
            <!--end row-->
        </div>
    </div>
    <!--end page wrapper -->
@endsection


