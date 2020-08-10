

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

        <?php echo Form::model($deductionitem, ['route' => ['deductionitems.update', $deductionitem->id],'method' => 'put']); ?>


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
            <?php for($i = 1; $i <= 24; $i++): ?>



                <?php if($deductionitem->f.($i)==1): ?>
                <?php echo Form::checkbox('f'.$i,1,true); ?>

                    <?php else: ?>
                <?php echo Form::checkbox('f'.$i,1); ?>

                <?php endif; ?>


                <?php echo Form::label('f'.$i, 'F'.$i); ?>


            <?php endfor; ?>
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

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/deductionitems/edit.blade.php ENDPATH**/ ?>