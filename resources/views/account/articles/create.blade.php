<x-main>
    <div class="container mt-5">
        <h1>Crea un nuovo articolo</h1>

        <x-success />

        <!-- seconda modalità per visualizzare gli errori
            @if($errors->any())
                <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <span>{{ $error }}</span> <br>
                @endforeach
                </div>
            @endif
        -->

        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-12">
                    <label for="title">Titolo</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" maxlength="150" value="{{ old('title')}}">
                    @error('title') <span class="small text-danger">{{$message}}</span>@enderror
                </div>
                <div class="col-12">
                    <label for="category_id">Categorie</label>
                    @foreach(App\Models\Category::all() as $category)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{ $category->name }}
                        </label>
                    </div>
                    @endforeach
                    @error('category_id') <span class="small text-danger">{{$message}}</span>@enderror
                </div>
                <div class="col-12">
                    <label for="description">Descrizione breve</label>
                    <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description')}}">
                    @error('description') <span class="small text-danger">{{$message}}</span>@enderror
                </div>
                <div class="col-12">
                    <label for="image">Immagine</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="col-12">
                    <label for="description">Corpo</label>
                    <textarea name="body" id="body" rows="10" class="form-control @error('body') is-invalid @enderror">{{ old('body')}}</textarea>
                    @error('body') <span class="small text-danger">{{$message}}</span>@enderror
                </div>
                <div class="col-12">
                    <button class="btn btn-primary">Salva</button>
                </div>
            </div>
        </form>
    </div>
</x-main>