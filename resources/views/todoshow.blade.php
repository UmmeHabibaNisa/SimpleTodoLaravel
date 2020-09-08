@extends('layouts.app')


@section('title', 'Home')

<body>
@include('layouts.header') 

<h1> Make Your List.. </h1>
  <input type="text" id="title" class="form-control" name="title" placeholder="Make your own list..."><br>
  <input type="submit" onclick="view()" value="Add"><br> <br>

  <h2>Your List..</h2><br>
  <table class="table "  >
  <thead class="thead-dark">
    <tr>
      <th scope="col">Number</th>
      <th scope="col">Title</th>
      <th scope="col">Task Status</th>
      <th scope="col">Buttons</th>
    </tr>
  </thead>
  @foreach ($tableshow as $tableshows)
  <tbody>
    <tr>
      <td>{{ $tableshows->id }}</td>
      <td>{{ $tableshows->title }}</td>
      <td><input name="check_box" type="checkbox" id="{{ $tableshows->id }}" onclick="myFunction('{{ $tableshows->id }}')" @if( $tableshows->check_box == 1 ) checked @endif>
</td>
     <td> <a href="/edit/{{$tableshows->id}}">Edit </a>
        <a href="/delete/{{$tableshows->id}}">DElete </a></td>
  </tbody>
  @endforeach
</table>

  <script>
    function myFunction(id) {
      //alert (id);
      //alert (document.getElementById(id).checked);
      //console.log(document.getElementById(id));
      if (document.getElementById(id).checked == true) {
        alert("You have Completed The Task");
      } else {
        var txt;
        if(confirm("Task Incomplete")){
          txt ="ok";
        }
        else {
          txt = "Cancel";
        }
        document.getElementById(id).innerHTML = txt;
      }
      $.ajax({
        type: "POST",
        url: "http://127.0.0.1:8000/checkbox",
        data: {
          "id": id,
          "check_box": document.getElementById(id).checked + 0,
          "_token": "{{ csrf_token() }}"
        },
        //success: alert ("Completed"),
      });

    }

    function view() {
      $.ajax({
        type: "POST",
        url: "http://127.0.0.1:8000/storetodo",
        data: {
          "title": document.getElementById('title').value,
          "_token": "{{ csrf_token() }}"
        },
        success: function(todo) {
          todo = JSON.parse(todo);
          var table = document.getElementById("todotable");
          var row = table.insertRow(-1);
          var cell0 = row.insertCell(0);
          var cell1 = row.insertCell(1);
          var cell2 = row.insertCell(2);
          var cell3 = row.insertCell(3);
          cell0.innerHTML = todo.id;
          cell1.innerHTML = todo.title;
          cell2.innerHTML = `<input name="check_box" type="checkbox" id="${todo.id }" onclick="myFunction(${todo.id }-)">`;
          cell3.innerHTML = `<a href="/edit/${todo.id }">Edit </a>
        <a href="/delete/${todo.id }">Delete </a>`;

          console.log(todo);
        },
        //dataType: dataType
      })
    }
  </script>
   @yield('content')
</body>

