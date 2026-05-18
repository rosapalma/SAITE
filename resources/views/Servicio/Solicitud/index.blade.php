<div>
 <?php echo strtoupper (Auth::user()->responsable['full_name']);?>
	<div>
		@if (session('message')) 
	        <h1 align="center" class="text-3xl font-bold underline text-red-50">      {{ session('message') }}   
	        </h1>
	    @endif
	</div>

<div style="border: 2px solid green; margin-right: 20%;">

	@include('Servicio.Solicitud.form')
	
	@if (count($solicits) > 0)
		<div>
			@include('Servicio.Solicitud.tool')
		</div>
	@endif
</div>
