<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Note App</title>
    <style>
        body {
            background-color: #1a1a1a;
            color: #fff;
        }
        .note-card {
            background-color: #333;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            color: #fff;
        }
        .container {
            max-width: 800px; 
            margin: 0 auto; 
        }
        .create-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #ffc107;
            border-radius: 50%;
            width: 70px;
            height: 70px;
            font-size: 30px;
            text-align: center;
            line-height: 70px;
            color: #000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            z-index: 1000;
        }
        .container a {
            text-decoration: none;
        }
        .button {
            text-decoration: none;
        }
        @media (max-width: 600px) {
            .note-card {
                margin: 10px 0; 
            }
            .create-button {
                font-size: 24px;
                bottom: 15px;
                right: 15px;
            }
        }

        @media (min-width: 601px) and (max-width: 1000px) {
            .note-card {
                margin: 15px 0;

            }
            .create-button {
                font-size: 26px;
                bottom: 18px;
                right: 18px;
            }
        }
    </style>
</head>
<body>

    <div class="container py-5">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>