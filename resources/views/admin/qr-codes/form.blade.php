@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add New QR Code</h3>
                </div>
                <form action="{{ route('qr-code.save') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="content">Content</label>
                            <input type="text" class="form-control" id="content" name="content" placeholder="Content">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button style="width: 100%" type="submit" class="btn btn-primary">Add QR Code</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
