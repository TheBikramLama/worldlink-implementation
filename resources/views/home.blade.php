@extends('layout.master')

@section('content')
<form action="{{ route('worldlink.query') }}" method="post" class="mt-5" id="worldlink-form">
	@csrf
	<div class="form-group">
		<label for="username">Worldlink Username</label>
		<input type="text" class="form-control text-center" id="username" name="username" placeholder="Username" required>
		@if ( $errors->has('username') )
		<small class="text-danger">* {{ $errors->first('username') }}</small>
		@endif
	</div>
	<div class="form-group">
		<button class="btn btn-worldlink">Get Details</button>
	</div>
</form>
@endsection

@section('javascript')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>	
<script>
$(function() {
	$('#worldlink-form').on('submit', () => {
		$('.btn-worldlink').attr('disabled', true).text('Requesting Details...');
	});
});
</script>
@endsection