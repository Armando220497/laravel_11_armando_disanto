<x-layout>
    <header class="header">
        <div class="container h-100">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 d-flex justify-content-center mt-5">
                    <h1 class="text-center">Prodotti</h1>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-4">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <x-card :product="$product"></x-card>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
