@extends('layouts.app')

@section('content')
    <div class="container channels">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    @include('menu')

                <h6>Single Channel({{$channelname}}) Users</h6>

                    <div class="table-wrap">
                         <table class="channels-list">
                            <tr>
                                <td>Id</td>
                                <td>User Name</td>
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user['id']}}</td>
                                    <td>{{$user['name']}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
            </div>
        </div>
    </div>
    </div>
@endsection
