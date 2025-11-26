<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Auth' }}</title>

    <!-- Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    

    <style>
        * {
            font-family: "Poppins", sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }

        .left {
            width: 50%;
            background: #0A1F44; /* warna navy sesuai figma */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .right {
            width: 50%;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .auth-card {
            width: 360px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 3px 10px rgba(0,0,0,0.15);
        }

        .title {
            margin: 0 0 20px 0;
            font-size: 20px;
            font-weight: 600;
            text-align: center;
        }

        .input-box {
            width: 100%;
            margin-bottom: 15px;
        }

        .input-box input {
            width: 100%;
            padding: 11px 14px;
            border-radius: 6px;
            border: 1px solid #ccc;
            outline: none;
            font-size: 14px;
        }

        .btn-login {
            width: 100%;
            border: none;
            padding: 12px;
            background: linear-gradient(90deg, #52A6FF, #0066FF);
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 6px;
            margin-top: 5px;
        }

        .link-box {
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
        }

        .link-box a {
            font-size: 13px;
            color: #0066FF;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="left">
        @yield('content')
    </div>

    <div class="right">
        <img src="C:\Users\USer\Pictures\Logo_PI" width="260">
    </div>

</body>
</html>
