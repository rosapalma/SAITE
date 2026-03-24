<x-guest-layout>
    <x-authentication-card>
        <!-- <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot> -->

        

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

<!-- <a href="/prueba">Prueba</a> -->
       <div class="" style="display: flex;">
            <div>
                <img src="{{asset('images/brand.png')}}" style="min-height: 90vh;" >
            </div>
            <div class=" sm:max-w-md mt-6 px-6 border border-dark" style=" margin-top: 0; margin-left: 5%; margin-right: 5%;">
                <x-validation-errors class="mb-4" />
                <div class="text-center">
                    <img src="{{asset('images/logo.png')}}" style="width: 30%; margin-left: 35%;">
                    <h4 class="fw-bold">ACCESO</h4>
                </div><br>

               <form method="POST" action="{{ route('login') }}">
                    @csrf
                   <div class="input-group">
                          <label class="form-label  label-blue fw-bold small">CORREO INSTITUCIONAL</label>
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="usuario.ipm@upel.edu.ve" />
                    </div><br>
                    <div class="">
                        <label class="label-blue ">PASSWORD</label>
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="*********" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" checked />
                            <span class="ms-2 text-sm text-gray-600">{{ __('RECORDARME') }}</span>
                       
                            @if (Route::has('password.request'))
                                <a href="#" class="text-decoration-none text-secondary" style="padding-left: 20%;">OLVIDÓ SU CONTRASEÑA</a>
                            @endif  
                        </label>
                    </div>


                    <br><br>
            <div class="items-center content-center">
                   <x-button>
                    {{ __('ACCEDER') }}
                </x-button>
            </div>
        </form> 
    </div>

    </x-authentication-card>
</x-guest-layout>
