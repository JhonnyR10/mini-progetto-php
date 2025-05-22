<?php
require_once 'includes/api.php';

$apiUrl = 'https://jsonplaceholder.typicode.com/posts';
$posts = fetchPosts($apiUrl);

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Lista Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background: #007bff;
            color: white;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista di Post</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titolo</th>
                    <th>Dettagli</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($posts)): ?>
                    <?php foreach ($posts as $post): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($post['id']); ?></td>
                            <td><?php echo htmlspecialchars($post['title']); ?></td>
                            <td><a href="dettagli_post.php?id=<?php echo htmlspecialchars($post['id']); ?>">Visualizza</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">Nessun post trovato.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div style="text-align: center; margin-top: 20px;">
            <a href="crea_post.php">Crea un nuovo post</a>
        </div>
    </div>
</body>
</html>