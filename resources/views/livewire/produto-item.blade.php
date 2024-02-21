<div class="inline-block w-60 m-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div>
        <img class="rounded-t-lg w-full" src="{{ url($produtoItem->imagem) }}" alt="" />
    </div>
    <div class="p-5">
        <div>
            <h5 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $produtoItem->nome }}</h5>
            <p class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">R$ {{ number_format($produtoItem->preco, 2, ',') }}</p>
        </div>
        <div class="flex justify-center items-center">
            <button class="inline-block mx-3 my-1 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Editar</button>
            <button wire:confirm="Tem certeza que deseja excluir?" class="inline-block mx-3 my-1 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Excluir</button>
        </div>
    </div>
</div>
