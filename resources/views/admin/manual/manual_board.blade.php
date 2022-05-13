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
                            <li class="breadcrumb-item active" aria-current="page">메뉴얼</li>
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
                <div class="col">

                    <div class="card">
                        <div class="card-body">
                            <form name="search" action="">
                                <input type="hidden" name="mode" value="list">
                                <div class='row'>
                                    <!--div class="col-md-2 col-sm-6 col-xs-12 mt-1">
                                        <select class="single-select form-control-sm col-12" name="answer" id="answer">
                                            <option value="">전체</option>
                                            <option value="N" @if( isset($param['answer']) && $param['answer'] == "N" ) selected @endif>답변대기</option>
                                            <option value="Y" @if( isset($param['answer']) && $param['answer'] == "Y" ) selected @endif>답변완료</option>
                                        </select>
                                    </div-->
                                    <div class="col-md-2 col-sm-6 col-xs-12 mt-1">
                                        <select class="single-select form-control-sm col-12" name="fd" id="fd">
                                            <option value="">제목+내용+작성자</option>
                                            <option value="title" @if( isset($param['fd']) && $param['fd'] == "title" ) {?> selected @endif>제목</option>
                                            <option value="cont" @if( isset($param['fd']) && $param['fd'] == "cont" ) {?> selected @endif>내용</option>
                                            <option value="uname" @if( isset($param['fd']) && $param['fd'] == "uname" ) {?> selected @endif>작성자</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-5 col-xs-12 mt-1">
                                        <input type="text" name="q" value="{{ $param['q'] ?? '' }}" class="form-control form-control-sm col-12">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-6 mt-1">
                                        <button type="submit" class="btn btn-secondary px-2 btn-sm col-12">찾기</button>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 mt-1 justify-content-right">
                                        <a href="/manual/board/form" class="btn btn-warning px-2 btn-sm col-12">신규</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <div>총 {{ isset($total) ? number_format($total) : '' }} 건</div>
                            <table class="table mb-0 table-striped">
                                <thead>
                                <tr>
                                    <th scope="col" class="d-xs-none col-sm-2 col-md-1 text-center">#</th>
                                    <th scope="col" class="col-xs-2 col-sm-2 col-md-1 text-center">공개여부</th>
                                    <th scope="col" class="col-xs-10 col-sm-6 col-md-6">제목</th>
                                    <th scope="col" class="d-sm-none col-md-1 text-center">작성자</th>
                                    <th scope="col" class="d-xs-none col-sm-2 col-md-2 text-center">작성일시</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if( $helpboards )
                                @foreach( $helpboards as $bi => $helpboard )
                                <tr>
                                    <td scope="row" class="d-xs-none text-center">{{ ($start - $bi) }}</td>
                                    <td scope="col" class="col-xs-2 text-center">
                                        @if( $helpboard->b_state == "Y" )
                                        <button class="btn btn-xs btn-primary" data-bs-toggle="modal" data-bs-target="#boardQnaModal">공개</button>
                                        @else
                                        <button class="btn btn-xs btn-secondary" data-bs-toggle="modal" data-bs-target="#boardQnaModal">비공개</button>
                                        @endif
                                    </td>
                                    <td><a href="/manual/board/form/{{ $helpboard['b_no'] }}">{{ $helpboard['b_title'] }}</a></td>
                                    <td class="d-sm-none col-md-1 text-center">{{ $helpboard['b_uname'] }}</td>
                                    <td class="d-xs-none text-center">{{ substr($helpboard['created_at'],0,16) }}</td>
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
                            {{ $helpboards->appends($param)->links() }}
                        </div>
                    </div>


                </div>
            </div>
            <!--end row-->
        </div>
    </div>
    <div class="modal fade" id="helpboardQnaModal" tabindex="-2" aria-labelledby="helpboardQnaModalLabel" style="display: none;z-index:90000;" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="helpboardQnaModalLabel">작성하기</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="col-xs-12 mt-3">
                        제목 : 결제가 취소되었어요.
                    </div>
                    <div class="col-xs-12 mt-3">
                        글쓴이 : 조현준
                    </div>

                    <div class="col-xs-12 mt-3">
                        잘 사용하고 집에 돌아왔는데 결제가 취소되었다고 나옵니다.
                        이거 확인부탁드립니다.
                    </div>

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


