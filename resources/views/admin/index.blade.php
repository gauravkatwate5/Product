<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('admin.header');
    <!-- Dashboard Content -->
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Products List</h1>
            <a href="{{route("add_edit_product")}}" class="btn btn-primary">Add Product</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Sr No</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $product['name'] }}</td>
                        <td>${{ number_format($product['amount'], 2) }}</td>
                        <td>{{ $product['description'] }}</td>
                        <td>
                            <img src="{{ asset('images/'. $product['image']) }}" alt="{{ $product['name'] }}" class="img-thumbnail" style="width: 60px;">
                        </td>
                        <td class="table-actions">
                            <a href="{{route("add_edit_product",$product['id'])}}" class="btn btn-warning btn-sm">Update</a>
                            <a href="{{route("delete_product",$product['id'])}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
