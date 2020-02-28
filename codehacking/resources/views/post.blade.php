@extends('layouts.blog-post') @section('content')

<!-- Blog Post -->

<!-- Title -->
<h1>{{$post->title}}</h1>

<!-- Author -->
<p class="lead">
    by
    <a href="#">{{$post->user->name}}</a>
</p>

<hr>

<!-- Date/Time -->
<p>
    <span class="glyphicon glyphicon-time"></span> {{$post->created_at->diffForHumans()}}</p>

<hr>

<!-- Preview Image -->
<img class="img-responsive" src="{{$post->photo->file}}" alt="">

<hr>

<!-- Post Content -->
{{$post->body}}
<hr>

<!-- Blog Comments -->

<!-- Comments Form -->

@if(Auth::check())

<div class="well">
    <h4>Leave a Comment:</h4>

    @include('includes.form_error') {!! Form::open(['method'=>'POST','action'=>'PostCommentController@store']) !!} {{csrf_field()}}

    <input type="hidden" name="post_id" value="{{$post->id}}">
    <div class="form-group">
        {!!Form::textarea('body',null,['class'=>'form-control', 'rows'=>3])!!}
    </div>

    <div class="class form-group">
        {!! Form::submit('Comment',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

</div>

@endif

<hr> @if($comments) @foreach($comments as $comment)

<!-- Posted Comments -->

<!-- Comment -->
<div class="media">
    <a class="pull-left" href="#">
        <img height="64" class="media-object" src="{{$comment->photo}}" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">{{$comment->author}}
            <small>{{$comment->created_at->diffForHumans()}}</small>
        </h4>
        {{$comment->body}}
        @if(count($comment->replies)>0) 
        @foreach($comment->replies as $reply)
            
            @if($reply->is_active == 1)
        <!-- Nested Comment -->
        <div id="nested-comment" class="media">
            <a class="pull-left" href="#">
                <img height="64" class="media-object" src="{{$reply->photo}}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$reply->author}}
                    <small>{{$reply->created_at->diffForHumans()}}</small>
                </h4>
                {{$reply->body}}
            </div>




            <div class="comment-reply-container">
                <button class="toggle-reply btn btn-primary pull-right"> Reply</button>

                <div class="comment-reply col-sm-6">

                    @include('includes.form_error') {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) !!} 
                    {{csrf_field()}}

                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                    <div class="form-group">
                        {!!Form::textarea('body',null,['class'=>'form-control', 'rows'=>3])!!}
                    </div>

                    <div class="class form-group">
                        {!! Form::submit('Comment',['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- End Nested Comment -->
        @endif
        @endforeach @endif

    </div>
</div>

@endforeach @endif @endsection 

@section('scripts')
<script>
    $(".comment-reply-container .toggle-reply").click(function () {
         $(this).next().slideToggle("slow");
    });
</script>
@endsection
