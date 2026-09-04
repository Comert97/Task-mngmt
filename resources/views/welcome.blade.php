<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .overlay {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(8px);
            padding: 50px;
            border-radius: 20px;
            text-align: center;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
            color: #333;
        }
        h1 {
            font-size: 2.2rem;
            margin-bottom: 15px;
            font-weight: bold;
            color: #2c3e50;
        }
        p {
            font-size: 1rem;
            margin-bottom: 25px;
            color: #555;
        }
        a {
            display: inline-block;
            margin: 10px;
            padding: 12px 25px;
            background: #3490dc;
            color: white;
            text-decoration: none;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        a:hover {
            background: #2779bd;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="overlay">
        <h1>🌿 Welcome to Your Task&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mgt System 🌿</h1>
        
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    </div>
</body>
</html>
