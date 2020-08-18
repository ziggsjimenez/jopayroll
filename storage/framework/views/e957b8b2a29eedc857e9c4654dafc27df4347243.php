

<?php $__env->startSection('customTitle'); ?>
    <?php echo $__env->make('layouts.inc.title',['title'=>'Create Appointment'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">

        <a class="btn btn-primary" href="<?php echo e(route('appointments.index')); ?>"><i class="fas fa-arrow-alt-circle-left"></i> BACK</a>

        <hr/>

        <?php echo Form::open(['route' => 'appointments.store','class'=>'form']); ?>


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

            <?php echo Form::select('status_id',$statuses,1,['class' => 'form-control'.($errors->has('status_id') ? ' is-invalid' : ''),'placeholder'=>'Select...']); ?>

        </div>


        <?php echo Form::submit('Add',['class'=>'btn btn-primary']); ?>




        <?php echo Form::close(); ?>



    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/appointments/create.blade.php ENDPATH**/ ?>