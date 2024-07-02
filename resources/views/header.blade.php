    <section class="header">
        <a href="{{ route('index') }}" class="logo">GlobeGuides</a>
        
        <nav class="navbar">
            <a href="{{ route('index') }}">home</a>
            <a href="{{ route('about') }}">about</a>
            <a href="{{ route('services') }}">services</a>
            <a href="{{ route('book') }}">book</a>
            @guest
                <a href="#" id="login-link">login</a>        
            @else
                <a href="{{ route('history') }}" id="username-link">{{ Auth::user()->username }}</a>
            @endguest
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>
    </section>
