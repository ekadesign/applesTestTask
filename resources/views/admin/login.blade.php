@extends('admin-app')

@section('content')

<style>
	html, body {
		height: 100%;
		width: 100%;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		padding-top: 0px !important;
		vertical-align: middle;
		position: relative;
		background-color: #fff;
	}

	.container-fluid {
		height: 100%;
	}

	.container-fluid .row {
		position: relative;
		/*top: 50%;*/
		/*transform: translateY(-50%);*/
	}

	.panel {
		background: #fff;
		/*border-color: #007585;*/
		box-shadow: none;
		max-width: 600px;
		margin-left: auto;
		margin-right: auto;
	}

	.panel-default > .panel-heading {
		background: #fff;
		padding: 0px;
	}

	.panel-default > .panel-body {
		background: #f3f1ee;
	}

	.panel-default > .panel-body label {
		color: #333;
	}
</style>

<div class="top-liner"><div class="cover-bg cover-teal"></div></div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/login') }}">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="col-xs-12">
						<h3 class="text-left">
							<a href="{{ url('/') }}"><img src="{{ url('/images/alyce-logo.png') }}" width="150" style="margin-right:20px" /></a>
						</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body">
					<div class="col-xs-12">
					@if (count($errors) > 0)
						<div class="alert alert-danger text-center">
							<strong>Whoops!</strong> There were some problems with your login.
							{{--<br><br>--}}
							{{--<ul>--}}
								{{--@foreach ($errors->all() as $error)--}}
									{{--<li>{{ $error }}</li>--}}
								{{--@endforeach--}}
							{{--</ul>--}}
						</div>
					@endif

						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="control-label">Login</label>
							<div class="">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label">Password</label>
							<div class="">
								<input type="password" class="form-control" name="password">
							</div>
						</div>
					<div class="clearfix"></div>
					</div>
				</div>

				<div class="col-xs-12">

					<div class="form-group">
						<div class="col-xs-12"><br />
							<button type="submit" class="btn btn-lg btn-primary">Login</button>
						</div>
					</div>

				</div>
			</div>
			</form>
		</div>
	</div>
</div>
@endsection
