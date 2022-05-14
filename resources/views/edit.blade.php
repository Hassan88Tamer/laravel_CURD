@yield("title")
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
    html{
        background-color: #fdff81;
    }
    body{
        background-color: #fdff81;
    }
    input{
        border-radius: 16px;
    }
</style>
<h2>updata data about user</h2><br><br>
<form action="/edit" method="POST" class="form-group">
    @csrf
    <input type="hidden" name="id" placeholder="enter name" value="{{$data["id"]}}">
    <input type="text" name="name" placeholder="enter name" value="{{$data["name"]}}"><br>
    <span style="color: red;">@error("name"){{$message}} @enderror</span><br><br>
    <input type="text" name="email" placeholder="enter email" value="{{$data["email"]}}"><br>
    <span style="color: red;">@error("email"){{$message}} @enderror</span><br><br>
    <input type="text" name="address" placeholder="enter address" value="{{$data["address"]}}"><br>
    <span style="color: red;">@error("address"){{$message}} @enderror</span><br><br>
    <button type="submit" class="btn btn-danger">update</button>