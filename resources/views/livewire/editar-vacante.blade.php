<form class="md:w-1/2 space-y-5" wire:submit.prevent='crearVacante'>

    <div>
        <x-input-label for="titulo" :value="__('Título Vacante')" />
        <x-text-input
        id="titulo"
        class="block mt-1 w-full"
        type="text"
        wire:model="titulo"
        :value="old('titulo')"
        placeholder="Título Vacante" />

        @error('titulo')
        {{-- sus componentes de livewire son dinamicos --}}
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />

        <select
                id="salario"
                wire:model="salario"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
            >
            <option>-- Seleccione --</option>
            @foreach ($salarios as $salario)
                <option value="{{$salario->id}}">{{$salario->salario}}</option>
            @endforeach

        </select>
        @error('salario')
        {{-- sus componentes de livewire son dinamicos --}}
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoría')" />

        <select
                id="categoria"
                wire:model="categoria"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
            >

            <option>-- Seleccione --</option>
            @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
            @endforeach
        </select>
        @error('categoria')
        {{-- sus componentes de livewire son dinamicos --}}
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input
            id="empresa"
            class="block mt-1 w-full"
            type="text"
            wire:model="empresa"
            :value="old('empresa')"
            placeholder="Empresa: ej.Netflix, Uber, Shopify" />

            @error('empresa')
            {{-- sus componentes de livewire son dinamicos --}}
                <livewire:mostrar-alerta :message="$message"/>
            @enderror
    </div>

    <div>
        <x-input-label for="ultimo_dia" :value="__('Último Día para postularse')" />
        <x-text-input
        id="ultimo_dia"
        class="block mt-1 w-full"
        type="date"
        wire:model="ultimo_dia"
        :value="old('ultimo_dia')"
        placeholder="Empresa: ej.Netflix, Uber, Shopify" />

        @error('ultimo_dia')
            {{-- sus componentes de livewire son dinamicos --}}
                <livewire:mostrar-alerta :message="$message"/>
            @enderror
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripción Puesto')" />
        <textarea
        wire:model="descripcion"
        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full h-72"
        placeholder="Descripcion general del puesto, experiencia"></textarea>

        @error('descripcion')
            {{-- sus componentes de livewire son dinamicos --}}
                <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input
        id="imagen"
        class="block mt-1 w-full"
        type="file"
        wire:model="imagen"
        accept="image/*" />

        <div class="my-5 w-96">
            <x-input-label  :value="__('Imagen Actual')" />
            <img src="{{asset('storage/vacantes/' . $imagen)}}" alt="{{'Imagen Vacante ' . $titulo}}" >
        </div>
        {{-- <div class="my-5 w-96">
            @if ($imagen)
                Imagen:
                <img src="{{ $imagen->temporaryUrl() }}" >
            @endif
        </div> --}}

        @error('imagen')
        {{-- sus componentes de livewire son dinamicos --}}
            <livewire:mostrar-alerta :message="$message"/>
    @enderror
    </div>
    <x-primary-button>
        Crear Cuenta
    </x-primary-button>
</form>
