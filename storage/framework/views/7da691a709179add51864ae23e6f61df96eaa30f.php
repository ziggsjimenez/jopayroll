<!DOCTYPE html>
<html>

<head>
    <title>PRINT - <?php echo e($payroll->description); ?></title>

    <script src="<?php echo e(asset('public/js/app.js')); ?>"></script>

    <script src="<?php echo e(asset('public/fontawesome/js/all.js')); ?>"></script>



    <link href="<?php echo e(asset('public/fontawesome/css/all.css')); ?>" rel="stylesheet">

    <style>

        /* Styles go here */

        .page-header, .page-header-space {
            height: 130px;
        }

        .page-footer, .page-footer-space {
            height: 230px;

        }

        .page-footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            border-top: 1px solid black; /* for demo */
            background: white; /* for demo */
        }

        .page-header {
            position: fixed;
            top: 0mm;
            width: 100%;
            border-bottom: 1px solid black; /* for demo */
            background: white; /* for demo */
        }

        .page {
            page-break-after: always;
        }

        @page  {
            margin: 20mm
        }

        @media  print {
            thead {display: table-header-group;}
            tfoot {display: table-footer-group;}

            button {display: none;}

            body {margin: 20px;}
        }

        table, tr, td {
            border-collapse: collapse;
        }

        td{

            font-family: Arial;
            font-size: 10px;
            text-align: left;
            text-transform: uppercase;
            height: 15px;
        }

        withborder {
            border: solid 1px black;
        }

        .center{
            text-align: center;
        }

        .right{
            text-align: right;
        }

        .bolder{
            font-weight: bolder;
        }
        .page-footer{

            font-size: 10px;
        }

        img{
            position:absolute;
            width:80px;
            top:15px;
            left:150px;
        }

        .number{

            font-size:14px;
        }

    </style>
</head>



<body>



<div class="page-header">
    <img src="<?php echo e(asset('public/storage/seal1917.png')); ?>">

    <div class="center">
        <?php echo $__env->make('payrolls.print.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
    <br/>

</div>

<div class="page-footer">
    <?php echo $__env->make('payrolls.print.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<table>

    <thead>
    <tr>
        <td>
            <!--place holder for the fixed-position header-->
            <div class="page-header-space"></div>
        </td>
    </tr>
    </thead>

    <tbody>
    <tr>
        <td>
            <!--*** CONTENT GOES HERE ***-->


            <div class="page">

<?php echo $__env->make('payrolls.print.body_dec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




            </div>

        </td>
    </tr>
    </tbody>

    <tfoot>
    <tr>
        <td>
            <!--place holder for the fixed-position footer-->
            <div class="page-footer-space"></div>
        </td>
    </tr>
    </tfoot>

</table>
<script src="<?php echo e(asset('public/js/jquery.js')); ?>"></script>
<script>
    $(document).ready(function() {

        $( ".daymark" ).click(function() {

            if ($(this).html()=="")
                $(this).html('<i class="fas fa-times"></i>');
            else
                $(this).html("");

        });

        $( "#btntest" ).click(function() {


            if ($(this).html()=="")
                $(this).html('<i class="fas fa-times"></i>');
            else
                $(this).html("");

        });

    } );
</script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\jopayroll\resources\views/payrolls/printpayroll.blade.php ENDPATH**/ ?>