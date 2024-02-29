<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('resto2.jpg') no-repeat center center fixed; 
            background-size: cover;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
            background: rgba(255, 255, 255, 0.5);
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-header, .card-body {
            background: rgba(255, 255, 255, 0.5); /* Atur opacity */
        }
        .form-control {
            border-radius: 20px;
        }
        .btn-primary {
            border-radius: 20px;
            border: 0;
            background-image: linear-gradient(to right, #0062E6, #33AEFF);
            transition: background-image 0.3s ease-in-out;
        }
        .btn-primary:hover {
            background-image: linear-gradient(to right, #33AEFF, #0062E6);
        }
    </style>
</head>