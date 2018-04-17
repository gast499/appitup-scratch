@extends('layouts.app')

@section('content')
    <script>
        function uploadImg() {
            document.getElementById("profile-img-upload").click();
        }
        function selectCard(cardVal){
            var des = document.getElementsByClassName("card-select");
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
            //document.getElement()
        };
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-9 personal-info">
                <h3>{{$user->type}}'s Profile</h3>

                <form class="form-horizontal" enctype="multipart/form-data" method="POST"
                      action="{{ route('edit-profile') }}">
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
                    <div class="form-group row" id="profile-img" onclick="uploadImg()">
                        <img src="/storage/avatars/{{$user->id}}/{{ $user->avatar }}"
                             style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                        <input type="file" style="display: none;" id="profile-img-upload" name="avatar">
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Name:</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" value="{{$user->first_name}}"
                                   name="first_name"><input class="form-control" type="text"
                                                            value="{{$user->last_name}}" name="last_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-md-6">
                            <input class="form-control" type="email" value="{{$user->email}}" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label">Location:</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" value="{{$user->location}}" name="location">
                        </div>
                    </div>
                    @if($user->type == "Creator")
                        @include('profiles.platform_cards')
                    @endif
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-primary" value="Save Changes">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
