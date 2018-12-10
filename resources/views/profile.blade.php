@extends('layouts.app')

@section('content')
    <div class="container channels">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    @include('menu')

                <h6>Single User ({{$username}}) Channels</h6>
                <div class="table-wrap">
                    <table class="channels-list">
                        <tr>
                            <td>Id</td>
                            <td>Channel Name</td>
                        </tr>
                        @foreach($channels as $channel)
                            <tr>
                                <td>{{$channel['id']}}</td>
                                <td>{{$channel['name']}} <a href="leftChannelAction/{{$channel['id']}}">Left?</a></td>
                            </tr>
                        @endforeach
                    </table>
                    <hr>
                    <table class="tags-list">
                        <tr>
                            <td>Id</td>
                            <td>Tag Name</td>
                        </tr>
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{$tag['tag_id']}}</td>
                                <td>{{$tag['tag_name']}} <a href="removeTagAction/{{$tag['tag_id']}}/{{$tag['channel_id']}}">Remove?</a></td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
