@extends('layouts.app')

@section('content')
<div class="row intro">
    Pitch an idea
</div>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'ideas.store']) !!}

                    @include('ideas.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
