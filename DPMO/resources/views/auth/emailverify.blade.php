<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>DPMO</title>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="76x76" href="{{ Vite::asset('resources/img/apple-icon.png') }}">
        <link rel="icon" type="image/png" href="{{ Vite::asset('resources/img/favicon.ico') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ Vite::asset('resources/css/nucleo-icons.css') }}" rel="stylesheet" />
        <!-- CSS -->
        <link href="{{ Vite::asset('resources/css/white-dashboard.css?v=1.0.0') }}" rel="stylesheet" />
        <link href="{{ Vite::asset('resources/css/theme.css') }}" rel="stylesheet" />
    </head>
    <body class="def-page">
        <div class="wrapper wrapper-full-page">
            <div class="full-page {{ $contentClass ?? '' }}">
                <div class="content">
                    <div class="container">
                        <h1 class="mb-4" style="color: white;">Please verify your email through the email we've sent you </h1>
                            <p style="color: white;">Didn't get the  email?</p>
                            <form id="sendForm" action="{{ route('verification.send')}}" method="post">
                                @csrf
                                <button type="submit" id="SendBtn" class="btn"> Send Again </button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

{{-- jQuery Script --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
         $("#sendForm").on("submit", function () {
            $("#SendBtn").prop("disabled", true).text("Processing...");
        });
    });
</script>






