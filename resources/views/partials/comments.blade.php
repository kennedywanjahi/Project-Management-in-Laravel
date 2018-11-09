<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">

            <!-- Fluid width widget -->
    	    <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-comment"></span> 
                        Recent Comments
                    </h3>
                </div>
                <div class="panel-body">
                    <ul class="media-list">


                      @foreach ($comments as $comment)
                        <li class="media">
                            <div class="media-left">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <small>

                                      <a href="users/{{$comment->user->id}}">
                                        {{$comment->user->first_name}}
                                        {{$comment->user->last_name}}
                                         -
                                        {{$comment->user->email}}
                                        </a>
                                        commented on {{$comment->created_at}}
                                    </small>
                                </h4>
                                <p>  {{$comment->body}} </p>
                                <p>  <b>Proof: </b> {{$comment->url}}
                                </p>
                            </div>
                        </li>

                      @endforeach

                    </ul>
                </div>
                </div>

{{--  --}}




          </div>
        </div>
