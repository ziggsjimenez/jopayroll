

<?php $__env->startSection('customTitle'); ?>
    <?php echo $__env->make('layouts.inc.title',['title'=>'Create Payroll'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">

        <a class="btn btn-primary" href="<?php echo e(route('payrolls.index')); ?>"><i class="fas fa-arrow-alt-circle-left"></i> BACK</a>

        <hr/>

        <?php echo Form::open(['route' => 'payrolls.store','class'=>'form']); ?>


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

        <div class="form-group">
            <?php echo Form::label('datefrom', 'From (mm/dd/yyyy)'); ?>

            <?php echo Form::date('datefrom',null,['class' => 'form-control'.($errors->has('datefrom') ? ' is-invalid' : '')]); ?>

        </div>

        <div class="form-group">
            <?php echo Form::label('dateto', 'To (mm/dd/yyyy)'); ?>

            <?php echo Form::date('dateto',null,['class' => 'form-control'.($errors->has('dateto') ? ' is-invalid' : '')]); ?>

        </div>

        <?php echo Form::submit('Add',['id'=>'btnadd','class'=>'btn btn-primary']); ?>


        <?php echo Form::close(); ?>



    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customScripts'); ?>

    <?php echo $__env->make('layouts.js.datables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset('public/js/bootstrap.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/sweetalert.min.js')); ?>"></script>

    <script>

        $(document).ready(function() {

            $( "#btnadd" ).click(function() {

//                alert(days);


                var start = new Date(Date.parse($('#datefrom').val()));
                var end = new Date(Date.parse($('#dateto').val()));
//                var end = $('#dateto').val();

// end - start returns difference in milliseconds
                var diff = end-start;

// get days
                var days = diff/1000/60/60/24;

//                alert(days + "start: "+ start + "end: "+ end + "diff: "+ diff);

                if(days<0){
                    alert("Invalid Date Range.");
                    return false;
                }
            });

        } );

    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/payrolls/create.blade.php ENDPATH**/ ?>