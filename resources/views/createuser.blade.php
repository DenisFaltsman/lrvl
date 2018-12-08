@extends('layouts.app')

@section('content')
    <div class="container channels">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    @include('menu')
                    <h6>Creating user</h6>
                        {{ Form::open(array('url' => 'createUserAction')) }}
                            <div><input type="text" placeHolder="Name"  id="name" name="name" /></div>
                            <div><input type="email" placeHolder="Email"  id="email" name="email" /></div>
                            <div><input type="submit" class="btn" value="Create User"/></div>
                        {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection