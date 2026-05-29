<div>
	<form wire:submit.prevent="Save">
		
	<div>
	    <div class="mb-4">
	        <label for="opcion">Selecciona una opción:</label>
	        <select wire:model.live="opcionSeleccionada" class="form-control" id="opcion">
	            <option value="">-- SELECCIONE EL EQUIPO A REPORTAR --</option>
	            @foreach($equipos as $equipo)
						<option value="{{$equipo->id}}"> {{$equipo->modelo}} - {{$equipo->marca}}</option>
					@endforeach
	        </select>
	    </div>

	    <!-- Mostrar resultados si existen -->
	    @if(!empty($resultados) && count($resultados) > 0)
	            @foreach($resultados as $item)
		            <p><b>TIPO DE EQUIPO:</b> {{$item['tipo']->name}}</p>
					<p><b>MARCA:</b> {{$item['marca']}}</p>
					<p><b>MODELO:</b> {{$item['modelo']}}</p>
					<P><b>SERIAL:</b> {{$item['serial']}}</P>
					<p><b>SERIAL BN:</b> {{$item['serial_BN']}}</p>
	            @endforeach
	
	    @elseif($opcionSeleccionada)
	        <p class="mt-4 text-gray-500">No se encontraron resultados para esta selección.</p>
	    @endif
	</div>
<br>
		<div style="display: flex;">
				<div>
			<h1>ASUNTO</h1>
			<input type="TEXT" wire:model="asunto" required>
		</div>
		<div>  
			<p>DESCRIPCIÓN DEL PROBLEMA </p>
		    <textarea wire:model.live="descripcion" required> </textarea>
	    </div>
		</div>
	 </div>
	 <div align="center">
	 	<button type="submit" wire:click="Save" class="btn btn-success btn-lg">ENVIAR</button>
	</div>







	</form>
</div>