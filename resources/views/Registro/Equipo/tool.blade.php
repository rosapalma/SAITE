<table class="table" >
  <thead class="thead-dark">
    <tr align="center">
      <th>MODELO</th>
      <th>MARCA</th>
      <th>SERIAL</th>
  	  <th>SERIAL DE BIENES</TH>
  	  <th> TIPO</th>
  	  <th>ACCIÓN</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($equipos as $eq )
      <tr align="center" >
        <td><b>{{$eq->marca}}</b></td>
        <td>{{$eq->modelo}}</td>
        <td>{{$eq->serial}}</td>
        <td>{{ $eq->serial_bienes}}</td>
        <td>@if ($eq['tipo']==1)CPU
            @elseif ($eq['tipo']==2)PERIFERICO
            @elseif ($eq['tipo']==3)COMPONENTE
            @endif</td>
            <td><button type="button" wire:click="edit({{ $eq->id }})" class="btn btn-warning">Editar</button>
                <button type="button" wire:click="delete({{ $eq->id }})" onclick="confirm('¿Está seguro?') || event.stopImmediatePropagation()"class="btn btn-danger">Borrar</button></td>
      </tr>
    @endforeach
  </tbody>
</table>

<!-- falta add paginacion -->




