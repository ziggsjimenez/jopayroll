<a class="btn btn-primary" href="<?php echo e(route('appointments.create')); ?>"><i class="fas fa-plus-circle"></i> ADD </a>

<hr/>
<?php echo $__env->make('layouts.inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<table id="appdatatable">
    <thead>
    <tr>
        <th>#</th>
        <th>Description</th>
        <th>Chargeability</th>
        <th>Status</th>

        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr>
            <td><?php echo e($appointment->id); ?></td>
            <td><?php echo e($appointment->description); ?></td>
            <td><?php echo e($appointment->chargeability->name); ?></td>
            <td><?php echo e($appointment->status->name); ?></td>
            <td>

                <a class="btn btn-warning" href="<?php echo e(route('appointments.edit',$appointment->id)); ?>"><i class="fas fa-pen"></i> EDIT</a>
                <a class="btn btn-success" href="<?php echo e(route('appointments.show',$appointment->id)); ?>"><i class="fas fa-search"></i> VIEW</a>

            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/tables/appointments.blade.php ENDPATH**/ ?>