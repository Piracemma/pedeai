<div>
    <div>   

        <x-slot name="header">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <x-nav-link wire:navigate :href="route('cadastros.produtos')" :active="request()->routeIs('cadastros.produtos')">
                            {{ __('Produtos') }}
                        </x-nav-link>
                    </li>
                    <li class="inline-flex items-center">
                        <span class="text-gray-400 mx-1">/</span>
                        <x-nav-link wire:navigate :href="route('cadastros.categorias')" :active="request()->routeIs('cadastros.categorias')">
                            {{ __('Categorias') }}
                        </x-nav-link>
                    </li>
                </ol>
            </nav>
        </x-slot>
    
    </div>
</div>
