<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction App</title>
    <link rel="stylesheet" href="{{asset('css/design.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand" href="{{ route('welcome') }}">Transaction App</a>
            </div>
            <!-- Add navigation links or other header content here -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="nstyled">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    @if (Auth::user() != null)
                        <li><a href="{{ route('transactionhistory') }}">History</a></li>
                    @endif
                </ul>
            @if (Auth::user() == null)

                <form class="navbar-form navbar-right" role="search">
                    <a href="{{ route('login') }}">login</a>
                    <a href="{{ route('register') }}">Register</a>
                </form>
            @else
                <div class="user">{{ auth()->user()->first_name }}</div>
                <div class="menu-toggle">
                    <div class="dash"></div>
                    <div class="dash"></div>
                    <div class="dash"></div>
                </div>
                <ul class="menu-items">
                    <li><a href=" {{route('profile.edit')}}">Profile</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                </ul>
            @endif
            </div>
        </div>
    </header>

    <main class="wrapper">
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Transaction App</p>
        </div>
    </footer>

    <script>
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            this.classList.toggle('open');
        });
    </script>
</body>
</html>
