<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container py-4">

        <div class="row align-items-start">

            <!-- IMAGE -->
            <div class="col-md-6">
                @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}"
                    class="img-fluid img-thumbnail w-100"
                    style="max-width: 600px; max-height: 400px;"
                    alt="Product Image"
                    style="height: 300px; object-fit: cover;">
                @else
                <img src="{{ asset('storage/images/360_F_1613681914_UMwRb8dVArIEqABerQqnuDcF61kagmoi.jpg') }}"
                    class="img-fluid img-thumbnail w-100"
                    style="max-width: 600px; max-height: 400px;"
                    alt="Default Image"
                    style="height: 300px; object-fit: cover;">
                @endif
            </div>

            <!-- DETAILS -->
            <div class="col-md-6 text-start">
                <div class="card-body">

                    <p><strong>Product ID:</strong> {{ $product->id }}</p>
                    <p><strong>Details:</strong> {{ $product->description }}</p>
                    <p><strong>Price:</strong> {{ $product->price }}</p>
                    <p><strong>Category:</strong> {{ $product->category->name }}</p>
                    <p><strong>Posted at:</strong> {{ $product->created_at }}</p>
                    <p><strong>Updated at:</strong> {{ $product->updated_at }}</p>

                    <p>
                    

                        <a href=""
                            class="btn btn-primary btn-sm">
                           <strong></strong> buy now</strong>
                        </a>
                    </p>



                </div>
            </div>

        </div>
    </div>

</body>

</html>