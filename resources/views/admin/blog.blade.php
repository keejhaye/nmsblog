@extends('admin.main')


@section('content')
   <div class="container blog-content">

      <div class="row">

        <div class="col-sm-8 blog-main">

        <h1>View All Blogs</h1>

        <hr>

          <div class="row">
            <div class="col-sm-12">
                <div id="loading" style="margin-left: 150px; margin-top: 50px; display: none;"></div>
                <input type="hidden" id="postId" value="{{ Auth::user()->id }}">
                <table id="authorTable" class="table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <!-- <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Date Created</th>
                        </tr>
                    </tfoot> -->
                    <tbody>
                        @foreach($allBlogs as $allBlog)
                            <tr>
                                <td>{{ $allBlog->title }}</td>
                                <td>{{ $allBlog->category }}</td>
                                <td>{{ date("F j, Y, g:i a", strtotime($allBlog->created_at)) }}</td>
                                <td>
                                    <center>
                                        <span class="btn-group">
                                            <input type="hidden" id="token" value="{{ csrf_token() }}">
                                            <input type="checkbox" class="publish_btn" data-toggle="toggle" data-on="Publish" data-off="Unpublish" data-onstyle="success" data-id="{{ $allBlog->id }}" data-offstyle="danger" {{ $allBlog->is_publish == 1 ? '' : 'checked' }}>
                                        </span>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>


        </div><!-- /.blog-main -->

        @include('admin.visitorSideBar')

      </div><!-- /.row -->

    </div><!-- /.container -->
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>

@endsection
