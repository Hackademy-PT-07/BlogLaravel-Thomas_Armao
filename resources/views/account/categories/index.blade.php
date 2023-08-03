<x-main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <h1>Categorie</h1>
            </div>
            <div class="col-6 text-end">
                <a href="{{route('categories.create')}}" class="btn btn-primary">Crea</a>
            </div>
        </div>

        <x-success />

        <x-error />

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Articoli</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        Numero di articoli: {{ $category->articles->count() }} <br>
                        <ul>
                            @foreach($category->articles as $article)
                                <li><a href="{{ route('article', $article)}}">{{ $article->title }}</a></li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="text-end">
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-secondary">modifica</a>
                        <form class="d-inline ms-2" action="{{route('categories.destroy', $category)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">cancella</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-main>