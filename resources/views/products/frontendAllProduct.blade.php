<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        .img-fit {
            
            object-fit: cover;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card-deck">
            <h3>All Products</h3>
            <div class=""><a href="{{ route('products.all') }}" , class="btn btn-success btn-sm mb-3">backend view</a>
                <div class="row pt-5">
                    @foreach ($AllProducts as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="card-body card  img-fit">
                                    @if($product->image)
                                        <img class="card-img" src="{{ asset('storage/' . $product->image) }}"
                                            alt="Card image cap">
                                    @else
                                        <img class="card-img"
                                            src="{{ asset('storage/images/360_F_1613681914_UMwRb8dVArIEqABerQqnuDcF61kagmoi.jpg') }}"
                                            alt="Card image cap">

                                    @endif
                                    <div class="">
                                        <h5 class="card-title">{{$product->decscription}}</h5>
                                        <p class="card-text">Price:<b>{{ $product->price }}</b><br>
                                            Catagory: {{ $product->category }}
                                            <a href="{{ route('prducts.details', $product->id) }}"
                                                class="btn btn-primary btn-sm">View details</a>
                                        </p>

                                        <p class="card-text"><small class="text-muted">Posted:
                                                {{ $product->created_at }}</small></p>
                                    </div>
                                </div>
                          
                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</body>

</html>