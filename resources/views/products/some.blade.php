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
               <p> <strong>Pruduct ID: </strong>{{$product->id}}</p>
               <p> <strong>Details: </strong>{{$product->decscription}}</p>
               <p> <strong>price: </strong>{{$product->price}}</p>
               <p> <strong>catagory: </strong>{{$product->category->name}}</p>
               <p> <strong>posted at: </strong>{{$product->created_at}}</p>
               <p> <strong>updated at: </strong>{{$product->updated_at}}</p>
               
            </div>
        </div>
    </div>

    </body>
</html>