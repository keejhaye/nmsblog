<div class="col-sm-3 col-sm-offset-1 blog-sidebar">


     <ul class="list-group">
          <li class="list-group-item">
            <h4>Hi {{Auth::user()->name}}!</h4>
          </li>
          <li class="list-group-item">
             <a href="{{URL::to('/login/admin/author')}}">View Authors</a>
          </li>
          <li class="list-group-item">
            <a href="{{URL::to('/login/admin/blog')}}">View Blog</a> 
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



  </div><!-- /.blog-sidebar -->