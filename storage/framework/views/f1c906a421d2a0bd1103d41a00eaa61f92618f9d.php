

<?php $__env->startSection('customTitle'); ?>
    <?php echo $__env->make('layouts.inc.title',['title'=>'Create Chargeability'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">

        <a class="btn btn-primary" href="<?php echo e(route('chargeabilities.index')); ?>"><i class="fas fa-arrow-alt-circle-left"></i> BACK</a>

        <hr/>

        <?php echo Form::model($chargeability, ['route' => ['chargeabilities.update', $chargeability->id],'method' => 'put']); ?>


        <div class="form-group">
            <?php echo Form::label('name', 'Description', ['class' => 'awesome']); ?>

            <?php echo Form::text('name',null,['class' => 'form-control']); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('amount', 'Amount', ['class' => 'awesome']); ?>

            <?php echo Form::number('amount',null,['class' => 'form-control']); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('fundsource_id', 'Fund Source', ['class' => 'awesome']); ?>

            <?php echo Form::select('fundsource_id',$fundsources,null,['class' => 'form-control']); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('headofoffice', 'Head of Office'); ?>

            <?php echo Form::text('headofoffice',null,['class' => 'form-control'.($errors->has('headofoffice') ? ' is-invalid' : '')]); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('position', 'Position'); ?>

            <?php echo Form::text('position',null,['class' => 'form-control'.($errors->has('position') ? ' is-invalid' : '')]); ?>

        </div>


        <?php echo Form::submit('Update',['class'=>'btn btn-primary']); ?>




        <?php echo Form::close(); ?>









    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/chargeabilities/edit.blade.php ENDPATH**/ ?>