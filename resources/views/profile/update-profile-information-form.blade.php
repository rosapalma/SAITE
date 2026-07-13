<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Información de Perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Nombre y  Email') }}
    </x-slot>

    <x-slot name="form">


        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <h1>{{ Auth::user()->responsable['full_name']}} </h1>          
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <h1>{{ Auth::user()->responsable['email']}} </h1>          
        </div>
    </x-slot>

 
</x-form-section>
