<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- Scripts -->
        <script type="module" src="https://cdn.jsdelivr.net/gh/zerodevx/zero-md@2/dist/zero-md.min.js"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
        <style>            
            #background-video {
              width: 100vw;
              height: 100vh;
              object-fit: cover;
              position: fixed;
              left: 0;
              right: 0;
              top: 0;
              bottom: 0;
              z-index: -1;
            }

            input[type=number]::-webkit-inner-spin-button,
            input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
                color: #fff;
                background-color: #1aa053;
            }

            .nav-link {
                color: #1aa053;
            }
        </style>

        @livewireStyles
        @stack('styles')
    </head>
    <body>
        <video id="background-video" src="{{ asset('assets/img/floor.mp4')}}" autoplay loop muted type="video/mp4" style="background-color:forestgreen"></video>
        <div>
            {{ $slot }}
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://www.google.com/recaptcha/api.js?render={{env('CAPTCHA_SITE_KEY')}}"></script>
        <!-- JavaScript Bundle with Popper Bootstrap 5 -->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        @stack('scripts')
        <script>
            document.addEventListener('livewire:load', function (e) {
                window.livewire.on('showAlert', ({
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

                window.livewire.on('showAlertInfo', (data) => {
                    Swal.fire({
                        icon: 'info',
                        html: data.msg,
                        showCancelButton: false,
                        confirmButtonColor: '#1aa053',
                        confirmButtonText: 'OK'
                    })
                });

                window.livewire.on('showAlertSuccess', (data) => {
                    Swal.fire({
                        icon: 'success',
                        html: data.msg,
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 2000,
                    })
                });

                window.livewire.on('showAlertError', (data) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.msg,
                        confirmButtonColor: '#1aa053',
                        confirmButtonText: 'OK'
                    })
                });
            })

        </script>
        @livewireScripts
    </body>
</html>
