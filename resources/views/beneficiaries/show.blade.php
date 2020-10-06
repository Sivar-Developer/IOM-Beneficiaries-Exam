@extends('layouts.application')

@section('content')
<div class="page-content">
    <h1 class="page-title">Beneficiaries</h1>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            @include('layouts.partials.alert')
            @include('beneficiaries.approval', $beneficiary)
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Beneficiary Detail</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-3 mb-20 font-weight-600">Photo:</div>
                        <div class="col-sm-9 mb-20">
                            @if($beneficiary->photoPath)
                            <img src="{{ $beneficiary->photoPath }}" class="img-rounded img-bordered img-fluid" width="200" alt="">
                            @endif
                        </div>
                        <div class="col-sm-3 mb-20 font-weight-600">Name:</div>
                        <div class="col-sm-9 mb-20">{{ $beneficiary->name }}</div>
                        <div class="col-sm-3 mb-20 font-weight-600">Birthdate:</div>
                        <div class="col-sm-9 mb-20">{{ $beneficiary->birthdate }} (Age: {{ $beneficiary->age }})</div>
                        <div class="col-sm-3 mb-20 font-weight-600">Gender:</div>
                        <div class="col-sm-9 mb-20">{{ $beneficiary->gender }}</div>
                        <div class="col-sm-3 mb-20 font-weight-600">Phone Number:</div>
                        <div class="col-sm-9 mb-20">{{ $beneficiary->phone_number }}</div>
                        <div class="col-sm-3 mb-20 font-weight-600">National ID Number:</div>
                        <div class="col-sm-9 mb-20">{{ $beneficiary->national_id_number }}</div>
                        <div class="col-sm-3 mb-20 font-weight-600">Mother Name:</div>
                        <div class="col-sm-9 mb-20">{{ $beneficiary->mother_name }}</div>
                        <div class="col-sm-3 mb-20 font-weight-600">Martial Status:</div>
                        <div class="col-sm-9 mb-20">{{ $beneficiary->martial_status }}</div>
                        <div class="col-sm-3 mb-20 font-weight-600">Employment Status:</div>
                        <div class="col-sm-9 mb-20">{{ $beneficiary->employment }}</div>
                        <div class="col-sm-3 mb-20 font-weight-600">Monthly Income:</div>
                        <div class="col-sm-9 mb-20">${{ $beneficiary->monthly_income }}</div>
                        <div class="col-sm-3 mb-20 font-weight-600">Score:</div>
                        <div class="col-sm-9 mb-20">{{ $beneficiary->score }}</div>
                        <div class="col-sm-3 mb-20 font-weight-600">Created At:</div>
                        <div class="col-sm-9 mb-20">{{ $beneficiary->created_at }} ({{ $beneficiary->created_at ? $beneficiary->created_at->diffForHumans() : null }})</div>
                        <div class="col-sm-3 mb-20 font-weight-600">Updated At:</div>
                        <div class="col-sm-9 mb-20">{{ $beneficiary->updated_at }} ({{ $beneficiary->updated_at ? $beneficiary->updated_at->diffForHumans() : null }})</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection