<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title>DPMO</title>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(Vite::asset('resources/img/apple-icon.png')); ?>">
        <link rel="icon" type="image/png" href="<?php echo e(Vite::asset('resources/img/favicon.ico')); ?>">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <!-- Icons -->
        <link href="<?php echo e(Vite::asset('resources/css/nucleo-icons.css')); ?>" rel="stylesheet" />
        <!-- CSS -->
        <link href="<?php echo e(Vite::asset('resources/css/white-dashboard.css?v=1.0.0')); ?>" rel="stylesheet" />
        <link href="<?php echo e(Vite::asset('resources/css/theme.css')); ?>" rel="stylesheet" />
    </head>
    <body class="def-page">
        <div class="wrapper wrapper-full-page">
            <div class="full-page <?php echo e($contentClass ?? ''); ?>">
                <div class="content">
                    <div class="container">
                        <h1 class="mb-4" style="color: white;">Please verify your email through the email we've sent you </h1>
                            <p style="color: white;">Didn't get the  email?</p>
                            <form id="sendForm" action="<?php echo e(route('verification.send')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <button type="submit" id="SendBtn" class="btn"> Send Again </button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
         $("#sendForm").on("submit", function () {
            $("#SendBtn").prop("disabled", true).text("Processing...");
        });
    });
</script>






<?php /**PATH C:\Users\USER\Desktop\php\Herd\DPMO\resources\views/auth/emailverify.blade.php ENDPATH**/ ?>