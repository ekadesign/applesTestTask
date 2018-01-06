@extends('admin-app')

@section('content')


	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="{{ url('/') }}" class="navbar-brand" >
					<img class="logo" alt="Alyce" src="{{ asset('/images/alyce-logo.png') }}">
				</a>
				<button type="button" class="navbar-toggle collapsed navbar_toggle_button pull-left" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">

					<li class="">
						<alyce-admin-search ></alyce-admin-search>

					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Gifts<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class=""><a href="{{ url('/admin/gifts') }}">Gifts</a></li>
							<li class=""><a href="{{ url('/admin/gift-group') }}">Gift Imports</a></li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class=""><a href="{{ url('/admin/product') }}">Products</a></li>
							<li class=""><a href="{{ url('/admin/merchant') }}">Merchants</a></li>
							<li class=""><a href="{{ url('/admin/brand') }}">Brands</a></li>
							<li class="divider"></li>
							<li class=""><a href="{{ url('/admin/countries') }}">Countries</a></li>
							<li class=""><a href="{{ url('/admin/currencies') }}">Currencies</a></li>

						</ul>
					</li>


					@can('manage_users')
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Users<b class="caret"></b></a>
						<ul class="dropdown-menu">
							{{--<li class=""><a href="{{ url('/admin/invite-requests') }}">Invite Requests</a></li>--}}

							<li class=""><a href="{{ url('/admin/users') }}">Users</a></li>
							<li class=""><a href="{{ url('/admin/role') }}">Roles</a></li>
							<li class=""><a href="{{ url('/admin/captured-emails') }}">Captured Emails</a></li>
						</ul>
					</li>
					@endcan

					@can('manage_payments')

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Payments<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class=""><a href="{{ url('/admin/payment') }}">Payment Transactions</a></li>
							<li class=""><a href="{{ url('/admin/credits-program') }}">Credits Program</a></li>
							<li class=""><a href="{{ url('/admin/invoices') }}">Invoices</a></li>
							<li class="divider"></li>
							<li class=""><a href="{{ url('/admin/subscriptions/plans') }}">Subscription Plans</a></li>
							<li class=""><a href="{{ url('/admin/subscriptions/subscriptions') }}">Subscriptions</a></li>
						</ul>
					</li>

					@endcan

					@can('manage_tags')
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Tags<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class=""><a href="{{ url('/admin/tag/show-tag-catalog-editor/1' ) }}">Interests</a></li>
							<li class=""><a href="{{ url('/admin/tag/show-tag-catalog-editor/2') }}">Characteristics</a></li>
							<li class=""><a href="{{ url('/admin/tag/show-tag-catalog-editor/3') }}">Gifting Moments</a></li>
							<li class=""><a href="{{ url('/admin/tag/show-tag-locations-editor') }}">Locations</a></li>

						</ul>
					</li>
					@endcan

					@can('manage_settings')
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class=""><a href="{{ url('/admin/settings' ) }}">Settings</a></li>
							<li class=""><a href="{{ url('/admin/utils' ) }}">Utils</a></li>
							<li class=""><a href="{{ url('/admin/security' ) }}">Security</a></li>
							{{--							<li class=""><a href="{{ url('/admin/reports' ) }}">Reports</a></li>--}}

							@can('manage_messages')
							<li class="divider"></li>
							<li class=""><a href="{{ url('/admin/message' ) }}">Messages</a></li>
							@endcan
						</ul>
					</li>
					@endcan

				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" class="general-alert-message" style="padding-bottom: 0px;"></a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">{{ Auth::user() ? Auth::user()->getFullName() : '' }} <span class="caret"></span></a>
						<ul class="dropdown-menu">
							@can( 'access_gifter_dashboard' )
							<li><a href="{{ \App\User::getGifterDashboardLink() }}">Gifter Dashboard</a>
							@endcan
							<li><a href="{{ url('/admin/logout') }}">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>



		</div>


	</nav>

	@yield('page')



			<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="{{ url('/js/side-lib/underscore-min.js') }}"></script>

	<script src="{{ url('/js/bootstrap.min.js') }}"></script>
	<script src="{{ url('/js/admin/jquery-ui.min.js') }}"></script>

	<script src="{{ url('/js/datatables.min.js') }}"></script>
	<!--script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.2/masonry.pkgd.min.js"></script-->
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="{{ url('/js/ie10-viewport-bug-workaround.js') }}"></script>


	<script>
		var site_url = "{{ url('/') }}";
		var admin_url = "{{ url('/admin/') }}";

		$.ajaxSetup({
			headers: {
				'X-CSRF-Token': "{{ csrf_token() }}"
			},
		});

	</script>



@section('admin-lib-scripts')
@show

<script src="{{ jscss('/js/admin/admin.js') }}"></script>
<script src="{{ jscss('/js/modal-fixes.js') }}"></script>

@section('admin-scripts')
@show

@endsection
