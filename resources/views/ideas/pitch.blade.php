@extends('layouts.app')

@section('content')
<div class="row intro">
    Pitch an idea
</div>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="row">

            <div class="card">
                    {!! Form::open(['route' => 'ideas.store']) !!}

                    @include('ideas.fields')

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
