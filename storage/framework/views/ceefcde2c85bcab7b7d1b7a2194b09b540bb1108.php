

<?php $__env->startSection('customTitle'); ?>
    <?php echo $__env->make('layouts.inc.title',['title'=>'Appointments Index'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customCss'); ?>

    <?php echo $__env->make('layouts.css.datables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <style>
        form .error {
            color: #ff0000;
        }
    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


        <a class="btn btn-primary" href="<?php echo e(route('appointments.index')); ?>"><i class="fas fa-arrow-alt-circle-left"></i> BACK</a>
        <a class="btn btn-warning" href="<?php echo e(route('appointments.edit',$appointment->id)); ?>"><i class="fas fa-pen"></i> EDIT</a>

        <hr/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Description</th>
                <th>Chargeability</th>
                <th>Status</th>
                <th>From</th>
                <th>To</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo e($appointment->id); ?></td>
                    <td><?php echo e($appointment->description); ?></td>
                    <td><?php echo e($appointment->chargeability->name); ?></td>
                    <td><?php echo e($appointment->status->name); ?></td>
                    <td><?php echo e($appointment->datefrom); ?></td>
                    <td><?php echo e($appointment->dateto); ?></td>
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
                        <table id="employeetable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $count=1;?>
                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($count++); ?></td>
                                    <td><?php echo e($employee->fullname()); ?></td>
                                    <td>
                                        
                                        

                                        <button class="addbtn btn btn-primary" appointment='<?php echo e($appointment->id); ?>' employee='<?php echo e($employee->id); ?>'>Add</button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                </div>


                <?php echo $__env->make('appointments.modal.addemployee', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>

            <div class="col">

                <div class="card">
                    <div class="card-header">
                        APPOINTMENT EMPLOYEES
                    </div>
                    <div class="card-body">
                        <div id="appemployees"></div>
                    </div>
                </div>



            </div>
        </div>






<?php $__env->stopSection(); ?>

<?php $__env->startSection('customScripts'); ?>

    <?php echo $__env->make('layouts.js.datables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset('public/js/bootstrap.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/jquery-validation/dist/jquery.validate.js')); ?>"></script>

    <script>

        $(document).ready(function() {


            $(function() {

                // Initialize form validation on the registration form.
                // It has the name attribute "registration"
                $("form[name='modalform']").validate({
                    // Specify validation rules
                    rules: {
                        // The key name on the left side is the name attribute
                        // of an input field. Validation rules are defined
                        // on the right side
                        office_id: "required",
                        designation: "required",
                        monthlyrate: "required",
                        salarygrade: "required",
                        datefrom: "required",
                        dateto: "required",
                    },
                    // Specify validation error messages
                    messages: {
                        office_id: "Office should not be blank. ",
                        designation: "Designation is required. ",
                        monthlyrate: "Monthly rate is required. ",
                        salarygrade: "Salary grade is required. ",
                        datefrom: "Start Date is required. ",
                        dateto: "End Date is required. ",
                    },
                    // Make sure the form is submitted to the destination defined
                    // in the "action" attribute of the form when valid
                    submitHandler: function(form) {
//                        form.submit();

                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                        $.ajax({

                            url: '<?php echo e(url('/appointments/addemployee')); ?>',
                            type: 'POST',

                            data: {_token: CSRF_TOKEN, appointment_id:$('#appointment_id').val(),employee_id:$('#employee_id').val(),office_id:$('#office_id').val(),salarygrade:$('#salarygrade').val(),monthlyrate:$('#monthlyrate').val(),designation:$('#designation').val(),datefrom:$('#datefrom').val(),dateto:$('#dateto').val(),status:$('#status').val(),remarks:$('#remarks').val()},
                            dataType: 'JSON',

                            success: function (data) {
                                    $("#myModal").modal('hide');
//                                    loadappemployeetable();
                                 $("#appemployees").html(data['view']);
                                 alert(data['msg']);
                            }
                        });


                    }
                });
            });


            function loadappemployeetable(){

                var appointment = '<?php echo e($appointment->id); ?>';

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    /* the route pointing to the post function */
                    url: '<?php echo e(url('/appointments/loadappemployee')); ?>',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN,appointment:appointment},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */

                    success: function (data) {

                        $("#appemployees").html(data);


                    }
                });


            }

            loadappemployeetable();


            $('#employeetable').DataTable();


            $(document).on('click', '.addbtn', function(){
	    //$( ".addbtn" ).click(function() {
                $("#appointment_id").val($(this).attr('appointment'));
                $("#employee_id").val($(this).attr('employee'));
                $("#myModal").modal();
            });

            

                

                    

                        
                        

                        
                        

                        
                            
                        
                    


            





        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/appointments/show.blade.php ENDPATH**/ ?>