@props([
    'venda_item'
])
<div class="p-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center space-x-4 rtl:space-x-reverse">
        <div class="flex-1 w-1/2">
            <p class="text-start text-sm font-medium text-gray-900 truncate dark:text-white">
                {{ $venda_item->produto }}
            </p>
            @if (!empty($venda_item->observacao))
                <p class="text-start text-orange-500 text-xs truncate">*{{ $venda_item->observacao }}</p>
            @endif
            <p class="text-start text-sm text-gray-500 truncate dark:text-gray-400">
                {{ $venda_item->quantidade }}x <span class="font-bold">R${{ number_format($venda_item->preco, 2, ',') }}</span>
            </p>
            <p class="text-start text-base font-semibold text-gray-900 dark:text-white">
                R$ {{ number_format($venda_item->total, 2, ',') }}
            </p>
        </div>
    </div>
</div>