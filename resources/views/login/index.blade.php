<form action="/login" method="post">
    @csrf

    @if (session()->has('loginError'))
        {{ session('loginError') }}
    @endif

    <label for="nid">NID</label>
    <input type="text" name="nid" id="nid" required autofocus>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" required autofocus>
    <input type="submit" value="Login">
</form>