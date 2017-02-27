<div class="col-sm-3 col-sm-offset-1 blog-sidebar">



    @if (!Auth::guest())
            <ul class="list-group">
              <li class="list-group-item">
                <h4>Hi {{Auth::user()->name}}!</h4>
              </li>
              <li class="list-group-item">
                 <a href="{{URL::to('/posts/create')}}">Create Blog</a>
              </li>
              <li class="list-group-item">
                <a href="{{URL::to('/blogs/' . Auth::user()->id)}}">View Blog</a> 
              </li>
              <li class="list-group-item">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>
              </li>
            </ul>    

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>     
    @else 

            <ul class="list-group">
              <li class="list-group-item">
                    <h4>Want to post a blog?</h4>

                    Login via
                    <div class="social-buttons" >
                        <a href="{{ url('/auth/google') }}" class="btn btn-primary social-login-btn social-google" style="width: 100%;"><i class="fa fa-google-plus"> Google</i></a>
                    </div>
              </li>
            </ul>  

    @endif

    <div class="sidebar-module">
      <div class="panel panel-default">
        <div class="panel-body">
          <h4>About</h4>
          <p>A simple blog project.</p>
        </div>
      </div>
    </div><!-- /.sidebar-module -->

    <div class="sidebar-module">
      <div class="panel panel-default">
        <div class="panel-body">
          <h4>Categories</h4>
          <ol class="categories list-unstyled">
            <li>
              <a class="label label-light label-primary" href="{{ url('/posts/category/music') }}">Music</a>
              <span class="label label-light label-default pull-right">{{ $categCount[0]->cat }}</span>
            </li>
            <li>
              <a class="label label-light label-primary" href="{{ url('/posts/category/fashion') }}">Fashion</a>
              <span class="label label-light label-default pull-right">{{ $categCount[1]->cat }}</span>
            </li>
            <li>
              <a class="label label-light label-primary" href="{{ url('/posts/category/news') }}">News</a>
              <span class="label label-light label-default pull-right">{{ $categCount[2]->cat }}</span>
            </li>
            <li>
              <a class="label label-light label-primary" href="{{ url('/posts/category/apps') }}">Apps</a>
              <span class="label label-light label-default pull-right">{{ $categCount[3]->cat }}</span>
            </li>
            <li>
              <a class="label label-light label-primary" href="{{ url('/posts/category/brand') }}">Brand</a>
              <span class="label label-light label-default pull-right">{{ $categCount[4]->cat }}</span>
            </li>
          </ol>
        </div>
      </div>
    </div><!-- /.sidebar-module -->

<!--     <div class="sidebar-module">
      <div class="panel panel-default">
        <div class="panel-body">
          <h4>Archives</h4>
          <ol class="list-unstyled">
            <li><a href="filter-date.html">February 2016</a></li>
            <li><a href="filter-date.html">January 2016</a></li>
            <li><a href="filter-date.html">December 2015</a></li>
            <li><a href="filter-date.html">November 2015</a></li>
            <li><a href="filter-date.html">October 2015</a></li>
            <li><a href="filter-date.html">September 2015</a></li>
            <li><a href="filter-date.html">August 2015</a></li>
            <li><a href="filter-date.html">July 2015</a></li>
            <li><a href="filter-date.html">June 2015</a></li>
            <li><a href="filter-date.html">May 2015</a></li>
            <li><a href="filter-date.html">April 2015</a></li>
            <li><a href="filter-date.html">March 2015</a></li>
          </ol>
        </div>
      </div>
    </div> -->
    <!-- /.sidebar-module -->



  </div><!-- /.blog-sidebar -->