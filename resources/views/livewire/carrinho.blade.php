<div>
    <button data-modal-target="carrinho" data-modal-toggle="carrinho" class="fixed rounded-full w-16 h-16 border-none bg-orange-500 sm:bottom-10 sm:right-10 bottom-5 right-5 shadow-xl dark:bg-orange-500" type="button">
        <div class="flex justify-center items-center relative">
            <svg class="stroke-white w-7 h-7 stroke-2 inline-block mr-1" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 20a1 1 0 1 0 0 2 1 1 0 1 0 0-2z"></path>
                <path d="M20 20a1 1 0 1 0 0 2 1 1 0 1 0 0-2z"></path>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg>
            <div class="w-7 h-7 text-sm text-gray-800 font-extrabold bg-orange-500 rounded-full flex justify-center items-center absolute bottom-6 left-10">{{$count_produtos}}</div>
        </div>
    </button>
    <div id="carrinho" tabindex="-1" class="flex justify-center items-center fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-7xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-bold text-orange-500 dark:text-orange-500">
                        Carrinho
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="carrinho">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4 text-center">
                    <div>
                        {{-- REFATORAR PARA CADA ITEM SER UM ITEM LIVEWIRE --}}
                        {{-- REFATORAR PARA CADA ITEM SER UM ITEM LIVEWIRE --}}
                        {{-- REFATORAR PARA CADA ITEM SER UM ITEM LIVEWIRE --}}
                        {{-- REFATORAR PARA CADA ITEM SER UM ITEM LIVEWIRE --}}
                        {{-- REFATORAR PARA CADA ITEM SER UM ITEM LIVEWIRE --}}
                        {{-- REFATORAR PARA CADA ITEM SER UM ITEM LIVEWIRE --}}
                        @foreach ($carrinho as $item)
                            @php
                                $produto = App\Models\Produto::query()->where('id',$item->produto_id)->first(['nome', 'preco']);
                                $total = $produto->preco * $item->quantidade;
                            @endphp
                            <div>
                                <p class="text-gray-800 dark:text-gray-300 text-sm font-medium">{{ $item->quantidade }}x <small class="mx-1 text-orange-500 text-lg">{{ $produto->nome }}</small> - R${{ number_format($total, 2, ',') }}</p>
                                @if (!empty($item->observacao_produto))
                                    <p class="text-gray-800 dark:text-white text-xs"><small class="text-orange-500">Observação: </small> {{ $item->observacao_produto }}</p>
                                @endif
                            </div>
                            <hr class="dark:border-gray-600 w-1/2 mx-auto">
                        @endforeach
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="carrinho" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                    <button data-modal-hide="carrinho" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                </div>
            </div>
        </div>
    </div>
</div>