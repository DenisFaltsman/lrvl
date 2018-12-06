@extends('layouts.app')

@section('content')
    <div class="container channels">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    @include('menu')
                    <h6>Creating tag</h6>

                    <form method="POST" action="/createTagAction">
                        {{csrf_field()}}
                        <select name="channel_id" id="channel_id">
                            @foreach($channels as $channel)
                                <option value="{{ $channel['id'] }}">
                                    {{ $channel['name'] }}
                                </option>
                            @endforeach
                        </select>
                        <input type="text" value="tag"  id="name" name="name" >
                        <input type="submit" class="btn" value="Create Tag"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
