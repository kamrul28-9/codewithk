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
      <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->addHours(6)->toDayDateTimeString()}} by {{$post->user->email}}</p>
      <!-- Post categories-->

      <a class="badge bg-secondary text-decoration-none link-light" href="">{{$post->category->name}}</a>
      <hr>
    </header>

    <!-- Preview image figure-->
    <figure class="mb-4"><img class="img-fluid rounded" src="{{$post->photo ? $post->photo->file : $post->photoPlaceholder()}}" alt="" /></figure>
    <hr>

    <!-- Post content-->
    <section class="mb-5">
      <p>{!! $post->body !!}</p>
    </section>
    <hr>

</article>


    @if(Session::has('comment_message'))
        {{session('comment_message')}}
   @endif

<!-- Blog Comments -->
<div class="card bg-light">
  <div class="card-body">
      @if(Auth::check())
        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>
            {!! Form::open(['method'=>'POST', 'action'=> 'App\Http\Controllers\PostCommentsController@store']) !!}
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="form-group">
                    {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3])!!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Submit comment', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
      @endif
<hr>

<!-- Posted Comments -->
@if(count($comments) > 0)
    @foreach($comments as $comment)

<!-- Comment -->
<div class="d-flex">
    <a class="pull-left" href="#">
        <img class="rounded-circle" height="50" width="50" src="{{$comment->photo}}" alt="">
    </a>
    <div class="ms-3">
        <h6 class="fw-bold">{{$comment->author}}
            <small>{{$comment->created_at->diffForHumans()}}</small>
        </h6>
        <p>{{$comment->body}}</p>

          @if(count($comment->replies) > 0)
              @foreach($comment->replies as $reply)
                @if($reply->is_active == 1)

                    <!-- Nested Comment -->
                    <div class="d-flex">
                        <a class="pull-left">
                            <img class="rounded-circle" height="50" width="50" src="{{$reply->photo}}" alt="">
                        </a>
                        <div class="ms-3">
                            <h6 class="fw-bold">{{$reply->author}}
                                <small>{{$reply->created_at->diffForHumans()}}</small>
                            </h6>
                            <p>{{$reply->body}}</p>
                        </div>
                        <div class="comment-reply-container">
                          <div class="card mb-4" id="headingOne">
                                <button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                  Search Button Bellow
                                </button>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                                  <div class="comment-reply col-sm-6">
                                          {!! Form::open(['method'=>'POST', 'action'=> 'App\Http\Controllers\CommentRepliesController@createReply']) !!}
                                               <div class="form-group">

                                                   <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                                   {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>1])!!}
                                               </div>
                                               <div class="form-group">
                                                   {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
                                               </div>
                                          {!! Form::close() !!}
                                  </div>
                              </div>
                            </div>
                          </div>


                    <!-- End Nested Comment -->
                </div>
                     @else
                         <h1 class="text-center">No Replies</h1>
                    @endif
                 @endforeach
          @endif
      </div>
</div>
 @endforeach
@endif

  </div>
</div>
@endsection


@section('scripts')

        <!-- <script>
            $(".comment-reply-container .toggle-reply").onclick(function(){
                $(this).next().slideToggle("slow");
            });
        </script> -->






@endsection
