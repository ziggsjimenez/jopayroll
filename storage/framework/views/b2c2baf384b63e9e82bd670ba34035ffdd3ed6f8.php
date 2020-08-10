<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payslip - <?php echo e($payrollitem->payroll->description); ?></title>

    <link href="<?php echo e(asset('public/css/app.css')); ?>" rel="stylesheet">
    <style>


        body {
            font-family: Arial;

        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        table {
            width: 400px;
        }

        tr, td {
            width: 100%;
        }

        .office {
            padding: 15px;
            font-size: 20px;
        }

        .bolder {
            font-weight: bolder;
        }

        .item {
            padding-left: 20px;
        }

        .deductiontotal {
            text-align: right;
            font-weight: bolder;

        }

        .amounttotal {
            text-align: right;
            font-weight: bolder;
            padding-top: 20px;
        }

        .title {
            padding-top: 20px;
            font-weight: bolder;
        }

        .deductionitem {
            padding-right: 20px;
        }

        .empname {
            text-decoration: underline;
            font-weight: bolder;
            text-transform: uppercase;
        }

        .tabletd{
            width: 100%;
            padding:20px;
        }


    </style>

</head>
<body>

<table>
    <tr>
        <td style="width: 85px"><img style="width: 80px;" src="<?php echo e(asset('public/storage/seal1917.png')); ?>"></td>
        <td style="padding-left:10px; width:100%;">
            Republic of the Philippines<br/>
            Province of Bukidnon <br/>
            Municipality of Manolo Fortich <br/>
        </td>
    </tr>

</table>



<table style="padding-bottom: 10px">

    <tr>
        <td class="center office bolder"><?php echo e($payrollitem->employee->appemployee->office->name); ?></td>
    </tr>

    <tr>
        <td class="center"><span class="empname"><?php echo e($payrollitem->employee->fullname()); ?></span> <br/>Name of Employee: </td>

    </tr>

</table>


<table>

    <tr>
        <td>Amount accrued for the period</td>
    </tr>
    <tr>
        <td style="padding-left:20px"><?php echo e($payrollitem->payroll->datefrom->format('M j, Y')); ?> - <?php echo e($payrollitem->payroll->dateto->format('M j, Y')); ?></td>
        <td class="right"><?php echo e(number_format($payrollitem->days,0,'.',',')); ?></td>
    </tr>
    <tr>
        <td style="padding-left:20px">Daily Rate</td>

        <td class="right"><?php echo e(number_format($payrollitem->rate,2,'.',',')); ?></td>
    </tr>
    <tr>
        <td class="bolder" style="padding-left:20px">TOTAL AMOUNT DUE</td>

        <td class="deductiontotal"><?php echo e(number_format($payrollitem->totalamountdue(),2,'.',',')); ?></td>
    </tr>

    <tr>
        <td class="title">DEDUCTIONS</td>
    </tr>
    <?php $__currentLoopData = $payrollitem->deductions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deduction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr>
            <td class="item"><?php echo e($deduction->deductionitem->name); ?></td>
            <td class="right deductionitem"><?php echo e(number_format($deduction->amount,2,'.',',')); ?></td>

        </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <tr>
        <td class="title">TOTAL DEDUCTIONS</td>

        <td class="amounttotal"><?php echo e(number_format($payrollitem->totaldeductions(),2,'.',',')); ?></td>
    </tr>

    <tr style="background-color: yellow">
        <td class="title">NET TAKE HOME PAY</td>

        <td class="amounttotal"><?php echo e(number_format($payrollitem->nettakehomepay(),2,'.',',')); ?></td>
    </tr>
</table>

</body>
</html>




<?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/pdf/payslip.blade.php ENDPATH**/ ?>