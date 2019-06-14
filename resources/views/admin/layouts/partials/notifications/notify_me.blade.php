<a href="{{route('admin.message')}}">
	<strong style="color: red;">{{Auth::guard('admins')->user()->name}}</strong>   You've got a new message
</a>