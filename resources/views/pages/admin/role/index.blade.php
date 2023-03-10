@extends('layouts.app')

@section('title', 'Role List')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Roles</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Roles</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4>Role List</h4>
                                    <a class="btn btn-primary" href="{{ route($module.'.create') }}"><i class="fa fa-plus"></i> Create</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table table-bordered" id="datatable"
                                        >
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Guard Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        $('#datatable').dataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route($module . ".index") }}',
            columns: [
             {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'guard_name',
                    name: 'guard_name'
                },
                {
                    data: 'action',
                    name: 'action',
                    "searchable": false,
                    render: function(data, type, row) {
                        let editUrl = '{{ route($module.".edit", "ID") }}'
                        editUrl = editUrl.replace('ID', row.id)

                        let deleteUrl = '{{route($module.".destroy", "ID")}}'
                        deleteUrl = deleteUrl.replace('ID', row.id)

                        return `
                            <a class="btn btn-primary btn-sm" href="${editUrl}"><i class="fa fa-pencil"></i></a>
                            <button class="btn btn-danger btn-sm" onclick="handleDelete('${deleteUrl}')"><i class="fa fa-trash"></i></button>
                        `
                    }
                }
            ]
        })
    </script>
@endpush