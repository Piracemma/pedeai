@props([
    'id_carrinho',
    'id_produto',
    'quantidade',
    'observacaoproduto'
])
@php
    $produtoCarrinho = App\Models\Produto::query()->where('id', $id_produto)->first();
    $total = $produtoCarrinho->preco * $quantidade;
@endphp
<div class="p-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center space-x-4 rtl:space-x-reverse">
        <div class="flex-shrink-0">
            
            <img class="w-16 h-16 rounded-md" src="{{ url($produtoCarrinho->imagem) }}" alt="Neil image">
            
        </div>
        <div class="flex-1 w-1/2">
            <p class="text-start text-sm font-medium text-gray-900 truncate dark:text-white">
                {{ $produtoCarrinho->nome }}
            </p>
            @if (!empty($observacaoproduto))
                <p class="text-start text-orange-500 text-xs truncate">*{{ $observacaoproduto }}</p>
            @endif
            <p class="text-start text-sm text-gray-500 truncate dark:text-gray-400">
                {{ $quantidade }}x <span class="font-bold">R${{ number_format($produtoCarrinho->preco, 2, ',') }}</span>
            </p>
            <p class="text-start text-base font-semibold text-gray-900 dark:text-white">
                R$ {{ number_format($total, 2, ',') }}
            </p>
        </div>
        <div class="text-end">
            <button type="button" wire:click="remover({{ $id_carrinho }})" data-modal-hide="carrinho">
                <svg class="w-6 h-6 text-red-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                </svg>
            </button>
        </div>
    </div>
</div>