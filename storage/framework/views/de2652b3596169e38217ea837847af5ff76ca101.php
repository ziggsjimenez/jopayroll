

<?php $__env->startSection('customTitle'); ?>
    <?php echo $__env->make('layouts.inc.title',['title'=>'Reports - Employee Deduction'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customCss'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<h2>Employee Deduciton </h2>

    <form class="form">
        <div class="form-group">
        <input class="form-control" type="text" id="employeename" name="employeename" placeholder="Search employee..."/>
        </div>
    </form>

    <div class="row">
        <div class="col">
            
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('customScripts'); ?>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/reports/employeededuction.blade.php ENDPATH**/ ?>