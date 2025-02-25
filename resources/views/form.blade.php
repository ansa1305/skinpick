<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkinPick - Complete Your Profile</title>
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
            padding: 2rem;
            color: #374151;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
        }

        .progress-bar {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: #f3f4f6;
        }

        .progress {
            width: 25%;
            height: 100%;
            background: linear-gradient(to right, #be185d, #ec4899);
            transition: width 0.3s ease;
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-header h1 {
            color: #be185d;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .form-header p {
            color: #6b7280;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #374151;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1.5px solid #e5e7eb;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #be185d;
            box-shadow: 0 0 0 3px rgba(190, 24, 93, 0.1);
        }

        .radio-group {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .radio-option {
            flex: 1;
            min-width: 120px;
        }

        .radio-option input[type="radio"] {
            display: none;
        }

        .radio-option label {
            display: block;
            padding: 0.75rem 1rem;
            text-align: center;
            border: 1.5px solid #e5e7eb;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .radio-option input[type="radio"]:checked + label {
            background: #fdf2f8;
            border-color: #be185d;
            color: #be185d;
        }

        .budget-range {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .budget-range input {
            flex: 1;
        }

        .budget-range span {
            color: #6b7280;
            font-size: 0.9rem;
        }

        .form-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            flex: 1;
            padding: 0.75rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-next {
            background: #be185d;
            color: white;
        }

        .btn-next:hover {
            background: #9d174d;
        }

        .btn-back {
            background: #f3f4f6;
            color: #374151;
        }

        .btn-back:hover {
            background: #e5e7eb;
        }

        /* Custom select styling */
        select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1.5em;
            padding-right: 2.5rem;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-container {
            animation: fadeIn 0.5s ease-out;
        }

        /* Responsive Design */
        @media (max-width: 640px) {
            .form-container {
                padding: 2rem;
            }

            .radio-option {
                min-width: 100%;
            }

            .budget-range {
                flex-direction: column;
                gap: 0.5rem;
            }

            .form-buttons {
                flex-direction: column-reverse;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="progress-bar">
            <div class="progress"></div>
        </div>

        <div class="form-header">
            <h1>Complete Your Profile</h1>
            <p>Help us personalize your skincare routine</p>
        </div>

        <form id="profileForm" action="{{ route('process.form') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
            </div>

            <div class="form-group">
                <label>Gender</label>
                <div class="radio-group">
                    <div class="radio-option">
                        <input type="radio" id="male" name="gender" value="male" required>
                        <label for="male">Male</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" id="female" name="gender" value="female">
                        <label for="female">Female</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" id="other" name="gender" value="other">
                        <label for="other">Other</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" min="13" max="100" placeholder="Enter your age" required>
            </div>

            <div class="form-group">
                <label for="skinType">Skin Type</label>
                <select id="skinType" name="skinType" required>
                    <option value="">Select your skin type</option>
                    <option value="normal">Normal</option>
                    <option value="dry">Dry</option>
                    <option value="oily">Oily</option>
                    <option value="combination">Combination</option>
                    <option value="sensitive">Sensitive</option>
                </select>
            </div>

            <div class="form-group">
                <label for="climate">Climate</label>
                <select id="climate" name="climate" required>
                    <option value="">Select your climate</option>
                    <option value="tropical">Tropical</option>
                    <option value="dry">Dry</option>
                    <option value="temperate">Temperate</option>
                    <option value="continental">Continental</option>
                    <option value="polar">Polar</option>
                </select>
            </div>

            <div class="form-group">
                <label>Budget Range</label>
                <div class="budget-range">
                    <input type="number" id="minBudget" name="minBudget" placeholder="Min Budget" required>
                    <span>to</span>
                    <input type="number" id="maxBudget" name="maxBudget" placeholder="Max Budget" required>
                </div>
            </div>

            <div class="form-buttons">
                <button type="submit" class="btn btn-next">Find My Products</button>
            </div>
        </form>
    </div>

    <script>
        const form = document.getElementById('profileForm');
        const progress = document.querySelector('.progress');

        form.addEventListener('input', () => {
            const fields = form.querySelectorAll('input, select');
            let filledFields = 0;

            fields.forEach(field => {
                if (field.type === 'radio') {
                    if (field.checked) filledFields++;
                } else if (field.value) {
                    filledFields++;
                }
            });

            const progressPercentage = (filledFields / fields.length) * 100;
            progress.style.width = `${progressPercentage}%`;
        });
    </script>
</body>
</html>

