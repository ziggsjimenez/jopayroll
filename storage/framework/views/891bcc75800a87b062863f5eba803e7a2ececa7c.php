

<?php $__env->startSection('customTitle'); ?>
    <?php echo $__env->make('layouts.inc.title',['title'=>'Payrolls Index'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customCss'); ?>

    <?php echo $__env->make('layouts.css.datables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>




    <a class="btn btn-primary" href="<?php echo e(route('payrolls.index')); ?>"><i class="fas fa-arrow-alt-circle-left"></i> BACK</a>
    <a class="btn btn-warning" href="<?php echo e(route('payrolls.edit',$payroll->id)); ?>"><i class="fas fa-pen"></i> EDIT</a>

    <hr/>

    <table class="table table-bordered" style="font-size:80%">
        <thead>
        <tr>
            <th>#</th>
            <th>Reference Number</th>
            <th>Description</th>
            <th>Chargeability</th>
            <th>Status</th>
            <th>From</th>
            <th>To</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo e($payroll->id); ?></td>
            <td><?php echo e($payroll->refnum); ?></td>
            <td><?php echo e($payroll->description); ?></td>
            <td><?php echo e($payroll->chargeability->name); ?></td>
            <td><?php echo e($payroll->status->name); ?></td>
            <td><?php echo e($payroll->datefrom); ?></td>
            <td><?php echo e($payroll->dateto); ?></td>
        </tr>
        </tbody>
    </table>

    <?php echo $__env->make('layouts.inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">

        <div class="col-3">

            <div class="card">
                <div class="card-header">
                    EMPLOYEES
                </div>
                <div class="card-body">
                    <table id="employeetable" style="font-size:80%">
                        <thead>
                        <tr>
                            <th>ID</th>
                           <th>Name</th>
			    <th>Mo. Rate</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count=1;?>

                        <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php $__currentLoopData = $appointment->appemployees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appemployee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($count++); ?></td>
                                <td><?php echo e($appemployee->employee->fullname()); ?></td>
				<td><?php echo e($appemployee->monthlyrate); ?></td>
                                <td>
                                    <button class="addbtn btn btn-primary" payroll='<?php echo e($payroll->id); ?>' employee='<?php echo e($appemployee->employee->id); ?>'>Add</button>
                                </td>
                            </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
            </div>


            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">No. of days</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mx-3">
                            <div class="md-form mb-5">
                                <i class="fas fa-user prefix grey-text"></i>
                                <input type="number" id="days" name="days" class="form-control validate">
                                <label data-error="wrong" data-success="right" for="rate">in decimal format</label>
                            </div>

                            <input type="hidden" name="payroll_id" id="payroll_id"/>
                            <input type="hidden" name="employee_id" id="employee_id"/>

                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button id="btnsend" class="btn btn-unique">Submit <i class="fas fa-check-circle ml-1"></i></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col">

            <div class="card">
                <div class="card-header">
                    PAYROLL ITEMS
                </div>
                <div class="card-body">
                    <div id="payrollitems"></div>
                </div>
            </div>

            <a class="btn btn-primary" target="_blank" href="<?php echo e(route('payrolls.preview',$payroll->id)); ?>">PREVIEW</a>
            <a class="btn btn-primary" target="_blank" href="<?php echo e(route('payrolls.printobr',$payroll->id)); ?>">OBR</a>
            <a class="btn btn-primary" target="_blank" href="<?php echo e(route('payrolls.printpayslips',$payroll->id)); ?>">PRINT PAYSLIP</a>
            <a class="btn btn-primary" target="_blank" href="<?php echo e(route('payrolls.sendpayslips',$payroll->id)); ?>">EMAIL PAYSLIP</a>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('customScripts'); ?>

    <?php echo $__env->make('layouts.js.datables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset('public/js/bootstrap.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/sweetalert.min.js')); ?>"></script>

    <script>

        $(document).ready(function() {

            function loadappemployeetable(){

                var payroll = '<?php echo e($payroll->id); ?>';

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    /* the route pointing to the post function */
                    url: '<?php echo e(url('/payrolls/loadappemployee')); ?>',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN,payroll:payroll},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */

                    success: function (data) {
                        $("#payrollitems").html(data);
                    }
                });


            }

            loadappemployeetable();


            $('#employeetable').DataTable();


            $(document).on('click', '.addbtn', function(){

                $("#payroll_id").val($(this).attr('payroll'));
                $("#employee_id").val($(this).attr('employee'));
                $("#myModal").modal();
            });

            $( "#btnsend" ).click(function() {

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $("#myModal").modal('hide');

                $.ajax({

                    url: '<?php echo e(url('/payrolls/addemployee')); ?>',
                    type: 'POST',

                    data: {_token: CSRF_TOKEN, days:$("#days").val(),payroll:$("#payroll_id").val(),employee:$("#employee_id").val()},
                    dataType: 'JSON',

                    success: function (data) {

                        if((data['error'])){
                            alert(data['error']);
                        }

                        if((data['msg'])){
                            console.log(data['msg']);
                        }

                        loadappemployeetable();

                    }
                });


            });

        } );

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/payrolls/show.blade.php ENDPATH**/ ?>