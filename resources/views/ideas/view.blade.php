@extends('layouts.app')

@section('content')
    <script>
        function selectCreator(creatorID) {
            document.getElementById("creatorID").value = creatorID;
            document.getElementById("subButton").click();
        };
    </script>
    <div class="container">
        <div class="row col-md-9">
            <h3>{{$idea->title}}</h3>
        </div>
        <div class="row col-md-9">
            <h4>Platform: </h4>
            <div class="card card-select" id="{{$idea->platform}}-cardSelect" style="width: 18rem;"
                 data-value="{{$idea->platform}}">
                <img class="card-img-top" src="{{asset('assets/images/dreamer.png')}}"
                     alt="{{$idea->platform}} image">
                <div class="card-body">
                    <h5 class="card-title">{{$idea->platform}}</h5>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row col-md-9">
            <h4>Categories</h4>
            <br><br>
            @foreach($idea->categories as $cat)
                <div class="card card-select" id="{{$cat->name}}-cardSelect" style="width: 18rem;"
                     data-value="{{$cat->id}}">
                    <img class="card-img-top" src="{{asset('assets/images/creator.png')}}"
                         alt="{{$cat->name}} image">
                    <div class="card-body">
                        <h5 class="card-title">{{$cat->name}}</h5>
                    </div>
                </div>
            @endforeach
        </div>
        @if(isset($creators))
            <form class="form-horizontal" method="POST"
                  action="{{ route('idea.selectmatch') }}">
                {{ csrf_field() }}
                @if (isset($errors) && count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
            <div class="form-group row col-md-9">
                <h4>Available Creators</h4>
                <?php $i = 0 ?>
                @foreach($creators as $creator)
                    <?php if($i == 3){ ?>
                        </div>
                        <div class="form-group row col-md-9">
                <?php $i = 0;} ?>
                <div class="card card-select" id="creator-cardSelect" style="width: 18rem;"
                     data-value="{{$creator->id}}">
                    <img class="card-img-top" src="{{asset('assets/images/creator.png')}}"
                         alt="{{$creator->first_name}} {{$creator->last_name}} image">
                    <div class="card-body">
                        <h5 class="card-title">{{$creator->first_name}} {{$creator->last_name}}</h5>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <button type="button" class="btn" onclick="selectCreator({{$creator->id}})">Work with Me
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php $i++ ?>
                    @endforeach
                    <input type="hidden" id="ideaID" name="ideaID" value="{{$idea->id}}"/>
                    <input type="hidden" id="creatorID" name="creatorID" value=""/>
                    <input type="submit" class="btn btn-primary" id="subButton" style="display:none;" value="">
                        </div>
            </form>
        @endif
    </div>
@endsection