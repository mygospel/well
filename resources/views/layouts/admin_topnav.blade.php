<div class="topbar d-flex align-items-center bg-dark shadow-none border-light-2 border-bottom">
    <nav class="navbar navbar-expand">
        <div class="mobile-toggle-menu text-white me-3"><i class='bx bx-menu'></i>
        </div>
        <div class="top-menu-left d-none d-lg-block">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="app-emailbox.html"><span id="topTimer" style="font-size:12pt;"></span></a>
                    
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
