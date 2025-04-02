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
        <h1 class="mb-4">Bills Lists</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Invoice Code</th>
                    <th>Date</th>
                    <th>Due date</th>
                    <th>Status</th>
                    <th>Payment method</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoice as $item)
                    <tr>
                        <td>{{ $item->invoice_cod }}</td>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->due_date }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->payment_method }}</td>
                        <td>{{ $item->total }}</td>
                        <td>
                            <a href="{{ route('invoice.show', $customer->invoice_cod) }}" class="btn btn-primary btn-sm">See</a> 
                            <a href="{{ route('invoice.edit', $customer->invoice_cod) }}" class="btn btn-warning btn-sm">Update</a>
                            <form action="{{ route('invoice.destroy', $invoice->invoice_cod) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Are you sure?');">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('customer.create') }}" class="btn btn-success">Back</a>
    </div>
</body>
</html>
