<table class="table" >
  <thead class="thead-dark">
    <tr align="center">
      <th>CÓDIGO</th>
      <th>EQUIPO</th>
      <th>FECHA</th>
      <th>ESTADO</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($solicits as $so )
      @if($so->statud != "CERRADA")
      <tr align="center" >
        <td>{{$so->codigo}}</td>
        <td>{{$so->equipo->tipo['name']}}</td>
        <td>{{$so->fecha}}</td>
            @if($so->statud == "ASIGNADA")
               <td>Técnico Asig. <br><?php echo $bita = $so->Bitacora->tecnico['full_name'];?></td>
            @elseif($so->statud == "PENDIENTE")
              <td> PENDIENTE<img src="{{asset('images/ICONS/editar.png')}}" wire:click="edit({{ $so->id }})" title="Modificar Solicitud de servicio" style="width: 30px; height: auto; cursor: pointer;">
              </td>
            @endif
      </tr>
      @endif
    @endforeach
  </tbody>
</table>





