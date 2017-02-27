@extends('layouts.main')


@section('content')
    <div class="container blog-content">

      <div class="row">

        <div class="col-sm-8 blog-main">

        <h1>View blogs</h1>

        <hr>

          <div class="row">
            <div class="col-sm-12">
                <div id="loading" style="margin-left: 150px; margin-top: 50px; display: none;"></div>
                <input type="hidden" id="postId" value="{{ Auth::user()->id }}">
                <table id="blogsTable" class="table" cellspacing="0" width="100%">
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
                        @foreach($blogLists as $blogList)
                            <tr>
                                <td>{{ $blogList->title }}</td>
                                <td>{{ $blogList->category }}</td>
                                <td>{{ date("F j, Y, g:i a", strtotime($blogList->created_at)) }}</td>
                                <td>
                                    <center>
                            
                                        <span class="btn-group">
                                            <a class="btn btn-default btn btn-info tourView" href="{{ URL::to('/posts/' . $blogList->id ) }}" title="View Blog!">
                                                <i class="fa fa-search"></i>
                                            </a>
                                            <a class="btn btn-default btn btn-warning tourupdate" href="{{ URL::to('/posts/update/' . $blogList->id ) }}" title="Edit Blog!">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <input type="hidden" id="token" value="{{ csrf_token() }}">
                                            <input type="checkbox" class="publish_btn" data-toggle="toggle" data-on="Publish" data-off="Unpublish" data-onstyle="success" data-id="{{ $blogList->id }}" data-offstyle="danger" {{ $blogList->is_publish == 1 ? '' : 'checked' }}>
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

        @include('layouts.visitorSideBar')

      </div><!-- /.row -->

    </div><!-- /.container -->
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>

@endsection
