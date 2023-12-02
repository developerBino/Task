<!DOCTYPE html>
<html>
<head>
    <title>Registration Success</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to bottom, #000080, #1E90FF); 
            color: white;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .message-container {
            background: rgba(255, 255, 255, 0.1); 
            padding: 20px;
            border-radius: 10px;
        }

        .message-container p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <h2>Registration Success!</h2>
        <p><?php echo $message; ?></p>
        <p>Redirecting you to the login page...</p>
    </div>
</body>
</html>
