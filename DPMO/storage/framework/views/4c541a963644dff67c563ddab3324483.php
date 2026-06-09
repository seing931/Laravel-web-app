
<?php $__env->startSection('content'); ?>
<div class="container-fluid">                  
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="mt-3">
                        <?php echo e(isset($user) ? 'EDIT MANAGE USER' : 'ADD MANAGE USER'); ?>

                    </h4>
                </div>
                <div class="content">
                   <form class="form" method="post" action="<?php echo e(isset($user) ? route('user.update', $user->id) : route('user.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php if(isset($user)): ?>
                        <?php echo method_field('PUT'); ?>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" placeholder="Username" value="<?php echo e(old('username', $user->username ?? '')); ?>"class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <?php $__errorArgs = ['username'];
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
                                <label for="email" class="form-label">Email address</label>
                                <?php if(isset($user)): ?>  
                                    <!-- Show span in Edit Mode -->
                                    <span class="form-control-plaintext"><?php echo e($user->email); ?></span>
                                    <input type="hidden" name="email" value="<?php echo e($user->email); ?>">
                                <?php else: ?>  
                                    <!-- Show input in Create Mode -->
                                    <input type="text" name="email" placeholder="Email" 
                                        value="<?php echo e(old('email')); ?>" 
                                        class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                            <label for="text" class="form-label">Department</label>
                                <select class="form-control" id="dept" name="dept">
                                <option value="">-- Please Select --</option>
                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($dept->deptcode); ?>" 
                                             <?php if(!isset($user)): ?> 
                                                <?php echo e((old('dept', isset($user) ? $user->dept : '') == $dept->deptcode) ? 'selected' : ''); ?>>
                                             <?php endif; ?>
                                            <?php echo e((isset($user) && $user->deptcode == $dept->deptcode) ? 'selected' : ''); ?>>
                                            <?php echo e($dept->deptcode); ?> - <?php echo e($dept->deptdesc); ?>

                                        </option>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                            <?php $__errorArgs = ['dept'];
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
                   <div class="row" style="padding-left:17px;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-control" id="role" name="role" style="width:585pt">
                                    <option value="">-- Please Select --</option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->rolecode); ?>" 
                                             <?php if(!isset($user)): ?> 
                                                <?php echo e((old('role', isset($user) ? $user-> role : '') == $role-> rolecode) ? 'selected' : ''); ?>>
                                             <?php endif; ?>
                                             <?php echo e((isset($user) && $user->rolecode == $role->rolecode) ? 'selected' : ''); ?>>
                                             <?php echo e($role->rolecode); ?> - <?php echo e($role->roledesc); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['role'];
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
                    <div class="row" style="padding-left:17px;">
                         <div class="col-md-4">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="active" value="1" 
                                    <?php echo e(old('active', $user->active ?? false) ? 'checked' : ''); ?>>
                                <span class="form-check-sign">
                                    <span class="check"> Active </span>
                                </span>
                            </label>
                            </div>
                        </div>
                        <?php if(!isset($user)): ?> 
                            <div class="col-md-8">
                                <div class="form-check">
                                   <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="rbDefault" name="PasswordType" value="default" <?php echo e(old('PasswordType', 'default') == 'default' ? 'checked' : ''); ?>>
                                        <label class="form-check-label">Default Password : </label><label class="form-check-label"> @Dmin123</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" id="rbManual" name="PasswordType" value="manual" <?php echo e(old('PasswordType') == 'manual' ? 'checked' : ''); ?>>
                                        <label class="form-check-label" style="width:100%">Manual Enter Password : </label>
                                        <input type="text" class="form-control" id="passwordInput" name="Password" placeholder="Enter password" value="<?php echo e(old('Password')); ?>" <?php echo e(old('PasswordType') == 'manual' ? '' : 'disabled'); ?>>
                                    </div>
                                    <?php $__errorArgs = ['Password'];
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
                        <?php endif; ?>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" onclick="location.href='/mguser'">Back</button>
                        <button type="submit" class="btn btn-info">
                            <?php echo e(isset($user) ? 'Update' : 'Save'); ?>

                        </button>
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
      message: "User saved successfully"
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
    if ($('#rbDefault').is(':checked')) {
        $('#passwordInput').prop('disabled', true).val('');
    }

    $('input[name="PasswordType"]').change(function() {
        if ($('#rbManual').is(':checked')) {
            $('#passwordInput').prop('disabled', false);
        } else {
            $('#passwordInput').prop('disabled', true).val('');
        }
        
         $('input[name="PasswordType"]').change(togglePasswordField);
         togglePasswordField(); // Ensure initial state is set correctly
    });

    <?php if(session('success')): ?>
        showSuccAlert('bottom', 'right');
    <?php endif; ?>
});
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('components.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\php\Herd\DPMO\resources\views/maintenance/mguserdetail.blade.php ENDPATH**/ ?>