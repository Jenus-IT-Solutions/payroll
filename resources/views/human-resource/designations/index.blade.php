@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Employees</h1>
@stop

@section('content')
    <div class="">
        <div class="col-md-12">
            @can('create employees')
                <a class="btn btn-success" href="{{ route('employees.create') }}">Add New Employee</a>
            @endcan
        </div>
    </div>
        <hr>
    <div class="">
        <div class="col-md-12">
            {{-- <div class="panel panel-success table-responsive"> --}}
                {{-- <div class="panel-heading">Employees</div> --}}
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
            {{-- </div> --}}
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop



@section('js')