<div>
	<h1>{{$full_name}}</h1>
</div>
<div>
   	<label>C.I: {{$cedula}}</label>
</div>
<div>
    <label>Correo Institucional{{$email}}</label>
</div>
<div>
    <label>Departamento:
        @foreach ($dptos as $dp)
           	@if ($dp->id == $departamento_id)
           	 	{{$dp->name}}
           	@endif
        @endforeach
	</label>
</div>

               
                