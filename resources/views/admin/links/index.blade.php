@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Links :Total {{$links->total()}} Records</h3>
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
                                        <th>Old Url</th>
                                        <th>New Url</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($links as $link)
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0">#{{$link->id}}</td>
                                            <td>{{ substr($link->old_url,0,50).'...' }}</td>
                                            <td>{{$link->new_url}}</td>
                                            <td>{{$link->created_at}}</td>
                                            <td>
                                                <a href="{{route('link.edit',$link)}}"
                                                   class="btn btn-primary">Edit</a>
                                                <a href="javascript:void(0)" title="Delete" onclick="modalAskQuestion({
                                                        title: 'Are you sure?',
                                                        text: 'Do you want to delete this link?',
                                                        icon: 'warning',
                                                        route: '{{ route('link.destroy', $link) }}',
                                                        })"
                                                   class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">ID</th>
                                        <th rowspan="1" colspan="1">Old Url</th>
                                        <th rowspan="1" colspan="1">New Url</th>
                                        <th rowspan="1" colspan="1">Created At</th>
                                        <th rowspan="1" colspan="1">Actions</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div style="display: flex;flex-direction: row;justify-content: flex-end;" class="col-12">
                                {{$links->links('vendor.pagination.bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
