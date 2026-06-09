<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(env('APP_NAME')); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
</head>
<body>
<header>
    <nav>
        <h1 class="text-4xl">Nav</h1>
    </nav>
</header>
<main>
    <?php echo $__env->yieldContent('main'); ?>
</main>
</body>
</html><?php /**PATH C:\Users\USER\Desktop\php\Herd\DPMO\resources\views/layout.blade.php ENDPATH**/ ?>