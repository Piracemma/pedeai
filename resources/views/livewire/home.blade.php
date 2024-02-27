<div class="text-white">
    @foreach ($categorias as $categoria)
        <h1 class="text-red-500">{{ $categoria->nome }}</h1>
        @foreach ($categoria->produtos()->get() as $produto)
            <div class="rounded bg-blue-400 m-3">
                <p>{{ $produto->nome }}</p>
                <p>{{ $produto->preco }}</p>
                <img width="50" src="{{ url($produto->imagem) }}" alt="">
            </div>
        @endforeach
    @endforeach
</div>
