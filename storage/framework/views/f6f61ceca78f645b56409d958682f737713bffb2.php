<a class="btn btn-primary" href="<?php echo e(route('payrolls.create')); ?>"><i class="fas fa-plus-circle"></i> ADD </a>

<hr/>

<table id="datatable" class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Reference Number</th>
        <th>Description</th>
        <th>Chargeability</th>
        <th>Status</th>
        <th>From</th>
        <th>To</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>

    <?php $count=1; ?>
    <?php $__currentLoopData = $payrolls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payroll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr>
            <td><?php echo e($count++); ?></td>
            <td><?php echo e($payroll->refnum); ?></td>
            <td style="width: 300px;"><?php echo e($payroll->description); ?></td>
            <td style="width: 300px;"><?php echo e($payroll->chargeability->name); ?></td>
            <td><?php echo e($payroll->status->name); ?></td>
            <td><?php echo e($payroll->datefrom->format('M d, Y')); ?></td>
            <td><?php echo e($payroll->dateto->format('M d, Y')); ?></td>
            <td>
                <form style="display:inline-block" class="form form-inline" action="<?php echo e(route('payrolls.copypayroll')); ?>" method="post" >
                    <?php echo csrf_field(); ?>
                    <input name="payroll_id" type="hidden" value="<?php echo e($payroll->id); ?>"/>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-copy"></i> COPY </button>

                </form>



                <a class="btn btn-warning" href="<?php echo e(route('payrolls.edit',$payroll->id)); ?>"><i class="fas fa-pen"></i> EDIT</a>
                <a class="btn btn-success" href="<?php echo e(route('payrolls.show',$payroll->id)); ?>"><i class="fas fa-search"></i> VIEW</a>

                <?php if($payroll->status_id!=2): ?>

                    <form style="display:inline-block"  class="form form-inline" action="<?php echo e(route('payrolls.destroy',['payroll'=>$payroll->id])); ?>" method="post" >
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i> DELETE</button>
                    </form>

                <?php endif; ?>



            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/tables/payroll.blade.php ENDPATH**/ ?>