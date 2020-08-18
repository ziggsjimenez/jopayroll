
<?php if(isset($error)): ?>
    <div class="alert alert-danger">
        <?php echo e($error); ?>

    </div>
<?php endif; ?>




<table class="table table-bordered">
    <thead>
    <tr>
        <th>Name</th>
        <th>Daily Rate (Php)</th>
        <th>Designation</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Deductions</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $appointment->appemployees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appemployee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($appemployee->employee->fullname()); ?></td>
            <td class="right"><?php echo e(number_format($appemployee->dailyrate(),2,'.',',')); ?></td>
            <td class="right"><?php echo e($appemployee->designation); ?></td>
            <td class="right"><?php echo e($appemployee->datefrom); ?></td>
            <td class="right"><?php echo e($appemployee->dateto); ?></td>
            <td>

                <?php $__currentLoopData = $appemployee->employee->deductions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employeededuction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input deductioncheck" id="inlineCheckbox<?php echo e($employeededuction->id); ?>" type="checkbox" value="<?php echo e($employeededuction->id); ?>" <?php if($employeededuction->status=="Active"): ?> checked <?php endif; ?>>
                        <label class="form-check-label" for="inlineCheckbox<?php echo e($employeededuction->id); ?>"><?php echo e($employeededuction->deductionitem->name); ?></label>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </td>
            <td><button appemployee="<?php echo e($appemployee->id); ?>"class="delbtn btn btn-warning">DEL</button></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<script>

    function loadappemployeetable(){

        var appointment = '<?php echo e($appointment->id); ?>';

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            /* the route pointing to the post function */
            url: '<?php echo e(url('/appointments/loadappemployee')); ?>',
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: {_token: CSRF_TOKEN,appointment:appointment},
            dataType: 'JSON',
            /* remind that 'data' is the response of the AjaxController */

            success: function (data) {
                $("#appemployees").html(data);
            }
        });

    }


    $('.form-check-input.deductioncheck').click(function(){

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({

            url: '<?php echo e(url('/employees/updatedeductionstatus')); ?>',
            type: 'POST',

            data: {_token: CSRF_TOKEN, employeededuction_id : $(this).val()},
            dataType: 'JSON',

            success: function (data) {

                loadappemployeetable();

            }
        });



    });


    $( ".delbtn" ).click(function() {


        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '<?php echo e(url('/appointments/deleteappemployee')); ?>',
            type: 'POST',
            data: {_token: CSRF_TOKEN,appemployee:$(this).attr('appemployee')},
            dataType: 'JSON',

            success: function (data) {
                $("#appemployees").html(data);
            }
        });

    });
</script><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/tables/appemployees.blade.php ENDPATH**/ ?>