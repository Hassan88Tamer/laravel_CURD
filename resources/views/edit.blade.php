<h1>updata data about user</h1><br><br>
<form action="/edit" method="POST">
    @csrf
    <input type="hidden" name="id" placeholder="enter name" value="{{$data["id"]}}"><br><br>
    <input type="text" name="name" placeholder="enter name" value="{{$data["name"]}}"><br><br>
    <input type="text" name="email" placeholder="enter email" value="{{$data["email"]}}"><br><br>
    <input type="text" name="address" placeholder="enter address" value="{{$data["address"]}}"><br><br>
    <button type="submit">update</button>