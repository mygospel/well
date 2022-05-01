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
							<li class="breadcrumb-item active" aria-current="page">잔여시간</li>
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
							<div class="row row-cols-1 row-cols-lg-2">
								<div class="col">
									<div class="card radius-10">
										<div class="card-body">
											<div class="d-flex align-items-center">
												<div class="flex-grow-1">
													<p class="mb-0">기간권</p>
													<h4 class="font-weight-bold">38일</h4>
												</div>
												<div class="widgets-icons bg-gradient-blues text-white"><i class="bx bx-message-square-add"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col">
									<div class="card radius-10">
										<div class="card-body">
											<div class="d-flex align-items-center">
												<div class="flex-grow-1">
													<p class="mb-0">시간권</p>
													<h4 class="font-weight-bold">346시간</h4>
												</div>
												<div class="widgets-icons bg-gradient-burning text-white"><i class="bx bx-message-square-minus"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body">
							<table class="table mb-0 table-striped">
								<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">회원명</th>
									<th scope="col">상품명</th>
									<th scope="col">잔여기간</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<th scope="row">1</th>
									<td>조현준</td>
									<td>10일권</td>
									<td>2일</td>
								</tr>
								<tr>
									<th scope="row">2</th>
									<td>최현우</td>
									<td>40시간권</td>
									<td>23시간</td>
								</tr>
								<tr>
									<th scope="row">1</th>
									<td>조현준</td>
									<td>10일권</td>
									<td>2일</td>
								</tr>
								<tr>
									<th scope="row">2</th>
									<td>최현우</td>
									<td>40시간권</td>
									<td>23시간</td>
								</tr>
								<tr>
									<th scope="row">1</th>
									<td>조현준</td>
									<td>10일권</td>
									<td>2일</td>
								</tr>
								<tr>
									<th scope="row">2</th>
									<td>최현우</td>
									<td>40시간권</td>
									<td>23시간</td>
								</tr>
								<tr>
									<th scope="row">1</th>
									<td>조현준</td>
									<td>10일권</td>
									<td>2일</td>
								</tr>
								<tr>
									<th scope="row">2</th>
									<td>최현우</td>
									<td>40시간권</td>
									<td>23시간</td>
								</tr>
								<tr>
									<th scope="row">1</th>
									<td>조현준</td>
									<td>10일권</td>
									<td>2일</td>
								</tr>
								<tr>
									<th scope="row">2</th>
									<td>최현우</td>
									<td>40시간권</td>
									<td>23시간</td>
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

