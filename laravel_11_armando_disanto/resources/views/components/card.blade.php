<div class="card h-100">
    <img src="{{ Storage::url($product->img) }}" class="card-img-top img-fluid" alt="...">

    <div class="card-body">
        <h5 class="card-title">{{ $product->name }}</h5>
        <p class="card-text">{{ $product->description }}</p>
        <p class="card-text">{{ $product->price }} €</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>
