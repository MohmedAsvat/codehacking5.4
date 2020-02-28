@extends('layouts.admin') 
@section('content')

@if(Session::has('delete_user'))
<p class="bg-danger">{{session('delete_user')}}</p>
@endif 

 <h3>Users</h3>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Create</th>
            <th>Update</th>
        </tr>
    </thead>

    <tbody>
        @if($users) 
        
            @foreach($users as $user)
                 
            <tr>
            <td>{{$user->id}}</td>
            <!-- image retrive simple way -->
            <!-- <td><img height="20" src="/images/{{$user->photo ? $user->photo->file : 'Not Photo For User'}}" alt=""></td> -->
            <!-- image retrive accessor way -->
            <td><img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
            <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->is_active== 1 ? 'Active' : 'Not Active'}}</td>
            <td>{{$user->created_at ? $user->created_at->diffForHumans() : ''}}</td>
            <td>{{$user->updated_at ? $user->updated_at->diffForHumans() : ''}}</td>
            </tr>
            @endforeach 
            
        @endif
    </tbody>
</table>

@endsection