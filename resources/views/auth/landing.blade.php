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
            <label>Welcome to MyCatalyst!</label>
            <p class="judul">Grow what matters. when you grow. we do too.</p>
            <a href="{{ route('microsoft.oAuth') }}" class="button-link">Go to Your Dashboard</a>
        </div>
    </header>

    @php
        $competency =
            'Competency is the ability to apply knowledge, skills and behavior in performing activities within an occupation or function to the standards expected. In Chandra Asri, we have Leadership and Functional Competencies.';
        $assessment = "Competency assessment to evaluate proficiency and effectiveness in executing specific tasks and
                    responsibilities within your role. After finalizing self-assessment, the result will be validated by
                    your superior to get the final result.";
        $development = "The competency assessment results will be analyzed to develop planning and implementation of a
                    learning and development program for employees. In Chandra Asri, we adopt the Blended Learning Model
                    (70:20:10)
for learning implementation.";
        $why = "The process of competency and employee’s development management is linked with other HR processes in
                    line with business strategy to drive excellence in employee performance";
    @endphp
    <main>
        <div class="card">
            <div class="card-header">
                <picture>
                    <img src="/images/cap/02.jpg">
                </picture>
            </div>
            <div class="card-content">
                <label>Competency</label>
                <p>{{ str_word_count($competency) > 30 ? substr($competency, 0, 183) . ' [...]' : $competency }}
                </p>
            </div>
            <div class="card-footer">
                <a href="#" class="read-more">Read more ></a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <img src="/images/cap/03.jpg" alt=""">
            </div>
            <div class="card-content">
                <label>Assessment</label>
                <p>{{ str_word_count($assessment) > 30 ? substr($assessment, 0, 183) . ' [...]' : $assessment }}</p>
            </div>
            <div class="card-footer">
                <a href="#" class="read-more">Read more ></a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <img src="/images/cap/04.jpg" alt=""">
            </div>
            <div class="card-content">
                <label>Development</label>
                <p>{{ str_word_count($development) > 30 ? substr($development, 0, 183) . ' [...]' : $development }}</p>
            </div>
            <div class="card-footer">
                <a href="#" class="read-more">Read more ></a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <img src="/images/cap/05.jpg" alt=""">
            </div>
            <div class="card-content">
                <label>Why is this important?</label>
                <p>{{ str_word_count($why) > 30 ? substr($why, 0, 183) . ' [...]' : $why }}</p>
            </div>
            <div class="card-footer">
                <a href="#" class="read-more">Read more ></a>
            </div>
        </div>

    </main>
    <footer>
        <p>&copy; 2024 - MyCatalyst created by Chandra Asri</p>
    </footer>
</body>

</html>
