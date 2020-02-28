@extends('layouts.admin') @section('content') @if(Session::has('delete_media'))
<div class="alert alert-success">
    {{session('delete_media')}}
</div>
@endif
<h3>Media</h3>

<form action="delete/media" method="post" class="form-inline">
    {{csrf_field()}}
    {{method_field('delete')}}
    <div class="form-group">
        <select name="checkBoxArray" class="form-control">
            <option value="delete">Delete</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="delete_all" class="btn btn-primary">
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>
                    <input type="checkbox" id="options">
                </th>
                <th>Id</th>
                <th>Name</th>
                <th>Create</th>
                <th>Update</th>
            </tr>
        </thead>

        <tbody>
            @if($photos) @foreach($photos as $photo)

            <tr>
                <td>
                    <input type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}" class="checkBoxes">
                </td>
                <td>{{$photo->id}}</td>
                <td>
                    <img height="50" src="{{$photo->file}}" alt="">
                </td>
                <td>{{$photo->created_at ? $photo->created_at : 'no date'}}</td>
                <td>{{$photo->updated_at ? $photo->updated_at : 'no date'}}</td>
                <td>

                    <!-- {!! Form::open(['method'=>'DELETE','action'=>['AdminMediaController@destroy',$photo->id]]) !!} {{csrf_field()}} -->
                    <input type="hidden" name="photo" value="{{$photo->id}}">
                    <!-- <div class="form-group">
                    <input type="submit" value="Delete" name="delete_single" class="btn btn-danger"> -->
                        <!-- {!! Form::submit('Delete Photo',['class'=>'btn btn-danger']) !!} -->
                    <!-- </div> -->
                    <!-- {!! Form::close() !!} -->

                </td>
            </tr>
            @endforeach @endif
        </tbody>
    </table>

</form>
@endsection

@section('scripts')
<script>

$(document).ready(function(){
    $('#options').click(function(){
        if(this.checked)
        {
            $('.checkBoxes').each(function(){
            this.checked = true;
            });
        }
        else
        {
            $('.checkBoxes').each(function(){
            this.checked = false;
            });
        }
    });
});

</script>
@endsection