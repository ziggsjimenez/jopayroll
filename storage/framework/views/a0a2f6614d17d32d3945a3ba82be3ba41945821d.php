<table id="employeetable">
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
                <a class="btn btn-primary" href="<?php echo e(url('/appointments/'.$appointment_id.'/'.$employee->id.'/addemployee')); ?>"><i class="fas fa-plus-circle"></i>ADD</a>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/tables/employees.blade.php ENDPATH**/ ?>