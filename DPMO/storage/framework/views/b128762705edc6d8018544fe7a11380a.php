

<?php $__env->startSection('content'); ?>
<div class="container-fluid">                  
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="mt-3">
                        <?php echo e(isset($role) ? 'EDIT ROLE ACCESS SETUP' : 'ADD ROLE ACCESS SETUP'); ?>

                    </h4>
                </div>
                <div class="content">
                   <form class="form" method="post" action="<?php echo e(isset($role) ? route('role.update', $role->id) : route('role.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php if(isset($role)): ?>
                        <?php echo method_field('PUT'); ?>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rolecode" class="form-label">Role Code</label>
                                <input type="text" name="rolecode" placeholder="Role Code"
                                    value="<?php echo e(old('rolecode', $role->rolecode ?? '')); ?>"
                                    class="form-control <?php $__errorArgs = ['rolecode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <?php $__errorArgs = ['rolecode'];
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
                                <label for="roledesc" class="form-label">Role Name</label>
                                <input type="text" name="roledesc" placeholder="Role Name"
                                    value="<?php echo e(old('roledesc', $role->roledesc ?? '')); ?>"
                                    class="form-control <?php $__errorArgs = ['roledesc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <?php $__errorArgs = ['roledesc'];
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

                    
                    <div class="table-responsive ps">
                        <table class="table tablesorter">
                            <thead class="text-primary">
                                <tr>
                                    <th>Module</th>
                                    <th>No Access</th>
                                    <th>Add</th>
                                    <th>Edit</th>
                                    <th>Read Only</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $modules = ['config','dept','role','mguser','log'];
                                    $names = ['Configuration Setup', 'Department Setup', 'Role Access Setup', 'Manages Users', 'Manages Log'];
                                    $moduleNames = array_combine($modules, $names);
                                ?>

                                <?php $__currentLoopData = $moduleNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module => $moduleName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($moduleName); ?></td>
                                    <td><input type="radio" name="<?php echo e($module); ?>" value="0" <?php echo e(old($module, $role->$module ?? 0) == 0 ? 'checked' : ''); ?>> </td>
                                    <td><input type="radio" name="<?php echo e($module); ?>" value="1" <?php echo e(old($module, $role->$module ?? 0) == 1 ? 'checked' : ''); ?>> </td>
                                    <td><input type="radio" name="<?php echo e($module); ?>" value="2" <?php echo e(old($module, $role->$module ?? 0) == 2 ? 'checked' : ''); ?>> </td>
                                    <td><input type="radio" name="<?php echo e($module); ?>" value="3" <?php echo e(old($module, $role->$module ?? 0) == 3 ? 'checked' : ''); ?>> </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="pull-right">
                        <button type="button" class="btn btn-secondary me-2" onclick="location.href='/role'">Back</button>
                        <button type="submit" class="btn btn-info btn-fill btn-adjust">
                            <?php echo e(isset($role) ? 'Update' : 'Save'); ?>

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
      message: "Role access saved successfully"
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

<?php echo $__env->make('components.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\php\Herd\DPMO\resources\views/maintenance/roledetail.blade.php ENDPATH**/ ?>