<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="card-header">
            <h4>All products</h4>
            <div class="card-body">
                <form class="d-flex align-items-center gap-2" action="{{ route('products.all') }}" method="GET">
                    <a href="{{ route('products.create') }}" class="btn btn-success btn-sm ">Create Product</a>
                    <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm ">Create Category</a>
                    <a href="{{ route('products.frontendAll') }}" class="btn btn-success btn-sm">Frontend View</a>
                    
                    <select class="form-control" name="category_id" style="width: min-content;">
                        <option value="">All</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-outline-info my-2 my-sm-0">Search</button>

                </form>



                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>seller</th>
                            <th>category</th>
                            <th>posted at</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($AllProducts as $product)
                        <tr>
                            <td>{{ $product->id}}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->seller }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->created_at }}</td>
                            <td>
                                <form action="{{ route('products.delete', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('prducts.details', $product->id) }}" class="btn btn-primary btn-sm">View</a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <button class="btn btn-danger btn-sm">
                                        delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</body>

</html>