

<?php $__env->startSection('customTitle'); ?>
    <?php echo $__env->make('layouts.inc.title',['title'=>'Deduction Items Index'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customCss'); ?>

    <?php echo $__env->make('layouts.css.datables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


        <a class="btn btn-primary" href="<?php echo e(route('deductionitems.create')); ?>"><i class="fas fa-plus-circle"></i> ADD </a>

        <hr/>
        <?php echo $__env->make('layouts.inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <table id="datatable">
            <thead>
            <tr>
                <th rowspan="2">#</th>
                <th rowspan="2">Name</th>
                <th rowspan="2">Deduction Mode</th>
                <th rowspan="2">Default Amount</th>
                <th colspan="24">Frequency</th>
                <th rowspan="2">Status</th>
                <th rowspan="2">Action</th>
            </tr>
            <tr>
                <?php for($i = 1; $i <= 24; $i++): ?>
                    <th><?php echo e($i); ?></th>
                <?php endfor; ?>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $deductionitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deductionitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>

                    <td><?php echo e($deductionitem->id); ?></td>
                    <td><?php echo e($deductionitem->name); ?></td>
                    <td><?php echo e($deductionitem->deductionmode->name); ?></td>
                    <td><?php echo e($deductionitem->defaultamount); ?></td>
                    <td><?php echo e($deductionitem->f1); ?></td>
                    <td><?php echo e($deductionitem->f2); ?></td>
                    <td><?php echo e($deductionitem->f3); ?></td>
                    <td><?php echo e($deductionitem->f4); ?></td>
                    <td><?php echo e($deductionitem->f5); ?></td>
                    <td><?php echo e($deductionitem->f6); ?></td>
                    <td><?php echo e($deductionitem->f7); ?></td>
                    <td><?php echo e($deductionitem->f8); ?></td>
                    <td><?php echo e($deductionitem->f9); ?></td>
                    <td><?php echo e($deductionitem->f10); ?></td>
                    <td><?php echo e($deductionitem->f11); ?></td>
                    <td><?php echo e($deductionitem->f12); ?></td>
                    <td><?php echo e($deductionitem->f13); ?></td>
                    <td><?php echo e($deductionitem->f14); ?></td>
                    <td><?php echo e($deductionitem->f15); ?></td>
                    <td><?php echo e($deductionitem->f16); ?></td>
                    <td><?php echo e($deductionitem->f17); ?></td>
                    <td><?php echo e($deductionitem->f18); ?></td>
                    <td><?php echo e($deductionitem->f19); ?></td>
                    <td><?php echo e($deductionitem->f20); ?></td>
                    <td><?php echo e($deductionitem->f21); ?></td>
                    <td><?php echo e($deductionitem->f22); ?></td>
                    <td><?php echo e($deductionitem->f23); ?></td>
                    <td><?php echo e($deductionitem->f24); ?></td>
                    <td><?php echo e($deductionitem->status); ?></td>
                    <td>
                        <a class="btn btn-warning" href="<?php echo e(route('deductionitems.edit',$deductionitem->id)); ?>"><i class="fas fa-pen"></i> EDIT</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('customScripts'); ?>

    <?php echo $__env->make('layouts.js.datables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>

        $(document).ready(function() {
            $('#datatable').DataTable();
        } );

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/deductionitems/index.blade.php ENDPATH**/ ?>