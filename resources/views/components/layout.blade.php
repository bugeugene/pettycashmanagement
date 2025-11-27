<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Petty Cash Management System</title>
</head>
<body>

    @if (session('success'))
        <div class="p-4 text-center bg-green-50 text-green-50 font-bold"> 
            {{session('success')}}
        </div>
    @endif

    <header>
        {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-info">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center gap-2" href="{{url('/entries')}}">
                    <i class="bi bi-cash-coin"></i>
                    <span class="fw-bold">Petty Cash Management</span>
                </a>

                <div class="d-flex align-items-center gap-2">
                    @guest
                        <a href="{{url('/login')}}" class="btn btn-outline-light btn-sm">Log In</a>
                    @endguest

                    @auth

                        @if(auth()->user()->role === 'Requester')
                            <span>Hi there, {{ auth()->user()->name }}</span>
                            <a href="{{url('/dashboard')}}" class="btn btn-light btn-sm">Dashboard</a>
                            <a href="{{url('/entries/add')}}" class="btn btn-light btn-sm">Create Entry</a>
                        @endif

                        @if(auth()->user()->role === 'Finance')
                            <span>Hi there, {{ auth()->user()->name }}</span>
                            <a href="{{url('/funds')}}" class="btn btn-light btn-sm">Check Funds</a>
                            <a href="{{url('/audit')}}" class="btn btn-warning btn-sm">View History Log</a>
                            <a href="{{url('/approval')}}"class="btn btn-secondary btn-sm">View Approval</a>
                            <a href="{{url('/summary')}}" class="btn btn-primary btn-sm">Generate Summary</a>
                        @endif

                        @if(auth()->user()->role === 'Admin')
                            <span>Hi there, {{ auth()->user()->name }}</span>
                            <a href="{{url('/users/add')}}" class="btn btn-outline-light btn-sm">Create New User</a>
                        @endif
                        
                        <form action="{{url('/logout')}}" method="post" class="m-0">
                        @csrf
                            <button class="btn btn-danger btn-sm">Logout</button>
                        </form>
                    @endauth
                </div>
            </div>
        </nav> --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-info">
            <div class="container">

                <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/dashboard') }}">
                    <i class="bi bi-cash-coin"></i>
                    <span class="fw-bold">Petty Cash Management</span>
                </a>

                <div class="d-flex align-items-center gap-3">
                    @auth
                        <span class="text-white fw-bold">Hi, {{ auth()->user()->name }}</span>

                        <a href="{{ url('/dashboard') }}" class="btn btn-light btn-sm">Dashboard</a>

                        <form action="{{ url('/logout') }}" method="post" class="m-0">
                            @csrf
                            <button class="btn btn-danger btn-sm">Logout</button>
                        </form>
                    @endauth
                </div>

            </div>
        </nav>
    </header>
    
    <main class="container-lg">
        {{ $slot }}
    </main>

</body>
</html>