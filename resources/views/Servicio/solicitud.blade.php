 <?php echo strtoupper (Auth::user()->responsable['full_name']);?>

 <h1 class="title">EN DESARROLLO.........</h1>
<!--<br><br><br>
	@if (session('message')) 
        <h1 align="center" class="">      {{ session('message') }}   
        </h1>
    @endif
@foreach($equipos as $equipo)
	<li>
		<ul>{{$equipo->tipo}}</ul>
		<ul>{{$equipo->marca_modelo}}</ul>
		<button type="button" wire:click="Reportar({{ $equipo->id }})" class="btn btn-warning">Reportar falla</button>
	</li>
	
	
	<br> 
@endforeach-->
@if($isOpenShow)
    @include ('Servicio.modal') <!-- modal, para registra nuevo o editar -->
@endif
