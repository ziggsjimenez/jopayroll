

<?php $__env->startSection('customTitle'); ?>
    <?php echo $__env->make('layouts.inc.title',['title'=>'Create Refund Type'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">

        <a class="btn btn-primary" href="<?php echo e(route('refundtypes.index')); ?>"><i class="fas fa-arrow-alt-circle-left"></i> BACK</a>

        <hr/>

        <?php echo Form::open(['route' => 'refundtypes.store','class'=>'form']); ?>


        <div class="form-group">
            <?php echo Form::label('title', 'Title'); ?>

            <?php echo Form::text('title',null,['class' => 'form-control'.($errors->has('title') ? ' is-invalid' : '')]); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('status', 'Status'); ?>

            <?php echo Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],null,['class' => 'form-control'.($errors->has('status') ? ' is-invalid' : ''),'placeholder'=>'Select...']); ?>

        </div>


        <?php echo Form::submit('Add',['class'=>'btn btn-primary']); ?>




        <?php echo Form::close(); ?>



    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/refundtypes/create.blade.php ENDPATH**/ ?>