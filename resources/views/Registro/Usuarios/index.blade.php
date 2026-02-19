<div>
   <button type="button" wire:click="" aling="center" class="btn btn-primary">
       Nuevo 
    </button><br>
   @include ('Registro.Usuarios.filtrar') <!-- BUSCAR  vista filtrar-->
    
   
   @if (session('message')) <!-- ACA EL MENSJ DE REGISTRO INSERTADO-->
        <h1 align="center" class="text-3xl font-bold underline text-red-50">      {{ session('message') }}   
        </h1>
    @endif

   @include('Registro.Usuarios.tool') <!-- ACA SE MUESTRA LA TABLA vista tool-->


   
</div>