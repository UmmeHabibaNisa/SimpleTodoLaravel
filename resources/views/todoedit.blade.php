@extends('layouts.app')
@section('title', 'Update')

<!DOCTYPE html>
<html>
<body>

<h2>Edit Your List</h2>

<form method="post" action="/update/{{$showtables->id}}">
{{ csrf_field() }}
  <input type="checkbox"   id="edit" name="check_box" aria-label="Checkbox for following text input" @if( $showtables->check_box == 1 ) checked @endif> <br>
  <input type="text" class="form-control" value="{{$showtables->title}}" id="title" name="title" ><br><br>
  <input type="submit" value="Update">
</form> 

<script> 
function edit(title) {
$.ajax({
  type: "POST",
  url: "http://127.0.0.1:8000/update",
  data: {"title":document.getElementById('title').value, "_token": "{{ csrf_token() }}"},
  //success: success,
  //dataType: dataType
})
}
</script>
@yield('content')
</body>
</html>