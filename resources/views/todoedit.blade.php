<!DOCTYPE html>
<html>
<body>

<h2>Edit your list... ^_^</h2>

<form method="post" action="/update/{{$showtables->id}}">
{{ csrf_field() }}
  <input type="checkbox" id="edit" name="check_box" aria-label="Checkbox for following text input" @if( $showtables->check_box == 1 ) checked @endif>   
  <input type="text" value="{{$showtables->title}}" id="title" name="title" ><br><br>
  <input type="submit" value="Update">
</form> 

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
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