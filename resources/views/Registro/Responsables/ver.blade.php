
<div>
	<h1>{{$full_name}}</h1>
</div>
<div>
   	<label>C.I: {{$cedula}}</label>
</div>
<div>
    <label>Correo Institucional: {{$email}}</label>
</div>
<div>
    <label>Dependencia:
        @foreach ($ubicacions as $dp)
           	@if ($dp->id == $ubicacion_id)
           	 	{{$dp->name}}
           	@endif
        @endforeach
	</label>
</div>
               
                