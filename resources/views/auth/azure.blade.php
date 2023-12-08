<h1>MS OAuth2.0 Demo</h1>

@if (session('msatg'))
    <h2>Authenticated {{ session('uname') }}</h2>
    <p><a href="?action=logout">Log Out</a></p>
@else
    <h2>You can <a href="?action=login">Log In</a> with Microsoft</h2>
@endif
