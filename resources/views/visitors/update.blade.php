@extends('layouts.main')


@section('content')
    <div class="container blog-content">

      <div class="row">

        <div class="col-sm-8 blog-main">

        <h1>Update blog</h1>
        
        <hr>

        <form method="POST" action="{{ action('PostsController@updateBlog') }}">
        	{{ csrf_field() }}

        	<input type="hidden" name="blog_id" value="{{$blogById[0]->id}}">
        	<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
		  <div class="form-group">
		    <label for="blog_title">Title</label>
		    <input type="text" class="form-control" id="blog_title" name="blog_title" value="{{$blogById[0]->title}}" required>
		  </div>

		  <div class="form-group">
		    <label for="blog_desc">Description</label>
		    <select class="form-control" name="blog_category" required>
		    	<option value="Music" {{ $blogById[0]->category == 'Music' ? 'selected' : '' }}>Music</option>
		    	<option value="Fashion" {{ $blogById[0]->category == 'Fashion' ? 'selected' : '' }}>Fashion</option>
		    	<option value="News" {{ $blogById[0]->category == 'News' ? 'selected' : '' }}>News</option>
		    	<option value="Apps" {{ $blogById[0]->category == 'Apps' ? 'selected' : '' }}>Apps</option>
		    	<option value="Brand" {{ $blogById[0]->category == 'Brand' ? 'selected' : '' }}>Brand</option>
		    </select>
		  </div>


		  <div class="form-group">
		    <label for="blog_desc">Description</label>
		    <textarea id="blog_desc" name="blog_desc" class="form-control" required>{{$blogById[0]->body}}</textarea>
		  </div>

		  <div class="form-group">
		  	<button type="submit" class="btn btn-primary">Update</button>
		  </div>


		</form>

        </div>

        @include('layouts.visitorSideBar')

      </div>

    </div>

@endsection

