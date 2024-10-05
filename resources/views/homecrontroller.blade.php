<p>Current Role: {{ auth()->user()->roles->first()->name }}</p>
@if (auth()->user()->hasRole('admin'))
<p>
	its admin can see
</p>
@endif
<p>its for all users</p>
@if (auth()->user()->hasRole('super-admin'))
<h2>its only super admin</h2>
@endif