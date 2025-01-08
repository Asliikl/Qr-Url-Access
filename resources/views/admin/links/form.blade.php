@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">@if(isset($link))
                            Update Link | {{$link->name}}
                        @else
                            Add New Link
                        @endif</h3>
                </div>
                <form action="{{ isset($link) ? route('link.update', $link) : route('link.save') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="old_url">Old Url</label>
                            <input type="text" class="form-control" id="old_url" name="old_url" placeholder="Old Url" value="{{ isset($link) ? $link->old_url : '' }}">
                        </div>
                        @if(isset($link))
                            <div class="form-group">
                                <label for="new_url">New Url</label>
                                <input type="text" class="form-control" id="new_url" name="new_url" placeholder="New Url" value="{{ isset($link) ? $link->new_url : '' }}">
                            </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <button style="width: 100%" type="submit" class="btn btn-primary">
                            @if(isset($link))
                                Update Link
                            @else
                                Add Link
                            @endif
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
@endsection
