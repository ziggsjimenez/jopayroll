

<?php $__env->startSection('customTitle'); ?>
    <?php echo $__env->make('layouts.inc.title',['title'=>'Employees Index'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customCss'); ?>

    <?php echo $__env->make('layouts.css.datables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


        <a class="btn btn-primary" href="<?php echo e(route('employees.create')); ?>"><i class="fas fa-plus-circle"></i> ADD </a>

        <hr/>

        <?php echo $__env->make('layouts.inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <table id="datatable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>Middlename</th>
                <th>Extname</th>
                <th>Birthday</th>
                <th>Address</th>
                <th>Contact No.</th>
                <th>Deductions</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $count=1;?>
            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($count++); ?></td>
                    <td><?php echo e($employee->lastname); ?></td>
                    <td><?php echo e($employee->firstname); ?></td>
                    <td><?php echo e($employee->middlename); ?></td>
                    <td><?php echo e($employee->extname); ?></td>
                    <td><?php echo e($employee->birthday); ?></td>
                    <td><?php echo e($employee->address); ?></td>
                    <td><?php echo e($employee->contact); ?></td>

                    <td>
                        <?php $__currentLoopData = $employee->deductions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employeededuction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input deductioncheck" id="inlineCheckbox<?php echo e($employeededuction->id); ?>" type="checkbox" value="<?php echo e($employeededuction->id); ?>" <?php if($employeededuction->status=="Active"): ?> checked <?php endif; ?>>
                                <label class="form-check-label" for="inlineCheckbox<?php echo e($employeededuction->id); ?>"><?php echo e($employeededuction->deductionitem->name); ?></label>
                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>

                    <td>

                        <a class="btn btn-warning" href="<?php echo e(route('employees.edit',$employee->id)); ?>"><i class="fas fa-pen"></i> EDIT</a>
                        <a class="btn btn-warning" href="<?php echo e(route('employees.show',$employee->id)); ?>"><i class="fas fa-search"></i> VIEW</a>

                    </td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('customScripts'); ?>

    <?php echo $__env->make('layouts.js.datables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset('public/js/bootstrap.bundle.js')); ?>"></script>

    <script>

        $(document).ready(function() {

            $('#datatable').DataTable();

            $('.alert').alert();

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

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/employees/index.blade.php ENDPATH**/ ?>