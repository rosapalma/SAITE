  <table class="table" >
      <thead class="thead-dark">
         <tr>
            <th>TICKET</th>
           <!--  <th>USUARIO</th>
            <th>EQUIPO</th> -->
            <th>FECHA DE SOLICITUD</th>
            <th>PRIORIDAD</th>
            <th>DETALLES</th>
         </tr>
      </thead>
      <tbody> 

         @foreach ($bitacors ?? [] as $bit)
   
            @if (Auth::user()->responsable['id'] == $bit->responsable_id)              
               @if (($bit->solicitud['statud']=='ASIGNADA') )
               <tr wire:click="leerFila({{$bit->solicitud['id']}})"  class="fila-seleccionable  text-primary">
               @elseif($bit->solicitud['statud']=='CERRADA') 
               <tr wire:click="leerFila({{$bit->solicitud['id']}})"  class="fila-seleccionable  text-danger">
               @endif
               <td>{{$bit->solicitud['codigo']}}</td>
              <!--  <td class="text-justify px-4 py-2">{{$bit->solicitud->responsable['full_name']}}</td>
               <td>{{$bit->solicitud->equipo->tipo['name']}}</td> -->
               <td>{{$bit->solicitud['fecha']}}</td>
               <td>{{$bit->prioridad}}</td>
               <td> <button type="button" wire:click="Show({{ $bit->solicitud->id }}, {{$bit->id }})" class="btn btn-primary">Ver</button></td>
            </tr>
            @endif
         @endforeach
      </tbody>         
</table>
 @if($bitacors?->count() > 0)
        <div style="color:blue;">
            {{ $bitacors->links() }}    
        </div>
    @endif
<div>
   <label> <b class="text-danger">CERRRADA</b> | <b class="text-primary"> ASIGNADA</b></label>
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