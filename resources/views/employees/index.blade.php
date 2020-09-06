@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Employees Index'])
@endsection

@section('customCss')

    @include('layouts.css.datables')

@endsection

@section('content')


        <a class="btn btn-primary" href="{{route('employees.create')}}"><i class="fas fa-plus-circle"></i> ADD </a>

        <hr/>

        @include('layouts.inc.messages')

        @include('employees.tables.employees')


@endsection

@section('customScripts')

    @include('layouts.js.datables')

    <script src="{{asset('public/js/bootstrap.bundle.js')}}"></script>

    <script>

        $(document).ready(function() {

            $('#datatable').DataTable();

            $('.alert').alert();

            $('.deductioncheck').click(function(){

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({

                    url: '{{url('/employees/updatedeductionstatus')}}',
                    type: 'POST',

                    data: {_token: CSRF_TOKEN, employeededuction_id : $(this).val()},
                    dataType: 'JSON',

                    success: function (data) {

                        location.reload();

                    }
                });

            });

        } );

    </script>
@endsection
