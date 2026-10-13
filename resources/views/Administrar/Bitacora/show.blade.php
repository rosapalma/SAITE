<div class="fixed inset-0 flex items-center justify-center z-50">
    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full z-50"> 

        <div class="p-6">
            <h2 class="title text-lg font-bold mb-4"> DETALLES  @if($servicio->statud != 'CERRADA') DE LA SOLICITUD @else DEL SERVICIO @endif </h2>
        </div>
        <div class="show" >
            <p>Usuario: {{$servicio->responsable['full_name']}}</p>
            <p>{{$servicio->equipo->tipo['name']}} | Marca: {{$servicio->equipo['marca']}}| Modelo: {{$servicio->equipo['modelo']}}</p>
            <p>Ubicación: {{$servicio->responsable->ubicacion['name']}}</p>
            <p>Tipo de falla: {{$servicio->tipo_falla}}</p>
            <p>Asunto:  {{$servicio->asunto}}</p>      
            <p>Descripcion: {{$servicio->descripcion}}</p>
            <p>De Fecha: {{$servicio->fecha}}</p>
           
            @if ($servicio->statud == 'CERRADA')
            <hr><hr>
                <p>SOLUCION: {{$IDBitacora->solucion}}</p>
                <p>DIAGNOSTICO: {{$IDBitacora->diagnostico}}</p>
                <p>RECOMENDACIÓN: {{$IDBitacora->recomendacion}}</p>
                <p>FECHA: {{$IDBitacora->fecha}}</p>
            @endif
        </div>
      
     
        <div class="p-4 bg-gray-50 flex justify-end">
            <x-button-close>Cerrar</x-button-close>
        </div>

     </div>
</div>

