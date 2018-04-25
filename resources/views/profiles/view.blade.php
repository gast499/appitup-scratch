@extends('layouts.app')

@section('content')
    <div class="container">	
			<!--
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
			-->
			
            <div class="personal-info">
	
				 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
				<div class="row">
					<div class="col-md-2">
						<img src="{{\Illuminate\Support\Facades\Storage::url('public/avatars')}}/{{$user->id}}/{{ $user->avatar }}"
                         class="img-circle img-responsive">
					
					</div>
					<div class="col-md-4">
						<h3>{{$user->first_name}} {{$user->last_name}}</h3>
						<h3>2D Game Developer</h3>
						<h3>52 projects completed</h3>
					</div>
					<div class="col-md-6">
						<h3>Contact Me</h3>
						<h3>Work with me</h3>					
					</div>					
				
				</div>
			
			
                <h3>{{$user->type}}'s Profile</h3>
				<h3>Ricky Newton</h3>
				
				
                <h1 class="pull-right">
                    <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
                       href="{!! route('view-edit-profile') !!}">Edit Profile</a>
                </h1>
				
				
				
				
                <div class="row" id="profile-img">
                    <img src="{{\Illuminate\Support\Facades\Storage::url('public/avatars')}}/{{$user->id}}/{{ $user->avatar }}"
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
				
				
				
				
				<!--if the users is a creator-->
                @if($user->type == "Creator")
					
                    @if(isset($user->categories))
                        <h4>Interests</h4>
                        @foreach($user->categories as $cat)
                            <div class="card card-select" id="{{$cat->name}}-cardSelect" style="width: 18rem;"
                                 data-value="{{$cat->id}}">
                                <img class="card-img-top" src="{{asset('assets/images/creator.png')}}"
                                     alt="{{$cat->name}} image">
                                <div class="card-body">
                                    <h5 class="card-title">{{$cat->name}}</h5>
                                </div>
                            </div>
                        @endforeach
                    @endif					
					
					
                    @if(isset($user->platform))
                        <h4>Platform: </h4>
                        <div class="card card-select" id="{{$user->platform}}-cardSelect" style="width: 18rem;"
                             data-value="{{$user->platform}}">
                            <img class="card-img-top" src="{{asset('assets/images/dreamer.png')}}"
                                 alt="{{$user->platform}} image">
                            <div class="card-body">
                                <h5 class="card-title">{{$user->platform}}</h5>
                            </div>
                        </div>
                    @endif
					
					
                    @if(isset($user->projects))
                        <h4>Projects</h4>
                        @foreach($user->projects as $proj)
                            <div class="row col-md-9">
                                <h3>{{$proj->title}}</h3>
                            </div>
                            <div class="row col-md-9">
                                <h4>Platform: </h4>
                                <div class="card card-select" id="{{$proj->platform}}-cardSelect" style="width: 18rem;"
                                     data-value="{{$proj->platform}}">
                                    <img class="card-img-top" src="{{asset('assets/images/dreamer.png')}}"
                                         alt="{{$proj->platform}} image">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$proj->platform}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-9">
                                <h4>Categories</h4>
                                <br><br>
                                @foreach($proj->categories as $cat)
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
                            <div class="row col-md-9">
                                <h4>Partner</h4>
                                <?php $dream = $proj->users->first() ?>
                                <div class="card card-select" id="dreamer-cardSelect" style="width: 18rem;"
                                     data-value="{{$dream->id}}">
                                    <img class="card-img-top" src="{{asset('assets/images/creator.png')}}"
                                         alt="{{$dream->first_name}} {{$dream->last_name}} image">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$dream->first_name}} {{$dream->last_name}}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
					
					
					
					
					
				<!--if the users is a dreamer-->	
                @elseif($user->type == "Dreamer" && ($user->ideas->count() != 0))
                    @foreach($user->ideas as $idea)
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
                        <div class="row col-md-9">
                            <h4>Partner</h4>
                            <div class="card card-select" id="creator-cardSelect" style="width: 18rem;"
                                 data-value="{{$idea->devs->id}}">
                                <img class="card-img-top" src="{{asset('assets/images/creator.png')}}"
                                     alt="{{$idea->devs->first_name}} {{$idea->devs->last_name}} image">
                                <div class="card-body">
                                    <h5 class="card-title">{{$idea->devs->first_name}} {{$idea->devs->last_name}}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <h1 class="pull-right">
                        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
                           href="{!! route('ideas.create') !!}">Pitch an Idea</a>
                    </h1>
                @endif
				
				
				
				
				
				
            </div>
			
			
			
			
        
    </div>
@endsection
