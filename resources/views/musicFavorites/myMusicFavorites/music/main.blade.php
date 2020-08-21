@extends('musicFavorites.app')

@section('sideBar')
    @include('musicFavorites.sideBar.manageMusic')
@endsection

@section('content')
    @include('musicFavorites.myMusicFavorites.music.content')
@endsection
