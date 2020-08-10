

<?php $__env->startSection('customTitle'); ?>
    <?php echo $__env->make('layouts.inc.title',['title'=>'Edit - '.$appointment->description], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">

        <a class="btn btn-primary" href="<?php echo e(route('appointments.index')); ?>"><i class="fas fa-arrow-alt-circle-left"></i> BACK</a>

        <hr/>

        <?php echo Form::model($appointment, ['route' => ['appointments.update', $appointment->id],'method' => 'put']); ?>


        <div class="form-group">
            <?php echo Form::label('description', 'Description'); ?>

            <?php echo Form::text('description',null,['class' => 'form-control'.($errors->has('description') ? ' is-invalid' : '')]); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('chargeability_id', 'Chargeability'); ?>

            <?php echo Form::select('chargeability_id',$chargeabilities,null,['class' => 'form-control'.($errors->has('chargeability_id') ? ' is-invalid' : ''),'placeholder'=>'Select...']); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('status_id', 'Status'); ?>

            <?php echo Form::select('status_id',$statuses,null,['class' => 'form-control'.($errors->has('status_id') ? ' is-invalid' : ''),'placeholder'=>'Select...']); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('datefrom', 'From'); ?>

            <?php echo Form::date('datefrom',null,['class' => 'form-control'.($errors->has('datefrom') ? ' is-invalid' : '')]); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('dateto', 'To'); ?>

            <?php echo Form::date('dateto',null,['class' => 'form-control'.($errors->has('dateto') ? ' is-invalid' : '')]); ?>

        </div>


        <?php echo Form::submit('Update',['class'=>'btn btn-primary']); ?>




        <?php echo Form::close(); ?>



    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/appointments/edit.blade.php ENDPATH**/ ?>