@extends("user.layout.app")
@section('title')
    <title>{{$data->name}}</title>
@endsection
@section('breadcrumb')
@endsection
@section('content')
    <div id="user-form">
        <user-answer-form form-name="{{$data->name}}" prop-chapter-id="{{$data->name}}"/>
    </div>
@endsection

@section('js_location')
     <script src="{{asset('js/user-answer-form.js?t='.Carbon\Carbon::now()->timestamp)}}"></script>
@endsection
