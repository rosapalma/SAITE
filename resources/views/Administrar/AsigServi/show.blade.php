<div class="fixed inset-0 flex items-center justify-center z-50">
    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full z-50">
        <x-validation-errors class="mb-4" />
        <div class="p-6">
            <h2 class="title text-lg font-bold mb-4">DETALLES DE SOLICITUD</h2>
        <div class="show" >
                <p>Usuario: {{$servicio->responsable['full_name']}}</p>
                <p>{{$servicio->equipo->tipo['name']}} | Marca: {{$servicio->equipo['marca']}}| Modelo: {{$servicio->equipo['modelo']}}</p>
                <p>Tipo de falla: {{$servicio->tipo_falla}}</p>
                <p>Asunto:  {{$servicio->asunto}}</p>      
                <p>Descripcion: {{$servicio->descripcion}}</p>
                <p>De Fecha: {{$servicio->fecha}}</p>

        </div>
        <div class="p-4 bg-gray-50 flex justify-end">
            <button type="button" wire:click="closeModal()" class="btn btn-danger">Cerrar</button>
        </div>
     </div>
</div>

