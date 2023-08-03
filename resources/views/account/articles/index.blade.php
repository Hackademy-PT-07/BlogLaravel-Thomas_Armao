<x-main>
    <div class="container mt-5">
        <h1>Articoli</h1>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titolo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>
                            <a href="{{ route('account.articles.edit', $article) }}">modifica</a>
                            <form action="{{ route('account.articles.destroy', $article) }}" class="d-inline ms-3" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn text-danger" type="submit" >cancella</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-main>