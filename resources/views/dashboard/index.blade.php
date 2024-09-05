<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('dashboard.header')

    <!-- Dashboard Content -->
    <section class="shop_section layout_padding py-5">
        <div class="container">
            <div class="heading_container heading_center mb-4">
                <h2>Latest Products</h2>
            </div>
            <div class="row g-4">
                @if($products)
                    @forelse ($products as $product)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card h-100">
                                <img src="{{ asset('images/' . $product->image) }}" class="card-img-top"
                                    alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <h6 class="text-primary">Price: ${{ number_format($product->amount, 2) }}</h6>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning text-center">
                                <h4>No Products Available</h4>
                                <p>Please check back later for new products.</p>
                            </div>
                        </div>
                    @endforelse
                @else
                    <div class="col-12">
                        <div class="alert alert-warning text-center">
                            <h4>No Products Available</h4>
                            <p>Please check back later for new products.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
