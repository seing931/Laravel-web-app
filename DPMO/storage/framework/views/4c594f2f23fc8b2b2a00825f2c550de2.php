<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(env('APP_NAME')); ?></title>
     <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
</head>
<body class="bg-slate-100 text-slate-900">
<header class="bg-slate-700 shadow-lg">
    <nav>
    <a href="<?php echo e(route('home')); ?>" class="nav-link">Home</a>
     <?php if(auth()->guard()->check()): ?>
         <div class="relative flex items-center gap-1" x-data="{open:false}">
             <label class="nav-link"> <?php echo e(auth()->user()->username); ?></label>
            <button @click="open=!open" type="button" class="round-btn">
            <img src="http://picsum.photos/200" alt="">
            </button>
            <div x-show="open" @click.outside="open=false" class="bg-white shadow-lg absolute top-10 right-0 rounded-lg overflow-hidden font-light">
                <a href="<?php echo e(route('dashboard')); ?>" class="block hover:bg-slate-100 pl-4 pr-8 py-2 mb-1">Dashboard</a>
                <form action="<?php echo e(route('logout')); ?>" method="post">
                 <?php echo csrf_field(); ?>
                 <button class="block w-full text-left hover:bg-slate-100 pl-4 pr-8 py-2">Logout</button>
                </form>
            </div>
         </div>
     <?php endif; ?> 
      <?php if(auth()->guard()->guest()): ?>
        <div class="flex items-center gap-4">
           <a href="<?php echo e(route('login')); ?>" class="nav-link">Login</a>
           <a href="<?php echo e(route('register')); ?>" class="nav-link">Register</a>
       </div>
      <?php endif; ?> 
    </nav>
</header>
<main class="py-8 px-4 mx-auto max-w-screen-lg">
    <?php echo e($slot); ?>

</main>
</body>
</html><?php /**PATH C:\Users\USER\Desktop\php\Herd\DPMO\resources\views/components/clayout.blade.php ENDPATH**/ ?>