<li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('deductionitems.index')); ?>"><?php echo e(__('Deduction Items')); ?></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('chargeabilities.index')); ?>"><?php echo e(__('Chargeability')); ?></a>
</li>


<li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('employees.index')); ?>"><?php echo e(__('Employees')); ?></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('appointments.index')); ?>"><?php echo e(__('Appointments')); ?></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('payrolls.index')); ?>"><?php echo e(__('Payrolls')); ?></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('refundtypes.index')); ?>"><?php echo e(__('Refund Types')); ?></a>
</li>


<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        REPORTS <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="nav-item dropdown-item" href="<?php echo e(route('reports.employeededuction')); ?>"> Employee Deduction </a>
    </div>
</li><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/layouts/inc/nav.blade.php ENDPATH**/ ?>