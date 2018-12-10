@extends('layouts.app')

@section('content')
    <div class="container channels">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header">Dashboard</div>
                    @include('menu')

                    <h6>Tags list</h6>
                <div class="channel-list">
                    <div class="single-row">
                        <div>Id</div>
                        <div>Tag Name</div>
                    </div>
                    @foreach($tags as $tag)
                        <div class="single-row">
                            <div>{{$tag['id']}}</div>
                            <div><a href="{{url('/getTagInfo')}}/{{$tag['id']}}">{{$tag['name']}}</a></div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
