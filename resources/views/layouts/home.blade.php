<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{asset('assets/img/logo.png')}}">

    @livewireStyles
    <title>SalonIn</title>
    <link rel="stylesheet" href="{{asset('assets/css/pagina1/landing.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/navbar.css')}}">


    <link rel="stylesheet" href="{{asset('assets/css/pagina1/queries.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/queries.css')}}">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    @stack('styles')
    <style>
        .nav-text:hover {
            color: blue;
        }

    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-lg-flex align-items-center">
            <!-- Logo -->
            <a class="navbar-brand ms-2 ms-lg-5 me-5 pt-0" href="{{ route('user.home') }}"><img
                    src="{{asset('assets/img/logo_transparent.png')}}" id="logo" alt=""></a>
            <h6><a href="{{ route('list.salon.home', ['search' => "all"]) }}" class="nav-text">Daftar Barber/Salon</a>
            </h6>
            <h6 style="margin-left: 2%"><a href="{{ route('aboutus') }}" class="nav-text">Tentang Kami</a>
            </h6>
            <h6 style="margin-left: 2%"><a href="{{ route('howto') }}" class="nav-text">Tutorial Pemesanan</a>
            </h6>
            <h6 style="margin-left: 2%"><a href="{{ route('joinus') }}" class="nav-text">Join Us</a>
            </h6>
            <!-- Toggler -->
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="modal" data-bs-target="#menuMovil"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            @if (Auth::check())
            <div class="collapse navbar-collapse d-lg-flex justify-content-end" id="navbarSupportedContent" style="margin-right: 3%">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    @if (Auth::user()->is_admin == 0)
                    <div class="collapse navbar-collapse" id="navbar-list-4">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if (Auth::user()->member->avatar)
                                    <img src="{{ asset('storage/'.Auth::user()->member->avatar) }}"
                                        width="40" height="40" class="rounded-circle">
                                    @else
                                    <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg"
                                    width="40" height="40" class="rounded-circle">
                                    @endif
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}" 
                                        onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                                        </a>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @elseif (Auth::user()->is_admin == 1)
                    <div class="collapse navbar-collapse" id="navbar-list-4">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if (Auth::user()->salon->image_logo)
                                    <img src="{{ asset('storage/'.Auth::user()->salon->image_logo) }}"
                                        width="40" height="40" class="rounded-circle">
                                    @else
                                    <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg"
                                    width="40" height="40" class="rounded-circle">
                                    @endif
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('salon.dashboard') }}">Dashboard</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}" 
                                        onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                                        </a>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @elseif (Auth::user()->is_admin == 1)
                    <div class="collapse navbar-collapse" id="navbar-list-4">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg"
                                    width="40" height="40" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}" 
                                        onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                                        </a>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @endif
                </ul>
            </div>
            @else
            <!-- Navs -->
            <div class="collapse navbar-collapse d-lg-flex justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" aria-current="page">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primario" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            </div>
            @endif
        </div>

    </nav>

    <body>
        <div>
            {{ $slot }}
        </div>
    </body>

    <!-- Footer -->
    <footer class="container-fluid p-2">
        <div class="row pt-4">
            <div class="col-12 col-lg-6 text-center mb-3 mb-lg-0 d-flex flex-column justify-content-evenly">
                <h3 class="mb-0">Temukan Kami Di</h3>
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
                <a href="#">Youtube</a>
            </div>

            <div class="col-12 col-lg-6 text-center">
                <h3 class="mt-lg-2">Hubungi kami</h3>
                <p>salonin@gmail.com</p>
                <p>(381) 155-234-345</p>
            </div>
        </div>

    </footer>


    <!--   Core JS Files   -->
    <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>


    <!-- Atlantis JS -->
    <script src="{{asset('assets/js/atlantis.min.js')}}"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/1eda82c81d.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/766e1e1bca.js" crossorigin="anonymous"></script>
    @stack('scripts')
    <script>
        document.addEventListener('livewire:load', function (e) {
            window.livewire.on('showAlert', (data) => {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: data.msg,
                    timer: 2000,
                    showCancelButton: false,
                    showConfirmButton: false
                })
            });

            window.livewire.on('showAlertError', (data) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.msg,
                    timer: 2000,
                    showCancelButton: false,
                    showConfirmButton: false
                })
            });
            window.livewire.on('showAlertRedirect', ({
                    msg,
                    redirect = false,
                    path = '/'
                }) => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: msg,
                        timer: 2000,
                        showCancelButton: false,
                        showConfirmButton: false
                    })

                    if (redirect) {
                        setTimeout(() => {
                            window.location.href = path
                        }, 5000);
                    }
                });
        })

    </script>
    @livewireScripts

</body>

</html>
