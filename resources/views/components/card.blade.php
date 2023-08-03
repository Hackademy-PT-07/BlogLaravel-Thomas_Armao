<div class="col-md-3">
    <div class="card">
        <div class="card-body">
            <span class="text-secondary-small">
                @foreach($categories as $category)
                    {{ $category->name }}
                @endforeach
            </span>
            <img src="https://picsum.photos/300/200" class="card-img-top" alt="...">
            <h4>{{ $title }}</h4>
            <p>{{ $description }}</p>
            <div class="text-end">
                <a href="{{ route('article', $articleId) }}" class="btn btn-sm btn-info">Leggi</a>
            </div>
        </div>
    </div>
</div>