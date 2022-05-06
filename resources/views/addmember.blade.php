
<h1> this is user page</h1>

<form action="add" method="POST">
    @csrf
    <input type="text" name="name" placeholder="enter name"><br><br>
    <input type="text" name="email" placeholder="enter email"><br><br>
    <input type="text" name="address" placeholder="enter address"><br><br>
    <button type="submit">add member</button>
</form>


<a href="list">go to list to show data</a>