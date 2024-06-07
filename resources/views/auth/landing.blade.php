<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'">
    <title>MyCatalyst</title>
    <link rel="stylesheet" href="/css/landing.css">
</head>

<body>
    <header>
        <div class="topnav">
            <div class="topnav-left">

                <img src="/images/cap/logo-white.png">
            </div>

            <div class="topnav-right">
                {{ date('l, d F Y') }} | <a href="/formLogin">Admin</a>
            </div>
        </div>

        <div class="content">
            <h1>Welcome to MyCatalyst</h1>
            <p class="judul">Develop Yourself, Develop Your Company!</p>
            <a href="{{ route('microsoft.oAuth') }}" class="button-link">Go to Your Dashboard</a>
        </div>
    </header>
    <main>
        <div class="card">
            <div class="card-header">
                <picture>
                    <img src="/images/cap/02.jpg">
                </picture>
            </div>
            <div class="card-content">
                <h2>Competency</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mollis eleifend libero, ac tristique
                    magna
                    tincidunt et.</p>
                <a href="#" class="read-more">Read more ></a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <img src="/images/cap/03.jpg" alt=""">
            </div>
            <div class="card-content">
                <h2>Assessment</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mollis eleifend libero, ac tristique
                    magna
                    tincidunt et.</p>
                <a href="#" class="read-more">Read more ></a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <img src="/images/cap/04.jpg" alt=""">
            </div>
            <div class="card-content">
                <h2>Development</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mollis eleifend libero, ac tristique
                    magna
                    tincidunt et.</p>
                <a href="#" class="read-more">Read more ></a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <img src="/images/cap/05.jpg" alt=""">
            </div>
            <div class="card-content">
                <h2>Why is this important?</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mollis eleifend libero, ac tristique
                    magna
                    tincidunt et.</p>
                <a href="#" class="read-more">Read more ></a>
            </div>
        </div>

    </main>
    <footer>
        <p>&copy; 2024 - MyCatalyst created by Chandra Asri</p>
    </footer>
</body>

</html>
