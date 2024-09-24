<x-layout>
    <header class="header">
        <div class="container h-100">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 d-flex justify-content-center mt-5">
                    <h1 class="text-center">Inserisci nuovo Articolo</h1>
                </div>
            </div>
        </div>
    </header>

    <x-display-message></x-display-message>
    <x-display-errors></x-display-errors>

    <div class="container">
        <div class="row mt-5 justify-content-center my-5">
            <div class="col-12 col-md-6 justify-content-center">
                <form class="rounded-4 shadow bg-secondary-subtle p-3" action="{{ route('article.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo Articolo</label>
                        <input name="title" type="text" value="{{ old('title') }}" class="form-control" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo</label>
                        <input name="subtitle" type="text" value="{{ old('subtitle') }}" class="form-control" id="subtitle">
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Corpo Articolo</label>
                        <textarea name="body" class="form-control" id="body" cols="30" rows="10">{{ old('body') }}</textarea>
                    </div>

                    <div class="mb-3">
                        @foreach($tags as $tag)
                    <div class="form-check">
                        <input class="form-check-input" name="tags[]" type="checkbox" value="{{$tag->id}}" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          {{$tag->name}}
                        </label>
                      </div>
                      @endforeach
                    </div>
                   
                      
                      </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Inserisci immagine</label>
                        <input name="img" type="file" class="form-control" id="img">
                    </div>

                    <button type="submit" class="btn btn-primary">Crea Articolo</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
