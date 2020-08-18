

<?php $__env->startSection('customTitle'); ?>
    <?php echo $__env->make('layouts.inc.title',['title'=>'Edit -'.$emp->lastname], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">

        <a class="btn btn-primary" href="<?php echo e(route('employees.index')); ?>"><i class="fas fa-arrow-alt-circle-left"></i> BACK</a>

        <hr/>


        <?php echo Form::model($emp, ['route' => ['employees.update', $emp->id],'method' => 'put']); ?>

        <div class="form-group">
            <?php echo Form::label('lastname', 'Lastname'); ?>

            <?php echo Form::text('lastname',null,['class' => 'form-control'.($errors->has('lastname') ? ' is-invalid' : '')]); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('firstname', 'Firstname'); ?>

            <?php echo Form::text('firstname',null,['class' => 'form-control'.($errors->has('firstname') ? ' is-invalid' : '')]); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('middlename', 'Middlename'); ?>

            <?php echo Form::text('middlename',null,['class' => 'form-control'.($errors->has('middlename') ? ' is-invalid' : '')]); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('extname', 'Extname'); ?>

            <?php echo Form::text('extname',null,['class' => 'form-control'.($errors->has('extname') ? ' is-invalid' : '')]); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('birthday', 'Birthday'); ?>

            <?php echo Form::date('birthday',null,['class' => 'form-control'.($errors->has('birthday') ? ' is-invalid' : '')]); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('address', 'Address'); ?>

            <?php echo Form::text('address',null,['class' => 'form-control'.($errors->has('address') ? ' is-invalid' : '')]); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('contact', 'Contact No.'); ?>

            <?php echo Form::text('contact',null,['class' => 'form-control'.($errors->has('contact') ? ' is-invalid' : '')]); ?>

        </div>


        <?php echo Form::submit('Update',['class'=>'btn btn-primary']); ?>




        <?php echo Form::close(); ?>



    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/employees/edit.blade.php ENDPATH**/ ?>