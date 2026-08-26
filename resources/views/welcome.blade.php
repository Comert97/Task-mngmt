<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style>
        body {
            background: url('C:\Users\hanan\Desktop\tsk.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        .overlay {
            background: rgba(255,255,255,0.8);
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            max-width: 400px;
            margin: 100px auto;
        }
        a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background: #3490dc;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background: #2779bd;
        }
    </style>
</head>
<body>
    <div class="overlay">
        <h1>Welcome to Task Mgt</h1>
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    </div>
</body>
</html>
