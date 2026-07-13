<div class="container">
    <div class="p-6">
        <h2 class="text-lg font-bold mb-4 title text-center">EQUIPOS REGISTADOS | ADMINISTRAR</h2>
    </div>
    <br><br>
       @if (Auth::user()->privilege != 4)
            @include("Registro.Equipo.index") 
        @else
            <br><br>
            <p class="display-7 text-center text-bold" style="padding-top: 20%;">
              NO ESTA AUTORIZADO A VISITAR ESTA PÁGINA
            </p>
        @endif
</div>
