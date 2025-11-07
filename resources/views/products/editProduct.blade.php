<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="http://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    </head>
    <body>
        <div class="container">
        <div class="card-header"><h4>Create a products</h4>
            <div class="card-body"> <a href="{{ route('products.all') }}", class="btn btn-info btn-sm mb-3">back</a>
                <form action="{{ route("products.update", $product->id) }}" method="POST">
                    @csrf
                  
                   <div class="mt-2">
                     <label for="Description">Description</label>
                    <input type="text" name="description" placeholder="" value="{{ $product->decscription }}"><br>
                    
                    <label for="price">Price</label>
                    <input type="number" name="price" placeholder="" value="{{ $product->price }}"><br>
                    
                    <label for="Category">Catagory</label>
                    <input type="text" name="category" placeholder="" value="{{$product->category}}"><br>
                    
                    <label for="seller">Seller Id</label>
                    <input type="number"name="seller" placeholder="" value="{{ $product->seller }}"><br>
                    
                    <div>
                <button type="submit" class="btn btn-success btn-sm" >submit</button>
                    </div>
                   </div>
                </form>
            </div>
        </div>
    </div>

    </body>
</html>