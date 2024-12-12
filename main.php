<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Website - Main Page</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #ffcc33, #ff66cc);
            color: #fff;
        }

        header {
            background: rgba(0, 0, 0, 0.8);
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 48px;
            margin: 0;
        }

        nav {
            margin-top: 15px;
        }

        nav a {
            color: #ffcc33;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #fff;
        }

        .hero {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 60vh;
            background: url('https://source.unsplash.com/1600x900/?music') no-repeat center center/cover;
            color: #fff;
            text-align: center;
            position: relative;
        }

        .hero h2 {
            font-size: 36px;
            margin: 0;
        }

        .btn-container {
            margin-top: 20px;
        }

        .btn {
            background: linear-gradient(45deg, #ff758c, #ff7eb3);
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 25px;
            font-size: 18px;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.3s ease;
            margin: 0 10px;
        }

        .btn:hover {
            background: linear-gradient(45deg, #ff5a73, #ff758c);
        }

        .content {
            padding: 40px 20px;
            text-align: center;
        }

        footer {
            margin-top: 20px;
            padding: 20px;
            text-align: center;
            background: rgba(0, 0, 0, 0.8);
        }

        footer p {
            margin: 0;
            color: rgba(255, 255, 255, 0.7);
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to the Music Website</h1>
        <nav>
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
        </nav>
    </header>

    <div class="hero">
        <h2>Your Soundtrack Awaits</h2>
        <div class="btn-container">
            <a href="register.php" class="btn">Get Started</a>
            <a href="login.php" class="btn">Sign In</a>
        </div>
    </div>

    <div class="content">
        <h3>Explore Your Favorite Music</h3>
        <p>Discover new artists, create playlists, and share your musical journey with friends.</p>
        <p>Join a community of music lovers today!</p>
    </div>

    <footer>
        <p>&copy; 2024 Vishal Bharti Website. All rights reserved.</p>
    </footer>
</body>
</html>
