<form action="{{route('password.email')}}" method="post" name="form1" >
    @csrf
    <input type="email" name="email" id="email" />
    <button type="submit">Kirim</button>
</form>
