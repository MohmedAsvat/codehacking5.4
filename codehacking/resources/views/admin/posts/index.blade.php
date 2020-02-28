@extends('layouts.admin') @section('content') @if(Session::has('delete_user'))
<p class="bg-danger">{{session('delete_user')}}</p>
@endif

<h3>Posts</h3>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Post link</th>
            <th>Comments</th>
            <th>Create</th>
            <th>Update</th>
        </tr>
    </thead>

    <tbody>
        @if($posts) @foreach($posts as $post)

        <tr>
            <td>{{$post->id}}</td>
            <!-- image retrive accessor way -->
            <td>
                <img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="">
            </td>
            <td>
                <a href="{{route('admin.posts.edit',$post->id)}}">{{$post->user->name}}</a>
            </td>
            <td>{{$post->category ? $post->category->name : 'Uncategorize'}}</td>
            <!-- <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->name}}</a></td> -->
            <td>{{$post->title}}</td>
            <td>{{str_limit($post->body,20)}}</td>
            <td>
                <a href="{{route('home.post',$post->id)}}">View Post</a>
            </td>
            <td>
                <a href="{{route('admin.comments.show', $post->id)}}">View Comments</a>
            </td>
            <td>{{$post->created_at ? $post->created_at->diffForHumans() : ''}}</td>
            <td>{{$post->updated_at ? $post->updated_at->diffForHumans() : ''}}</td>
        </tr>
        @endforeach @endif
    </tbody>
</table>

<div class="row">
    <div class="col-sm-6 col-sm-offset-5">
          {{$posts->render()}}
    </div>
</div>

@endsection