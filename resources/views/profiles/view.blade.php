@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 personal-info">
                <h3>{{$user->type}}'s Profile</h3>
                <h1 class="pull-right">
                    <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
                       href="{!! route('view-edit-profile') !!}">Edit Profile</a>
                </h1>
                <div class="row" id="profile-img">
                    <img src="/storage/avatars/{{$user->id}}/{{ $user->avatar }}"
                         style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                </div>
                <br><br>
                <div class="row">
                    <table class="table table-striped">
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{$user->first_name}} {{$user->last_name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <td>Location</td>
                            <td>{{$user->location}}</td>
                        </tr>
                    </table>
                </div>
                @if(($user->type == "Creator") && (isset($user->platform)))
                    <div class="card card-select" id="{{$user->platform}}-cardSelect" style="width: 18rem;"
                         data-value="{{$user->platform}}">
                        <img class="card-img-top" src="{{asset('assets/images/creator.png')}}"
                             alt="{{$user->platform}} image">
                        <div class="card-body">
                            <h5 class="card-title">{{$user->platform}}</h5>
                        </div>
                    </div>
                @elseif($user->type == "Dreamer" && (isset($user->ideas)))
                    <h1 class="pull-right">
                        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
                           href="{!! route('ideas.create') !!}">Pitch an Idea</a>
                    </h1>

                @endif
            </div>
        </div>
    </div>
@endsection
