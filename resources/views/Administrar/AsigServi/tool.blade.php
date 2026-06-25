  <table class="table" >
      <thead class="thead-dark">
         <tr>
            <th>TICKET</th>
            <th>USUARIO</th>
            <th>EQUIPO</th>
            <th>FECHA DE SOLICITUD</th>
            <th>DETALLES</th>
         </tr>
      </thead>
      <tbody> 
         @foreach ($solicits as $sol)
            @if($sol->statud=='PENDIENTE') 
            <tr wire:click="leerFila({{$sol->id}})"  class="fila-seleccionable  text-warning">
            @elseif (($sol->statud=='ASIGNADA') )
            <tr wire:click="leerFila({{$sol->id}})"  class="fila-seleccionable  text-primary">
            @elseif($sol->statud=='CERRADA') 
            <tr wire:click="leerFila({{$sol->id}})"  class="fila-seleccionable  text-danger">
            @endif
            <td>{{$sol->codigo}}</td>
            <td>{{$sol->responsable['full_name']}}</td>
            <td>{{$sol->equipo['modelo']}}</td>
            <td>{{$sol->fecha}}</td>
            <td> <button type="button" wire:click="Show({{ $sol->id }})" class="btn btn-primary">Ver</button></td>
         </tr>
         @endforeach
      </tbody>         
</table>
 @if($solicits->count())
        <div style="color:blue;">
            {{ $solicits->links() }}    
        </div>
    @endif
<div>
   <label> <b class="text-danger">CERRRADAS</b> | <b class="text-primary"> ASIGNADAS</b>| <b class="text-warning">PENDIENTES</b></label>
</div>

<script>
   // Seleccionamos todas las filas con la clase
const filas = document.querySelectorAll('.fila-seleccionable');

filas.forEach(fila => {
  fila.addEventListener('click', () => {
    // Si deseas permitir solo una selección a la vez, quita la clase de las demás
    filas.forEach(f => f.classList.remove('seleccionada'));
    
    // Alternamos la clase en la fila clickeada
    fila.classList.add('seleccionada');
  });
});
</script>