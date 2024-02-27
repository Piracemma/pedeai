<div class="text-white">   

    <x-container-g>

        <div class="flex justify-center mx-1">
            <div class="block w-full mx-5 text-center">
                
                @foreach ($categorias as $categoria)
                    <h1 class="text-3xl text-orange-500">{{ $categoria->nome }}</h1>
                    @foreach ($categoria->produtos()->get() as $produto)
                        <livewire:produto-usuario :produtoItem="$produto" wire:key="produtouser-{{ $produto->id }}" />
                    @endforeach
                @endforeach
                
            </div>            
        </div>
 
    </x-container-g>

</div>
