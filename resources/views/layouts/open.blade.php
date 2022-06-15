<!doctype html>
<html lang="ko">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--favicon-->
    <link rel="icon" href="/assets/images/favicon-32x32.png" type="image/png" />

    <!-- Bootstrap CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>이달의 TOPIC</title>
</head>

<body>
<!--wrapper-->
<div class="wrapper">
    @yield('content')
</div>
<!--end wrapper-->

<!-- Bootstrap JS -->
<script src="/assets/js/bootstrap.bundle.min.js"></script>

<!--plugins-->
<script src="/assets/js/jquery.min.js"></script>


@yield('javascript')

</body>

</html>
