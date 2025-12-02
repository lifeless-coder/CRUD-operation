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
                <form action="{{ route("categories.create") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                   <div class="mt-2">
                    
                   
                    <label for="category">Category name</label>
                    <input type="text" name="category"><br>
                    <div>
                <button type="submit" class="btn btn-success btn-sm" >Add</button>
                    </div>
                   </div>
                </form>
            </div>
        </div>
    </div>

    </body>
</html>