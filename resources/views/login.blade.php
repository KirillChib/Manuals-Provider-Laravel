@extends('master')
@section('menu')
    @parent
@endsection
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row col-4">
        {!! Form::open(['method'=>'post', 'class'=>'form mt-5']) !!}
        @csrf
        {!! Form::label('email', 'Your E-mail', ['class'=>'form-label']) !!}
        {!! Form::email('email','',['class'=>'form-control']) !!}
        {!! Form::label('password', 'Password', ['class'=>'form-label']) !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
        {!! Form::submit('Login', ['class'=>'btn btn-success mt-3']) !!}
        {!! Form::close() !!}
    </div>
    <a class="btn btn-success mt-3" href="{{ route('register') }}">Registration</a>
@endsection