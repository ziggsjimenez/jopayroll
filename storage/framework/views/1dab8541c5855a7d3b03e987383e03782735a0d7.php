

<?php $__env->startSection('customTitle'); ?>
    <?php echo $__env->make('layouts.inc.title',['title'=>'Create Chargeability'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">

        <a class="btn btn-primary" href="<?php echo e(route('chargeabilities.index')); ?>"><i class="fas fa-arrow-alt-circle-left"></i> BACK</a>

        <hr/>

        <?php echo Form::open(['route' => 'chargeabilities.store','class'=>'form']); ?>


        <div class="form-group">
            <?php echo Form::label('name', 'Description'); ?>

            <?php echo Form::text('name',null,['class' => 'form-control'.($errors->has('name') ? ' is-invalid' : '')]); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('amount', 'Amount'); ?>

            <?php echo Form::number('amount',null,['class' => 'form-control'.($errors->has('amount') ? ' is-invalid' : '')]); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('fundsource_id', 'Fund Source'); ?>

            <?php echo Form::select('fundsource_id',$fundsources,null,['class' => 'form-control'.($errors->has('fundsource_id') ? ' is-invalid' : ''),'placeholder'=>'Select...']); ?>

        </div>


        <?php echo Form::submit('Add',['class'=>'btn btn-primary']); ?>




        <?php echo Form::close(); ?>









    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/chargeabilities/create.blade.php ENDPATH**/ ?>