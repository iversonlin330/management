@auth
admin
@endauth
<form action="{{ url('login') }}" method="post">
    <input type="text" name="account">
    <input type="text" name="password">
    <input type="submit">
</form>
