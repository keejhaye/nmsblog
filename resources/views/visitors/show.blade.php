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
                <script>
                /**
                * RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                * LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
                */
                /*
                var disqus_config = function () {
                this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };
                */
                (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');

                s.src = '//materialblogbootstrap.disqus.com/embed.js';

                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
                })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
              </div>
            </div>
          </section>

        </div><!-- /.blog-main -->

        @include('layouts.visitorSideBar')

      </div><!-- /.row -->

    </div><!-- /.container -->

@endsection