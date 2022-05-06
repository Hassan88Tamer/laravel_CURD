<h1>member list</h1>
<table border="1">
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