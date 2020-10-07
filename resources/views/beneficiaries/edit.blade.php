@extends('layouts.application')

@push('head')
@include('layouts.modules.file-upload.head')
@endpush

@section('content')
<div class="page-content">
    <h1 class="page-title">Beneficiaries</h1>
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            @include('layouts.partials.alert')
            @include('beneficiaries.approval', $beneficiary)
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Beneficiary</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('beneficiaries.update', $beneficiary->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="name" class="col-3 form-control-label{{ $errors->has('name') ? ' text-danger' : '' }}">Name</label>
                            <input type="text" class="col-9 form-control round{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') ? old('name') : $beneficiary->name }}">
                        </div>
                        <div class="form-group row">
                            <label for="birthdate" class="col-3 form-control-label{{ $errors->has('birthdate') ? ' text-danger' : '' }}">Birthdate</label>
                            <input type="date" class="col-9 form-control round{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" value="{{ old('birthdate') ? old('birthdate') : $beneficiary->birthdate }}">
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-3 form-control-label{{ $errors->has('gender') ? ' text-danger' : '' }}">Gender</label>
                            @foreach(['Male','Female'] as $gender)
                            <div class="col-2 radio-custom radio-primary">
                                <input type="radio" id="{{ $gender }}" name="gender" value="{{ $gender }}" {{ (old('gender') ? old('gender') : $beneficiary->gender) == $gender ? 'checked' : '' }} />
                                <label for="{{ $gender }}">{{ $gender }}</label>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-group row">
                            <label for="phone_number" class="col-3 form-control-label{{ $errors->has('phone_number') ? ' text-danger' : '' }}">Phone Number</label>
                            <input type="text" class="col-9 form-control round{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') ? old('phone_number') : $beneficiary->phone_number }}">
                        </div>
                        <div class="form-group row">
                            <label for="national_id_number" class="col-3 form-control-label{{ $errors->has('national_id_number') ? ' text-danger' : '' }}">National ID Number</label>
                            <input type="number" min="0" class="col-9 form-control round{{ $errors->has('national_id_number') ? ' is-invalid' : '' }}" name="national_id_number" value="{{ old('national_id_number') ? old('national_id_number') : $beneficiary->national_id_number }}">
                        </div>
                        <div class="form-group row">
                            <label for="mother_name" class="col-3 form-control-label{{ $errors->has('mother_name') ? ' text-danger' : '' }}">Mother Name</label>
                            <input type="text" class="col-9 form-control round{{ $errors->has('mother_name') ? ' is-invalid' : '' }}" name="mother_name" value="{{ old('mother_name') ? old('mother_name') : $beneficiary->mother_name }}">
                        </div>
                        <div class="form-group row">
                            <label for="martial_status" class="col-3 form-control-label{{ $errors->has('martial_status') ? ' text-danger' : '' }}">Martial Status</label>
                            <select class="col-9 form-control round{{ $errors->has('martial_status') ? ' is-invalid' : '' }}" name="martial_status">
                                @foreach(['Single','Married','Divorced'] as $status)
                                    <option value="{{ $status }}" {{ (old('martial_status') ? old('martial_status') : $beneficiary->martial_status) == $status ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="employment_status" class="col-3 form-control-label{{ $errors->has('employment_status') ? ' text-danger' : '' }}">Employment Status</label>
                            @foreach(['Employed','Un-Employed'] as $status)
                            <div class="col-3 radio-custom radio-primary">
                                <input type="radio" id="employment_status_{{ $status }}" name="employment_status" value="{{ $status == 'Employed' ? 1 : 0 }}" {{ ((old('employment_status') ? old('employment_status') : $beneficiary->employment_status) == 1 ? 'Employed' : 'Un-Employed') == $status ? 'checked' : '' }} />
                                <label for="employment_status_{{ $status }}">{{ $status }}</label>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-group row">
                            <label for="monthly_income" class="col-3 form-control-label{{ $errors->has('monthly_income') ? ' text-danger' : '' }}">Monthly Income</label>
                            <div class="input-group round col-9">
                                <span class="input-group-addon round">$</span>
                                <input type="number" min="0" step="0.01" class="form-control round{{ $errors->has('monthly_income') ? ' is-invalid' : '' }}" name="monthly_income" value="{{ old('monthly_income') ? old('monthly_income') : $beneficiary->monthly_income }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="photo" class="col-3 form-control-label{{ $errors->has('photo') ? ' text-danger' : '' }}">Profile Photo</label>
                            <div class="col-9">
                                <input name="photo" type="file" id="input-file-now" data-plugin="dropify" data-default-file="{{ $beneficiary->photoPath }}" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-classic"><b>Update</b></button>
                        <a href="{{ route('beneficiaries.index') }}" class="btn btn-default waves-effect waves-classic"><b>Back</b></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@include('layouts.modules.file-upload.scripts')
@endpush