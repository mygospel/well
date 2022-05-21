<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--favicon-->
    <link rel="icon" href="/assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="/assets/plugins/highcharts/css/highcharts.css" rel="stylesheet" />
    <!-- loader-->
    <link href="/assets/css/pace.min.css" rel="stylesheet" />
    <script src="/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <!--link href="//fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet"-->
    <link href="/assets/css/app.css" rel="stylesheet">
    <link href="/assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="/assets/css/dark-theme.css" />
    <link rel="stylesheet" href="/assets/css/semi-dark.css" />
    <link rel="stylesheet" href="/assets/css/header-colors.css" />
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>관리자</title>
</head>

<body>
<!--wrapper-->
<div class="wrapper">
    <!--sidebar wrapper -->
    <div class="sidebar-wrapper" data-simplebar="true">

        <!--navigation-->
        @include("layouts.admin_sidebar")
        @yield('sidebar')
        <!--end navigation-->

    </div>
    <!--end sidebar wrapper -->
    <!--start header -->
    <header>
        @include("layouts.admin_topnav")
    </header>

    @yield('content')


    <div class="modal fade" id="partnerSearchModal" tabindex="-3" aria-labelledby="partnerSearchModalLabel" style="display: none;z-index:193000;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="partnerSearchModalLabel">파트너검색</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="frm_search_partner" id="frm_search_partner" onsubmit="return partner_search();">
                        <div class="row">

                            <div class="col-md-9 col-xs-12 mt-1">
                                <input type="text" name="search_partner_q" id="search_partner_q" value="" placeholder="아이디, 이름, 전화번호 " class="form-control form-control-sm col-12">
                            </div>
                            <div class="col-md-3 col-xs-12 mt-1 justify-content-right">
                                <button type="submit" class="btn btn-warning px-2 btn-sm col-12">검색</button>
                            </div>
                        </div>
                    </form>

                    <table class="table mb-0 table-striped">
                        <thead>
                        <tr>
                            <th scope="col">파트너명</th>
                            <th scope="col">지역</th>
                            <th scope="col">연락처</th>
                            <th scope="col">선택</th>
                        </tr>
                        </thead>
                        <tbody id="partner_search_list" style="overflow:scroll; height:300px;">
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="memberListModal" tabindex="-3" aria-labelledby="memberListModalLabel" style="display: none;z-index:193000;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="memberListModalLabel">회원검색</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="search" action="/manager/member_list.html?menu=">
                        <input type="hidden" name="mode" value="list">
                        <div class="row">

                            <div class="col-md-9 col-xs-12 mt-1">
                                <input type="text" name="title" value="" placeholder="아이디, 이름, 전화번호 " class="form-control form-control-sm col-12">
                            </div>
                            <div class="col-md-3 col-xs-12 mt-1 justify-content-right">
                                <a href="javascript:;" class="btn btn-warning px-2 btn-sm col-12">검색</a>
                            </div>
                        </div>
                    </form>

                    <table class="table mb-0 table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">아이디</th>
                            <th scope="col">이름</th>
                            <th scope="col">연락처</th>
                            <th scope="col">이용횟수</th>
                            <th scope="col">최근이용일</th>
                            <th scope="col">가입일</th>
                            <th scope="col">관리</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>mygospel</td>
                            <td><i class="bx bx-mobile-alt"></i> 조현준</td>
                            <td>010-4204-0696</td>
                            <td>1회</td>
                            <td>20-10-17</td>
                            <td>20-10-17</td>
                            <td><button type="button" class="btn btn-xs btn-primary" data-bs-dismiss="modal">선택</button></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>exbuilder</td>
                            <td><i class="bx bx-user"></i> 엑스빌</td>
                            <td>010-4204-0696</td>
                            <td>1회</td>
                            <td>20-10-17</td>
                            <td>20-10-17</td>
                            <td><button type="button" class="btn btn-xs btn-primary" data-bs-dismiss="modal">선택</button></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>ozoda</td>
                            <td><i class="bx bx-user"></i> 오조다</td>
                            <td>010-4204-0696</td>
                            <td>1회</td>
                            <td>20-10-17</td>
                            <td>20-10-17</td>
                            <td><button type="button" class="btn btn-xs btn-primary" data-bs-dismiss="modal">선택</button></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>ozoda</td>
                            <td><i class="bx bx-user"></i> 오조다</td>
                            <td>010-4204-0696</td>
                            <td>1회</td>
                            <td>20-10-17</td>
                            <td>20-10-17</td>
                            <td><button type="button" class="btn btn-xs btn-primary" data-bs-dismiss="modal">선택</button></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>ozoda</td>
                            <td><i class="bx bx-user"></i> 오조다</td>
                            <td>010-4204-0696</td>
                            <td>1회</td>
                            <td>20-10-17</td>
                            <td>20-10-17</td>
                            <td><button type="button" class="btn btn-xs btn-primary" data-bs-dismiss="modal">선택</button></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>ozoda</td>
                            <td><i class="bx bx-user"></i> 오조다</td>
                            <td>010-4204-0696</td>
                            <td>1회</td>
                            <td>20-10-17</td>
                            <td>20-10-17</td>
                            <td><button type="button" class="btn btn-xs btn-primary" data-bs-dismiss="modal">선택</button></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>ozoda</td>
                            <td><i class="bx bx-user"></i> 오조다</td>
                            <td>010-4204-0696</td>
                            <td>1회</td>
                            <td>20-10-17</td>
                            <td>20-10-17</td>
                            <td><button type="button" class="btn btn-xs btn-primary" data-bs-dismiss="modal">선택</button></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>ozoda</td>
                            <td><i class="bx bx-user"></i> 오조다</td>
                            <td>010-4204-0696</td>
                            <td>1회</td>
                            <td>20-10-17</td>
                            <td>20-10-17</td>
                            <td><button type="button" class="btn btn-xs btn-primary" data-bs-dismiss="modal">선택</button></td>
                        </tr>

                        <tr>
                            <th scope="row">2</th>
                            <td>ozoda</td>
                            <td><i class="bx bx-user"></i> 오조다</td>
                            <td>010-4204-0696</td>
                            <td>1회</td>
                            <td>20-10-17</td>
                            <td>20-10-17</td>
                            <td><button type="button" class="btn btn-xs btn-primary" data-bs-dismiss="modal">선택</button></td>
                        </tr>
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="useInfoModal" tabindex="-2" aria-labelledby="useInfoModalLabel" style="display: none;z-index:90000;" aria-hidden="true">
        <div class="modal-dialog modal- md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="seatStatusModalLabel">구매/이용정보</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row col-12 mb-2">
                        <div class="col-8"><h6>이용자 : 조현준</h6></div>
                        <div class="col-4 text-right"><span class="btn btn-xs btn-info">외출중</span></div>
                    </div>
                    <div class="row col-12 mb-2">
                        <div class="col-5">상품명</div>
                        <div class="col-7">시간권 ( 20 시간 )</div>
                    </div>
                    <div class="row col-12 mb-2">
                        <div class="col-5">구매일시</div>
                        <div class="col-7">2020-11-26 17:00</div>
                    </div>
                    <div class="row col-12 mb-2">
                        <div class="col-5">사용시간</div>
                        <div class="col-7">16시간</div>
                    </div>
                    <div class="row col-12 mb-2">
                        <div class="col-5">잔여시간</div>
                        <div class="col-7">04시간</div>
                    </div>

                    <div class="row col-12 mb-2">
                        <div class="col-12">
                            <div class="alert alert-warning">
                                <h6>메모</h6>
                                <div>학교에서 바로 오기 때문에 시간변동 가능성 있음 양해바람.</div>
                            </div>
                        </div>
                    </div>

                    <div class="row col-12 mt-4 mb-2">
                        <div class="col-5">
                            <button type="button" class="btn btn-sm btn-warning col-12 mx-1 mb-1" onclick="$('.seatExt').addClass('d-none');$('#seatExt_outForm').removeClass('d-none');">환불요청</button>
                        </div>
                        <div class="col-5">
                            <button type="button" class="btn btn-sm btn-outline-secondary col-12 mx-1 mb-1" onclick="$('.seatExt').addClass('d-none');$('#seatExt_MemoForm').removeClass('d-none');">메모</button>
                        </div>
                    </div>

                    <div class="row col-12 mb-2 d-none seatExt" id="seatExt_extForm">
                        <div class="col-12">
                            <h6>연장가능시간(최대)</h6>
                            <div class="row mb-2">
                                <div class="col-8">
                                    <select class="form-control form-select-sm">
                                        <option>1시간( ~ 18:00 )</option>
                                        <option>2시간( ~ 19:00 )</option>
                                        <option>3시간( ~ 20:00 )</option>
                                        <option selected>4시간( ~ 21:00 )</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <button type="button" class="btn btn-sm btn-success">연장하기</button>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <div class="alert alert-success">
                                        <div>4시간 요금 60,000 ( A 등급좌석, 성인, 연장금액 )</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <div class="alert alert-danger">
                                        <div>연장가능한 시간이 없습니다.</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row col-12 mb-2 d-none seatExt" id="seatExt_changeTimeForm">
                        <div class="col-12">
                            <h6>변경 가능시간</h6>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <select class="form-control form-select-sm">
                                        <option>15:00시부터</option>
                                        <option>16:00시부터</option>
                                        <option>17:00시부터</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select class="form-control form-select-sm">
                                        <option selected>4시간( ~ 21:00 )</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <button type="button" class="btn btn-sm btn-success">변경하기</button>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <div class="alert alert-danger">
                                        <div>사용신청한 시간만큼 변경가능하며, 그외의 경우는 취소후 다시 예약해주세요.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <div class="alert alert-danger">
                                        <div>이미 예약시간이 초과되어 시간변경이 불가능합니다.</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row col-12 mb-2 d-none seatExt" id="seatExt_changeSeatForm">
                        <div class="col-12">
                            <h6>변경 가능 좌석</h6>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <select class="form-control form-select-sm">
                                        <option>M01룸 02번좌석</option>
                                        <option>M01룸 07번좌석</option>
                                        <option>M01룸 15번좌석</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <button type="button" class="btn btn-sm btn-success">변경하기</button>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <div class="alert alert-danger">
                                        <div>잔여시간 1시간 미만은 좌석 변경이 불가능합니다.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <div class="alert alert-danger">
                                        <div>현재 변경가능한 좌석이 없습니다.</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row col-12 mb-2 d-none seatExt" id="seatExt_outForm">
                        <div class="col-12">
                            <h6>현재시간부로 퇴실</h6>
                            <div class="row mb-2">
                                <div class="col-4">
                                    <button type="button" class="btn btn-sm btn-primary">퇴실하기</button>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <div class="alert alert-success">
                                        <div>총 예약시간 6시간</div>
                                        <div>총 이용시간 2시간</div>
                                        <div>환불금액 60,000 ( A 등급좌석, 성인, 연장금액 )</div>
                                        <div>환불금액은 보유머니로 적립됩니다.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <div class="alert alert-danger">
                                        <div>이미 예약시간이 지났습니다.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <div class="alert alert-danger">
                                        <div>1시간이하는 환불금액이 없습니다.</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row col-12 mb-2 d-none seatExt" id="seatExt_MemoForm">
                        <div class="col-12">
                            <h6>메모</h6>
                            <div class="col-12"><textarea name="seat_memo" class="form-control"></textarea></div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#seatReservFormModal">이좌석 예약하기</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="errorInfoModal" tabindex="-2" aria-labelledby="errorInfoModalLabel" style="display: none;z-index:90000;" aria-hidden="true">
        <div class="modal-dialog modal- md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="seatStatusModalLabel">알림</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>    


    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    <footer class="page-footer">
        <p class="mb-0">Copyright © 2021. All right reserved.</p>
    </footer>
</div>
<!--end wrapper-->
<!--start switcher-->
<div class="switcher-wrapper">
    <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
    </div>
    <div class="switcher-body">
        <div class="d-flex align-items-center">
            <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
            <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
        </div>
        <hr/>
        <h6 class="mb-0">Theme Styles</h6>
        <hr/>
        <div class="d-flex align-items-center justify-content-between">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
                <label class="form-check-label" for="lightmode">Light</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
                <label class="form-check-label" for="darkmode">Dark</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
                <label class="form-check-label" for="semidark">Semi Dark</label>
            </div>
        </div>
        <hr/>
        <div class="form-check">
            <input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
            <label class="form-check-label" for="minimaltheme">Minimal Theme</label>
        </div>
        <hr/>
        <h6 class="mb-0">Header Colors</h6>
        <hr/>
        <div class="header-colors-indigators">
            <div class="row row-cols-auto g-3">
                <div class="col">
                    <div class="indigator headercolor1" id="headercolor1"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor2" id="headercolor2"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor3" id="headercolor3"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor4" id="headercolor4"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor5" id="headercolor5"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor6" id="headercolor6"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor7" id="headercolor7"></div>
                </div>
                <div class="col">
                    <div class="indigator headercolor8" id="headercolor8"></div>
                </div>
            </div>
        </div>
        <hr/>
        <h6 class="mb-0">Sidebar Backgrounds</h6>
        <hr/>
        <div class="header-colors-indigators">
            <div class="row row-cols-auto g-3">
                <div class="col">
                    <div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
                </div>
                <div class="col">
                    <div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end switcher-->



<!-- Bootstrap JS -->
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!--script src="/assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script-->
<!--script src="/assets/js/index5.js"></script-->
<!--app JS-->
<script src="/assets/js/app.js"></script>

<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js"></script>
<script>

    function partner_search(){
        console.log("파트너 검색실행:");
        var req = "q=" + $("#frm_search_partner #search_partner_q").val();
        console.log(req);
        $.ajax({
            url: '/api/partner/search',
            type: 'POST',
            async: true,
            beforeSend: function (xhr) {
                $("#partnerDetail_msg").html("");
            },
            data: req,
            success: function (res, textStatus, xhr) {
                console.log(res);
                $('#partner_search_list').empty();
                res.partners.forEach(function( partner, pi) {
                    console.log(partner);
                    var html = '';
                    html = html + '<tr>';
                    html = html + '    <td>' + partner.name + '</td>';
                    html = html + '    <td>' + partner.area + '</td>';
                    html = html + '    <td>' + partner.phone + '</td>';
                    html = html + '    <td><button type="button" class="btn btn-xs btn-primary partner_item" no="' + partner.no + '" name="' + partner.name + '">선택</button></td>';
                    html = html + '</tr>';
                    $('#partner_search_list').append(html);
                });

            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('PUT error.');
            }
        });

        return false;
    }  
    
    
function ajax_error(jsonData){
    
    console.log(jsonData);
    if( typeof jsonData.errors != 'undefined' ){
        // console.log(jsonData.errors)
        $('.feedback_red').remove()
        $.each(jsonData.errors, function(k,v){
            $('#'+k).after("<div class='feedback_red'>"+v[0]+"</div>")
        })

        return true
    }
    else if( typeof jsonData.message != 'undefined' ){
        switch(jsonData.message){
            case "Unauthenticated.":
                location.href="/"
            break;

            default:
            alert("An unknown error has occurred.")
        }
    }
}
    
</script>


<!-- 시계 -->
<script src="/assets/js/topTimer.js"></script>
<script>

    $( function () {
        $( '[data-toggle="popover"]' ).popover()
    } );
    $(".btn_logout").on("click",function(){
        var req = "step=logout";
        $.get( "/logout", req, function( res ) {
            if( res.result == true ){
                var rURL = res.rURL;
                location.href = "/adminlogin";
            }
        });
    });

    // 파트너선택
    $(document).on("click",".partner_item",function(){
        var no = $(this).attr("no");
        var name = $(this).attr("name");
        console.log(partner_search_mode)
        if( partner_search_mode == "reg") {
            $("#frm_reg #partner").val(no);
            $("#frm_reg #partner_name").val(name);            
        } else {
            console.log('setPartnerSelected_'+partner_search_mode+'("'+no+'","'+name+'");');
            eval('setPartnerSelected_'+partner_search_mode+'("'+no+'","'+name+'");');
        }
        $("#partnerSearchModal").modal("hide");
    });

    $(document).on("click",".input_partner",function(){
        partner_search_mode = $(this).attr("search_mode");
        console.log(partner_search_mode)
    });  

    $('#partnerSearchModal').on('shown.bs.modal', function (e) {
        $("#search_partner_q").focus();
    });

    $('#memberListModal').on('shown.bs.modal', function (e) {
        $("#search_member_q").focus();
    });

</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>

</script>

@if ($errors->any())
<script>

    $(document).ready(function() {
        @foreach ($errors->all() as $error)
        $("#errorInfoModal .modal-body").html('{{$error}}');
        @endforeach        

        $('#errorInfoModal').modal('show');
    });
    
</script>
@endif
@yield('javascript')



</body>

</html>
