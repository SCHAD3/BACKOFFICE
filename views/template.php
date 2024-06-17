
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/morph/bootstrap.min.css">
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light" data-bs-theme="light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>home">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>cards"> Gestion des cartes d'exercices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>articles"> Gestion des articles mensuels</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="p-2 m-2 text-center text-dark bg-secondary"><?= $titre ?></h1>
        <?= $content ?>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>