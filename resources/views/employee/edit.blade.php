@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-header">
                    Form edit employee
                </div>
                <div class="card-body">
                    <form action="{{ url('employee/update') }}/{{ $employee->id }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="fullname">Fullname</label>
                            <input type="text" class="form-control" name="fullname" value="{{ $employee->fullname }}">
                        </div>
                        <div class="form-group">
                            <label for="company">company</label>
                            <select name="company_id" class="form-control">
                                @foreach($companies as $company)
                                <option value="{{ $company->id }}" {{ $company->name == $employee->company->name ? 'selected' : '' }}>{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ $employee->email }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ $employee->phone }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection