
  
<h1>ASIGNAR SERVICIOS</h1>
  @if (session('message')) <!-- ACA EL MENSJ DE REGISTRO INSERTADO-->
        <h1 align="center" class="text-primary">      {{ session('message') }}   
        </h1>
    @endif
<div class="d-flex p-10 bg-light">

   <div class="p-2 bg-info col-md-6">
     @include('Administrar.AsigServi.tool')
   </div>&nbsp;&nbsp;&nbsp;  
   <div class="p-2 bg-secondary text-white col-md-6">
     @include('Administrar.AsigServi.form')
   </div>

   
</div>