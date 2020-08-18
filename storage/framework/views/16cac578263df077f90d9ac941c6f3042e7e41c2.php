<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payslip - <?php echo e($payroll->description); ?></title>

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
            width: 300px;
        }

        tr, td {
            width: 100%;
        }

        .office {
            padding: 5px;
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
            padding-top: 0px;
        }

        .title {
            padding-top: 0px;
            font-weight: bolder;
        }

        .deductionitem {
            padding-right: 10px;
        }

        .empname {
            text-decoration: underline;
            font-weight: bolder;
            text-transform: uppercase;
        }

        .tabletd{
            width: 100%;
            padding:30px;
        }


    </style>

</head>
<body>


<?php $countpayrollitem=1; ?>
<table>
<?php $__currentLoopData = $payroll->payrollitems->sortByDesc('rate'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payrollitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php if($countpayrollitem==1): ?>
        <tr>
            <?php endif; ?>

            <td class="tabletd">
                <?php echo $__env->make('tables.payslips_edited', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </td>

            <?php if($countpayrollitem==3): ?>
        </tr>
        <?php
            $countpayrollitem=0;
        ?>
    <?php endif; ?>

    <?php $countpayrollitem++;?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
</body>
</html>




<?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/payrolls/printpayslips.blade.php ENDPATH**/ ?>