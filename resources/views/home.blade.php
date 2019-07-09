@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form id="tax">
                <router-view save-url="{{route('save')}}"></router-view>                
            </form>
        </div>
        <div class="col-md-4">
            <div class="card border-primary">
                <div class="card-header h5 bg-transparent border-primary">Your Return</div>

                <div class="card-body">
                    $
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
