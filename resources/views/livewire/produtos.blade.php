<div>
    <livewire:cadastros />
    <x-container-g>

        <x-popup />

        <div class="flex justify-center">
            <form wire:submit="save" class="block md:w-4/5 w-full mx-5">

                <div class="block my-3">
                    
                    <div class="my-2">
                        <x-input-label class="mb-1" value="Produto"/>
                        <x-text-input wire:model.live="produto.nome"/>
                        @error('produto.nome')
                            <x-input-error :messages="$message" />
                        @enderror
                    </div>

                    <div class="my-2">
                        <x-input-label class="mb-1" value="Descrição"/>
                        <x-textarea-input wire:model.live="produto.descricao">
                        </x-textarea-input>
                        @error('produto.descricao')
                            <x-input-error :messages="$message" />
                        @enderror
                    </div>

                    <div class="my-2">
                        <x-input-label class="mb-1" value="Preço"/>
                        <x-text-input wire:model="produto.preco" type="number" step="0.01"/>
                        @error('produto.preco')
                            <x-input-error :messages="$message" />
                        @enderror
                    </div>

                    <div class="my-2">
                        <x-input-label class="mb-1" value="Imagem"/>
                        @if($produto->imagem)
                            <div class="flex justify-center items-center">
                                <img width="300" height="300" src="{{ $produto->imagem->temporaryUrl() }}" alt="">
                            </div>
                        @endif
                        <x-text-input wire:model.live="produto.imagem" type="file" />
                        @error('produto.imagem')
                            <x-input-error :messages="$message" />
                        @enderror
                    </div>

                    <div class="my-2">
                        <x-input-label class="mb-1" value="Categoria"/>
                        @if ($todas_categorias->isNotEmpty())

                            
                            <select  wire:model.live="produto.categoria" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
                                <option selected>Seleciona a Categoria</option>
                                @foreach ($todas_categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                @endforeach   
                            </select>
                            @error('produto.categoria')
                                <x-input-error :messages="$message" />
                            @enderror

                        @else

                            <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                  <span class="font-bold">Nenhuma Categoria Cadastrada!</span> Cadastre uma Categoria para continuar.
                                </div>
                            </div>

                        @endif
                        
                    </div>

                    <div class="my-2">
                        <x-input-label class="mb-1" value="Opcionais"/>
                        @if ($todos_opcionais->isNotEmpty())

                            @foreach ($todos_opcionais as $opcional)
                            
                                <div class="inline-block my-1">
                                    <div class="flex items-center px-4 border bg-white border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                        <input wire:model.live="produto.opcionais" value="{{ $opcional->id }}" id="bordered-checkbox-{{ $opcional->id }}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="bordered-checkbox-{{ $opcional->id }}" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $opcional->nome }} - R$ {{ number_format($opcional->preco, 2, ',') }}</label>
                                    </div>
                                </div>

                            @endforeach

                            @error('produto.opcionais')
                                <x-input-error :messages="$message" />
                            @enderror
                            
                        @else

                            <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                <span class="font-bold">Nenhum Opcional Cadastrado!</span> *Não impede a criação do produto.
                                </div>
                            </div>
                            
                        @endif
                    </div>

                </div>
                <x-primary-button class="mt-4">
                    <div wire:loading wire:target="save" role="status" class="mr-3">
                        <svg aria-hidden="true" class="w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div>
                        Cadastrar
                    </div>                        
                </x-primary-button>
            </form>
        </div>

        <hr class="my-10">

        <div class="flex justify-center">
            <div class="block md:w-4/5 w-full mx-5 text-center">
                @foreach ($produtosss as $item)
                    <livewire:produto-item :produtoItem="$item" wire:key="produtoitem-{{ $item->id }}" />
                @endforeach
            </div>            
        </div>


    </x-container-g>
</div>
