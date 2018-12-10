@extends('layouts.app')

@section('content')
    <div class="container channels">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    @include('menu')

                <h6>Channels list</h6>
                    <div class="table-wrap">
                        <table class="channels-list">
                            <tr>
                                <td>Id</td>
                                <td>Owner user Id</td>
                                <td>Channel Name</td>
                            </tr>
                            @foreach($channels as $channel)
                                <tr>
                                    <td>{{$channel['id']}}</td>
                                    <td>{{$channel['user_id']}}</td>
                                    <td><a href="{{url('/getChannelInfo')}}/{{$channel['id']}}">{{$channel['name']}}</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
            </div>
        </div>
    </div>
    </div>
@endsection
