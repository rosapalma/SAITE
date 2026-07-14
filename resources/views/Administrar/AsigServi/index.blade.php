 <div class="container-fluid mt-3"> 
    @if (session('message')) 
        <div class="alert alert-success text-center font-weight-bold mb-4" style="border-radius: 12px; border: 1px solid #c3e6cb; background-color: #d4edda; color: #155724; padding: 12px;">
            <i class="fas fa-check-circle mr-2"></i> {{ session('message') }}
        </div>
    @endif
    
    <div c class="d-flex bg-light p-3" style="gap: 20px;">
        <div class="col-md-6 p-0">
          @include('Administrar.AsigServi.filtrar')
          @include('Administrar.AsigServi.tool')
        </div> 
        <div class="col-md-6 p-0">
         @include('Administrar.AsigServi.form')
        </div>   
    </div>
</div>

@if($isOpenShow)
 @include('Administrar.AsigServi.show')
@endif