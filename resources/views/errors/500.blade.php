<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Server Error</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #060911;
            color: #d1d5db;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .error-card {
            background-color: #0b0f19;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 3rem;
            max-width: 500px;
            width: 100%;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
        }
        .error-code {
            font-size: 6rem;
            font-weight: 800;
            color: #dc3545;
            line-height: 1;
            margin-bottom: 1.5rem;
        }
        .btn-blue {
            background-color: #0052ff;
            color: #ffffff;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        .btn-blue:hover {
            background-color: #0041cc;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 82, 255, 0.3);
            color: white;
        }
    </style>
</head>
<body>

    <div class="error-card">
        <div class="error-code">500</div>
        <h3 class="text-white fw-bold mb-3">Internal Server Error</h3>
        <p class="text-secondary mb-5">Something went wrong on our end. Please try again later, or contact us if the problem persists.</p>
        <a href="{{ url('/') }}" class="btn btn-blue">
            <i class="fa-solid fa-house me-2"></i>Back to Home
        </a>
    </div>

</body>
</html>
