<div class="my-3 p-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center space-x-4 rtl:space-x-reverse">
        <div class="flex-shrink-0">
            <img class="w-16 h-16 rounded-md" src="{{ url($produtoItem->imagem) }}" alt="Neil image">
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-start text-sm font-medium text-gray-900 truncate dark:text-white">
                {{ $produtoItem->nome }}
            </p>
            <p class="text-start text-sm text-gray-500 truncate dark:text-gray-400">
                {{ $produtoItem->descricao }}
            </p>
            <p class="text-start text-base font-semibold text-gray-900 dark:text-white">
                R$ {{ number_format($produtoItem->preco, 2, ',') }}
            </p>
        </div>
        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
            <div class="flex justify-center items-center">                

                <div class="block space-y-4 md:flex md:space-y-0 md:space-x-4 rtl:space-x-reverse">
                    <button data-modal-target="vermais-{{ $produtoItem->id }}" data-modal-toggle="vermais-{{ $produtoItem->id }}" class="inline-block mx-1 my-1 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button">Ver Mais</button>
                </div>

                <div id="vermais-{{ $produtoItem->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-7xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-medium text-orange-500">
                                    {{ $produtoItem->nome }}
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="vermais-{{ $produtoItem->id }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5">
                                
                                <div class="mb-3">
                                    <p class="font-semibold text-lg text-start text-orange-500">Preço:</p>
                                    <p class="font-normal text-sm text-start dark:text-gray-200 text-gray-500">R$ {{ number_format($produtoItem->preco, 2, ',') }}</p>
                                </div>

                                <div class="mb-3">
                                    <p class="font-semibold text-lg text-start text-orange-500">Descrição:</p>
                                    <p class="font-normal text-sm text-start dark:text-gray-200 text-gray-500">{{ $produtoItem->descricao }}</p>
                                </div>

                                <div class="mb-3">
                                    <p class="font-semibold text-lg text-start text-orange-500">Categoria:</p>
                                    <p class="font-normal text-sm text-start dark:text-gray-200 text-gray-500">{{ $categoria_atual->nome }}</p>
                                </div>

                                <div class="mb-3">
                                    <p class="font-semibold text-lg text-start text-orange-500">Imagem:</p>
                                    <img width="250" class="rounded-md" src="{{ url($produtoItem->imagem) }}" alt="{{ $produtoItem->nome }}">
                                </div>
                                
                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button wire:click="editar" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Editar</button>
                                <button wire:click="delete" wire:confirm="Tem certeza que deseja excluir?" class="inline-block focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Excluir</button>
                            </div>
                        </div>
                    </div>
                </div>

                <button wire:click="delete" wire:confirm="Tem certeza que deseja excluir?" class="inline-block mx-1 my-1 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Excluir</button>
            </div>
        </div>
    </div>
</div>