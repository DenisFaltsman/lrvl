@extends('layouts.app')

@section('content')
    <div class="container channels">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    @include('menu')
                    <h6>Creating channel</h6>
                    <form method="POST" action="/createChannelAction">
                        {{csrf_field()}}
                        <div><input type="text" placeHolder="Name"  id="name" name="name" ></div>
                        <div><input type="submit" class="btn" value="Create"/></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
