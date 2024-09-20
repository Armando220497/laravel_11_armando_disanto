<x-layout>

    <header class="header">
        <div class="container h-100">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 d-flex justify-content-center mt-5">
                    <h1 class="text-center">Inserisci nuovo Prodotto</h1>
                </div>
            </div>
        </div>
    </header>

    <x-display-message></x-display-message>
    <x-display-errors></x-display-errors>


    <div class="container">
        <div class="row mt-5 justify-content-center my-5">
            <div class="col-12 col-md-6 justify-content-center">
                <form class="rounded-4 shadow bg-secondary-subtle p-3" action="{{ route('product.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome del prodotto</label>
                        <input name="name" type="text" class="form-control" id="name">

                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione del prodotto</label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>


                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo del prodotto</label>

                        <input name="price" type="text" class="form-control" id="price">

                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Inserisci immagine</label>

                        <input name="img" type="file" class="form-control" id="img">

                    </div>



                    <button type="submit" class="btn btn-primary">Crea Prodotto</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>
