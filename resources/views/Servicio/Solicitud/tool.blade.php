<table class="table" >
  <thead class="thead-dark">
    <tr align="center">
      <th>CÓDIGO</th>
      <th>EQUIPO</th>
      <th>FECHA</th>
      <th>ESTATUD</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($solicits as $so )
      <tr align="center" >
         <td>{{$so->codigo}}</td>
        <td>{{$so->equipo['marca']}}</td>
        <td>{{$so->fecha}}</td>
        <td>{{$so->statud}}</td>

      </tr>
    @endforeach
  </tbody>
</table>




