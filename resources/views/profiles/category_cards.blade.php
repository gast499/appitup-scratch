<script>
    window.onload = function () {
        @foreach($user->categories as $cat)
            selectCategory("{{$cat->name}}");
        @endforeach
    };

    function selectCategory(cardVal) {
        var des = document.getElementsByName("categoryCards");
        var currSel = document.getElementById(cardVal + "-cardSelect");
        currSel.classList.toggle("is-selected");
        var tmparr = [];
        for (var i = 0; i < des.length; i++) {
            if (des[i].classList.contains("is-selected")) {
                tmparr.push(parseInt(des[i].getAttribute("data-value")));
            }
        }

        var type = JSON.stringify(tmparr);
        // if (currSel.classList.contains("is-selected")){
        //     type=currSel.getAttribute("data-value");
        // }
        document.getElementById("categories").value = type;
    };
</script>
<h2>What are you interested in?</h2>
<div class="form-group col-sm-6">
    <?php $i = 0 ?>
    @foreach($categories as $category)
        <?php if($i == 5){ ?>
            </div>
            <div class="form-group col-sm-6">
        <?php $i = 0;} ?>
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
