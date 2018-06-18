@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create a Designation</h1>
@stop

@section('content')

<div class="box box-default">    
    <div class="box-body">
        @include('layouts.error-and-messages')
        <form method="post" action="{{ route('employees.store') }}">
            @csrf
            <div class="row form-group">
                <div class="col-md-4">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" class="form-control" name="first_name">
                </div>
                <div class="col-md-4">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" id="middle_name" class="form-control" name="middle_name">
                </div>
                <div class="col-md-4">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" class="form-control" name="last_name">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6">
                    <label for="emp_id">Employee ID</label>
                    <div class="input-group date" data-provide="datepicker">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                        <input type="text" name="date_hire" id="date_hire" class="form-control">
                    </div>
                    {{-- <input type="text" id="emp_id" class="form-control" name="emp_id"> --}}
                </div>

                <div class="col-md-6">
                    <label for="email">Email</label>
                    <input type="text" id="email" class="form-control" name="email">
                </div>
            </div>
            <div class="form-group">
                <label for="date_hire">Date of Hire</label>
                <input type="text" id="date_hire" class="form-control" name="date_hire">
            </div>


            <div class="form-group">
                <label for="department">Department</label>
                <select name="department" id="department" class="form-control">
                    <option value="">Select Department</option>
                @foreach(\App\Models\HumanResource\Departments::all() as $key => $department)
                    <option value="{{ $department->id }}">{{ $department->title }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="designation">Designation</label>
                <select name="designation" id="designation" class="form-control">
                    <option value="">Select Designation</option>
                @foreach(\App\Models\HumanResource\Designations::all() as $key => $designation)
                    <option value="{{ $designation->id }}">{{ $designation->title }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                    <label for="emp_id">Employee ID</label>
                    <input type="text" id="emp_id" class="form-control" name="emp_id">
                </div>
            <div class="form-group" style="margin-top:30px">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/jquery-ui.min.css">
    <link rel="stylesheet" href="/css/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="/css/jquery-ui.theme.min.css">
@stop



@section('js')
    <script src="/js/jquery-ui.min.js"></script>
    <script>
        jQuery('#date_hire').datepicker();
    </script>
@stop   