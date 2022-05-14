@extends("layouts.head")
@section("title","list")
@section("content")
<h1>list page</h1>
<h2>member list</h2>
<script src="jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<table border="1" class="table table-dark">
    <tr>
        <td>id</td>
        <td>name</td>
        <td>email</td>
        <td>address</td>
        <td>operation</td>
        <td>operation</td>
        
    </tr>
    @foreach ($members as $member)
    <tr>
        <td>{{$member["id"]}}</td>
        <td>{{$member["name"]}}</td>
        <td>{{$member["email"]}}</td>
        <td>{{$member["address"]}}</td>
        <td><a  onclick="return confirm('are u sure to delete')" href={{"delete/" .$member["id"]}}>delete</a></td>
        <td><a href={{"edit/" .$member["id"]}}>edit</a></td>
    </tr>
    @endforeach
</table>     






<br><br>
<a href="add">return to add another member</a><br><br>

<form method="get" action="search" >
    <input type="search" name="search" placeholder="search">
    <button type="submit" >SEARCH</button>

</form>
@endsection