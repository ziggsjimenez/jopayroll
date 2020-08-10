
<?php if(session('success')): ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(session('success')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php endif; ?>

<?php if(session('error')): ?>

    <div class="alert alert-danger">
        <?php echo e(session('error')); ?>

    </div>

<?php endif; ?><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/layouts/inc/messages.blade.php ENDPATH**/ ?>