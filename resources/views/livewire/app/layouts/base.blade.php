<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Know Your Quran – A Unique Search Engine on Quran</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }

        header {
            background-color: #004d00;
            color: #fff;
            text-align: center;
            padding: 40px 20px;
        }

        header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        header p {
            font-size: 1.2rem;
            font-weight: 300;
        }



        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 50px 15px;
        }

        .intro-text,
        .search-capabilities,
        .queries,
        .contact-info {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            padding: 30px;
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        p,
        ul {
            font-size: 1rem;
            margin-bottom: 15px;
        }

        ul {
            padding-left: 20px;
        }

        li {
            margin-bottom: 10px;
        }

        .search-container {
            text-align: center;
            margin-top: 30px;
        }

        .search-container input[type="text"] {
            padding: 12px 20px;
            width: 60%;
            font-size: 1.1rem;
            border-radius: 8px;
            border: 1px solid #ddd;
            margin-bottom: 15px;
        }

        .search-container input[type="submit"] {
            padding: 12px 25px;
            background-color: #004d00;
            color: #fff;
            font-size: 1.1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .search-container input[type="submit"]:hover {
            background-color: #003d00;
        }

        footer {
            background-color: #222;
            color: #fff;
            text-align: center;
            padding: 15px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        footer p {
            font-size: 1rem;
        }

        footer p {
            font-size: 1rem;
        }


        @media (max-width: 768px) {
            .search-container input[type="text"] {
                width: 80%;
            }

            header h1 {
                font-size: 2rem;
            }

            h2 {
                font-size: 1.6rem;
            }
        }

        /* Style for the Start Search Button */
        .start-search-button {
            background-color: #004d00;
            color: white;
            font-size: 1.2rem;
            padding: 12px 30px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            text-align: center;
            font-weight: bold;
        }

        .start-search-button:hover {
            background-color: #003d00;
        }
    </style>
    <link href="{{ asset('assets/app/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>

    <header>
        <h1>Know Your Quran – A Unique Search Engine</h1>
        <p>By Abdul Mannan Family</p>
    </header>

    {{ $slot }}

    <footer>
        <p>&copy; 2024 Know Your Quran. All rights reserved.</p>
    </footer>
    @stack('scripts')
</body>

</html>
