<div class="fixed inset-0 flex items-center justify-center z-50">
    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full z-50">
        <x-validation-errors class="mb-4" />
        <div class="p-6">
            <h2 class="text-lg font-bold mb-4"> Detalles de Usuario</h2>
        <div>
          <p>  {{$cedula}}</p>
         <p>{{$full_name}}</p>
         <p>Email: {{$email}} </p>
         <p>Privilegio: {{$privilege}}</p>
         <p>Utima visita: </p>
        </div>
        <div class="p-4 bg-gray-50 flex justify-end">
            <button type="button" wire:click="closeModal()" class="btn btn-danger">Cerrar</button>
        </div>
     </div>
</div>