<div>
    
    <x-popup />
    <div class="w-full min-h-screen bg-opacity-50 bg-gray-500 absolute top-0 flex items-center justify-center" wire:loading.flex wire:target="remover">
        <div class="flex items-center justify-center w-56 h-56">
            <div role="status">
                <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>

    <x-container-g>

        <h1 class="text-3xl text-orange-500">Produtos:</h1>

        <div class="p-4 md:p-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                     
            @foreach ($carrinho as $item)                        
                
                <x-produto-carrinho :id_carrinho="$item->id" :id_produto="$item->produto_id" :quantidade="$item->quantidade" :observacaoproduto="$item->observacao_produto"/>
            
            @endforeach
            
        </div>

        <h1 class="text-3xl text-orange-500">Dados:</h1>

        <form wire:submit="">
            <div class="my-3">
                <x-input-label value="Total da Compra:" class="text-2xl inline-block font-normal"/><small class="text-orange-500 text-2xl ml-1 font-semibold">R${{ number_format($sum_produtos, 2, ',') }}</small>
            </div>
            <div class="my-3">
                <x-input-label value="Forma de pagamento" />
                <select wire:model.live="finalizadora" class="mt-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
                    <option>Selecione...</option>
                    @foreach ($finalizadoras as $pagar)
                        <option value="{{ $pagar->id }}">{{ $pagar->nome }}</option>
                    @endforeach
                </select>
                @error('finalizadora')
                    <x-input-error :messages="$message" />
                @enderror
            </div>
            <div class="my-3">
                <x-input-label value="Observação" />
                <x-textarea-input wire:model="observacao_venda" class="mt-2">
                </x-textarea-input>
                @error('observacao_venda')
                    <x-input-error :messages="$message" />
                @enderror
            </div>
            <button wire:click="finalizar" class="text-white bg-orange-500 hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-orange-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-500 dark:hover:bg-orange-500 dark:focus:ring-orange-600">
                                
                <svg class="stroke-white w-5 h-5 stroke-2 inline-block mr-3" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 20a1 1 0 1 0 0 2 1 1 0 1 0 0-2z"></path>
                    <path d="M20 20a1 1 0 1 0 0 2 1 1 0 1 0 0-2z"></path>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>

                Finalizar

            </button>
        </form>

    </x-container-g>
</div>