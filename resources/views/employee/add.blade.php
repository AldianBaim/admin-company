@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
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
                    Form add employee
                </div>
                <div class="card-body">
                    <form action="{{ url('employee/store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="name">First Name</label>
                                    <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
                                </div>
                                <div class="col">
                                    <label for="name">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="company">Company</label>
                            <select name="company_id" class="form-control">
                                @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection