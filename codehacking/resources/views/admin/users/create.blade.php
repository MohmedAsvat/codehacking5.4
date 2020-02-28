@extends('layouts.admin') @section('content')
<h3>Create User</h3>
@include('includes.form_error') {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store','files'=>true]) !!}
{{csrf_field()}}
<div class="form-group">
    {!!Form::label('name','Name')!!} {!!Form::text('name',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
    {!!Form::label('email','Email')!!} {!!Form::email('email',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
    {!!Form::label('role_id','Role')!!} {!!Form::select('role_id',[''=>'Chosse Options'] + $roles ,null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
    {!!Form::label('is_active','Status')!!} {!!Form::select('is_active',array(1=>'Active',0=>'Not Active'),0,['class'=>'form-control'])!!}
</div>

<div class="form-group">
    {!!Form::label('photo_id','Select Photo')!!}{!!Form::file('photo_id',['class'=>'form-control'])!!}
</div>

<div class="form-group">
    {!!Form::label('password','Password')!!} {!!Form::password('password',['class'=>'form-control'])!!}
</div>

<div class="class form-group">
    {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
</div>
{!! Form::close() !!} @endsection