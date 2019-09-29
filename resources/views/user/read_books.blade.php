@extends("layouts.app")

@section("title","Read Books | Pet Fashion Management System" )

@section("content")

<!-- User Profile area -->
<div class="panel panel-default ourPro">
    @include('includes.profile_navbar')
    <!-- Main content -->
    <section class="container">
        <div class="row">
            @include('includes.profile_card')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="well">
                        <h5>Read Books</h5>
                    </div><!-- /.card-header -->
                    <div class="panel-body">
                        <!-- My Blogs -->
                            <!-- Get the first Post area 1.1 -->
                            @if(isset($books))
                            @foreach ($books as $book)
                                
                            <div class="col-lg-4">
                                <article class="hentry post post-standard has-post-thumbnail ">
                                    <div class="post-thumb">
                                        <img src="{{asset($book->image)}}" alt="#"   style="height:150px;">
                                        <div class="overlay"></div>
                                        <a href="{{asset($book->image)}}" class="link-image js-zoom-image">
                                            <i class="seoicon-zoom"></i>
                                        </a>
                                        <a  class="link-post book" href="http://docs.google.com/gview?{{$book->books}}&embedded=true"  target="_blank">
                                            <i class="seoicon-link-bold"></i>
                                        </a>
                                    </div>
                                    <div class="post__content">
            
                                        <div class="post__content-info">
            
                                            <h6 class="post__title2 entry-title ">
                                                <a class=" book" href="http://docs.google.com/gview?{{$book->books}}&embedded=true"  target="_blank" >{{$book->title}}</a>
                                            </h6>
                                        </div>
                                    </div>
            
                                </article>
                            </div>
                            @endforeach
                            @endif
                      
                            <div class="row pb120 align-center">
                
                                <div class="col-lg-12">{{ $books->links()  }}</div>
        
                            </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </section>







</div>
<!-- User Profile area -->
@endsection