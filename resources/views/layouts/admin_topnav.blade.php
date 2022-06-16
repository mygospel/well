<div class="topbar d-flex align-items-center bg-dark shadow-none border-light-2 border-bottom">
    <nav class="navbar navbar-expand">
        <div class="mobile-toggle-menu text-white me-3"><i class='bx bx-menu'></i>
        </div>
        <div class="top-menu-left d-none d-lg-block">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#"><span id="topTimer" style="font-size:12pt;"></span></a>
                </li>
            </ul>
        </div>
        <div class="top-menu ms-auto">
            <ul class="navbar-nav align-items-center">

                <li class="nav-item dropdown dropdown-large">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">	<i class='bx bx-category'></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="row row-cols-3 g-3 p-3">
                            <div class="col text-center">
                                <div class="app-box mx-auto bg-gradient-burning text-white"><i class='bx bx-atom'></i>
                                </div>
                                <div class="app-title"><a href="/partner">이용현황</a></div>
                            </div>
                            <div class="col text-center">
                                <div class="app-box mx-auto bg-gradient-cosmic text-white"><i class='bx bx-group'></i>
                                </div>
                                <div class="app-title"><a href="/event/partner">TOPIC관리</a></div>
                            </div>
                            <div class="col text-center" data-bs-toggle="modal" data-bs-target="#controlGlobalModal">
                                <div class="app-box mx-auto bg-gradient-lush text-white"><i class='bx bx-shield'></i>
                                </div>
                                <div class="app-title"><a href="/emp">관리자관리</a></div>
                            </div>
                            <!--div class="col text-center" data-bs-toggle="modal" data-bs-target="#memberRegModal">
                                <div class="app-box mx-auto bg-gradient-kyoto text-dark"><i class='bx bx-notification'></i>
                                </div>
                                <div class="app-title">회원가입</div>
                            </div>
                            <div class="col text-center">
                                <div class="app-box mx-auto bg-gradient-blues text-dark"><i class='bx bx-file'></i>
                                </div>
                                <div class="app-title">이용권구매</div>
                            </div>
                            <div class="col text-center">
                                <div class="app-box mx-auto bg-gradient-moonlit text-white"><i class='bx bx-filter-alt'></i>
                                </div>
                                <div class="app-title">업무마감</div>
                            </div-->
                        </div>
                    </div>
                </li>

            </ul>
        </div>
        <div class="user-box dropdown">
            <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <!--img src="assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar"-->
                <div class="bx bx-user text-white" style="font-size:20pt"></div>
                <div class="user-info ps-3">
                    <p class="user-name mb-0 text-white"></p>
                    <p class="designattion mb-0">@auth {{ Auth::guard("admin")->user()->admin_name }} @endauth</p>
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <!--li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>환경설정</span></a>
                </li>
                <li>
                    <div class="dropdown-divider mb-0"></div>
                </li-->
                <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>정보수정</span></a>
                </li>
                <li><a class="dropdown-item" href="myinfo_form.html"><i class="bx bx-barcode"></i><span>비밀번호변경</span></a>
                </li>
                <li><a class="dropdown-item btn_logout" href="javascript:;"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                </li>
            </ul>
        </div>
    </nav>
</div>
