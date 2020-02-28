@extends('layouts.admin') 
@section('content')

<h3>Edit Categories</h3>

<div class="row">
    @include('includes.form_error')
</div>
<div class="col-sm-6">
@include('includes.form_error') 
{!! Form::model($category,['method'=>'PATCH','action'=>['AdminCategoryController@update',$category->id]])!!} 

{{csrf_field()}}
<div class="form-group">
    {!!Form::label('name','Name')!!} 
    {!!Form::text('name',null,['class'=>'form-control'])!!}
</div>

<div class="class form-group">
    {!! Form::submit('Update Category',['class'=>'btn btn-primary col-sm-6']) !!}
</div>
{!! Form::close() !!} 



{!! Form::open(['method'=>'DELETE','action'=>['AdminCategoryController@destroy',$category->id]]) !!} 
{{csrf_field()}}
<div class="class form-group">
    {!! Form::submit('Delete Category',['class'=>'btn btn-danger col-sm-6']) !!}
</div>
{!! Form::close() !!} 
</div>
@endsection