<div>
    <x-popup />
    <x-container-g>
    
        <div class="w-5/6 mx-auto">
            @foreach ($vendas as $compra)
                <x-compra-dashboard :venda_itens="$compra->id" :compra="$compra"/>
            @endforeach
            {{ $vendas->onEachSide(3)->links() }}
        </div>
        
    </x-container-g>
</div>
