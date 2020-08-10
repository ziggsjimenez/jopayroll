

<?php $__env->startSection('customTitle'); ?>
    <?php echo $__env->make('layouts.inc.title',['title'=>$employee->fullname()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customCss'); ?>

<?php echo $__env->make('layouts.css.datables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">

        <a class="btn btn-primary" href="<?php echo e(route('employees.create')); ?>"><i class="fas fa-plus-circle"></i> ADD </a>

        <hr/>

        <?php echo $__env->make('layouts.inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>DB ID</th>
               <th>Name</th>
                <th>Birthday</th>
                <th>Address</th>
                <th>Contact No.</th>
            </tr>
            </thead>
            <tbody>

                <tr>
                    <td><?php echo e($employee->id); ?></td>
                    <td><?php echo e($employee->fullname()); ?></td>
                    <td><?php echo e($employee->birthday); ?></td>
                    <td><?php echo e($employee->address); ?></td>
                    <td><?php echo e($employee->contact); ?></td>

                </tr>


            </tbody>
        </table>

        <?php $__currentLoopData = $employee->deductions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employeededuction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="form-check form-check-inline">
                <input class="form-check-input deductioncheck" id="inlineCheckbox<?php echo e($employeededuction->id); ?>" type="checkbox" value="<?php echo e($employeededuction->id); ?>" <?php if($employeededuction->status=="Active"): ?> checked <?php endif; ?>>
                <label class="form-check-label" for="inlineCheckbox<?php echo e($employeededuction->id); ?>"><?php echo e($employeededuction->deductionitem->name); ?></label>
            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customScripts'); ?>

    <?php echo $__env->make('layouts.js.datables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset('public/js/bootstrap.bundle.js')); ?>"></script>

    <script>

        $(document).ready(function() {

            $('.deductioncheck').click(function(){

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({

                    url: '<?php echo e(url('/employees/updatedeductionstatus')); ?>',
                    type: 'POST',

                    data: {_token: CSRF_TOKEN, employeededuction_id : $(this).val()},
                    dataType: 'JSON',

                    success: function (data) {

                        location.reload();

                    }
                });

            });

        } );

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/employees/show.blade.php ENDPATH**/ ?>