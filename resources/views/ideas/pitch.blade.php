@extends('layouts.app')

@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')
                    {!! Form::open(['route' => 'ideas.store']) !!}

                    @include('ideas.fields')

                    {!! Form::close() !!}
        </div>
    </div>
@endsection
