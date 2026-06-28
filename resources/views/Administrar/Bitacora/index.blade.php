  @if (session('message')) <!-- ACA EL MENSJ DE REGISTRO INSERTADO-->
    <h1 align="center" class="text-primary">      {{ session('message') }}  </h1>
  @endif
<div class="d-flex p-10 bg-light">
    <div class="p-2 bg-secundary  col-md-6">
        @include('Administrar.AsigServi.filtrar')
        @include('Administrar.Bitacora.tool')
    </div>&nbsp;
    <div class="p-2 col-md-6 border border-secondary">
         @include('Administrar.Bitacora.form')
    </div>

</div>