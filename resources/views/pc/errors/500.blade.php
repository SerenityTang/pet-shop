<!DOCTYPE html>
<html>
<head>
    <title>Be right back.</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

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

        .title {
            font-size: 72px;
            margin-bottom: 40px;
        }

        .error-page {
            width: 600px;
            margin: 20px auto 0 auto;
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
        }

        @media (max-width: 991px) {
            .error-page > .error-content > h3 {
                text-align: center;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">Be right back.</div>

        <div class="error-page">
            <h2 class="headline text-yellow"> 500</h2>

            <div class="error-content" style="padding-top: 30px">
                <h3><i class="fa fa-warning text-yellow"></i> 出错了.</h3>

                <p>
                    出错了.
                    @if(isset($message))
                        {{$message}}
                    @endif
                    此时你可以返回<a href="{{route('home')}}"> 首页 </a>.
                </p>

            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </div>
</div>
</body>
</html>