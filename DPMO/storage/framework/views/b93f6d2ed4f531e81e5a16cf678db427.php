<?php if(auth()->guard()->check()): ?>
    <?php echo $__env->make('components.navbars.navs.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if(auth()->guard()->guest()): ?>
    <?php echo $__env->make('components.navbars.navs.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH C:\Users\USER\Desktop\php\Herd\DPMO\resources\views/components/navbars/navbar.blade.php ENDPATH**/ ?>