@extends('layouts.app')

@section('title', 'Permissions')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Permissions</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Permissions</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Permission</h4>
                        </div>
                        <form action="{{ route($module.'.update', $permission->id) }}"
                            method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body row">
                                <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <input class="form-control" name="name" value="{{ $permission->name }}">
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary">Save</button>
                                    <a class="btn btn-outline-danger"
                                        href="{{ route($module.'.index') }}">Back</a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
</div>
</section>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush