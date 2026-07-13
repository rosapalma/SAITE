<div>
      @if (Auth::user()->privilege < 3)   <!--solo para administrador y gestor-->                  
         @include('Administrar.AsigServi.index')
      @else
            <br><br>
            <p class="display-7 text-center text-bold" style="padding-top: 20%;">
              NO ESTA AUTORIZADO A VISITAR ESTA PÁGINA
            </p>
      @endif
</div>
