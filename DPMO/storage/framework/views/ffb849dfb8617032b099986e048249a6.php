

<?php $__env->startSection('content'); ?>
<div class="container-fluid">                  
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="mt-3">
                        <?php echo e(isset($dept) ? 'EDIT DEPARTMENT SETUP' : 'ADD DEPARTMENT SETUP'); ?>

                    </h4>
                </div>
                <div class="content">
                   <form class="form" method="post" action="<?php echo e(isset($dept) ? route('dept.update', $dept->id) : route('dept.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php if(isset($dept)): ?>
                        <?php echo method_field('PUT'); ?>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="deptcode" class="form-label">Dept. Code</label>
                                <input type="text" name="deptcode" placeholder="Department Code"
                                    value="<?php echo e(old('deptcode', $dept->deptcode ?? '')); ?>"
                                    class="form-control <?php $__errorArgs = ['deptcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <?php $__errorArgs = ['deptcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="deptdesc" class="form-label">Dept. Name</label>
                                <input type="text" name="deptdesc" placeholder="Department Name"
                                    value="<?php echo e(old('deptdesc', $dept->deptdesc ?? '')); ?>"
                                    class="form-control <?php $__errorArgs = ['deptdesc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <?php $__errorArgs = ['deptdesc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    <div class="pull-right">
                        <button type="button" class="btn btn-secondary me-2" onclick="location.href='/dept'">Back</button>
                        <button type="submit" class="btn btn-info btn-fill btn-adjust">
                            <?php echo e(isset($dept) ? 'Update' : 'Save'); ?>

                        </button>
                        <div class="clearfix"></div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/3.1.3/bootstrap-notify.min.js"></script>

<script>
function showSuccAlert(from, align) {
    $.notify({
      icon: "tim-icons icon-check-2",
      message: "Department saved successfully"
    }, {
      type: "success",
      timer: 8000,
      placement: {
        from: from,
        align: align
      }
    });
}
$(document).ready(function () {
    <?php if(session('success')): ?>
        showSuccAlert('bottom', 'right');
    <?php endif; ?>
});
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('components.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\php\Herd\DPMO\resources\views/maintenance/deptdetail.blade.php ENDPATH**/ ?>