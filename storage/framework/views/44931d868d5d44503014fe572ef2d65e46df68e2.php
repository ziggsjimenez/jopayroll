

<?php $__env->startSection('customTitle'); ?>
    <?php echo $__env->make('layouts.inc.title',['title'=>'Chargeabilities Index'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customCss'); ?>

    <?php echo $__env->make('layouts.css.datables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <h1><?php echo e($chargeability->name); ?></h1>

        <a class="btn btn-primary" href="<?php echo e(route('chargeabilities.index')); ?>"><i class="fas fa-arrow-circle-left"></i> BACK </a>

        <hr/>
        <?php echo $__env->make('layouts.inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Fund Source</th>
                <th>Head of Office</th>
                <th>Position</th>

                <th>Action</th>
            </tr>
            </thead>
            <tbody>

                <tr>
                    <td><?php echo e($chargeability->id); ?></td>
                    <td><?php echo e($chargeability->name); ?></td>
                    <td class="right"><?php echo e(number_format($chargeability->amount,2,'.',',')); ?></td>
                    <td><?php echo e($chargeability->fundsource->name); ?></td>
                    <td><?php echo e($chargeability->headofoffice); ?></td>
                    <td><?php echo e($chargeability->position); ?></td>
                    <td>

                        <a class="btn btn-warning" href="<?php echo e(route('chargeabilities.edit',$chargeability->id)); ?>"><i class="fas fa-pen"></i> EDIT</a>

                    </td>
                </tr>

            </tbody>
        </table>

    <h2>Payrolls</h2>

    <?php echo $__env->make('tables.payroll',['payrolls'=>$chargeability->payrolls], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <h2>Appointments</h2>

    <?php echo $__env->make('tables.appointments',['appointments'=>$chargeability->appointments], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('customScripts'); ?>

    <?php echo $__env->make('layouts.js.datables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>

        $(document).ready(function() {
            $('#datatable').DataTable();
            $('#appdatatable').DataTable();
        } );

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/chargeabilities/show.blade.php ENDPATH**/ ?>