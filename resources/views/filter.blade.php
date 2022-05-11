@extends("layouts.head")
@section("title","filter")
@section("content")
<h1>filter page</h1>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<form class="form-group" method="GET" action="filter">
        <select name="name" class="form-control input-lg dynamic">
        <option value="null">name</option>
        <option value="ali">ali</option>
        <option value="hassan">hassan</option>
        <option value="sam">sam</option>
        </select><br><br><br>
        <select name="address" class="form-control input-lg dynamic">
        <option value="null">address</option>
        <option value="tartous">tartous</option>
        </select><br><br>
        <input type="submit" name="submit" value="filter" class="btn btn-primary">

</form>
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
        <td><a href={{"delete/" .$member["id"]}}>delete</a></td>
        <td><a href={{"edit/" .$member["id"]}}>edit</a></td>
    </tr>
    @endforeach
</table>









@endsection