

<?php $__env->startSection('customTitle'); ?>
    <?php echo $__env->make('layouts.inc.title',['title'=>'Preview'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customCss'); ?>

    <?php echo $__env->make('layouts.css.datables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <style>
        table, tr,td,th{
        border: solid 1px black;
        }

        .noborder{
            border: none;
        }

        .center{
            text-align:center;
        }

        .bolder{
            font-weight: bolder;
        }

        #header{
            width:100%;
        }

        .joborder{
            width: 30%;
            font-size:17px;
            font-weight: bolder;
        }

        @media  print{@page  {size: landscape}}

    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <a class="btn btn-primary" href="<?php echo e(route('payrolls.show',$payroll->id)); ?>"><i class="fas fa-arrow-alt-circle-left"></i> BACK</a>


    <hr/>




    <table class="noborder" id="header">
        <thead>
        <tr class="noborder">
            <th colspan="3" class="noborder center">     <br/>Republic of the Philippines<br/>
                Province of Bukidnon<br/>
                <strong>MUNICIPALITY OF MANOLO FORTICH</strong><br/>

                <h2>TIMEBOOK AND PAYROLL</h2>
                <br/></th>
        </tr>
        </thead>
        <tbody>
        <tr class="noborder">
            <td class="noborder joborder">JOB ORDER</td>
            <td class="noborder"style="width: 40%;"><?php echo e($payroll->description); ?></td>
            <td class="noborder"style="width: 30%;">For the Period: <?php echo e($payroll->datefrom->format('F d, Y')); ?> - <?php echo e($payroll->dateto->format('F d, Y')); ?></td>
        </tr>
        </tbody>
    </table>




    <?php

    $todate= strtotime($payroll->dateto);
    $fromdate= strtotime($payroll->datefrom);
    $calculate_seconds = $todate- $fromdate; // Number of seconds between the two dates
    $days = floor($calculate_seconds / (24 * 60 * 60 )); // convert to days
   $days = $days + 1;

            ?>

    <table class="table-bordered">
        <thead>
        <tr>
            <th class="center"rowspan="2">#</th>
            <th class="center"rowspan="2">Name</th>
            <th class="center"rowspan="2">Designation</th>
            <th class="center" colspan="<?php echo e($days); ?>">TIMEROLL</th>
            <th class="center"rowspan="2">No. of days</th>
            <th class="center"rowspan="2">Rate (Php)</th>
            <th class="center"rowspan="2">TOTAL AMOUNT</th>
            <th class="center"colspan="<?php echo e(count($deductionitems)); ?>">DEDUCTIONS</th>
            <th class="center"rowspan="2">TOTAL DEDUCTIONS</th>
            <th class="center"rowspan="2">NET AMOUNT</th>
        </tr>

        <tr>
            <?php $date = $payroll->datefrom; $count=1 ?>
            <?php for($i = 1; $i <= $days; $i++): ?>
                <th class="center" <?php if($date->format('D')=='Sat' || $date->format('D')=='Sun' ): ?> style="background-color: grey"<?php endif; ?>>

                    <?php echo e($date->format('M d')); ?>


                </th>
                <?php
                $date = $payroll->datefrom;
                $date = $date->addDays($i);
                ?>
            <?php endfor; ?>

            <?php $__currentLoopData = $deductionitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deductionitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th class="center"><?php echo e($deductionitem->name); ?></th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>

        </thead>

        
        <tbody>

        <?php $totalamount=0; $grandtotaldeduction = 0; $totalnetamount = 0; $countemp=1;?>

        <?php $__currentLoopData = $payroll->payrollitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payrollitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>

                <td><?php echo e($countemp++); ?></td>
                <td><?php echo e($payrollitem->employee->fullname()); ?></td>

                <td><?php echo e($payrollitem->employee->appemployee->position); ?></td>

                <?php $date = $payroll->datefrom; $count=1 ?>

                <?php for($i = 1; $i <= $days; $i++): ?>

                    <td class="center daymark" <?php if($date->format('D')=='Sat' || $date->format('D')=='Sun' ): ?> style="background-color: grey"<?php endif; ?>>

                        <?php if($date->format('D')=='Sat' || $date->format('D')=='Sun' ): ?>

                        <?php else: ?>
                            <?php if($count<=$payrollitem->days): ?>
                                <i class="fas fa-times"></i>
                            <?php endif; ?>
                                <?php $count++; ?>
                        <?php endif; ?>

                    </td>
                    <?php

                    $date = $payroll->datefrom;

                    $date = $date->addDays($i);

                    ?>

                <?php endfor; ?>

                <?php $subtotalamount = $payrollitem->rate*$payrollitem->days; $subtotaldeduction=0; $totaldeduction=0;  ?>

                <td class="right"><?php echo e(number_format($payrollitem->days,2,'.',',')); ?></td>

                <td class="right"><?php echo e(number_format($payrollitem->rate,2,'.',',')); ?></td>

                <td class="right"><?php echo e(number_format($subtotalamount,2,'.',',')); ?></td>

                <?php $__currentLoopData = $deductionitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deductionitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php $subtotaldeduction=$payrollitem->deductions->where('deductionitem_id','=',$deductionitem->id)->first()['amount'];?>

                    <td class="right"><?php echo e($subtotaldeduction); ?></td>

                    <?php $totaldeduction+=$subtotaldeduction; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <td class="right"><?php echo e(number_format($totaldeduction,2,'.',',')); ?></td>

                <td class="right"><?php echo e(number_format(($subtotalamount)-$totaldeduction,2,'.',',')); ?></td>

                <?php $totalamount+=$subtotalamount;
                $grandtotaldeduction+=$totaldeduction; ?>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <?php for($i = 1; $i <= $days; $i++): ?>
                <td>
                </td>
            <?php endfor; ?>
            <td class="right"></td>
            <td class="right"></td>
            <td class="right bolder"><?php echo e(number_format($totalamount,2,'.',',')); ?></td>
            <?php $__currentLoopData = $deductionitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deductionitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="right bolder"><?php echo e(number_format($payroll->totaldeduction($deductionitem->id),2,'.',',')); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <td class="right bolder"><?php echo e(number_format($grandtotaldeduction,2,'.',',')); ?></td>
            <td class="right bolder"><?php echo e(number_format($totalamount-$grandtotaldeduction,2,'.',',')); ?></td>
        </tr>

        </tbody>
    </table>

    <?php echo $__env->make('payrolls.print.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('customScripts'); ?>

<script>
    $(document).ready(function() {

        $( ".daymark" ).click(function() {


            if ($(this).html()=="")
                $(this).html('<i class="fas fa-times"></i>');
            else
                $(this).html("");

        });

    } );
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/payrolls/preview.blade.php ENDPATH**/ ?>