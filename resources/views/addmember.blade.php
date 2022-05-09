@extends("layouts.head")
@section("title","addmember")
@section("content")
<h1>addmember page</h1>
<h2> this is user page</h2>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<form action="add" method="POST" class="form-group">
    @csrf
    <input type="text" name="name" placeholder="enter name"><br><br>
    <input type="text" name="email" placeholder="enter email"><br><br>
    <input type="text" name="address" placeholder="enter address"><br><br>
    <button type="submit">add member</button>
</form>


<a href="list">go to list to show data</a>

@endsection