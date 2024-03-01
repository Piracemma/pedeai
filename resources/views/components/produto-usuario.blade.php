@props([
    'produtoItem',
    'categoria_atual'
])
<div class="my-3 p-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center space-x-4 rtl:space-x-reverse">
        <div class="flex-shrink-0">
            <button  data-modal-target="vermais-{{ $produtoItem->id }}" data-modal-toggle="vermais-{{ $produtoItem->id }}">
                <img class="w-16 h-16 rounded-md" src="{{ url($produtoItem->imagem) }}" alt="Neil image">
            </button>
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-start text-sm font-medium text-gray-900 truncate dark:text-white">
                <button data-modal-target="vermais-{{ $produtoItem->id }}" data-modal-toggle="vermais-{{ $produtoItem->id }}">{{ $produtoItem->nome }}</button>
            </p>
            <p class="text-start text-sm text-gray-500 truncate dark:text-gray-400">
                <button data-modal-target="vermais-{{ $produtoItem->id }}" data-modal-toggle="vermais-{{ $produtoItem->id }}">{{ $produtoItem->descricao }}</button>
            </p>
            <p class="text-start text-base font-semibold text-gray-900 dark:text-white">
                <button data-modal-target="vermais-{{ $produtoItem->id }}" data-modal-toggle="vermais-{{ $produtoItem->id }}">R$ {{ number_format($produtoItem->preco, 2, ',') }}</button>
            </p>
        </div>
        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
            <div class="flex justify-center items-center">
                <div id="vermais-{{ $produtoItem->id }}" tabindex="-1" class="flex justify-center items-center fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
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
                            <form wire:submit="adicionar({{$produtoItem->id}})" >
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

                                    <div class="mb-3 text-start">
                                        <p class="font-semibold text-lg text-start text-orange-500">Quantidade:</p>
                                        <input wire:model="quantidade" type="number" step="1.00" class="border-gray-300 bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-orange-500 dark:focus:border-orange-500 focus:ring-orange-500 dark:focus:ring-orange-500 rounded-md shadow-sm w-20 text-center"/>
                                        @error('quantidade')
                                            <x-input-error :messages="$message" />
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <p class="font-semibold text-lg text-start text-orange-500">Observação:</p>
                                        
                                        <textarea wire:model="observacao" class="border-gray-300 bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:border-orange-500 dark:focus:border-orange-500 focus:ring-orange-500 dark:focus:ring-orange-500 rounded-md shadow-sm w-full" 
                                        rows="3"></textarea>
                                        @error('observacao')
                                            <x-input-error :messages="$message" />
                                        @enderror
                                    </div>
                                    
                                </div>
                                <!-- Modal footer -->
                                <div class="flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <button type="submit" data-modal-hide="vermais-{{ $produtoItem->id }}" class="text-white bg-orange-500 hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-orange-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-500 dark:hover:bg-orange-500 dark:focus:ring-orange-600">
                                    
                                        <svg class="stroke-white w-5 h-5 stroke-2 inline-block mr-3" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 20a1 1 0 1 0 0 2 1 1 0 1 0 0-2z"></path>
                                            <path d="M20 20a1 1 0 1 0 0 2 1 1 0 1 0 0-2z"></path>
                                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                        </svg>

                                        Adicionar

                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>