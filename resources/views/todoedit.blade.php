<!DOCTYPE html>
<html>
<body>

<h2>Make your list... ^_^</h2>

<form method="post" action="/update/{{$showtables->id}}">
{{ csrf_field() }}
  <input type="checkbox" name="check_box" aria-label="Checkbox for following text input">   
  <input type="text" value="{{$showtables->title}}" id="title" name="title" ><br><br>
  <input type="submit" value="Update">
</form> 


</body>
</html>