@extends('layouts.blog-post')

@section('content')


        <!-- Post content-->
        <article>
            <!-- Post header-->
            <header class="mb-4">
                <!-- Post title-->
                <h1>{{ $post->title }}</h1>
                <!-- author-->
                <p class="lead"><a href="#">{{$post->user->name}}</a></p>
                <hr>
                <!-- date/time-->
                <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}} by {{$post->user->email}}</p>
                <!-- Post categories-->

                <a class="badge bg-secondary text-decoration-none link-light" href="">{{$post->category->name}}</a>
                <hr>
            </header>
            <!-- Preview image figure-->
            <figure class="mb-4"><img class="img-fluid rounded" src="{{$post->photo ? $post->photo->file : 'No Photo Available'}}" alt="" /></figure>
            <hr>
            <!-- Post content-->
            <section class="mb-5">
                <p>{{$post->body}}</p>
            </section>
            <hr>

        </article>

        <!-- Comments section-->
        <section class="mb-5">
            <div class="card bg-light">

                <div class="card-body">
                    <!-- Comment form: Only logged user can see this and leave a comment, for more: see PostCommentsController@store -->
                  @if(Auth::check())
                    <div class="well">

                      @if(Session::has('comment_message'))
                          {{session('comment_message')}}
                      @endif
                      <h4>Leave your comment here</h4>

                          {!! Form::open(['method'=>'POST', 'action'=> ['App\Http\Controllers\PostCommentsController@store']]) !!}
                          {!! csrf_field() !!}
                          <input type="hidden" name="post_id" value="{{$post->id}}">
                          <div class="form-group">
                              {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'join the discusion..']) !!}
                          </div>
                          <div class="form-group">
                            {!! Form::submit('Submit Comment', ['class' => 'btn btn-primary']) !!}
                          </div>
                          {!! Form::close() !!}

                      </div>
                    @endif

                    <!-- Single Parent comments-->
                    @if(count($comments) > 0)
                     @foreach($comments as $comment)
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                          <img class="rounded-circle" height="50" width="50" src="{{$comment->photo}}" alt="..." />
                        </div>
                        <div class="ms-3">
                            <h6 class="fw-bold">{{$comment->author}}
                                <small>{{$comment->created_at->addHours(6)->toDayDateTimeString()}}</small>
                            </h6>
                            <p>{{$comment->body}}</p>
                      <!-- End Single Parent comments-->


                              <!-- nested comments-->
                        @if(count($comment->replies) > 0)
                          @foreach($comment->replies as $reply)
                            <div class="d-flex mt-4">
                                <div class="flex-shrink-0"><img class="rounded-circle" height="50" width="50" src="{{$reply->photo}}" alt="..." /></div>
                                <div class="ms-3">
                                    <h6 class="fw-bold">{{$reply->author}}
                                        <small>{{$reply->created_at->addHours(6)->toDayDateTimeString()}}</small>
                                    </h6>
                                    <p>{{$reply->body}}</p>
                                </div>
                            </div>

                            <!-- From for nested comments-->
                            {!! Form::open(['method'=>'POST', 'action'=> ['App\Http\Controllers\CommentRepliesController@createReply']]) !!}
                            {!! csrf_field() !!}

                            <input type="hidden" name="comment_id" value="{{$comment->id}}">
                            <div class="form-group">
                                {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 1, 'placeholder' => 'reply here..']) !!}
                            </div>
                            <div class="form-group">
                              {!! Form::submit('Submit Reply', ['class' => 'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}

                          @endforeach
                        @endif
                            <!--End nested comments-->
                      </div>
                    </div>
                     @endforeach
                    @endif

                </div>
            </div>
        </section>

@endsection
