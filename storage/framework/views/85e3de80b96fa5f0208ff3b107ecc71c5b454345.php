<table class="table table-bordered" style="font-size:80%">
    <thead>
    <tr>
        <th rowspan="2">#</th>
        <th rowspan="2">Name</th>
        <th rowspan="2">Rate (Php)</th>
        <th rowspan="2">No. of days</th>
        <th colspan="<?php echo e(count($deductionitems)); ?>">Deductions</th>
        <th colspan="<?php echo e(count($refundtypes)); ?>">Refunds</th>
        <th rowspan="2">Action</th>
    </tr>
    <tr>
        <?php $__currentLoopData = $deductionitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deductionitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <th><?php echo e($deductionitem->name); ?></th>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <?php $__currentLoopData = $refundtypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $refundtype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <th><?php echo e($refundtype->title); ?></th>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tr>
    </thead>
    <tbody>

    <?php $counter=1; ?>
    <?php $__currentLoopData = $payroll->payrollitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payrollitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $fullname = "<span class=\"number\">".$payrollitem->employee->lastname."</span>".', '.$payrollitem->employee->firstname.' '.$payrollitem->employee->middlename.' '.$payrollitem->employee->extname;
        ?>

        <tr>
            <td><a href="<?php echo e(route('payrollitems.show',$payrollitem->id)); ?>"><?php echo e($counter++); ?></a></td>
            <td><?php echo $fullname; ?></td>
            <td class="right"><?php echo e(number_format($payrollitem->rate,2,'.',',')); ?></td>
            <td class="right">
                <input class="dayscontent" payrollitem_id="<?php echo e($payrollitem->id); ?>" style="width:80px;" type="text" value="<?php echo e($payrollitem->days); ?>" >
            </td>

            <?php $__currentLoopData = $deductionitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deductionitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php $__currentLoopData = $payrollitem->employee->deductions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employeededuction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if($employeededuction->deductionitem_id == $deductionitem->id): ?>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input deductioncheck" id="inlineCheckbox<?php echo e($employeededuction->id); ?>" type="checkbox" value="<?php echo e($employeededuction->id); ?>" <?php if($employeededuction->status=="Active"): ?> checked <?php endif; ?>>
                            <label class="form-check-label" for="inlineCheckbox<?php echo e($employeededuction->id); ?>"><?php echo e($employeededuction->deductionitem->name); ?></label>
                        </div>
                        <br/>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input deductionamount" employeedeductionid = "<?php echo e($employeededuction->id); ?>" id="amountinput<?php echo e($employeededuction->id); ?>"  maxlength="6" size="6" type="text" <?php if($employeededuction->status=="Active"): ?> enabled value="<?php echo e($employeededuction->amount); ?>"  <?php else: ?> disabled <?php endif; ?>>
                        </div>

                    </td>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            <?php $__currentLoopData = $refundtypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $refundtype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td>


                            <?php if($payrollitem->getRefundAmount($payrollitem->id,$refundtype->id)==null): ?>

                                <input class="refundamount" refundtype_id="<?php echo e($refundtype->id); ?>" payrollitem_id="<?php echo e($payrollitem->id); ?>" style="width:50px;" type="text">

                            <?php else: ?>

                                <input class="refundamount" refundtype_id="<?php echo e($refundtype->id); ?>" payrollitem_id="<?php echo e($payrollitem->id); ?>" style="width:50px;" type="text" value="<?php echo e($payrollitem->getRefundAmount($payrollitem->id,$refundtype->id)->amount); ?>">

                                <?php endif; ?>

                        </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <td><button payrollitem="<?php echo e($payrollitem->id); ?>"class="delbtn btn btn-warning">DEL</button></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<script>

    function loadappemployeetable(){

        var payroll = '<?php echo e($payroll->id); ?>';

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            /* the route pointing to the post function */
            url: '<?php echo e(url('/payrolls/loadappemployee')); ?>',
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: {_token: CSRF_TOKEN,payroll:payroll},
            dataType: 'JSON',
            /* remind that 'data' is the response of the AjaxController */

            success: function (data) {
                $("#payrollitems").html(data);
            }
        });

    }

    $( ".delbtn" ).click(function() {


        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({

            url: '<?php echo e(url('/payrolls/deleteappemployee')); ?>',
            type: 'POST',

            data: {_token: CSRF_TOKEN,payrollitem:$(this).attr('payrollitem')},
            dataType: 'JSON',


            success: function (data) {
                $("#payrollitems").html(data);
            }
        });
    });

    $('.deductioncheck').click(function(){

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({

            url: '<?php echo e(url('/employees/updatedeductionstatus')); ?>',
            type: 'POST',

            data: {_token: CSRF_TOKEN, employeededuction_id : $(this).val()},
            dataType: 'JSON',

            success: function (data) {
                loadappemployeetable();
//                location.reload();

            }
        });

    });

    $('.refundcheck').click(function(){

        alert($('.refundcheck').val());

    });


    $('.deductionamount')
        .bind('keyup', function() {

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({

                url: '<?php echo e(url('/payrolls/updatedeductionamount')); ?>',
                type: 'POST',

                data: {_token: CSRF_TOKEN,employeedeductionid:$(this).attr('employeedeductionid'),amount:$(this).val()},
                dataType: 'JSON',

                success: function (data) {

                    console.log(data);
//                    $("#payrollitems").html(data);
                }
            });


        })


$('.dayscontent')
        .bind('keyup', function() {

//            alert();

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({

                url: '<?php echo e(route('payrollitems.updatenumdays')); ?>',
                type: 'POST',

                data: {_token: CSRF_TOKEN,payrollitem_id:$(this).attr('payrollitem_id'),days:$(this).val()},
                dataType: 'JSON',

                success: function (data) {

                    console.log(data);
//                    $("#payrollitems").html(data);
                }
            });


        })


    $('.refundamount')
        .bind('keyup', function() {



            var payrollitem_id = $(this).attr('payrollitem_id');
            var refundtype_id = $(this).attr('refundtype_id');
            var amount = $(this).val();


            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({

                url: '<?php echo e(url('/payrolls/updaterefundamount')); ?>',
                type: 'POST',

                data: {_token: CSRF_TOKEN,payrollitem_id:payrollitem_id,refundtype_id:refundtype_id,amount:amount},
                dataType: 'JSON',

                success: function (data) {

                    console.log(data);

                }
            });





        })

</script>
<?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/tables/payrollitems.blade.php ENDPATH**/ ?>