@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All QR Codes :Total {{$qrCodes->total()}} Records</h3>
                </div>
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"></div>
                            <div class="col-sm-12 col-md-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                       aria-describedby="example2_info">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Content</th>
                                        <th>QR Image</th>
                                        <th>Image</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($qrCodes as $qrCode)
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0">#{{$qrCode->id}}</td>
                                            <td>{{$qrCode->content}}</td>
                                            <td>{{$qrCode->path}}</td>
                                            <td>
                                                <img src="{{$qrCode->path}}" alt="{{$qrCode->content}}"
                                                     style="width: 60px;height: 60px">
                                            </td>
                                            <td>{{$qrCode->created_at}}</td>
                                            <td>
                                                <a href="javascript:void(0)" title="Delete" onclick="modalAskQuestion({
                                                        title: 'Are you sure?',
                                                        text: 'Do you want to delete this qr code?',
                                                        icon: 'warning',
                                                        route: '{{ route('qr-code.destroy', $qrCode) }}',
                                                        })"
                                                   class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">ID</th>
                                        <th rowspan="1" colspan="1">Content</th>
                                        <th rowspan="1" colspan="1">QR Image</th>
                                        <th rowspan="1" colspan="1">Image</th>
                                        <th rowspan="1" colspan="1">Created At</th>
                                        <th rowspan="1" colspan="1">Actions</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div style="display: flex;flex-direction: row;justify-content: flex-end;" class="col-12">
                                {{$qrCodes->links('vendor.pagination.bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
