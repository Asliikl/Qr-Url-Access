@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">@if(isset($setting))
                            Update Setting
                        @else
                            Add New Setting
                        @endif</h3>
                </div>
                <form action="{{ isset($setting) ? route('setting.update', $setting) : route('setting.save') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="old_url">Key</label>
                            <input type="text" class="form-control" id="key" name="key" placeholder="Enter key.." value="{{ isset($setting) ? $setting->key : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="new_url">Value</label>
                            <input type="text" class="form-control" id="value" name="value" placeholder="Enter value.." value="{{ isset($setting) ? $setting->value : '' }}">
                        </div>

                    </div>
                    <div class="card-footer">
                        <button style="width: 100%" type="submit" class="btn btn-primary">
                            @if(isset($setting))
                                Update setting
                            @else
                                Add setting
                            @endif
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
