<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>

    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome (CDN) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts (Nunito) -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&display=swap" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
    body,
    html {
        height: 100%;
        font-family: 'Nunito', sans-serif;
        background-color: #f8f9fa;
    }

    .container-fluid {
        display: flex;
        height: 100vh;
        padding: 0;
    }

    .col-md-6 img {
        object-fit: cover;
        height: 100%;
        width: 100%;
    }

    .col-md-6 {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #fff;
    }

    .card {
        width: 100%;
        max-width: 400px;
        padding: 40px 30px;
        border-radius: 12px;
        border: none;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .card-body {
        text-align: center;
    }

    .sidebar-brand {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
    }

    .sidebar-brand-icon img {
        height: 60px;
    }

    .sidebar-brand-text {
        font-size: 30px;
        font-weight: bold;
        color: #007bff;
        margin-left: 10px;
        text-transform: uppercase;
    }

    .form-group {
        text-align: left;
    }

    .form-label {
        font-weight: 600;
        margin-bottom: 8px;
        color: #333;
    }

    .form-control {
        border-radius: 30px;
        padding: 12px;
        margin-bottom: 16px;
    }

    .btn-primary {
        width: 100%;
        border-radius: 30px;
        padding: 14px;
        font-weight: bold;
        font-size: 18px;
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    @media (max-width: 768px) {
        .col-md-6 img {
            display: none;
        }
    }
    </style>
</head>