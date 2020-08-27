@extends('layouts.a<ul class="list-group" style="width: 50%;">
    @foreach($musics as $key=>$value)
    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
        <div>
            <h4 style="display: inline-block;">{{$key +1 }} -</h4>
            <img style="max-height: 80px;max-width: 80px;"src={{$value->image}} alt="">
            <div style="display: inline-block;vertical-align: middle;">
                <h4>{{$value->name}}</h4>
                <h5>{{$value->user_name}}</h5>
            </div>
        </div>
        <div>
            <button class="btn btn-dark"><i class="fas fa-heart"></i><span style="padding-left: 10px;">0</span></button>
            <button class="btn btn-danger"><i class="fas fa-play-circle"></i></button>
        </div>


    </li>
@endforeach
</ul>pp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
