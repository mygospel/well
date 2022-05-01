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
							<li class="breadcrumb-item active" aria-current="page">업무일지</li>
						</ol>
					</nav>
				</div>
                <div class="ms-auto">
                    <button class="btn btn-xs btn-danger btn_manual" rel="10"><i class="lni lni-youtube"></i>도움말</button>
                </div>
			</div>
			<!--end breadcrumb-->
			<div class="row">
				<div class="col">
					<div class="card">
						<div class="card-body">
							<table class="table mb-0 table-striped">
								<thead>
								<tr>
									<th scope="col" class="text-center">#</th>
									<th scope="col">제목</th>
									<th scope="col" class="text-center">작성자</th>
									<th scope="col" class="text-center">작성일시</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<th scope="row" class="col-2 text-center">10</th>
									<td class="col-5">기존회원님은 간단한 개인정보인증을 마치신 후에 이용가능합니다. </td>
									<td class="col-2 text-center">관리자</td>
									<td class="col-3 text-center">2020-04-10</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">9</th>
									<td>새로운 시스템으로 업그래이드 완료하였습니다.</td>
									<td class="text-center">관리자</td>
									<td class="text-center">2020-04-10</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">8</th>
									<td>21일 새벽 시스템 변경 예정입니다. </td>
									<td class="text-center">관리자</td>
									<td class="text-center">2020-04-10</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">7</th>
									<td>새로운 시스템으로 업그래이드 완료하였습니다.</td>
									<td class="text-center">관리자</td>
									<td class="text-center">2020-04-10</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">6</th>
									<td>21일 새벽 시스템 변경 예정입니다. </td>
									<td class="text-center">관리자</td>
									<td class="text-center">2020-04-10</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">5</th>
									<td>새로운 시스템으로 업그래이드 완료하였습니다.</td>
									<td class="text-center">관리자</td>
									<td class="text-center">2020-04-10</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">4</th>
									<td>21일 새벽 시스템 변경 예정입니다. </td>
									<td class="text-center">관리자</td>
									<td class="text-center">2020-04-10</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">3</th>
									<td>새로운 시스템으로 업그래이드 완료하였습니다.</td>
									<td class="text-center">관리자</td>
									<td class="text-center">2020-04-10</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">2</th>
									<td>21일 새벽 시스템 변경 예정입니다. </td>
									<td class="text-center">관리자</td>
									<td class="text-center">2020-04-10</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">1</th>
									<td>새로운 시스템으로 업그래이드 완료하였습니다.</td>
									<td class="text-center">관리자</td>
									<td class="text-center">2020-04-10</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12 col-md-12">
							<div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
								<ul class="pagination">
									<li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Prev</a></li>
									<li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
									<li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
									<li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
									<li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
									<li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
									<li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
									<li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
								</ul>
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

