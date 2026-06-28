  <table class="table" >
      <thead class="thead-dark">
         <tr>
            <th>TICKET</th>
            <th>USUARIO</th>
            <th>EQUIPO</th>
            <th>FECHA DE SOLICITUD</th>
            <th>PRIORIDAD</th>
         </tr>
      </thead>
      <tbody> 
         @foreach ($bitacors as $bit)
            @if($bit->solicitud['statud']=='PENDIENTE') 
            <tr wire:click="leerFila({{$bit->id}})"  class="fila-seleccionable  text-warning">
            @elseif (($bit->solicitud['statud']=='ASIGNADA') )
            <tr wire:click="leerFila({{$bit->id}})"  class="fila-seleccionable  text-primary">
            @elseif($bit->solicitud['statud']=='CERRADA') 
            <tr wire:click="leerFila({{$bit->id}})"  class="fila-seleccionable  text-danger">
            @endif
            <td>{{$bit->solicitud['codigo']}}</td>
            <td>{{$bit->solicitud->responsable['full_name']}}</td>
            <td>{{$bit->solicitud->equipo->tipo['name']}}</td>
            <td>{{$bit->solicitud['fecha']}}</td>
            <td>{{$bit->prioridad}}</td>
         </tr>
         @endforeach
      </tbody>         
</table>
 @if($bitacors->count())
        <div style="color:blue;">
            {{ $bitacors->links() }}    
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