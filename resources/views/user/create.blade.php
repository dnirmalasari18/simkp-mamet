<form action="{{route('user.create')}}" method="post">
    @csrf
    username : <input type="text" name="username" id="">    
    fullname : <input type="text" name="fullname" id="">
    phone_number : <input type="number" name="phone_number" id="">
    password : <input type="password" name="password" id="">
    password : <input type="password" name="password_confirmation" id="">
    <input type="submit" value="Submit">
</form>