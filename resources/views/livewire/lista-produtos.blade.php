<div>
    <x-container-g>

        <div class="flex justify-center mx-1">
            <div class="block md:w-4/5 w-full mx-5 text-center">
                
                @foreach ($produtos as $produto)
                    
                    <livewire:produto-item :produtoItem="$produto" wire:key="produtoitem-{{ $produto->id }}" />
                    
                @endforeach
                
            </div>            
        </div>
 
    </x-container-g>
</div>