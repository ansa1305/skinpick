<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkinPick - Your Personalized Recommendations</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #fdf2f8 0%, #fff5f7 50%, #fff 100%);
            color: #374151;
            padding-bottom: 3rem;
        }

        header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .logo {
            font-size: 2rem;
            font-weight: 700;
            color: #be185d;
            text-decoration: none;
        }

        .user-greeting {
            font-size: 1rem;
            color: #6b7280;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #be185d;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .recommendation-intro {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 3rem;
            line-height: 1.6;
            color: #4b5563;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
        }

        .product-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-name {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #1f2937;
        }

        .product-vendor {
            font-size: 0.875rem;
            color: #6b7280;
            margin-bottom: 1rem;
        }

        .product-description {
            font-size: 0.9rem;
            color: #4b5563;
            margin-bottom: 1.5rem;
            line-height: 1.5;
        }

        .product-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .product-price {
            font-size: 1.25rem;
            font-weight: 600;
            color: #be185d;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            color: #f59e0b;
        }

        .routine-section {
            margin-top: 4rem;
        }

        .routine-steps {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            max-width: 800px;
            margin: 0 auto;
        }

        .routine-step {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            display: flex;
            gap: 1.5rem;
        }

        .step-number {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: #be185d;
            color: white;
            border-radius: 50%;
            font-weight: 600;
            flex-shrink: 0;
        }

        .step-content {
            flex: 1;
        }

        .step-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #1f2937;
        }

        .step-description {
            font-size: 0.9rem;
            color: #4b5563;
            line-height: 1.5;
        }

        .back-button {
            display: inline-block;
            margin-top: 2rem;
            padding: 0.75rem 1.5rem;
            background: #f3f4f6;
            color: #374151;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .back-button:hover {
            background: #e5e7eb;
        }

        @media (max-width: 768px) {
            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
                gap: 1.5rem;
            }

            .routine-step {
                flex-direction: column;
                gap: 1rem;
            }
        }

        @media (max-width: 480px) {
            .products-grid {
                grid-template-columns: 1fr;
            }

            .header-container {
                flex-direction: column;
                gap: 0.5rem;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <a href="{{ route('welcome') }}" class="logo">SkinPick</a>
            <div class="user-greeting">Hello, {{ $userData['name'] }}!</div>
        </div>
    </header>

    <div class="container">
        <h1 class="section-title">Your Personalized Skincare Recommendations</h1>
        <p class="recommendation-intro">
            Based on your {{ $userData['skinType'] }} skin type, {{ $userData['age'] }} years of age, and {{ $userData['climate'] }} climate, 
            we've curated the perfect skincare products just for you. These products are designed to address your specific needs 
            and help you achieve healthy, glowing skin.
        </p>

        <div class="products-grid">
            @foreach($products as $product)
            <div class="product-card">
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                <div class="product-info">
                    <h3 class="product-name">{{ $product->name }}</h3>
                    <p class="product-vendor">{{ $product->vendor }}</p>
                    <p class="product-description">{{ $product->description }}</p>
                    <div class="product-meta">
                        <div class="product-price">${{ $product->price }}</div>
                        <div class="product-rating">
                            {{ $product->rating }}
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="16" height="16">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <a href="{{ route('login') }}" class="back-button">Retake Assessment</a>
    </div>
</body>
</html>

