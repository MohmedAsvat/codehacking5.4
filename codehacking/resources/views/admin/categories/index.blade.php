@extends('layouts.admin') @section('content')

<!-- @if(Session::has('delete_user'))
<p class="bg-danger">{{session('delete_user')}}</p>
@endif  -->

<h3>Users</h3>

<div class="col-sm-6">
    <h3>Create User</h3>
    @include('includes.form_error') 
    {!! Form::open(['method'=>'POST','action'=>'AdminCategoryController@store']) !!}
    {{csrf_field()}}
    <div class="form-group">
        {!!Form::label('name','Name')!!} {!!Form::text('name',null,['class'=>'form-control'])!!}
    </div>

    <div class="class form-group">
        {!! Form::submit('Create Category',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>

<div class="col-sm-6">
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Create</th>
                <th>Update</th>
            </tr>
        </thead>

        <tbody>
            @if($categories) @foreach($categories as $category)

            <tr>
                <td>{{$category->id}}</td>
                <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                <td>{{$category->created_at ? $category->created_at->diffForHumans() : ''}}</td>
                <td>{{$category->updated_at ? $category->updated_at->diffForHumans() : ''}}</td>
            </tr>
            @endforeach @endif
        </tbody>
    </table>
</div>

@endsection