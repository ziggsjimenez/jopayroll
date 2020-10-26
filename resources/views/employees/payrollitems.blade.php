@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Employees Index'])
@endsection

@section('customCss')

    @include('layouts.css.datables')

@endsection

@section('content')


    <a class="btn btn-primary" href="{{route('employees.index')}}"><i class="fas fa-plus-circle"></i> ADD </a>

    <hr/>

    @include('layouts.inc.messages')

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Payrolls</th>
            <th>No. of Days</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)

            <tr>
                <td>{{$employee->fullname()}}</td>
                <td>
                    Days: Payroll Id, Payroll Description, Chargeability, Payroll Period
                    <ul>
                        <?php $count=0;?>
                    @foreach($employee->payrollitems as $payrollitem)

                        @if($payrollitem->payroll->deleted==0)

                        <li>{{$payrollitem->days}}: {{$payrollitem->payroll->id}}, {{$payrollitem->payroll->description}}, {{$payrollitem->payroll->chargeability->name}}, {{$payrollitem->payroll->datefrom->format('m d Y')}}-{{$payrollitem->payroll->dateto->format('m d Y')}}</li>

                                    <?php
                                    $count += $payrollitem->days;
                                    ?>

                            @endif
                        @endforeach

                    </ul>


                </td>
                <td>
                    TOTAL = {{$count}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>




@endsection

@section('customScripts')

    @include('layouts.js.datables')

    <script src="{{asset('public/js/bootstrap.bundle.js')}}"></script>

    <script>

        $(document).ready(function() {


        } );

    </script>
@endsection
