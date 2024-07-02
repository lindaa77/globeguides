<!-- Login Popup -->
<div id="login-popup" class="popup">
    <div class="popup-content">
        <span class="close">&times;</span>
        <h2>Login</h2>
        <form id="login-form" action="{{ route('login') }}" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username" required autocomplete="on">
            <input type="password" name="password" placeholder="Password" required autocomplete="on">
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="#" id="signup-link">Sign up</a></p>
    </div>
</div>