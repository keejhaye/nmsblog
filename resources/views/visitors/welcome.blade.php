@extends('layouts.main')


@section('content')
    <div class="container blog-content">

      <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="row">
            <div class="col-sm-12">
              @foreach($posts as $post)

                <section class="blog-post">
                  <div class="panel panel-default">
                    <!-- <img src="http://paullaros.nl/material-blog-1-1/img/technology/unsplash-2.jpg" class="img-responsive" /> -->
                    <div class="panel-body">
                      <div class="blog-post-meta">
                        <span class="label label-light label-primary">{{$post->category}}</span>
                        <p class="blog-post-date pull-right">{{ date("F j, Y, g:i a", strtotime($post->created_at)) }} by <span style="color: #03a9f4;">{{$post->name}}</span></p>
                      </div>
                      <div class="blog-post-content">
                        <a href="post-image.html">
                          <h2 class="blog-post-title"><a href="{{URL::to('posts') . '/' . $post->id }}">{{$post->title}}</a></h2>
                        </a>
                        <p>{{ substr($post->body, 0, 500) }} {{ strlen($post->body) > 50 ? "..." : "" }}</p>
                        <a class="btn btn-info" href="{{URL::to('posts') . '/' . $post->id }}">Read more</a>
                      </div>
                    </div>
                  </div>
                </section><!-- /.blog-post -->

              @endforeach

            </div>
          </div>

          <nav>
            <ul class="pager">
              <li><a class="withripple" href="#">Previous</a></li>
              <li><a class="withripple" href="#">Next</a></li>
            </ul>
          </nav>

        </div><!-- /.blog-main -->

        @include('layouts.visitorSideBar')

      </div><!-- /.row -->

    </div><!-- /.container -->
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>

@endsection

