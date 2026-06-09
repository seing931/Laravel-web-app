<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">
                <img src="<?php echo e(Vite::asset('resources/img/company.png')); ?>" alt="">
            </a>
            <a href="#" class="simple-text logo-normal">STRATO SOLUTIONS</a>
        </div>
        <ul class="nav">
            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($parent->menus->isEmpty()): ?> 
                    <li class="<?php echo e(request()->is(ltrim($parent->url, '/')) ? 'active' : ''); ?>">
                        <a href="<?php echo e($parent->url); ?>">
                            <i class="<?php echo e($parent->icon); ?>"></i>
                            <p><?php echo e($parent->parentmenu); ?></p>
                        </a>
                    </li>
                <?php else: ?>
                    <li>
                        <a data-toggle="collapse" href="#menu-<?php echo e($parent->parentid); ?>" aria-expanded="false">
                            <i class="<?php echo e($parent->icon); ?>"></i>
                            <span class="nav-link-text"><?php echo e($parent->parentmenu); ?></span>
                            <b class="caret mt-1"></b>
                        </a>
                        <div class="collapse" id="menu-<?php echo e($parent->parentid); ?>">
                            <ul class="nav pl-4">
                                <?php $__currentLoopData = $parent->menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="<?php echo e(request()->is(ltrim($submenu->url, '/')) ? 'active' : ''); ?>">
                                        <a href="<?php echo e($submenu->url); ?>">
                                            <i class="<?php echo e($submenu->icon); ?>"></i>
                                            <p><?php echo e($submenu->menu); ?></p>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php /**PATH C:\Users\USER\Desktop\php\Herd\DPMO\resources\views/components/navbars/sidebar.blade.php ENDPATH**/ ?>