@extends('master')
@section('menu')
    @parent
@endsection
@section('content')
<div class="row">
    <div class="label label-info" style="display:inline-block; width: 100%">
        <h2>{{ $page }}</h2>
    </div>
    <div class="form-group row mb-3">
        {!! Form::model($manual, ['route' => 'manual.store', 'files' => true]) !!}
        {!! Form::label('manualnameform','Manual name', ['class'=>'form-label']) !!}
        {!! Form::text('manualnameform', '', ['class'=>'form-control']) !!}
    </div>
    <div class="form-group row mb-3">
        {!! Form::label('manualDescription', 'Description', ['class'=>'form-label']) !!}
        {!! Form::textarea('manualDescription', '',['class'=> 'col-md-10'] ) !!}
    </div>
    <div class="form-group row mb-3">
        {!! Form::label('file', 'Файл', ['class' => 'form-label']) !!}
        {!! Form::file('file', ['class' => 'form-control']) !!}
    </div>
    <button class="btn btn-success" type="submit">Add Manual</button>
    {!! Form::close() !!}
</div>
@endsection