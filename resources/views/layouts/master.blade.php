<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ app()->getLocale() }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<link rel="stylesheet" href="/css/app.css">
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper" id="app">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="/" class="brand-link">
				<img src="/img/pokeball.png" alt="{{ config('app.name', 'Laravel') }} Logo"
					class="brand-image img-circle">
				<h4 class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</h4>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="/img/snorlax.png" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block">{{ Auth::user()->name }}</a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
						data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
			   			@if(Auth::user()->can('isAdmin') || Auth::user()->can('isSupport'))
						<li class="nav-item">
							<router-link to="/dashboard" class="nav-link">
								<i class="fab fa-dashcube"></i>
								<p>
									Dashboard
								</p>
							</router-link>
						</li>
						<li class="nav-item">
							<router-link to="/users" class="nav-link">
								<i class="fas fa-users-cog"></i>
								<p>
									Users
								</p>
							</router-link>
						</li>
						@endif
						@can('isVip')
						<li class="nav-item">
							<router-link to="/" class="nav-link">
								<i class="fas fa-user-tie"></i>
								<p>
									My Profile
								</p>
							</router-link>
						</li>
						@endcan
						<li class="nav-item"> 
							<a class="nav-link" href="{{ route('logout') }}"
								onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
								<i class="nav-icon fas fa-sign-out-alt"></i>
								<p>
									{{ __('Logout') }}
								</p>
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
							</form>
						</li>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">

			<!-- Main content -->
			<div class="content mt-3">
				<div class="container-fluid">
					{{-- Vue Router --}}
					<router-view></router-view>

					{{--Vue Progress Bar--}}
					<vue-progress-bar></vue-progress-bar>
				</div><!-- /.container-fluid -->
		</div>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Main Footer -->
		<footer class="main-footer">
			<!-- To the right -->
			<div class="float-right d-none d-sm-inline">
				Anything you want
			</div>
			<!-- Default to the left -->
			<strong>Copyright &copy; 2019 <a href="#">Nasty Gaming</a>.</strong> All rights reserved.
		</footer>
	</div>
	<!-- ./wrapper -->
	@auth
		<script>
			window.user = @json(auth()->user())
		</script>
	@endauth

	<!-- REQUIRED SCRIPTS -->

	<script src="/js/app.js"></script>
</body>

</html>