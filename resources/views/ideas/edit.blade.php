@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Idea
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($idea, ['route' => ['ideas.update', $idea->id], 'method' => 'patch']) !!}

                        @include('ideas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection