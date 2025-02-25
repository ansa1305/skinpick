<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkinPick - Your Skincare Journey Begins</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #fdf2f8 0%, #fff5f7 50%, #fff 100%);
            position: relative;
            overflow: hidden;
        }

        /* Decorative background elements */
        .bg-circle {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(45deg, rgba(255, 228, 230, 0.5), rgba(254, 215, 226, 0.5));
        }

        .bg-circle:nth-child(1) {
            width: 400px;
            height: 400px;
            top: -200px;
            left: -200px;
        }

        .bg-circle:nth-child(2) {
            width: 300px;
            height: 300px;
            bottom: -150px;
            right: -150px;
        }

        .container {
            text-align: center;
            padding: 2rem;
            z-index: 1;
        }

        .logo {
            font-size: 4.5rem;
            font-weight: 700;
            color: #be185d;
            margin-bottom: 1.5rem;
            letter-spacing: -2px;
            animation: fadeInDown 1s ease-out;
        }

        .tagline {
            font-size: 1.25rem;
            color: #64748b;
            margin-bottom: 3rem;
            animation: fadeInUp 1s ease-out 0.3s backwards;
        }

        .start-button {
            display: inline-block;
            padding: 1rem 3.5rem;
            font-size: 1.25rem;
            font-weight: 600;
            color: white;
            background: linear-gradient(135deg, #be185d, #9d174d);
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(190, 24, 93, 0.2);
            animation: fadeInUp 1s ease-out 0.6s backwards;
        }

        .start-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(190, 24, 93, 0.3);
        }

        .start-button:active {
            transform: translateY(0);
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .logo {
                font-size: 3.5rem;
            }

            .tagline {
                font-size: 1.1rem;
                margin-bottom: 2.5rem;
            }

            .start-button {
                padding: 0.9rem 3rem;
                font-size: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            .logo {
                font-size: 2.8rem;
            }

            .tagline {
                font-size: 1rem;
                margin-bottom: 2rem;
            }

            .start-button {
                padding: 0.8rem 2.5rem;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Background decorative elements -->
    <div class="bg-circle"></div>
    <div class="bg-circle"></div>

    <div class="container">
        <h1 class="logo">SkinPick</h1>
        <p class="tagline">Discover your perfect skincare routine</p>
        <a href="{{route('login')}}" class="start-button">Start</a>
    </div>
</body>
</html>

