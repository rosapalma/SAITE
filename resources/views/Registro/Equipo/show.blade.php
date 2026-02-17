<div class="fixed inset-0 flex items-center justify-center z-50">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full z-50">
            	<x-validation-errors class="mb-4" />
                    <div class="p-6">
                        <h2 class="text-lg font-bold mb-4"> Detalles de Equipo </h2>
				    <div>
				    	<p>Marca|Modelo: {{$marca_modelo}}</p>
				    	<p>Serial: {{$serial}}</p>	
				    	<p>Serian BN: {{$serial_BN}}</p>
				    	<p>Ubicacion: {{$ubicacion_id}}</p>
				    	@if($responsable){
				    		<p>Responsable: {{$responsable}}</p>
				    	<p>Fecha de asignacion: {{$fecha_asig}}</p>
				    	@endif
				    	
				    	<p>Estado: {{$estado}}</p>
				    	<p>Fecha de Adquisicion: {{$fecha_adq}}</p>
				    </div>
				  
				
                    <div class="p-4 bg-gray-50 flex justify-end">
                        <button type="button" wire:click="closeModal()" class="btn btn-danger">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>