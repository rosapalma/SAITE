<table class="table" >
  <thead class="thead-dark">
    <tr align="center">
      <th>Usuario</th>
      <th>Dependencia</th>
  	  <th>Privilegio</TH>
  	  <th>ACCIÓN</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($usuarios as $use )
      <tr align="center" >
        <td><b>{{$use->responsable['full_name']}}</b></td>
        <td>{{$use->responsable->ubicacion['name']}}</td> 
        <td>{{$use->privilege}}</td>
        
                    <td>
              <button type="button" wire:click="Show({{ $use->id }})" class="btn btn-primary">Ver</button>
              <button type="button" wire:click="edit({{ $use->id, $use->responsable['id'] }})" class="btn btn-warning">Editar</button>
                <!-- <button type="button" wire:click="delete({{ $use->id }})" onclick="confirm('¿Está seguro?') || event.stopImmediatePropagation()"class="btn btn-danger">Borrar</button> -->
            </td>

      </tr>
    @endforeach
  </tbody>
</table>




