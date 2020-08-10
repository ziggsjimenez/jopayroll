<table class="noborder" id="header" style="width:100%">
    <thead>
    <tr class="noborder">
        <td colspan="3" class="noborder center">     <br/>Republic of the Philippines<br/>
            Province of Bukidnon<br/>
            <strong>MUNICIPALITY OF MANOLO FORTICH</strong><br/>

            <h2>TIMEBOOK AND PAYROLL</h2>
            <br/>
        </td>
    </tr>

    <tr class="noborder">
        <td class="noborder joborder" style="font-weight: bolder;font-size: 20px; text-decoration: underline">JOB ORDER</td>
        <td class="noborder"style="width: 40%;"><span style="font-weight: bolder;font-size: 16px; text-decoration: underline"><?php echo e($payroll->chargeability->name); ?></span> <br/> Job or project on which labor was performed.</td>
        <td class="noborder"style="width: 30%;">For the Period: <?php echo e($payroll->datefrom->format('F d, Y')); ?> - <?php echo e($payroll->dateto->format('F d, Y')); ?></td>
    </tr>

</table>

<?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/payrolls/print/header.blade.php ENDPATH**/ ?>