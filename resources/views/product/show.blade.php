<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('dashboard.header')

    <!-- Product Details Content -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('images/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                </div>
                <div class="col-md-6">
                    <h2>{{ $product->name }}</h2>
                    <p>{{ $product->description }}</p>
                    <h4 class="text-primary">Price: ${{ number_format($product->amount, 2) }}</h4>
                    <!-- Add more fields as needed -->
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('/') }}" class="btn btn-secondary">Back to Dashboard</a>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
