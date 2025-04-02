<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Customers Lists</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Contact Phone</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>{{ $customer->dni }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->last_name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->contact_phone }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>
                            <a href="{{ route('customer.show', $customer->dni) }}" class="btn btn-primary btn-sm">See</a> 
                            <a href="{{ route('customer.edit', $customer->dni) }}" class="btn btn-warning btn-sm">Update</a>
                            <form action="{{ route('customer.destroy', $customer->dni) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</button>
                            </form>
                        </td>
                    </tr>
            </tbody>
        </table>
        <a href="{{ route('customer.index') }}" class="btn btn-success">Back</a>
    </div>
</body>
</html>
