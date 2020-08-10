

<?php $__env->startSection('customTitle'); ?>
    <?php echo $__env->make('layouts.inc.title',['title'=>'Chargeabilities Index'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customCss'); ?>

    <?php echo $__env->make('layouts.css.datables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">

        <a class="btn btn-primary" href="<?php echo e(route('chargeabilities.create')); ?>"><i class="fas fa-plus-circle"></i> ADD </a>

        <hr/>
        <?php echo $__env->make('layouts.inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <table id="datatable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Payrolls</th>
                <th>Appointments</th>
                <th>Fund Source</th>
                <th>Head of Office</th>
                <th>Position</th>

                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $chargeabilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chargeability): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td><?php echo e($chargeability->id); ?></td>
                    <td><a href="<?php echo e(route('chargeabilities.show',$chargeability->id)); ?>"><?php echo e($chargeability->name); ?></a></td>
                    <td class="right"><?php echo e(number_format($chargeability->amount,2,'.',',')); ?></td>
                    <td class="right"><?php echo e(number_format($chargeability->payrolls->count(),0,'.',',')); ?></td>
                    <td class="right"><?php echo e(number_format($chargeability->appointments->count(),0,'.',',')); ?></td>
                    <td><?php echo e($chargeability->fundsource->name); ?></td>
                    <td><?php echo e($chargeability->headofoffice); ?></td>
                    <td><?php echo e($chargeability->position); ?></td>
                    <td>

                        <a class="btn btn-warning" href="<?php echo e(route('chargeabilities.edit',$chargeability->id)); ?>"><i class="fas fa-pen"></i> EDIT</a>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customScripts'); ?>

    <?php echo $__env->make('layouts.js.datables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>

        $(document).ready(function() {
            $('#datatable').DataTable();
        } );

    </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/chargeabilities/index.blade.php ENDPATH**/ ?>