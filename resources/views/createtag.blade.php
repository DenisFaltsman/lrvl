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
                        <div>
                            <select name="channel_id" id="channel_id">
                                @foreach($channels as $channel)
                                    <option value="{{ $channel['id'] }}">
                                        {{ $channel['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div><input type="text" placeholder="Tag"  id="name" name="name" ></div>
                        <div><input type="submit" class="btn" value="Create Tag"/></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
