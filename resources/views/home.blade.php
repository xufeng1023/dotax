@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <form id="tax">
                <keep-alive>
                    <router-view></router-view>    
                </keep-alive>            
            </form>
        </div>
        <div class="col-md-3">
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
