<div>
	<form wire:submit.prevent="Save">
		<div style="border: 1px solid red;">
			<p><b>TIPO DE EQUIPO:</b> {{$tipo}}</p>
			<p><b>MARCA:</b> {{$marca}}</p>
			<p><b>MODELO:</b> {{$modelo}}</p>
			<P><b>SERIAL:</b> {{$serial}}</P>
			<p><b>SERIAL BN:</b> {{$serial_BN}}</p>
		</div>
		<div>		
		  <input type="radio" id="opcion1" wire:model="tipo_falla" value=1 checked>
		  <label >HARDWARE</label>
		  <input type="radio" id="opcion2" wire:model="tipo_falla" value=2>
		  <label >SOFTWARE</label>
		  <input type="radio" id="opcion2" wire:model="tipo_falla" value=3>
		  <label >AMBAS</label>
		</div>

		<div style="display: flex;">
				<div>
			<p>ASUNTO</p>
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