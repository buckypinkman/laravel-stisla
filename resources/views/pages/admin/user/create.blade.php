@extends('layouts.app')

@section('title', 'Users')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Users</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Users</a></div>
                <div class="breadcrumb-item">Add</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create User</h4>
                        </div>
                        <form action="{{ route($module.'.store') }}" method="post">
                            @csrf
                            <div class="card-body row">
                                <div class="form-group col-md-6">
                                    <label>Name *</label>
                                    <input class="form-control" name="name">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email *</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                @
                                            </div>
                                        </div>
                                        <input type="email" name="email" class="form-control phone-number">
                                    </div>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Password *</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </div>
                                        </div>
                                        <input type="password" class="form-control pwstrength" name="password"
                                            data-indicator="pwindicator">
                                    </div>
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Role *</label>
                                    <select name="role" class="form-control">
                                        <option selected disabled>Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ strtolower($role) }}">{{ $role }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
    {{-- <script src="{{ asset('js/page/forms-advanced-forms.js') }}">
    </script> --}}
@endpush
