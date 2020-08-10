

<?php $__env->startSection('customTitle'); ?>
    <?php echo $__env->make('layouts.inc.title',['title'=>'Deduction Items Index'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customCss'); ?>

    <?php echo $__env->make('layouts.css.datables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">

        <a class="btn btn-primary" href="<?php echo e(route('deductionitems.index')); ?>"><i class="fas fa-arrow-alt-circle-left"></i> BACK</a>

        <hr/>

        <?php echo Form::open(['route' => 'deductionitems.store','class'=>'form']); ?>


        <div class="form-group">
            <?php echo Form::label('name', 'Name'); ?>

            <?php echo Form::text('name',null,['class' => 'form-control'.($errors->has('name') ? ' is-invalid' : '')]); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('deductionmode_id', 'Deduction Mode'); ?>

            <?php echo Form::select('deductionmode_id',$deductionmodes,1,['class' => 'form-control'.($errors->has('deductionmode_id') ? ' is-invalid' : ''),'placeholder'=>'Select...']); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('defaultamount', 'Defaultamount'); ?>

            <?php echo Form::number('defaultamount',null,['class' => 'form-control'.($errors->has('defaultamount') ? ' is-invalid' : ''),'placeholder'=>'Php 0.00']); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('status', 'Status'); ?>

            <?php echo Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],null,['class' => 'form-control'.($errors->has('status') ? ' is-invalid' : ''),'placeholder'=>'Select...']); ?>

        </div>

        <div class="form-group">
            <?php echo Form::checkbox('f1',1); ?>

            <?php echo Form::label('f1', 'F1'); ?>


            <?php echo Form::checkbox('f2',1); ?>

            <?php echo Form::label('f2', 'F2'); ?>


            <?php echo Form::checkbox('f3',1); ?>

            <?php echo Form::label('f13', 'F3'); ?>


            <?php echo Form::checkbox('f4',1); ?>

            <?php echo Form::label('f14', 'F4'); ?>


            <?php echo Form::checkbox('f5',1); ?>

            <?php echo Form::label('f5', 'F5'); ?>


            <?php echo Form::checkbox('f6',1); ?>

            <?php echo Form::label('f6', 'F6'); ?>


            <?php echo Form::checkbox('f7',1); ?>

            <?php echo Form::label('f7', 'F7'); ?>


            <?php echo Form::checkbox('f8',1); ?>

            <?php echo Form::label('f8', 'F8'); ?>


            <?php echo Form::checkbox('f9',1); ?>

            <?php echo Form::label('f9', 'F9'); ?>


            <?php echo Form::checkbox('f10',1); ?>

            <?php echo Form::label('f10', 'F10'); ?>


            <?php echo Form::checkbox('f11',1); ?>

            <?php echo Form::label('f11', 'F11'); ?>


            <?php echo Form::checkbox('f12',1); ?>

            <?php echo Form::label('f12', 'F12'); ?>


            <?php echo Form::checkbox('f13',1); ?>

            <?php echo Form::label('f13', 'F13'); ?>


            <?php echo Form::checkbox('f14',1); ?>

            <?php echo Form::label('f14', 'F14'); ?>


            <?php echo Form::checkbox('f15',1); ?>

            <?php echo Form::label('f15', 'F15'); ?>


            <?php echo Form::checkbox('f16',1); ?>

            <?php echo Form::label('f16', 'F16'); ?>


            <?php echo Form::checkbox('f17',1); ?>

            <?php echo Form::label('f177', 'F17'); ?>


            <?php echo Form::checkbox('f18',1); ?>

            <?php echo Form::label('f18', 'F18'); ?>


            <?php echo Form::checkbox('f19',1); ?>

            <?php echo Form::label('f19', 'F19'); ?>


            <?php echo Form::checkbox('f20',1); ?>

            <?php echo Form::label('f20', 'F20'); ?>


            <?php echo Form::checkbox('f21',1); ?>

            <?php echo Form::label('f21', 'F21'); ?>


            <?php echo Form::checkbox('f22',1); ?>

            <?php echo Form::label('f22', 'F22'); ?>


            <?php echo Form::checkbox('f23',1); ?>

            <?php echo Form::label('23', 'F23'); ?>


            <?php echo Form::checkbox('f24',1); ?>

            <?php echo Form::label('f24', 'F24'); ?>


        </div>

        <?php echo Form::submit('Add',['class'=>'btn btn-primary']); ?>


        <?php echo Form::close(); ?>



    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customScripts'); ?>

    <?php echo $__env->make('layouts.js.datables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/deductionitems/create.blade.php ENDPATH**/ ?>