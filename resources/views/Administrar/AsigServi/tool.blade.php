  <table class="table" >
      <thead class="thead-dark">
         <tr>
            <th>TICKET</th>
            <th>USUARIO</th>
            <th>EQUIPO</th>
            <th>FECHA DE SOLICITUD</th>
            <th>ESTADO</th>
         </tr>
      </thead>
      <tbody> 
         @foreach ($solicits as $sol)
         <tr wire:click="leerFila({{$sol->id}})"  class="fila-seleccionable">
            <td>{{$sol->codigo}}</td>
            <td>{{$sol->responsable['full_name']}}</td>
            <td>{{$sol->equipo['modelo']}}</td>
            <td>{{$sol->fecha}}</td>
            <td>{{$sol->statud}}</td>
         </tr>
         @endforeach
      </tbody>         
</table>

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