@extends('master')
@section('menu')
    @parent
@endsection
@section('content')
<div class="row">
    <div class="label label-info" style="display:inline-block; width: 100%">
        {{ $page }}
    </div>
    <div class="form-group row mb-3">
        {!! Form::model($claim, ['route' => ['claim.store', ['manual' => $manualName]], 'files' => true]) !!}
        {!! Form::label('claimnameform','Manual claim', ['class'=>'form-label']) !!}
        {!! Form::textarea('claimnameform', '', ['class'=>'form-control']) !!}
    </div>
    <button class="btn btn-success" type="submit">Add Claim</button>
    {!! Form::close() !!}
</div>
@endsection