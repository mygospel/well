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
                <div class="breadcrumb-title pe-3">파트너관리</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">파트너 기본세팅</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">

                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card col-md-9 col-sm-12">

                <div class="modal-body">

                    <ul class="nav nav-tabs nav-primary navbar-sm" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active"  href="/partner/standard/">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="bx bxs-home font-18 me-1"></i>
                                    </div>
                                    <div class="tab-title">IOT 기본세팅</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" href="/partner/standard/price">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="bx bxs-user-pin font-18 me-1"></i>
                                    </div>
                                    <div class="tab-title">좌석금액 기본세팅</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link"  href="/partner/standard/product">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="bx bxs-user-pin font-18 me-1"></i>
                                    </div>
                                    <div class="tab-title">상품 기본세팅</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content py-3">
                        <div class="tab-pane fade show active" id="iotInfo" role="tabpanel">
                            <div>
                                <div class="row">

                                    <div class="col-sm-12 col-md-6 mb-3">

                                        <h4>좌석 IOT</h4>
                                        <div class="col-md-12 mb-2">
                                            <label class="form-label">IOT 01</label>
                                            <input type="text" name="name" maxlength="50" class="form-control form-control-sm" value="조명">
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="form-label">IOT 02</label>
                                            <input type="text" name="name" maxlength="50" class="form-control form-control-sm" value="전원">
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="form-label">IOT 03</label>
                                            <input type="text" name="name" maxlength="50" class="form-control form-control-sm" value="인터넷">
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="form-label">IOT 04</label>
                                            <input type="text" name="name" maxlength="50" class="form-control form-control-sm" value="환풍기">
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6 mb-3">

                                        <h4>룸 IOT</h4>
                                        <div class="col-md-12 mb-2">
                                            <label class="form-label">IOT 01</label>
                                            <input type="text" name="name" maxlength="50" class="form-control form-control-sm" value="출입문">
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="form-label">IOT 02</label>
                                            <input type="text" name="name" maxlength="50" class="form-control form-control-sm" value="전원">
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="form-label">IOT 03</label>
                                            <input type="text" name="name" maxlength="50" class="form-control form-control-sm" value="냉/난방">
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="form-label">IOT 04</label>
                                            <input type="text" name="name" maxlength="50" class="form-control form-control-sm" value="환풍기">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 text-center">
                                    <button type="button" class="btn btn-primary px-5" onclick="formcheck()">정보수정</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="priceProduct_time" role="tabpanel">
                            <div>
                                <div class="row col-12">
                                    <h4>1시간 기준 금액 표준</h4>
                                </div>

                                <form id="frm_seatlevel_price_time_form" name="frm_seatlevel_price_time_form">
                                    {{csrf_field()}}        
                                    <input type="hidden" name="no" class="sl_no">  
                                    <input type="hidden" name="price_kind" value="time">                            
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="col-2 text-center">#</th>
                                            <th scope="col" class="col-3 text-center">합계</th>
                                            <th scope="col" class="col-3 text-center">독서실요금</th>
                                            <th scope="col" class="col-3 text-center">스터디룸요금</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="price_row">
                                            <th scope="row" rowspan="2">기본</th>
                                            <td class=" text-center"><input type="number" class="in_price student total col-12" id="price_student_A_t" name="seat_price[S][A][T]" value="" placeholder="학생 요금"></td>
                                            <td class=" text-center"><input type="number" class="in_price student rseatlevel col-12" id="price_student_A_r" name="seat_price[S][A][R]" value="" placeholder="학생 독서실요금"></td>
                                            <td class=" text-center"><input type="number" class="in_price student sseatlevel col-12" id="price_student_A_s" name="seat_price[S][A][S]" value="" placeholder="학생 스터디룸 요금"></td>
                                        </tr>
                                        <tr class="price_row">
                                            <td><input type="number" class="in_price adult total col-12" id="price_adult_A_t" name="seat_price[A][A][T]" value="" placeholder="성인 요금"></td>
                                            <td><input type="number" class="in_price adult rseatlevel col-12" id="price_adult_A_r" name="seat_price[A][A][R]" value="" placeholder="성인 독서실요금"></td>
                                            <td><input type="number" class="in_price adult sseatlevel col-12" id="price_adult_A_s" name="seat_price[A][A][S]" value="" placeholder="성인 스터디룸 요금"></td>
                                        </tr>
                                        <tr class="price_row">
                                            <th scope="row" rowspan="2">신규</th>
                                            <td class=" text-center"><input type="number" class="in_price student total col-12" id="price_student_N_t" name="seat_price[S][N][T]" value="" placeholder="학생 요금"></td>
                                            <td class=" text-center"><input type="number" class="in_price student rseatlevel col-12" id="price_student_N_r" name="seat_price[S][N][R]" value="" placeholder="학생 독서실요금"></td>
                                            <td class=" text-center"><input type="number" class="in_price student sseatlevel col-12" id="price_student_N_s" name="seat_price[S][N][S]" value="" placeholder="학생 스터디룸 요금"></td>
                                        </tr>
                                        <tr class="price_row">
                                            <td><input type="number" class="in_price adult total col-12" id="price_adult_N_t" name="seat_price[A][N][T]" value="" placeholder="성인 요금"></td>
                                            <td><input type="number" class="in_price adult rseatlevel col-12" id="price_adult_N_r" name="seat_price[A][N][R]" value="" placeholder="성인 독서실요금"></td>
                                            <td><input type="number" class="in_price adult sseatlevel col-12" id="price_adult_N_s" name="seat_price[A][N][S]" value="" placeholder="성인 스터디룸 요금"></td>
                                        </tr>
                                        <tr class="price_row">
                                            <th scope="row" rowspan="2">연장</th>
                                            <td class=" text-center"><input type="number" class="in_price student total col-12" id="price_student_X_t" name="seat_price[S][X][T]" value="" placeholder="학생 요금"></td>
                                            <td class=" text-center"><input type="number" class="in_price student rseatlevel col-12" id="price_student_X_r" name="seat_price[S][X][R]" value="" placeholder="학생 독서실요금"></td>
                                            <td class=" text-center"><input type="number" class="in_price student sseatlevel col-12" id="price_student_X_s" name="seat_price[S][X][S]" value="" placeholder="학생 스터디룸 요금"></td>
                                        </tr>
                                        <tr class="price_row">
                                            <td><input type="number" class="in_price adult total col-12" id="price_adult_X_t" name="seat_price[A][X][T]" value="" placeholder="성인 요금"></td>
                                            <td><input type="number" class="in_price adult rseatlevel col-12" id="price_adult_X_r" name="seat_price[A][X][R]" value="" placeholder="성인 독서실요금"></td>
                                            <td><input type="number" class="in_price adult sseatlevel col-12" id="price_adult_X_s" name="seat_price[A][X][S]" value="" placeholder="성인 스터디룸 요금"></td>
                                        </tr>
                                        <tr class="price_row">
                                            <th scope="row" colspan="2">1시간당 할인율</th>
                                            <td class=" text-center">
                                                <input type="number" class="col-12 mb-2" id="rate_student" name="rate_student" value="" placeholder="학생할인율">
                                                <input type="number" class="col-12 mb-2" id="rate_adult" name="rate_adult" value="" placeholder="성인할인율">
                                            </td>
                                            <td class=" text-center"></td>
                                        </tr>
                                        </tbody>
                                    </table>
    
                                    <div class="row justify-content-center my-3">
                                        <button type="button" id="btn_price_time_make" class="btn btn-primary col-5">저장</button>
                                    </div>
    
                                    </form>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="priceProduct_day" role="tabpanel">
                            <div>
                                <div class="row col-12">
                                    <h4>1일 기준 금액 표준</h4>
                                </div>

                                <form id="frm_seatlevel_price_time_form" name="frm_seatlevel_price_time_form">
                                    {{csrf_field()}}        
                                    <input type="hidden" name="no" class="sl_no">  
                                    <input type="hidden" name="price_kind" value="time">                            
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="col-2 text-center">#</th>
                                            <th scope="col" class="col-3 text-center">합계</th>
                                            <th scope="col" class="col-3 text-center">독서실요금</th>
                                            <th scope="col" class="col-3 text-center">스터디룸요금</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="price_row">
                                            <th scope="row" rowspan="2">기본</th>
                                            <td class=" text-center"><input type="number" class="in_price student total col-12" id="price_student_A_t" name="seat_price[S][A][T]" value="" placeholder="학생 요금"></td>
                                            <td class=" text-center"><input type="number" class="in_price student rseatlevel col-12" id="price_student_A_r" name="seat_price[S][A][R]" value="" placeholder="학생 독서실요금"></td>
                                            <td class=" text-center"><input type="number" class="in_price student sseatlevel col-12" id="price_student_A_s" name="seat_price[S][A][S]" value="" placeholder="학생 스터디룸 요금"></td>
                                        </tr>
                                        <tr class="price_row">
                                            <td><input type="number" class="in_price adult total col-12" id="price_adult_A_t" name="seat_price[A][A][T]" value="" placeholder="성인 요금"></td>
                                            <td><input type="number" class="in_price adult rseatlevel col-12" id="price_adult_A_r" name="seat_price[A][A][R]" value="" placeholder="성인 독서실요금"></td>
                                            <td><input type="number" class="in_price adult sseatlevel col-12" id="price_adult_A_s" name="seat_price[A][A][S]" value="" placeholder="성인 스터디룸 요금"></td>
                                        </tr>
                                        <tr class="price_row">
                                            <th scope="row" rowspan="2">신규</th>
                                            <td class=" text-center"><input type="number" class="in_price student total col-12" id="price_student_N_t" name="seat_price[S][N][T]" value="" placeholder="학생 요금"></td>
                                            <td class=" text-center"><input type="number" class="in_price student rseatlevel col-12" id="price_student_N_r" name="seat_price[S][N][R]" value="" placeholder="학생 독서실요금"></td>
                                            <td class=" text-center"><input type="number" class="in_price student sseatlevel col-12" id="price_student_N_s" name="seat_price[S][N][S]" value="" placeholder="학생 스터디룸 요금"></td>
                                        </tr>
                                        <tr class="price_row">
                                            <td><input type="number" class="in_price adult total col-12" id="price_adult_N_t" name="seat_price[A][N][T]" value="" placeholder="성인 요금"></td>
                                            <td><input type="number" class="in_price adult rseatlevel col-12" id="price_adult_N_r" name="seat_price[A][N][R]" value="" placeholder="성인 독서실요금"></td>
                                            <td><input type="number" class="in_price adult sseatlevel col-12" id="price_adult_N_s" name="seat_price[A][N][S]" value="" placeholder="성인 스터디룸 요금"></td>
                                        </tr>
                                        <tr class="price_row">
                                            <th scope="row" rowspan="2">연장</th>
                                            <td class=" text-center"><input type="number" class="in_price student total col-12" id="price_student_X_t" name="seat_price[S][X][T]" value="" placeholder="학생 요금"></td>
                                            <td class=" text-center"><input type="number" class="in_price student rseatlevel col-12" id="price_student_X_r" name="seat_price[S][X][R]" value="" placeholder="학생 독서실요금"></td>
                                            <td class=" text-center"><input type="number" class="in_price student sseatlevel col-12" id="price_student_X_s" name="seat_price[S][X][S]" value="" placeholder="학생 스터디룸 요금"></td>
                                        </tr>
                                        <tr class="price_row">
                                            <td><input type="number" class="in_price adult total col-12" id="price_adult_X_t" name="seat_price[A][X][T]" value="" placeholder="성인 요금"></td>
                                            <td><input type="number" class="in_price adult rseatlevel col-12" id="price_adult_X_r" name="seat_price[A][X][R]" value="" placeholder="성인 독서실요금"></td>
                                            <td><input type="number" class="in_price adult sseatlevel col-12" id="price_adult_X_s" name="seat_price[A][X][S]" value="" placeholder="성인 스터디룸 요금"></td>
                                        </tr>
                                        <tr class="price_row">
                                            <th scope="row" colspan="2">1시간당 할인율</th>
                                            <td class=" text-center">
                                                <input type="number" class="col-12 mb-2" id="rate_student" name="rate_student" value="" placeholder="학생할인율">
                                                <input type="number" class="col-12 mb-2" id="rate_adult" name="rate_adult" value="" placeholder="성인할인율">
                                            </td>
                                            <td class=" text-center"></td>
                                        </tr>
                                        </tbody>
                                    </table>
    
                                    <div class="row justify-content-center my-3">
                                        <button type="button" id="btn_price_time_make" class="btn btn-primary col-5">저장</button>
                                    </div>
    
                                    </form>

                            </div>
                        </div>                        
                    </div>

                </div>

            </div>
        </div>
        <div id="layer" style="display:none;position:fixed;overflow:hidden;z-index:1;-webkit-overflow-scrolling:touch;">
            <img src="//i1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:1" onclick="closeDaumPostcode()" alt="닫기 버튼">
        </div>
        <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script><script charset="UTF-8" type="text/javascript" src="//t1.daumcdn.net/postcode/api/core/210803/1627969912456/210803.js"></script>
        <script>
            // 우편번호 찾기 화면을 넣을 element
            var element_layer = document.getElementById("layer");

            function closeDaumPostcode() {
                // iframe을 넣은 element를 안보이게 한다.
                element_layer.style.display = "none";
            }

            function execDaumPostcode(zipcode_mode) {
                new daum.Postcode({
                    oncomplete: function(data) {
                        console.log(data)
                        // 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                        // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                        // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                        var fullAddr = data.address; // 최종 주소 변수
                        var extraAddr = ''; // 조합형 주소 변수

                        // 기본 주소가 도로명 타입일때 조합한다.
                        if(data.addressType === 'R'){
                            //법정동명이 있을 경우 추가한다.
                            if(data.bname !== ''){
                                extraAddr += data.bname;
                            }
                            // 건물명이 있을 경우 추가한다.
                            if(data.buildingName !== ''){
                                extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                            }
                            // 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
                            fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
                        }

                        // 우편번호와 주소 정보를 해당 필드에 넣는다.
                        switch(zipcode_mode) {
                            case "partner" :
                                $("#zipcode").val(data.zonecode);
                                $("#address1").val(data.autoJibunAddress);
                                $("#address2").focus();
                                $("#road_address1").val(data.roadAddress);
                                $("#road_address2").focus();
                                break;
                            case "company" :
                                $("#zipcode").val(data.zonecode);
                                $("#address1").val(data.address);
                                $("#address2").focus();
                                break;
                            case 2 :
                                $("#zipcode").val(data.zonecode);
                                $("#addr1").val(data.sido);
                                $("#addr2").val(data.sigungu);
                                $("#addr3").val(data.bname);
                                $("#addr4").val(data.address);
                                break;
                            default :
                            case 1 :
                                $("#zipcode").val(data.zonecode);
                                $("#address1").val(data.roadAddress + " " + data.buildingName);
                                $("#address2").val();
                                break;
                        }


                        /*
                                        document.getElementById('sample2_postcode').value = data.zonecode; //5자리 새우편번호 사용
                                        document.getElementById('sample2_address').value = fullAddr;
                                        document.getElementById('sample2_addressEnglish').value = data.addressEnglish;
                        */
                        // iframe을 넣은 element를 안보이게 한다.
                        // (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
                        element_layer.style.display = 'none';
                    },
                    width : '100%',
                    height : '100%'
                }).embed(element_layer);

                // iframe을 넣은 element를 보이게 한다.
                element_layer.style.display = 'block';

                // iframe을 넣은 element의 위치를 화면의 가운데로 이동시킨다.
                initLayerPosition();
            }

            // 브라우저의 크기 변경에 따라 레이어를 가운데로 이동시키고자 하실때에는
            // resizeTOPIC나, orientationchangeTOPIC를 이용하여 값이 변경될때마다 아래 함수를 실행 시켜 주시거나,
            // 직접 element_layer의 top,left값을 수정해 주시면 됩니다.
            function initLayerPosition(){
                var width = 600; //우편번호서비스가 들어갈 element의 width
                var height = 460; //우편번호서비스가 들어갈 element의 height
                var borderWidth = 5; //샘플에서 사용하는 border의 두께

                // 위에서 선언한 값들을 실제 element에 넣는다.
                element_layer.style.width = width + 'px';
                element_layer.style.height = height + 'px';
                element_layer.style.border = borderWidth + 'px solid';
                // 실행되는 순간의 화면 너비와 높이 값을 가져와서 중앙에 뜰 수 있도록 위치를 계산한다.
                element_layer.style.left = (((window.innerWidth || document.documentElement.clientWidth) - width)/2 - borderWidth) + 'px';
                element_layer.style.top = (((window.innerHeight || document.documentElement.clientHeight) - height)/2 - borderWidth) + 'px';
            }
        </script><!--start overlay-->
        <div class="search-overlay"></div>
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class="bx bxs-up-arrow-alt"></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">Copyright © 2021. All right reserved.</p>
        </footer>
    </div>
    <!--end page wrapper -->
@endsection


