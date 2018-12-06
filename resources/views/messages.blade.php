@extends('layouts.app')

@section('content')
    <div class="container channels">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    @include('menu')
                <h6>{{$message}}</h6>
            </div>
        </div>
    </div>
    </div>
@endsection
