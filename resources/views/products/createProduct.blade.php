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
                <form action="{{ route("product.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                   <div class="mt-2">
                     <label for="Description">Description</label>
                    <input type="text" name="description"><br>
                    <!-- @error("description")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror -->
                    <label for="price">Price</label>
                    <input type="number" name="price"><br>
                    <!-- @error("price")
                        <span class="text-danger">{{ $message }}</span> -->
                    <!-- @enderror -->
                    <label for="Category">Category</label>
                    <input type="text" name="category"><br>
                    <!-- @error('category')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror -->
                    <label for="seller">Seller ID</label>
                    <input type="number"name="seller"><br>
                    <!-- @error("seller")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror -->
                    <label for="image">Image</label>
                    <input type="file"name="image" class="form-control" accept="image/*"><br>
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