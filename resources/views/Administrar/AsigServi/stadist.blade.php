<div class=" text-center font-weight-bold mb-4" style=" padding: 25px;">
    <div style="display: flex;">
        
        <div style="display:block; margin-right:2% ;" class="font-weight-bold">
            <div class="bg-secondary" style="width: 200px; font-size: 10px; 
            border-radius: 12px; border: 1px solid #333; box-shadow: 1px 1px 0px #000;">
                TOTAL SOLICITUDES</div>
            <div class="" style="width: 200px; font-size: 12px;  border-radius: 12px;  
            border: 1px solid #333; box-shadow: 1px 0px 0px #000;" >
                <?php echo count($solicits); ?>
            </div>
        </div>

        <div style="display:block; margin-right:2% ;" class="font-weight-bold">
            <div class="bg-secondary" style="width: 200px; font-size: 10px; 
            border-radius: 12px; border: 1px solid #333; box-shadow: 1px 1px 0px #000;">
                SOLICITUDES ABIERTAS</div>
            <div class="" style="width: 200px; font-size: 12px;  border-radius: 12px;  
            border: 1px solid #333; box-shadow: 1px 0px 0px #000;" >
                @foreach($resultado as $item) 
                    @if($item->statud == 'ASIGNADA')
                        {{ $item->total }}
                    @endif
                @endforeach
            </div>
        </div>

        <div style="display:block; margin-right:2% ;" class="font-weight-bold">
            <div class="bg-secondary" style="width: 200px; font-size: 10px; 
            border-radius: 12px; border: 1px solid #333; box-shadow: 1px 1px 0px #000;">
                SOLICITUDES PENDIENTES DE ASIGNACIÓN</div>
            <div class="" style="width: 200px; font-size: 12px;  border-radius: 12px;  
            border: 1px solid #333; box-shadow: 1px 0px 0px #000;" >
                @foreach($resultado as $item) 
                    @if($item->statud == 'PENDIENTE')
                        {{ $item->total }}
                    @endif
                @endforeach
            </div>
        </div>

        <div style="display:block; margin-right:2% ;" class="font-weight-bold">
            <div class="bg-secondary" style="width: 200px; font-size: 10px; 
            border-radius: 12px; border: 1px solid #333; box-shadow: 1px 1px 0px #000;">
                SOLICITUDES CERRADAS</div>
            <div class="" style="width: 200px; font-size: 12px;  border-radius: 12px;  
            border: 1px solid #333; box-shadow: 1px 0px 0px #000;" > 
            @foreach($resultado as $item) 
                @if($item->statud == 'CERRADA')
                    {{ $item->total }}
                @endif
            @endforeach
            </div>
        </div>
    </div> 

  

    

    

</div>