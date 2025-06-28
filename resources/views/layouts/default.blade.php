<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Webpage</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
    <!-- Bootstrap 5 CSS (if not already included) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Datepicker CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
</head>
<body>
    <!-- HEADER -->
    <header class="site-header">
        <div class="container">
            <div class="header-flex">
                <a href="{{ route('home') }}" class="logo-box">KY</a>                
                <nav>
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('contact.topic', ['topic' => 'My Projects']) }}">Contact</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main>
        @yield('main_content')
    </main>

    <!-- FOOTER -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-flex">
                <div class="footer-col">
                    <h3>Get in touch</h3>
                    <p>Email Address: <strong>kityi0310@gmail.com</strong></p>
                </div>
                
                <div class="copyright">
                    <p>&copy; {{ date('Y') }} Appointment System. <br>Created by <strong>KIT YI CHAN</strong></p>
                </div>
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