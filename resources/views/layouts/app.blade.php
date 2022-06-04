<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>SalonIn</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('assets/img/icon.ico')}}" type="image/x-icon"/>

	@livewireStyles
	<!-- Fonts and icons -->
	<script src="https://kit.fontawesome.com/766e1e1bca.js" crossorigin="anonymous"></script>
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/atlantis.min.css')}}">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	@stack('styles') 
	
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					<a class="navbar-brand" style="color : white">SalonIn</a>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<form method="POST" action="{{ route('logout') }}">
											@csrf
											<a class="dropdown-item" href="{{ route('logout') }}" 
											onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
											</a>
										</form>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									Admin
									<span class="user-level">Administrator</span>
								</span>
							</a>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item {{request()->routeIs('salon.dashboard') ? 'active' : ''}}">
                            <a href="{{route('salon.dashboard')}}">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item {{request()->routeIs('salon.listproduct')  ? 'active' : ''}}">
                            <a href="{{route('salon.listproduct')}}">
                                <i class="fas fa-list"></i>
                                <p>List Product</p>
                            </a>
                        </li>
						<li class="nav-item {{request()->routeIs('salon.editprofile')  ? 'active' : ''}}">
                            <a href="{{route('salon.editprofile')}}">
                                <i class="fas fa-user-gear"></i>
                                <p>Edit Profile</p>
                            </a>
                        </li>
						<li class="nav-item {{request()->routeIs('salon.image')  ? 'active' : ''}}">
                            <a href="{{route('salon.image')}}">
                                <i class="fa-solid fa-images"></i>
                                <p>Banner Image</p>
                            </a>
                        </li>
						<li class="nav-item {{request()->routeIs('salon.workhour')  ? 'active' : ''}}">
                            <a href="{{route('salon.workhour')}}">
                                <i class="fa-solid fa-calendar-days"></i>
                                <p>Hari Kerja</p>
                            </a>
                        </li>
						<li class="nav-item {{request()->routeIs('salon.listbook') || request()->routeIs('salon.listallbook') ? 'active' : ''}}">
                            <a href="{{route('salon.listbook')}}">
                                <i class="fa-solid fa-file-invoice"></i>
                                <p>List Booking</p>
                            </a>
                        </li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			{{ $slot }}
		</div>
	</div>
	<!--   Core JS Files   -->
	<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
	<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>


	<!-- Atlantis JS -->
	<script src="{{asset('assets/js/atlantis.min.js')}}"></script>


	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
        })

    </script>
	@livewireScripts

</body>
</html>