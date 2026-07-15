<!-- OTRA FORMA DE LA VISTA-->
      <table class="upel-table">
            <thead>
                <tr>
                    <th>USUARIO</th>
                    <th>UBICACIÓN</th>
                    <th>FECHA Y HORA SOLICITUD</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> <?php echo strtoupper (Auth::user()->responsable['full_name']);?></td>
                    <td>UNIDAD DE INFORMÁTICA</td>
                    <td>{{ date('d/m/Y g:i a') }}</td>
                </tr>
            </tbody>
        </table>
<div class="d-flex p-10 " style="background-color: #eef2f7;">
    <div class="p-2   col-md-6">
        @include('Servicio.Solicitud.form')
    </div>&nbsp;
    <div class="p-2  col-md-6">
        @include('Servicio.Solicitud.tool')
    </div>

</div>

@if($isOpenShow)
 @include('Servicio.Solicitud.show')
@endif