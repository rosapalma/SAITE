<div>
 <?php echo strtoupper (Auth::user()->responsable['full_name']);?>
	<div>
		@if (session('message')) 
	        <h1 align="center" class="text-3xl font-bold underline text-red-50">      {{ session('message') }}   
	        </h1>
	    @endif
	</div>
	<div>		
	    <select wire:model.live="equipo_id" required> <!--equipos del responsable-->
	    	<option>Selecione el equipo a reportar</option>    
			@foreach($equipos as $equipo)
				<option value="{{$equipo->id}}"> {{$equipo->modelo}} - {{$equipo->marca}}</option>
			@endforeach
		</select>
		<button type="button" wire:click="ver" class="btn btn-warning">
               VER
        </button>
	</div>
<div style="border: 2px solid green; margin-right: 20%;">

	@include('Servicio.Solicitud.form')
	
	@if (count($solicits) > 0)
		<div>
			@include('Servicio.Solicitud.tool')
		</div>
	@endif
</div>
