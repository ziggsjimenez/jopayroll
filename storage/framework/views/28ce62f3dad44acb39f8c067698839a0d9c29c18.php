

<?php $__env->startSection('customTitle'); ?>
    <?php echo $__env->make('layouts.inc.title',['title'=>'Refund Types Index'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customCss'); ?>

    <?php echo $__env->make('layouts.css.datables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">

        <a class="btn btn-primary" href="<?php echo e(route('refundtypes.create')); ?>"><i class="fas fa-plus-circle"></i> ADD </a>

        <hr/>
        <?php echo $__env->make('layouts.inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <table id="datatable">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $refundtypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $refundtype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td><?php echo e($refundtype->id); ?></td>
                    <td><?php echo e($refundtype->title); ?></td>
                    <td><?php echo e($refundtype->status); ?></td>

                    <td>

                        <a class="btn btn-warning" href="<?php echo e(route('refundtypes.edit',$refundtype->id)); ?>"><i class="fas fa-pen"></i> EDIT</a>
                        <a class="btn btn-success" href="<?php echo e(route('refundtypes.show',$refundtype->id)); ?>"><i class="fas fa-search"></i> VIEW</a>

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

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/refundtypes/index.blade.php ENDPATH**/ ?>