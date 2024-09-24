<x-layout>
    <header class="header">
        <div class="container h-100">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 d-flex justify-content-center mt-5">
                    <h1 class="text-center">I miei Articoli</h1>
                </div>
            </div>
        </div>
    </header>

    <x-display-message></x-display-message>

    <div class="container mt-4">
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ Storage::url($article->img) }}" class="card-img-top img-fluid" alt="...">
                    
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->subtitle }}</p>
                            <p class="card-subtitle">{{ $article->body }} </p>

                            @if(count($article->tags))
                            <div class="mb-3">
                                @foreach($article->tags as $tag)
                            <span class="badge text-bg-primary">#{{$tag->name}}</span>
                            @endforeach
                        </div>
                            @endif
                            <a href="{{ route('article.show', $article->id) }}" class="btn btn-primary d-bloclk">Dettaglio articolo</a>
                           
                            @auth
                                
                            <a href="{{ route('article.edit', $article->id) }}" class="btn btn-warning">Modifica articolo</a>
                            
                            <form action="{{ route('article.destroy', $article->id) }}" method="POST" > @csrf @method('DELETE')<button class="btn btn-danger" type="submit">Elimina articolo</button></form>
                            @endauth


                        </div>
                    </div>
                    
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
