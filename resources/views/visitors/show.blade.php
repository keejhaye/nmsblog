@extends('layouts.main')


@section('content')
    <div class="container blog-content">

      <div class="row">

        <div class="col-sm-8 blog-main">

          <section class="blog-post">
            <div class="panel panel-default">
              <!-- <img src="img/technology/unsplash-2.jpg" class="img-responsive" /> -->
              <div class="panel-body">
                <div class="blog-post-meta">
                  <span class="label label-light label-warning">{{$post->category}}</span>
                  <p class="blog-post-date pull-right">{{$post->created_at->toFormattedDateString()}}</p>
                </div>
                <div class="blog-post-content">
                  <h2 class="blog-post-title">{{$post->title}}</h2>
                  
                  <p>{{$post->body}}</p>

                

                </div>
              </div>
            </div>
          </section><!-- /.blog-post -->

          <section class="blog-comments">
            <div class="panel panel-default">
              <div class="panel-body">
                <h2 class="blog-post-title">Comments</h2>
                <div id="disqus_thread"></div>
                  <ul class="list-group">
                    
                        @foreach($comments as $comment)

                            <li class="list-group-item">
                              <strong style="font-size: 15px;">{{ $comment->name }} ({{ $comment->user_role }})</strong> 
                              <span style="color: #90949c; font-size: 13px;">{{ date("F j, Y, g:i a", strtotime($comment->created_at)) }}</span>

                              <br>

                                  {{ $comment->body }}
                            </li>

                        @endforeach

                  </ul>


                  <hr>

                    @if (Auth::guest())
                          <div class="card">
                            <div class="card-block">
                                <form method="POST" action="{{ URL::to('/posts/') . '/' . $post->id . '/comments/visitors'  }}">
                                {{ csrf_field() }}
                                    <div class="form-group">
                                       <input type="hidden" name="post_id" value="{{ $post->id }}">
                                       <input type="text" name="name" class="form-control" placeholder="Name" required>
                                       <textarea name="body" placeholder="Comment here." class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                      <button type="submit" class="btn btn-primary">Add Comment</button>
                                    </div>
                                </form>
                            </div>
                          </div>
                    @else
                          <div class="card">
                            <div class="card-block">
                                <form method="POST" action="{{ URL::to('/posts/') . '/' . $post->id . '/comments'  }}">
                                {{ csrf_field() }}
                                    <div class="form-group">
                                       <input type="hidden" name="post_id" value="{{ $post->id }}">
                                       <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                       <textarea name="body" placeholder="Comment here." class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                      <button type="submit" class="btn btn-primary">Add Comment</button>
                                    </div>
                                </form>
                            </div>
                          </div>
                    @endif


              </div>
            </div>
          </section>

        </div><!-- /.blog-main -->

        @include('layouts.visitorSideBar')

      </div><!-- /.row -->

    </div><!-- /.container -->

@endsection