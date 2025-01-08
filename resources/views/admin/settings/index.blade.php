@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Settings :Total {{$settings->total()}} Records</h3>
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
                                        <th>Key</th>
                                        <th>Value</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($settings as $setting)
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0">#{{$setting->id}}</td>
                                            <td>{{$setting->key}}</td>
                                            <td>{{$setting->value}}</td>
                                            <td>{{$setting->created_at}}</td>
                                            <td>
                                                <a href="{{route('setting.edit',$setting)}}"
                                                   class="btn btn-primary">Edit</a>
                                                <a href="javascript:void(0)" title="Delete" onclick="modalAskQuestion({
                                                        title: 'Are you sure?',
                                                        text: 'Do you want to delete this setting?',
                                                        icon: 'warning',
                                                        route: '{{ route('setting.destroy', $setting) }}',
                                                        })"
                                                   class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">ID</th>
                                            <th rowspan="1" colspan="1">Key</th>
                                        <th rowspan="1" colspan="1">Value</th>
                                        <th rowspan="1" colspan="1">Created At</th>
                                        <th rowspan="1" colspan="1">Actions</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div style="display: flex;flex-direction: row;justify-content: flex-end;" class="col-12">
                                {{$settings->links('vendor.pagination.bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
