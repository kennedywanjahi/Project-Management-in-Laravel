@extends('layouts.app')

@section('content')
  <div class="col-md-9 col-lg-9 col-sm-9 pull-left">



      <div class="jumbotron">
        <h1>{{$project->name}}</h1>
        <p class="lead">{{$project->description}}</p>
        {{-- <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> --}}
      </div>


      <!-- Example row of columns -->
      <div class="row col-md-12 col-lg-12 col-sm-12" style="background: white; margin:10px;">
        {{-- <a href="/projects/create" class="pull-right btn btn-primary btn-sm">Add a Project</a> --}}

              <br>
              @include('partials.comments')

              <div class="row container-fluid">



                <form method="post" action="{{ route('comments.store') }}">
                                            {{ csrf_field() }}


                                            <input type="hidden" name="commentable_type" value="App\Project">
                                            <input type="hidden" name="commentable_id" value="{{$project->id}}">


                                            <div class="form-group">
                                                <label for="comment-content">Comment</label>
                                                <textarea placeholder="Enter comment"
                                                          style="resize: vertical"
                                                          id="comment-content"
                                                          name="body"
                                                          rows="3" spellcheck="false"
                                                          class="form-control autosize-target text-left">


                                                          </textarea>
                                            </div>


                                            <div class="form-group">
                                                <label for="comment-content">Proof of work done (Url/Photos)</label>
                                                <textarea placeholder="Enter url or screenshots"
                                                          style="resize: vertical"
                                                          id="comment-content"
                                                          name="url"
                                                          rows="2" spellcheck="false"
                                                          class="form-control autosize-target text-left">


                                                          </textarea>
                                            </div>


                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary"
                                                       value="Submit"/>
                                            </div>
                                        </form>
                                        </div>
{{--  --}}


        </div>
        </div>


        <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
          {{-- <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> --}}
          <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
              <li><a href="/projects/{{$project->id}}/edit">Edit</a></li>
              <li><a href="/projects/create">Add a Project</a></li>
              <li><a href="/projects">View My Projects</a></li>
              <br>

              @if($project->user_id == Auth::user()->id)
              <li>
                <a
             href="#"
                 onclick="
                 var result = confirm('Are you sure you wish to delete this Project?');
                     if( result ){
                             event.preventDefault();
                             document.getElementById('delete-form').submit();
                     }
                         "
                         >
                 Delete
             </a>

             <form id="delete-form" action="{{ route('projects.destroy',[$project->id]) }}"
               method="POST" style="display: none;">
                       <input type="hidden" name="_method" value="delete">
                       {{ csrf_field() }}
             </form>
              </li>

        @endif
              {{-- <li><a href="#">Add User</a></li> --}}
            </ol>
            <hr>
            <h4>Add Members</h4>
            <div class="row">
              <div class="col-lg-1-12 col-md-1-12 col-sm-12">
                <form id="add_user" action="{{ route('projects.adduser') }}"
                  method="POST">
                  {{csrf_field()}}
                <div class="input-group">
                  <input class="form-control" name="project_id" value="{{$project->id}}" type="hidden">
                  <input type="text" class="form-control" name="email" placeholder="Email">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="button"> Add</button>
                  </span>
                </div>
              </form>

              </div>

              </div>

          <hr>
          <h4>Team Members</h4>
          <ol class="list-unstyled">
            @foreach ($project->users as $user)
              <li><a href="#">{{$user->email}}</a</li>
            @endforeach


          </ol>

          {{-- <div class="sidebar-module">
            <h4>Users</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
            </ol>
          </div> --}}
        </div>
    @endsection
