<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <!-- Bootstrap 5 CSS (if not already included) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Datepicker CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
</head>
<body>
    <!-- HEADER -->
    <header class="site-header">
        <div class="container header-flex">
            <div class="logo-box">Logo</div>
            <nav>
                <a href="{{ route('homepage') }}">Home</a>
                <a href="#about">About</a>
                <a href="#contact">Contact</a>
            </nav>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main>
        @yield('main_content')
    </main>

    <!-- FOOTER -->
    <footer class="site-footer">
        <div class="container footer-flex">
            <div class="footer-left">
                <h1>Get in touch</h1>
                <p>Please contact me if you want to know more about me!<br>
                I am very happy to receive an email from you!</p>
                <p>Email Address: <strong>kityi0310@gmail.com</strong></p>
            </div>
            <div class="footer-right">
                <p>&copy; {{ date('Y') }} Appointment System. <br>Created by <strong>KIT YI CHAN</strong></p>
            </div>
        </div>
    </footer>
    <!-- Bootstrap Bundle (JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery (required by Bootstrap Datepicker) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    @yield('scripts')
</body>

</html>