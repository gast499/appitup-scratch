@extends('layouts.app')

@section('content')
    <script>
        function selectCategory(cardVal){
            var des = document.getElementsByName("categoryCards");
            var currSel = document.getElementById(cardVal+"-cardSelect");
            currSel.classList.toggle("is-selected");
            var tmparr = [];
            for (var i = 0; i < des.length; i++){
                if (des[i].classList.contains("is-selected")){
                    tmparr.push(parseInt(des[i].getAttribute("data-value")));
                }
            }

            var type = JSON.stringify(tmparr);
            // if (currSel.classList.contains("is-selected")){
            //     type=currSel.getAttribute("data-value");
            // }
            console.log(type);
            document.getElementById("categories").value=type;
            console.log(document.getElementById("categories"));
        };
        function selectPlatform(cardVal){
            var des = document.getElementsByName("platformCards");
            var currSel = document.getElementById(cardVal+"-cardSelect");
            for (var i = 0; i < des.length; i++){
                if (des[i].classList.contains("is-selected") && des[i] != currSel){
                    des[i].classList.remove("is-selected");
                }
            }
            currSel.classList.toggle("is-selected");
            var type = "";
            if (currSel.classList.contains("is-selected")){
                type=currSel.getAttribute("data-value");
            }
            document.getElementById("platform").value=type;
        };
    </script>
    <section class="content-header">
        <h1>
            Pitch your Idea
        </h1>
    </section>
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
