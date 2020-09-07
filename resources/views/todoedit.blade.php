
@extends('layouts.app')
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
<script  src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"   ></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

@section('title', 'Page Title')

@section('sidebar')
@parent
    <p>kichu ekta</p>
@endsection

@section('content')
@parent
    <p>This is my body content.</p>
@endsection

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

</body>
</html>