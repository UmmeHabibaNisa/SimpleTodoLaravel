<!DOCTYPE html>
<html>
<head>
<style>
table, th ,td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>

<h2>Your List..</h2><br>
<a href= "/addnew">Add</a>


<table style="width:100%">
  <tr>
    <th>Number</th>
    <th>Title</th>
    <th>Completed</th>
    <th>Buttons</th>    
  </tr>

  
  @foreach ($tableshow as $tableshows)
    <tr> 
     <td>{{ $tableshows->id }}</td>
     <td>{{ $tableshows->title }}</td>
     <td>{{ $tableshows->check_box}}</td>
     <td>

     <a href= "/edit/{{$tableshows->id}}">Edit  </a>
     <a href= "/delete/{{$tableshows->id}}">DElete </a>
 
     </td>
     </tr>
    @endforeach 
</table>

</body>
</html>