<!DOCTYPE html>
<html>
<head>
    <title>成功了...</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/iconfont/iconfont.css') }}">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
            background-color: #f6f6f6;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .tip {
            font-size: 60px;
            color: #666;
            font-weight: bold;
        }

        .error-page {
            width: 630px;
        }

        .home {
            text-decoration: none;
            color: #666;
        }

        .home:hover {
            color: #439ef7;
            font-weight: bold;
        }

        .icon-success{
            font-size: 250px;
            color: #00b976;
        }

        @media (max-width: 991px) {
            .error-page {
                width: 100%;
            }
        }

        .error-page > .headline {
            float: left;
            font-size: 100px;
            font-weight: 300;
            margin-top: 30px;
        }

        @media (max-width: 991px) {
            .error-page > .headline {
                float: none;
                text-align: center;
            }
        }

        .error-page > .error-content {
            margin-left: 190px;
            display: block;
        }

        @media (max-width: 991px) {
            .error-page > .error-content {
                margin-left: 0;
            }
        }

        .error-page > .error-content > h3 {
            font-weight: 300;
            font-size: 25px;
            margin-bottom: 5px;
        }

        @media (max-width: 991px) {
            .error-page > .error-content > h3 {
                text-align: center;
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <i class="iconfont icon-chenggongbiaoqing icon-success"></i>

        <div class="error-page">
            <h2 class="headline text-yellow">{{ $code }}</h2>

            <div class="error-content" style="padding-top: 30px">
                <h3>Congratulations, successful operation</h3>

                <p>
                    @if(isset($message))
                        {{$message}}...
                    @endif
                </p>
                <p>
                    此时你可以返回<a href="{{route('home')}}" class="home"> 首页 </a>.
                </p>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </div>
</div>
</body>
</html>