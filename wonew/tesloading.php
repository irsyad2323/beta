<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kapten Naratel Loader</title>
    <style>
        .loader {
            display: inline-block;
            width: 180px;
            height: 180px;
            position: relative;
        }

        .loader .spinner {
            width: 100%;
            height: 100%;
            border: 10px solid rgba(0, 0, 0, 0.1);
            border-left-color: #000;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            box-sizing: border-box;
        }

        .loader img {
            width: 120px;
            height: 100px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: blurEffect 2s infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes blurEffect {
            0%, 100% {
                filter: blur(0px);
            }
            50% {
                filter: blur(5px);
            }
        }
    </style>
</head>
<body>
    <div class="loader">
        <div class="spinner"></div>
        <img src="logo.png" alt="Kapten Naratel Logo">
    </div>
</body>
</html>
