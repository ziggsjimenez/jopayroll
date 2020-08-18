<?php

$todate= strtotime($payroll->dateto);
$fromdate= strtotime($payroll->datefrom);
$calculate_seconds = $todate- $fromdate; // Number of seconds between the two dates
$days = floor($calculate_seconds / (24 * 60 * 60 )); // convert to days
$days = $days + 1;

?>

<table style="border: solid 1px black">
    <thead>
    <tr style="border: solid 1px black">
        <th class="center"rowspan="2" style="border: solid 1px black">#</th>
        <th class="center"rowspan="2" style="border: solid 1px black;width:150px;">Name</th>
        <th class="center"rowspan="2" style="border: solid 1px black">Designation</th>
        <th class="center" colspan="<?php echo e($days); ?>" style="border: solid 1px black">TIMEROLL</th>
        <th class="center"rowspan="2" style="border: solid 1px black;width:15px;">No. of days</th>
        <th class="center"rowspan="2" style="border: solid 1px black;width:25px;">Rate (Php)</th>
        <th class="center"rowspan="2" style="border: solid 1px black;width:50px;">TOTAL AMOUNT</th>
        <th class="center"colspan="<?php echo e(count($deductionitems)); ?>" style="border: solid 1px black">DEDUCTIONS</th>
        <th class="center"rowspan="2" style="border: solid 1px black;width:50px;">TOTAL DEDUCTIONS</th>
        <th class="center"rowspan="2" style="border: solid 1px black;width:80px;">NET AMOUNT</th>
        <th class="center"rowspan="2" style="border: solid 1px black">#</th>
        <th class="center"rowspan="2" style="border: solid 1px black;width:150px;">SIGNATURE</th>
    </tr>

    <tr style="border: solid 1px black">
        <?php $date = $payroll->datefrom; $count=1 ?>
        <?php for($i = 1; $i <= $days; $i++): ?>
            <th style="border: solid 1px black" class="center" <?php if($date->format('D')=='Sat' || $date->format('D')=='Sun' ): ?> style="background-color: grey"<?php endif; ?>>

                <?php echo e($date->format('d')); ?>


            </th>
            <?php
            $date = $payroll->datefrom;
            $date = $date->addDays($i);
            ?>
        <?php endfor; ?>

        <?php $__currentLoopData = $deductionitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deductionitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <th style="border: solid 1px black" class="center"><?php echo e($deductionitem->name); ?></th>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tr>

    </thead>

    
    <tbody>

    <?php $totalamount=0; $grandtotaldeduction = 0; $totalnetamount = 0; $countemp=1;?>

    <?php $__currentLoopData = $payroll->payrollemployees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payrollitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr style="border: solid 1px black">

            <td style="border: solid 1px black"><?php echo e($countemp); ?></td>
            <td style="border: solid 1px black"><?php echo e($payrollitem->fullname()); ?></td>

            <td style="border: solid 1px black"><?php echo e($payrollitem->appemployee->designation); ?></td>

            <?php $date = $payroll->datefrom; $count=1 ?>

            <?php for($i = 1; $i <= $days; $i++): ?>

                <td  class="daymark center" style="border: solid 1px black" <?php if($date->format('D')=='Sat' || $date->format('D')=='Sun' ): ?> style="background-color: grey"<?php endif; ?>>

                    <?php if($date->format('D')=='Sat' || $date->format('D')=='Sun' ): ?>

                    <?php else: ?>
                        <?php if($count<=$payrollitem->payrollitem($payroll->id)->days): ?>
                            
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

            <?php $subtotalamount = $payrollitem->payrollitem($payroll->id)->rate*$payrollitem->payrollitem($payroll->id)->days; $subtotaldeduction=0; $totaldeduction=0;  ?>

            <td  style="border: solid 1px black" class="center"><?php echo e(number_format($payrollitem->payrollitem($payroll->id)->days,0,'.',',')); ?></td>

            <td style="border: solid 1px black" class="right"><?php echo e(number_format($payrollitem->payrollitem($payroll->id)->rate,2,'.',',')); ?></td>

            <td style="border: solid 1px black" class="right"><?php echo e(number_format($subtotalamount,2,'.',',')); ?></td>

            <?php $__currentLoopData = $deductionitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deductionitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php $subtotaldeduction=$payrollitem->payrollitem($payroll->id)->deductions->where('deductionitem_id','=',$deductionitem->id)->first()['amount'];?>

                <td style="border: solid 1px black" class="right"><?php echo e($subtotaldeduction); ?></td>

                <?php $totaldeduction+=$subtotaldeduction; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <td style="border: solid 1px black" class="right">

                <?php echo e(number_format($totaldeduction,2,'.',',')); ?>


            </td>

            <td style="border: solid 1px black" class="right"><?php echo e(number_format(($subtotalamount)-$totaldeduction,2,'.',',')); ?></td>
            <td style="border: solid 1px black"><?php echo e($countemp++); ?></td>
            <td></td>

            <?php $totalamount+=$subtotalamount;
            $grandtotaldeduction+=$totaldeduction; ?>

        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <tr style="border: solid 1px black" >
        <td colspan="<?php echo e($days+5); ?>" class="center bolder" style="border: solid 1px black" >TOTAL</td>

        
        
        
        

        <td style="border: solid 1px black"  class="right bolder"><?php echo e(number_format($totalamount,2,'.',',')); ?></td>
        <?php $__currentLoopData = $deductionitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deductionitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if($payroll->totaldeduction($deductionitem->id)==0): ?>
                <td style="border: solid 1px black"  class="right bolder">-</td>
            <?php else: ?>
                <td style="border: solid 1px black"  class="right bolder"><?php echo e(number_format($payroll->totaldeduction($deductionitem->id),2,'.',',')); ?></td>
            <?php endif; ?>

            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <td style="border: solid 1px black"  class="right bolder"><?php echo e(number_format($grandtotaldeduction,2,'.',',')); ?></td>
        <td style="border: solid 1px black"  class="right bolder"><?php echo e(number_format($totalamount-$grandtotaldeduction,2,'.',',')); ?></td>
        <td style="border: solid 1px black"  class="right bolder"></td>
        <td style="border: solid 1px black"  class="right bolder"></td>
    </tr>

    </tbody>
</table><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/payrolls/print/body.blade.php ENDPATH**/ ?>