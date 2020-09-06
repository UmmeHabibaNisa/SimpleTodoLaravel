<!DOCTYPE html>
<html>
<body>

<h2>Make your list... ^_^</h2>

<form method="post" action="storetodo">
{{ csrf_field() }}
   <input type="text" id="title" name="title" placeholder="Make your own list..."><br><br>
  <input type="submit" onclick = "view()" value="Add">
</form> 

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script> 
function view() {
$.ajax({
  type: "POST",
  url: "http://127.0.0.1:8000/addnew",
  data: {"title":document.getElementById('title').value, "_token": "{{ csrf_token() }}"},
  //success: success,
  //dataType: dataType
})
}
</script>
</body>
</html>
