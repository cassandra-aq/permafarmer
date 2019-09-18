@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>

    <div class="col-lg-6 col-lg-offset-3">
        <h3>Editer Saison</h3>
        {!! Form::model($season, [
            'url' => route('seasons.update', $season),
            'method' => 'PUT'
        ]) !!}
        <div class="form-group">
            <label for="">nom de la saison</label>
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>
        {{ Form::submit('Sauvegarder', ['class' => 'btn btn-primary']) }}
    </div>
    {!! Form::close() !!}

@endsection