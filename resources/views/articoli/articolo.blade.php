<x-main>

    <x-slot:title>Blog | Articolo</x-slot>

        <div class="container mt-5">
            <div class="mt-4">
                <div class="mb-3">
                    <a href="{{ route('articles') }}">Indietro</a>
                </div>
                <span class="small text-secondary">
                    @foreach($article->categories as $category)
                        {{ $category->name }}
                    @endforeach
                </span>
                
                <h1 class="text-primary">{{ $article->title }}</h1>
                <p>Scritto da: {{ $article->user->name }} (<a href="mailto:{{ $article->user->email }}">{{ $article->user->email }}</a>)</p>

                @if($article->image)
                <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="img-fluid">
                @endif

                <div class="mt-4">
                    {{ $article->description }}
                </div>
            </div>

        </div>

</x-main>