@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <login-component
            login-url="{{ route('login') }}"
            register-url="{{ route('register') }}"
            >
            </login-component>
        </div>
    </div>
</div>
@endsection
