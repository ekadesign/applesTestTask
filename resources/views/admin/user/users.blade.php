@extends('admin.dashboard')

@section('page')
	<div class="status-line">		
		<div class="status-caption">Users</div>
		 
		<div class="status-buttons">
			<a disabled class="btn btn-xs btn-default" href="">Add New User</a>		
		</div>
	</div>

	<div class="container-fluid">
		<div class="filter-block clearfix">
			@include("admin.user.filter")
		</div>
	</div>

	<div class="container-fluid">
		<h4 style="display:inline-block;width:100%;position:relative"> &nbsp;<strong class="text-lightblue" style="font-size:1.35em;">{{ $count }}</strong> &nbsp;Total Users</h4>
	</div>

	<div class="container-fluid">
		<div class="admin-table">
			<table id="usersTable" class="row-border">
				<thead>
					<tr>
						<th>Id</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>

						<th>Created</th>

						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach ($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td><small>{{ $user->getFirstName() }}</small></td>
						<td><small>{{ $user->getLastName() }}</small></td>
						<td>{{ $user->email }}</td>
						<td><small>{{ $user->created_at }}</small></td>

					</tr>
				@endforeach
				</tbody>

			</table>
		</div>
	</div>
@endsection

@section('admin-scripts')
	<script src="{{ jscss('/js/admin/users.js') }}"></script>
@endsection