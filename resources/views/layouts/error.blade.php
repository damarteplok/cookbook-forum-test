<div class="container">
	@if($errors->count() > 0)
		
		@foreach($errors->all() as $error)
			<div class="alert alert-danger" role="alert">
			  {{ $error }}
			</div>
		@endforeach
		
	@endif
</div>