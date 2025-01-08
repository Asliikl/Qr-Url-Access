@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">@if(isset($admin))
                            Update Admin | {{$admin->name}}
                        @else
                            Add New Admin
                        @endif</h3>
                </div>
                <form action="{{ isset($admin) ? route('admin.update',$admin) : route('admin.save')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ isset($admin) ? $admin->name : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" value="{{ isset($admin) ? $admin->surname : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ isset($admin) ? $admin->email : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="password2">Confirm Password</label>
                            <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button style="width: 100%" type="submit" class="btn btn-primary">
                            @if(isset($admin))
                                Update Admin
                            @else
                                Add Admin
                            @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
