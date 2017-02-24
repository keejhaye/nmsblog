@extends('layouts.main')


@section('content')
    <div class="container blog-content">

      <div class="row">

        <div class="col-sm-8 blog-main">

        <h1>Create a post</h1>

        <hr>

        <form method="POST" action="{{ action('PostsController@store') }}">
        	{{ csrf_field() }}
        	<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
		  <div class="form-group">
		    <label for="blog_title">Title</label>
		    <input type="text" class="form-control" id="blog_title" name="blog_title" required>
		  </div>

		  <div class="form-group">
		    <label for="blog_desc">Description</label>
		    <select class="form-control" name="blog_category" required>
		    	<option value="">--Select--</option>
		    	<option value="Music">Music</option>
		    	<option value="Fashion">Fashion</option>
		    	<option value="News">News</option>
		    	<option value="Apps">Apps</option>
		    	<option value="Brand">Brand</option>
		    </select>
		  </div>


		  <div class="form-group">
		    <label for="blog_desc">Description</label>
		    <textarea id="blog_desc" name="blog_desc" class="form-control" required></textarea>
		  </div>

		  <div class="form-group">
		  	<button type="submit" class="btn btn-primary">Publish</button>
		  </div>


		</form>

        </div>

        @include('layouts.visitorSideBar')

      </div>

    </div>

@endsection

