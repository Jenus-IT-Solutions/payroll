@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Employees</h1>
@stop

@section('content')

    <div class="box box-default">
        <div class="col-md-12 margin">
            @can('create employees')
                <a class="btn btn-sm btn-success" href="{{ route('employees.create') }}"><i class="fa fa-plus"></i>&nbsp; New Employee</a>
            @endcan
        </div>
        <div class="box-body">
            <div class="col-md-12">
                    @include('layouts.error-and-messages')
                    @if(Auth::check())
                        <!-- Table -->
                        @if(sizeof($employees) > 0)
                        <table class="table table-sm table-transparent table-hover">
                            <tr>
                                <th>Employee ID</th>
                                <th>Name</th>
                            </tr>
                            @foreach($employees as $key => $employee)
                                <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>{{ $employee->name }}</td>
                                </tr>
                            @endforeach
                            <tr>
                            </tr>
                        </table>
                        @else
                        <div class="bg-warning pad">No employees</div>
                        @endif
                    @endif
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop



@section('js')