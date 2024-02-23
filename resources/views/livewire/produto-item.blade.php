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
                <button class="inline-block mx-1 my-1 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Editar</button>
                <button wire:confirm="Tem certeza que deseja excluir?" class="inline-block mx-1 my-1 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Excluir</button>
            </div>
        </div>
    </div>
</div>