<div class="text-white">   

    <x-popup />

    <x-container-g>

        <div class="flex justify-center mx-1">
            <div class="block w-full mx-5 text-center">
                
                @foreach ($categorias as $categoria)
                    @php
                        $produtos_categoria = $categoria->produtos()->get();
                    @endphp
                    @if ($produtos_categoria->isNotEmpty())
                        <h1 class="text-3xl text-orange-500">{{ $categoria->nome }}</h1>
                        @foreach ($produtos_categoria as $produto)
                            <livewire:produto-usuario :produtoItem="$produto" wire:key="produtouser-{{ $produto->id }}" />
                        @endforeach
                    @endif                    
                @endforeach
                
            </div>            
        </div>
 
    </x-container-g>

    <livewire:carrinho :vendedor="$vendedor" />

</div>
