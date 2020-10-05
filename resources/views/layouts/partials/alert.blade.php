@if(session('msg'))
<div class="alert dark alert-alt alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{ session('msg') }}
</div>
@endif

@if(session('warning'))
<div class="alert dark alert-alt alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    {{ session('warning') }}
</div>
@endif

@if(session('error'))
<div class="alert dark alert-alt alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    {{ session('error') }}
</div>
@endif

@if(count($errors)>0)
    <div class="alert dark alert-alt alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        <ul class="text-right" style="list-style:none;"> @foreach ($errors->all() as $error)
            <li class="font-weight-400"> {{ $error }} </li>
            @endforeach
        </ul>
</div>
@endif