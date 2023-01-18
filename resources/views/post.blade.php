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
                  @if(Session::has('comment_message'))
                      {{session('comment_message')}}
                  @endif
                <div class="card-body">
                    <!-- Comment form: Only logged user can see this and leave a comment, for more: see PostCommentsController@store -->
                    <div class="well">
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

                    <!-- Comment with nested comments-->
                    <div class="d-flex mb-4">
                        <!-- Parent comment-->
                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                        <div class="ms-3">
                            <div class="fw-bold">Commenter Name</div>
                            If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                            <!-- Child comment 1-->
                            <div class="d-flex mt-4">
                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                <div class="ms-3">
                                    <div class="fw-bold">Commenter Name</div>
                                    And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                </div>
                            </div>
                            <!-- Child comment 2-->
                            <div class="d-flex mt-4">
                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                <div class="ms-3">
                                    <div class="fw-bold">Commenter Name</div>
                                    When you put money directly to a problem, it makes a good headline.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single comment-->
                    <div class="d-flex">
                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                        <div class="ms-3">
                            <div class="fw-bold">Commenter Name</div>
                            When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
