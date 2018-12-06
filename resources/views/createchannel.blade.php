@extends('layouts.app')

@section('content')
    <div class="container channels">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    @include('menu')
                    <h6>Creating channel</h6>

                    <form method="POST" action="/createChannel">
                        {{csrf_field()}}
                        <input type="text" value="name"  id="name" name="name" >
                        <input type="submit" class="btn" value="Create"/>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
