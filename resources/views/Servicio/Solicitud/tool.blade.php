<table class="table" >
  <thead class="thead-dark">
    <tr align="center">
      <th>CÓDIGO</th>
      <th>EQUIPO</th>
      <th>FECHA</th>
      <th>ESTADO</th>
      <th>VER</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($solicits as $so )
      <tr align="center" >
        <td>{{$so->codigo}}</td>
        <td>{{$so->equipo->tipo['name']}}</td>
        <td>{{$so->fecha}}</td>
            @if($so->statud == "ASIGNADA")
               <td>Técnico Asig. <br><?php echo $bita = $so->Bitacora->tecnico['full_name'];?></td>
            @elseif($so->statud == "PENDIENTE")
              <td> <a href="" wire:click="edit({{ $so->id }})" title="Modificar Solicitud de servicio" style="width: 30px; height: auto; cursor: pointer;">PENDIENTE</a>
              </td>
            @elseif($so->statud == "CERRADA")
                <td style="width: 30px; height: auto; cursor: pointer;">
              CERRADA</td>
            @endif
        <td> <button type="button" wire:click="Show({{ $so->id }})" class="btn btn-primary">Ver</button></td>
      </tr>
    @endforeach
  </tbody>
</table>





