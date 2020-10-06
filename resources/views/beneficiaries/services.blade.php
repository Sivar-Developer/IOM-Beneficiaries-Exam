@extends('layouts.application')

@section('content')
<div class="page-content">
    <h1 class="page-title">Beneficiaries</h1>
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            @include('layouts.partials.alert')
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Services of Beneficiary #{{ $beneficiary->id }}: {{ $beneficiary->name }}</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('beneficiaries.services.attach', $beneficiary->id) }}" method="POST" class="form-horizontal">
                        @csrf
                        @method('PATCH')
                        @foreach(App\Service::all() as $service)
                        <div class="form-group row">
                            <label for="{{ $service->type }}" class="col-3 form-control-label{{ $errors->has($service->type) ? ' text-danger' : '' }}">{{ $service->type }}</label>
                            <div class="col-3 radio-custom radio-primary">
                                <input type="radio" id="{{ $service->type }}Ongoing" name="{{ Str::snake($service->type) }}" value="Ongoing" />
                                <label for="{{ $service->type }}Ongoing">Ongoing</label>
                            </div>
                            <div class="col-3 radio-custom radio-primary">
                                <input type="radio" id="{{ $service->type }}Cancelled" name="{{ Str::snake($service->type) }}" value="Cancelled" />
                                <label for="{{ $service->type }}Cancelled">Cancelled</label>
                            </div>
                            <div class="col-3 radio-custom radio-primary">
                                <input type="radio" id="{{ $service->type }}Delivered" name="{{ Str::snake($service->type) }}" value="Delivered" />
                                <label for="{{ $service->type }}Delivered">Delivered</label>
                            </div>
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary waves-effect waves-classic"><b>Submit</b></button>
                        <a href="{{ route('beneficiaries.index') }}" class="btn btn-default waves-effect waves-classic"><b>Back</b></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection