<x-main>
    <x-slot:title>Crea una nuova categoria</x-slot>
    
        <div class="container mt-5">
            <div class="row">
                <div class="col-8 mx-auto">
                    <h1>Modifica una categoria</h1>
                    <x-success/>
                    <form action="{{route('categories.update', $category)}}" method="POST" class="mt-4">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="name">Nome</label>
                                <input type="text" name="name" id="name" class="form-control" maxlength="50" value="{{ old('name', $category->name)}}">
                                @error('name') <span class="text-danger small">{{$message}}</span>@enderror
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary">Salva</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-main>