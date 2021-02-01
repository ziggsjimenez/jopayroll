@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Payrolls Index'])
@endsection

@section('customCss')

    @include('layouts.css.datables')

@endsection

@section('content')

    <table class="table table-bordered">
        <thead>
        <tr>
            <th rowspan="2">Payroll</th>
            <th rowspan="2">Refnum</th>
            <th rowspan="2">Date Prepared</th>
            <th rowspan="2">Period Covered</th>
            <th colspan="{{count($deductionitems)}}">Deductions</th>
        </tr>
        <tr>
            @foreach($deductionitems as $deductionitem)
                <th>{{$deductionitem->name}}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($payrolls as $payroll)
            <tr>
                <td>{{$payroll->description}}</td>
                <td>{{$payroll->refnum}}</td>
                <td>{{$payroll->created_at->format('F d, Y')}}</td>
                <td>{{$payroll->datefrom->format('F d, Y')}} - {{$payroll->dateto->format('F d, Y')}}</td>
                @foreach($deductionitems as $deductionitem)
                    <td>{{$payroll->totaldeduction($deductionitem->id)}}</td>
                    @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>


@endsection

@section('customScripts')


@endsection




