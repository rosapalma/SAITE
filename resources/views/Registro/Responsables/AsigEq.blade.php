<x-validation-errors class="mb-4" />
<h2 class="text-lg">Asignar Equipo</h2>
<input wire:model.live="serial_BN" type="text"  placeholder="Serial" wire:change="ShearEquipo">

@if($Dataequipo)
	@foreach ($Dataequipo as $eq)
		<div>Detalles: <br>
		   <p>Marca|Modelo: {{$eq['marca_modelo']}}</p>
		   <p>Serial; {{$serial_BN}}</p>
			

		</div>
		</div>      
		<div>
			indique la fecha: 
			<input type="date" wire:model.live="fecha_asig">
		</div>  
		<div>
            <label>Ubicacion actual del usuario | cambiar</label>
    	    <select wire:model.live="ubicacion_id" required>
       	   	    <option value="">Seleccione</option>
       	   	    @foreach ($ubicacions as $dp)
    		    	<option value="{{$dp->id}}">{{$dp->name}}</option>
    			    @endforeach
    		</select>
          </div>  
	         <button type="submit" class="btn btn-success" wire:click="AsignarEquipo"> Asignar</button>
	@endforeach

@endif
<p>{{$yaResp}}</p>