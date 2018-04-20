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
<!-- Platform Field -->
<div class="row intro">
    What platform is your app on?
</div>
<div class="form-group row">
    <div class="card card-select left-img" id="Android-cardSelect" name="platformCards" style="width: 18rem;"
         data-value="Android"
         onclick="selectPlatform('Android')">
        <img class="card-img-top" src="{{asset('assets/images/dreamer.png')}}"
             alt="Android">
        <div class="card-body">
            <h5 class="card-title">Android</h5>
        </div>
    </div>
    <div class="card card-select right-img" id="iOS-cardSelect" name="platformCards" style="width: 18rem;" data-value="iOS"
         onclick="selectPlatform('iOS')">
        <img class="card-img-top" src="{{asset('assets/images/creator.png')}}"
             alt="iOS image">
        <div class="card-body">
            <h5 class="card-title">iOS</h5>
        </div>
    </div>
    <div class="card card-select" id="Web-cardSelect" name="platformCards" style="width: 18rem;" data-value="Web"
         onclick="selectPlatform('Web')">
        <img class="card-img-top" src="{{asset('assets/images/creator.png')}}"
             alt="Web image">
        <div class="card-body">
            <h5 class="card-title">Web</h5>
        </div>
    </div>
    <input type="hidden" id="platform" name="platform" value="">
</div>
    <h2>Select Categories you're looking into</h2>
<div class="form-group col-sm-6">
    <?php $i = 0 ?>
    @foreach($categories as $category)
        <?php if($i == 5){ ?>
</div>
<div class="form-group col-sm-6">
    <?php
    $i = 0;
    } ?>
    <div class="card card-select" id="{{$category->name}}-cardSelect" name="categoryCards" style="width: 18rem;"
         data-value="{{$category->id}}"
         onclick="selectCategory('{{$category->name}}')">
        <img class="card-img-top" src="{{asset('assets/images/creator.png')}}"
             alt="{{$category->name}} image">
        <div class="card-body">
            <h5 class="card-title">{{$category->name}}</h5>
        </div>
        <?php $i++ ?>
    </div>
    @endforeach
    <input type="hidden" id="categories" name="categories" value="">

    {{--{!! Form::label('platform', 'Platform:') !!}--}}
    {{--{!! Form::text('platform', null, ['class' => 'form-control']) !!}--}}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Find Me a Creator', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('ideas.index') !!}" class="btn btn-default">Cancel</a>
</div>
