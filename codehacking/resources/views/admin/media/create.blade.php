@extends('layouts.admin') 

@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">

@endsection

@section('content')
<h3>Create Media</h3>
<!-- @include('includes.form_error')  -->


{!! Form::open(['method'=>'POST','action'=>'AdminMediaController@store','class'=>'dropzone']) !!}
{{csrf_field()}}

<!-- <div class="form-group">
    {!!Form::label('photo_id','Select Photo')!!}{!!Form::file('photo_id',['class'=>'form-control'])!!}
</div>

<div class="class form-group">
    {!! Form::submit('Create Media',['class'=>'btn btn-primary']) !!}
</div> -->
{!! Form::close() !!} 
@endsection


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js">
</script>
@endsection