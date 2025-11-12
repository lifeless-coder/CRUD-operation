<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="http://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    </head>
    <body>
        <div class="container">
        <div class="card-deck card-header"><h3>All products</h3>
            <div class="card-body"> <a href="{{ route('products.all') }}", class="btn btn-success btn-sm mb-3">backend view</a>
        
                
                <div class="row">
                    @foreach ($AllProducts as $product)
                    <div class="card-body card col-md-6" style="width: 28%;">
                        @if($product->image)
                             <img class="card-img-top" src="{{ asset('storage/'.$product->image) }}" alt="Card image cap">
                        @else
                            <img src="{{ asset('storage/images/360_F_1613681914_UMwRb8dVArIEqABerQqnuDcF61kagmoi.jpg') }}" alt="Card image cap">

                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{$product->decscription}}</h5>
                            <p class="card-text">Price:<b>{{ $product->price }}</b><br>
                            Catagory: {{ $product->category }}
                            <a href="{{ route('prducts.details', $product->id) }}" class="btn btn-primary btn-sm">View details</a>
                         <!-- <form action="{{ route('products.delete', $product->id) }}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('prducts.details', $product->id) }}" class="btn btn-primary btn-sm">View</a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info btn-sm">Edit</a> 
                                    <button class="btn btn-danger btn-sm">
                                        delete
                                    </button>
                                </form> -->
        </p>

      <p class="card-text"><small class="text-muted">Posted: {{ $product->created_at }}</small></p>
    </div>
  </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    </body>
</html>