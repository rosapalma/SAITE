<div>
    <div>
        @if (session('message')) <h1 align="center" class="text-3xl font-bold underline text-red-50">      {{ session('message') }}   </h1> @endif
    </div>

    <div style="max-width: 100%; margin: 0 auto;">

        @include('Servicio.Solicitud.form') @if (count($solicits) > 0) <div>
                @include('Servicio.Solicitud.tool') </div>
        @endif
    </div>
</div>