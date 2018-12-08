@extends('layouts.app')

@section('content')
    <div class="container channels">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header">Dashboard</div>
                    @include('menu')

                    <h6>Users list</h6>
                <div class="channel-list">
                    <div class="single-row">
                        <div>Id</div>
                        <div>User Name</div>
                    </div>
                    @foreach($users as $user)
                        <div class="single-row">
                            <div>{{$user['id']}}</div>
                            <div><a href="{{url('/getUserChannels')}}?user_id={{$user['id']}}">{{$user['name']}}</a></div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
