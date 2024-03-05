@props([
    'venda_itens',
    'compra'
])
@php
    $vendedor = App\Models\User::query()->where('id', $compra->vendedor_id)->first();
    $comprador = App\Models\User::query()->where('id', $compra->user_id)->first();
    $itens = App\Models\VendaItem::query()->where('venda_id', $compra->id)->get();
@endphp
<div class="my-3 p-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center space-x-4 rtl:space-x-reverse">
        @if (user()->vendedor)
            <div class="flex-shrink-0 text-gray-900 dark:text-white">
                <span class="text-xs">#{{ $compra->id }}</span>
            </div>
        @endif
        <div class="flex-1 min-w-0">
            <p class="text-start text-sm font-medium text-gray-900 truncate dark:text-white">
                @if (user()->vendedor)
                    {{ $comprador->name }}
                @else
                    {{ $vendedor->name }}
                @endif
            </p>
            <p class="text-start text-base font-semibold text-orange-500">
                R$ {{ number_format($compra->total, 2, ',') }}
            </p>
        </div>
        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
            <div class="flex justify-center items-center">                

                <div class="block space-y-4 md:flex md:space-y-0 md:space-x-4 rtl:space-x-reverse">
                    <button data-modal-target="compra-{{ $venda_itens }}" data-modal-toggle="compra-{{ $venda_itens }}" class="inline-block mx-1 my-1 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button">Detalhes</button>
                </div>

                <div id="compra-{{ $venda_itens }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-7xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-medium text-orange-500">
                                    @if (user()->vendedor)
                                        {{ $comprador->name }} <span class="text-lg text-gray-900 dark:text-white">- #{{ $compra->id }}</span>
                                    @else
                                        {{ $vendedor->name }}
                                    @endif
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="compra-{{ $venda_itens }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">                    
                    
                                @foreach ($itens as $item)                        
                                    
                                    <x-compra-item :venda_item="$item"/>
                                
                                @endforeach
                                
                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center justify-between p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                                <div>
                                    <button data-modal-hide="compra-{{ $venda_itens }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Voltar</button>
                                </div>
                                <div class="text-orange-500 text-lg">
                                    Total: <small class="text-xl font-semibold">R${{ number_format($compra->total, 2, ',') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>