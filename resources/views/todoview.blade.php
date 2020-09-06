<!DOCTYPE html>
<html>
<body>

<h2>Make your list... ^_^</h2>

<form method="post" action="storetodo">
{{ csrf_field() }}
   <input type="text" id="title" name="title" placeholder="Make your own list..."><br><br>
  <input type="submit" value="Add">
</form> 
</body>
</html>
