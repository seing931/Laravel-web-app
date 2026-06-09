

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">

<?php $__env->startSection('content'); ?>
<div class="container">
    <h4 class="mt-3">MANAGE USER</h4>
    <a href="/mguserdetail" class="btn btn-info mb-3">
        <i class="bi bi-plus-circle"></i> 
    </a>

    <table id="TuserList" class="table table-hover table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Email</th>
                <th>Department</th>
                <th class="text-center">Active</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="dt-font"><?php echo e($index + 1); ?></td>
                <td class="dt-font"><?php echo e($user->username); ?></td>
                <td class="dt-font"><?php echo e($user->email); ?></td>
                <td class="dt-font"><?php echo e($user->deptcode); ?> - <?php echo e($user->deptdesc); ?></td>
                <td class="text-center"><?php echo $user->active == 1 ? '<i class="bi bi-check-square"></i>' : '<i class="bi bi-square"></i>'; ?></td>
                <td class="text-center">
                    <a href="<?php echo e(route('user.edit', $user->id)); ?>" class="text-primary">
                        <i class="bi bi-pencil-square" title="Edit"></i>
                    </a>
                    <a href="javascript:void(0);" class="text-danger delete-btn" data-id="<?php echo e($user->id); ?>">
                        <i class="bi bi-trash" title="Delete"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src = "https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src = "https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
<script>
    $(document).ready(function(){
        $("#TuserList").DataTable();
    });

    $('.delete-btn').click(function () {
        var id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo e(route("user.delete", "")); ?>/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    success: function (response) {
                        Swal.fire('Deleted!', response.message, 'success').then(() => {
                            location.reload();
                        });
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    });

</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('components.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\php\Herd\DPMO\resources\views/maintenance/mguser.blade.php ENDPATH**/ ?>