<div>
   <button type="button" wire:click="create()" aling="center" class="btn btn-primary">
         Nuevo 
    </button><br>
    
   
   @if (session('message')) <!-- ACA EL MENSJ DE REGISTRO INSERTADO-->
        <h1 align="center" class="text-3xl font-bold underline text-red-50">      {{ session('message') }}   
        </h1>
    @endif

   @include('Registro.Usuarios.tool') <!-- ACA SE MUESTRA LA TABLA vista tool-->

    @if($isOpen)
            @include ('Registro.Usuarios.modal') <!-- modal, para registra nuevo o editar -->
        @endif
    @if($isOpenShow)
        @include ('Registro.Usuarios.show') <!-- modal, para registra nuevo o editar -->
    @endif
   
</div>