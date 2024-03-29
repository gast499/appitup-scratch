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
        // tmpstr = '';
        // for (var i = 0; i < tmparr.length; i++){
        //     tmpstr += ',' + tmparr[i];
        // }
        // tmpstr = tmpstr.substr(1);
        var type = JSON.stringify(tmparr);
        // var type = JSON.stringify(tmpstr);
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
        document.getElementById("categories").setAttribute("style","display: block;");
        document.getElementById("categoryCards").setAttribute("style","display: block;");
    };
</script>
<!-- Platform Field -->
<div class="row intro">
    What platform is your app on?
</div>
<div class="form-group row" id="platformCards">
    <div class="card card-select pitchCard" id="Android-cardSelect" name="platformCards"
         data-value="Android"
         onclick="selectPlatform('Android')">
        <div class="PlatformTitle">
            Android
        </div>
    </div>
    <div class="card card-select pitchCard" id="iOS-cardSelect" name="platformCards" data-value="iOS"
         onclick="selectPlatform('iOS')">
        <div class="PlatformTitle">
            iOS
        </div>
    </div>
    <div class="card card-select pitchCard" id="Web-cardSelect" name="platformCards" data-value="Web"
         onclick="selectPlatform('Web')">
        <div class="PlatformTitle">
            Web
        </div>
    </div>
    <input type="hidden" id="platform" name="platform" value="">
</div>
<div class="form-group col-sm-6" id="categoryCards" style="display: none;">
    <?php $i = 0 ?>
    @foreach($categories as $category)
        <?php if($i == 5){ ?>
</div>
<div class="form-group col-sm-6" id="categoriesCards" style="display: none;">
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
