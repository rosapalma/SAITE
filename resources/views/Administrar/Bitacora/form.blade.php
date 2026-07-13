<x-validation-errors class="mb-4" />

<div class="saite-card">
    <h1 class="text-dark text-center" style="font-family: Arial, sans-serif; font-size: 1.5rem; font-weight: bold; margin-bottom: 20px;">
        BITÁCORA DE TRABAJO TÉCNICO
    </h1>
    
    <table class="upel-table">
        <thead>
            <tr>
                <th>USUARIO / UBICACIÓN</th>
                @if ($solicitud)
                    <th>EQUIPO</th>
                    <th>FECHA DE SOLICITUD</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @if ($solicitud)
            <tr>
                <td>
                    <strong>USUARIO:</strong> <?php $name= $solicitud->responsable_id;?><br> <!--ubicacion de usuario que realizo la solicitud-->
                    <strong>UBICACIÓN:</strong> UNIDAD DE INFORMÁTICA
                </td>
                
                    <td>
                        {{$solicitud->equipo->tipo['name']}} &nbsp; {{$solicitud->equipo['modelo']}}
                    </td>
                    <td>
                        {{$solicitud->fecha}}
                    </td>
                @endif
            </tr>
        </tbody>
    </table>
       
    <form wire:submit.prevent="store">

        <h2 class="text-primary" style="font-size: 1.3rem; margin-bottom: 20px; text-align: left; text-transform: none; color: #3490dc; font-weight: bold;">
            TICKET: <span class="p-2" style="background-color: #eef2f7; border-radius: 5px;">{{$ticketSeleccionado}}</span>
        </h2>

        <div class="form-group mb-3">
            <label class="font-weight-bold text-secondary">DIAGNÓSTICO</label>
            <input type="text" class="form-control" wire:model.live="diagnostico" placeholder="Ingrese el diagnóstico técnico...">
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold text-secondary">SOLUCIÓN</label>
            <input type="text" class="form-control" wire:model.live="solucion" placeholder="Ingrese la solución aplicada...">
        </div>

        <div class="form-group mb-3">
            <label class="font-weight-bold text-secondary">RECOMENDACIÓN</label>
            <textarea id="comentarios" class="form-control" wire:model.live="recomendacion" rows="3" placeholder="Escribe aquí las recomendaciones..."></textarea>
        </div>

        <div class="form-group mb-4">
            <label class="font-weight-bold text-secondary">FECHA</label>
            <input type="date" class="form-control" wire:model.live="fecha">
        </div>
        
        <div class="text-right">
            <button type="submit" class="btn btn-saite-enviar">
                <i class="fas fa-save mr-2"></i> Guardar Bitácora
            </button>
        </div>

    </form>
</div>