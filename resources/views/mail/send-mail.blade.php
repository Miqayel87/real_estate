<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Template</title>
    <style>
        /* Add your email styles here */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 150px;
        }

        .content {
            padding: 20px;
        }

        .footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #ccc;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        {{ $data['mailContent'] }}
        <p>
            <a href="{{ $data['referer'] }}">{{$data['property']->title.',  '.number_format($data['property']->price).'$'}}</a>
        </p>
        <p>{{ $data['phone'] }}</p>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Real Estate Website. All rights reserved.</p>
    </div>
</div>
</body>
</html>
