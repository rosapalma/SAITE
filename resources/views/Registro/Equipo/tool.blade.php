<table class="table" >
  <thead class="thead-dark">
    <tr align="center">
      <th>MARCA</th>
      <th>SERIAL</th>
  	  <th>SERIAL DE BIENES</TH>
  	  <th>ESTADO</th>
  	  <th>ACCIÓN</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($equipos as $eq )
      <tr align="center" >
        <td><b>{{$eq->marca_modelo}}</b></td>
        <td>{{$eq->serial}}</td>
        <td>{{ $eq->serial_BN}}</td>
        <td>{{$eq->estado}}</td>

            <td>
              <button type="button" wire:click="Show({{ $eq->id }})" class="btn btn-greed">Ver</button>
              <button type="button" wire:click="edit({{ $eq->id }})" class="btn btn-warning">Editar</button>
                <!-- <button type="button" wire:click="delete({{ $eq->id }})" onclick="confirm('¿Está seguro?') || event.stopImmediatePropagation()"class="btn btn-danger">Borrar</button> -->
            </td>

      </tr>
    @endforeach
  </tbody>
</table>
 @if($equipos->count())
        <div style="color:blue;">
            {{ $equipos->links() }}    
        </div>
    @endif




