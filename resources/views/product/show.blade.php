<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Products</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product_id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Descrition</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>{{ $product->product_id }}</td>
                        <td>{{ $product->name}}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <a href="{{ route('product.show', $product->product_id) }}" class="btn btn-primary btn-sm">See</a> 
                            <a href="{{ route('product.edit', $product->product_id) }}" class="btn btn-warning btn-sm">Update</a>
                               <form action="{{ route('product.destroy', $product->product_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Eliminar</button>
                            </form>
                        </td>
                    </tr>
            </tbody>
        </table>

        <a href="{{ route('product.create') }}" class="btn btn-success">Add Product</a>
    </div>
</body>
</html>
