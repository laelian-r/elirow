<?php
include 'db_connect.php';
$sql = "
    SELECT * FROM articles
";
$result = $db->query($sql);

if ($result->rowCount() > 0) {
    // Fetch the first article
    $article = $result->fetch(PDO::FETCH_ASSOC);
} else {
    echo "Aucun article trouvé.";
    exit;
}

echo '
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>' . $article['nom_article'] . '</title>
        <link rel="stylesheet" href="./assets/css/style.css">
    </head>
    <body>
        <section>
            <form method="post" enctype="multipart/form-data">
                <div class="img">
                    <img src="./assets/images/' . $article['image_article'] . '">
                </div>
                <main>
                    <div class="titre-desc">
                        <h2>' . $article['nom_article'] . '</h2>
                        <p class="description">' . nl2br($article['description']) . '</p>
                    </div>
                </main>
            </form>
        </section>
    </body>
';