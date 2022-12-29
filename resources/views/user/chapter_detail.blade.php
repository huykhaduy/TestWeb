@extends("user.layout.app")
@section('title')
    <title>{{$data->name}}</title>
@endsection
@section('breadcrumb')
@endsection
@section('content')
    <iframe src="{{$data->lesson_link}}" frameborder="0" style="width: 100%;height:100vh"></iframe>
@endsection
