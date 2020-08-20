@extends('accountSetting.app')

@section('content')
    @include('accountSetting.basicInformation.content')
@endsection

@section('JS')
    <script src="{{asset('js/AccountSetting/BasicInformation/imagePreview.js')}}"></script>
@endsection
