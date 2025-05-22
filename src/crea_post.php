<?php
$url = 'https://jsonplaceholder.typicode.com/posts';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!function_exists('curl_init')) {
        $message = 'Errore: l\'estensione cURL non è abilitata in PHP.';
    } else {
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $body = isset($_POST['content']) ? $_POST['content'] : '';
        $data = [
            'title' => $title,
            'body' => $body,
            'userId' => 10,
        ];
        $ch = curl_init($url);

        if ($ch === false) {
            $message = 'Errore: impossibile inizializzare cURL.';
        } else {
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));  
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
            ]); 

            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                $message = 'Errore: ' . curl_error($ch);
            } else {
                $responseData = json_decode($response, true);
                if (isset($responseData['id'])) {
                    $message = 'Post creato con successo! ID: ' . $responseData['id'];
                } else {
                    $message = 'Errore nella creazione del post.';
                }
            }
            curl_close($ch);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Crea Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            background: #fff;
            max-width: 400px;
            margin: 40px auto;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 1em;
        }
        button {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 1em;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .message {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 4px;
            background: #e7f3fe;
            color: #31708f;
            border: 1px solid #bce8f1;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Crea un nuovo post</h1>
        <?php if (!empty($message)): ?>
            <div class="message"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        <form method="post">
            <label for="title">Titolo</label>
            <input type="text" id="title" name="title" required>

            <label for="content">Contenuto</label>
            <textarea id="content" name="content" rows="5" required></textarea>

            <button type="submit">Crea Post</button>
        </form>
    </div>
</body>
</html>