<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Richiesta di Lavoro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            max-width: 600px;
            margin: 20px auto;
        }
        h1 {
            color: #2c3e50;
        }
        h4 {
            margin-top: 20px;
            border-bottom: 2px solid #eee;
            padding-bottom: 5px;
        }
        p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>È arrivata una richiesta per il ruolo di: <strong>{{ $info['role'] }}</strong></h1>
        <p>Ricevuta da: <strong>{{ $info['email'] }}</strong></p>
        
        <h4>Messaggio di presentazione:</h4>
        <p>
            <em>{{ $info['message'] }}</em>
        </p>
    </div>
</body>
</html>
