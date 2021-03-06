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
                            <li class="breadcrumb-item active" aria-current="page">파트너 정보</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">

                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form name="search" action="">
                            <input type="hidden" name="mode" value="list">
                            <div class='row'>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mt-1">
                                    <select class="single-select form-control-sm col-12" name="fd" id="fd">
                                        <option value="" @if( !isset($param['fd']) || $param['fd'] == "" ) selected @endif>전체</option>
                                        <option value="p_name" @if( isset($request->fd) && $param['fd'] == "p_name" ) selected @endif>파트너명</option>
                                        <option value="p_emp_name" @if( isset($request->fd) && $param['fd'] == "p_emp_name" ) selected @endif>담당자명</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mt-1">
                                    <input type="text" name="q" value="{{ $param['q'] ?? '' }}" class="form-control form-control-sm col-12">
                                </div>
                                <div class="col-lg-3 col-lg-2 col-md-2 col-sm-3 col-xs-6 mt-1">
                                    <button type="submit" class="btn btn-secondary px-2 btn-sm col-12">찾기</button>
                                </div>
                                <div class="col-lg-3 col-lg-2 col-md-2 col-sm-3 col-xs-6 mt-1 justify-content-right">
                                    <a href="/partner/form" class="btn btn-warning px-2 btn-sm col-12">신규</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div>총 {{ isset($total) ? number_format($total) : '' }} 건</div>
                        <table class="table mb-0">
                            <thead class="table-dark">
                            <tr>
                                <th class="d-none d-md-table-cell" scope="col">번호</th>
                                <th scope="col" class="text-center">상태</th>
                                <th scope="col" class="d-none d-md-table-cell text-center">ID</th>
                                <th scope="col" class="text-center">파트너명</th>
                                <th scope="col" class="text-center">보안명</th>
                                <th class="d-none d-lg-table-cell" scope="col">지역</th>
                                <th class="d-none d-md-table-cell" scope="col">연락처</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if( $partners )
                            @foreach( $partners as $pi => $partner )
                            <tr>
                                <td class="d-none d-md-table-cell" scope="row"><a href="/partner/form/{{ $partner['p_no'] ?? '' }}">{{ (count($partners)-$pi) }}</a></td>
                                <td class="text-center">
                                @if( $partner['p_open'] == "Y" )
                                    <span class="btn btn-xs btn-warning">공개</span>
                                @else
                                    <span class="btn btn-xs btn-secondary">비공개</span>
                                @endif
                                </td>
                                <td class="d-none d-md-table-cell "><a href="/admin/partner/form/{{ $partner['p_no'] ?? '' }}">{{ $partner['p_id'] ?? '' }}</span></a></td>
                                <td><a href="/admin/partner/form/{{ $partner['p_no'] ?? '' }}"><span style="font-size:11pt;font-weight:500;color:#000000;">{{ $partner['p_name'] ?? '' }}</span></a></td>
                                <td><a href="/admin/partner/form/{{ $partner['p_no'] ?? '' }}"><span style="font-size:11pt;font-weight:500;color:#000000;">{{ $partner['p_name_view'] ?? '' }}</span></a></td>
                                <td class="d-none d-lg-table-cell">{{ $partner['p_address1'] ?? '' }}</td>
                                <td class="d-none d-md-table-cell">{{ $partner['p_phone'] ?? '' }}</td>
                            </tr>
                            @endforeach
                            @endif

                            </tbody>
                        </table>

                    </div>
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                    <div class="card-body d-flex justify-content-center">
                        {{ $partners->appends($param)->links() }}
                    </div>



                </div>
            </div>
        </div>
        <!--end row-->
    </div>
    </div>
    <!--end page wrapper -->
@endsection

@section('javascript')

    <script>
        $(document).ready(function(){
            @if(Session::has('errors'))
            swal(" ", "{{ $error }}", "error");
            @endif
            @if(Session::has('success'))
            swal(" ", "{{ $error }}", "success");
            @endif
        });

    </script>

@endsection
