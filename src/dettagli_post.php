<?php
$url = 'https://jsonplaceholder.typicode.com/posts';

$message = '';
$post = null;

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    if ($id > 0) {
        $ch = curl_init($url . '/' . $id);

        if ($ch === false) {
            $message = 'Errore: impossibile inizializzare cURL.';
        } else {
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                $message = 'Errore: ' . curl_error($ch);
            } else {
                $post = json_decode($response, true);
                if (isset($post['id'])) {
                    // Post retrieved successfully
                } else {
                    $message = 'Errore: post non trovato.';
                }
            }
            curl_close($ch);
        }
    } else {
        $message = 'Errore: ID non valido.';
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Dettagli Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            background: #fff;
            max-width: 600px;
            margin: 40px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
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
        .post-details {
            margin-top: 20px;
        }
        .post-details h2 {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dettagli Post</h1>
        <?php if (!empty($message)): ?>
            <div class="message"><?php echo htmlspecialchars($message); ?></div>
        <?php elseif ($post): ?>
            <div class="post-details">
                <h2><?php echo htmlspecialchars($post['title']); ?></h2>
                <p><?php echo nl2br(htmlspecialchars($post['body'])); ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>