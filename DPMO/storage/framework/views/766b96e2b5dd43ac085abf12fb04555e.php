

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">

<?php $__env->startSection('content'); ?>
<div class="container">
    <h4 class="mb-3">DEPARTMENT MASTER</h4>
    <a href="/deptdetail" class="btn btn-info mb-3">
        <i class="bi bi-plus-circle"></i> 
    </a>

    <table id="TableList" class="table table-hover table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Department Code</th>
                <th>Department Name</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($index + 1); ?></td>
                <td><?php echo e($dept->deptcode); ?></td>
                <td><?php echo e($dept->deptdesc); ?></td>
                <td class="text-center">
                    <a href="#" class="text-primary">
                        <i class="bi bi-pencil-square" title="Edit"></i>
                    </a>
                    <a href="javascript:void(0);" class="text-danger delete-btn" data-id="<?php echo e($dept->id); ?>">
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
<script src = "https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script src = "https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
<script>
    $(document).ready(function(){
        $("#TableList").DataTable();
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
                    url: '<?php echo e(route("dept.delete", "")); ?>/' + id,
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


<?php echo $__env->make('components.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\php\Herd\DPMO\resources\views/home/dept.blade.php ENDPATH**/ ?>