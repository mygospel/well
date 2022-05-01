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
				<div class="breadcrumb-title pe-3">자원관리</div>
				<div class="ps-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">노트북정보</li>
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
									<th scope="col" class="col-2 text-center">#</th>
									<th scope="col">제품명</th>
									<th scope="col" class="col-2 text-center">상태</th>
									<th scope="col" class="col-2 text-center">등록일</th>
									<th scope="col" class="col-2 text-center">관리</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<th scope="row" class="text-center">1</th>
									<td>LG Gram i5 3456 8G</td>
									<td class="text-center">사용중</td>
									<td class="text-center">2020-10-10 00:00:00</td>
									<td class="text-center">
										<button class="btn btn-xs btn-secondary m-1" data-bs-toggle="modal" data-bs-target="#">관리</button>
									</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">1</th>
									<td>LG Gram i5 3456 8G</td>
									<td class="text-center">사용중</td>
									<td class="text-center">2020-10-10 00:00:00</td>
									<td class="text-center">
										<button class="btn btn-xs btn-secondary m-1" data-bs-toggle="modal" data-bs-target="#">관리</button>
									</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">1</th>
									<td>LG Gram i5 3456 8G</td>
									<td class="text-center">사용중</td>
									<td class="text-center">2020-10-10 00:00:00</td>
									<td class="text-center">
										<button class="btn btn-xs btn-secondary m-1" data-bs-toggle="modal" data-bs-target="#">관리</button>
									</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">1</th>
									<td>LG Gram i5 3456 8G</td>
									<td class="text-center">사용중</td>
									<td class="text-center">2020-10-10 00:00:00</td>
									<td class="text-center">
										<button class="btn btn-xs btn-secondary m-1" data-bs-toggle="modal" data-bs-target="#">관리</button>
									</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">1</th>
									<td>LG Gram i5 3456 8G</td>
									<td class="text-center">사용중</td>
									<td class="text-center">2020-10-10 00:00:00</td>
									<td class="text-center">
										<button class="btn btn-xs btn-secondary m-1" data-bs-toggle="modal" data-bs-target="#">관리</button>
									</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">1</th>
									<td>LG Gram i5 3456 8G</td>
									<td class="text-center">사용중</td>
									<td class="text-center">2020-10-10 00:00:00</td>
									<td class="text-center">
										<button class="btn btn-xs btn-secondary m-1" data-bs-toggle="modal" data-bs-target="#">관리</button>
									</td>
								</tr>
								<tr>
									<th scope="row" class="text-center">1</th>
									<td>LG Gram i5 3456 8G</td>
									<td class="text-center">사용중</td>
									<td class="text-center">2020-10-10 00:00:00</td>
									<td class="text-center">
										<button class="btn btn-xs btn-secondary m-1" data-bs-toggle="modal" data-bs-target="#">관리</button>
									</td>
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

