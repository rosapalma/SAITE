<div class="saite-card">
    <h2 style="font-weight: bold; margin-bottom: 20px; text-transform: uppercase; font-size: 1.2rem;">
        Solicitud de Servicio
    </h2>

    <form wire:submit.prevent="Save">
        
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

        <div class="solicitud-grid">
            
            <div>
                <h3 style="font-weight: bold; font-size: 1rem; margin-bottom: 10px;">DETALLES DEL EQUIPO</h3>
                <div class="detalles-equipo-box">
                    @if(!empty($resultados) && count($resultados) > 0)
                        @foreach($resultados as $item)
                            <p><b>TIPO DE EQUIPO:</b> {{$item['tipo']->name ?? $item['tipo']}}</p>
                            <p><b>MARCA:</b> {{$item['marca']}}</p>
                            <p><b>MODELO:</b> {{$item['modelo']}}</p>
                            <p><b>SERIAL:</b> {{$item['serial']}}</p>
                            <p><b>SERIAL BN:</b> {{$item['serial_BN']}}</p>
                        @endforeach
                    @elseif($opcionSeleccionada)
                        <p class="text-gray-500" style="color: #a0aec0;">No se encontraron resultados para esta selección.</p>
                    @else
                        <p><b>TIPO DE EQUIPO:</b> </p>
                        <p><b>MARCA:</b> </p>
                        <p><b>MODELO:</b> </p>
                        <p><b>SERIAL:</b> </p>
                        <p><b>SERIAL BN:</b> </p>
                    @endif
                </div>
            </div>

            <div style="display: flex; flex-direction: column; gap: 15px;">
                
                <div>
                    <label for="opcion" style="font-weight: bold; font-size: 0.9rem; display: block; margin-bottom: 5px;">EQUIPOS:</label>
                    <select wire:model.live="opcionSeleccionada" class="lista-equipos-select" id="opcion" size="4">
                        <option value="" disabled>-- SELECCIONE EL EQUIPO A REPORTAR --</option>
                        @foreach($equipos as $equipo)
                            <option value="{{$equipo->id}}">{{$equipo->modelo}} - {{$equipo->marca}}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="tipo_falla" style="font-weight: bold; font-size: 0.9rem; display: block; margin-bottom: 5px;">TIPO DE FALLA:</label>
                    <select id="tipo_falla" class="lista-equipos-select" style="height: 40px; padding: 5px 10px;">
                        <option value="HARDWARE">HARDWARE</option>
                        <option value="SOFTWARE">SOFTWARE</option>
                    </select>
                </div>

            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 20px; margin-top: 25px; align-items: start;">
            
            <div>
                <h3 style="font-weight: bold; font-size: 1rem; margin-bottom: 10px;">ASUNTO</h3>
                <input type="text" wire:model="asunto" required style="width: 100%; border: 1px solid #ccd6e0; border-radius: 5px; padding: 10px; min-height: 40px;">
            </div>
            
            <div>
                <h3 style="font-weight: bold; font-size: 1rem; margin-bottom: 10px;">DESCRIPCIÓN DEL PROBLEMA</h3>
                <textarea wire:model.live="descripcion" required style="width: 100%; border: 1px solid #ccd6e0; border-radius: 5px; padding: 10px; min-height: 100px; resize: vertical;"></textarea>
            </div>

        </div>

        <div style="text-align: center; margin-top: 30px;">
            <button type="submit" wire:click="Save" class="btn-saite-enviar">ENVIAR</button>
        </div>

    </form>
</div>