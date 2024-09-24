<x-layout>
    <header class="header">
        <div class="container h-100">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 d-flex justify-content-center mt-5">
                    <h1 class="text-center">Articolo numero: {{$article->id}}</h1>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-4">
        <div class="row">
  
                <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="/storage/{{ $article->img }}" class="card-img-top img-fluid" alt="...">
                    
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->subtitle }}</p>
                            <p class="card-subtitle">{{ $article->body }} </p>
                        </div>
                    </div>
                    
                </div>
      
        </div>
    </div>
</x-layout>
