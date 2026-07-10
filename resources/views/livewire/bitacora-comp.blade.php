<div class="container">
   
      @if (Auth::user()->privilege != 4)
        @include("Administrar.Bitacora.index")                      
      @else
            <br><br>
            <p class="display-7 text-center text-bold" style="padding-top: 20%;">
              NO ESTA AUTORIZADO A VISITAR ESTA PAGINA
            </p>
      @endif
</div>

