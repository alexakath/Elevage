<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix des Cadeaux</title>
    <link rel="stylesheet" href="assets/css/choix-cadeaux.css">
</head>
<body>
    <header>
        <h1>Choix des Cadeaux</h1>
    </header>
    <main>
        <form action="/suggestions" method="POST">
            <label for="nb-filles">Nombre de filles :</label>
            <input type="number" id="nb-filles" name="nb_filles" required min="0">

            <label for="nb-garcons">Nombre de garçons :</label>
            <input type="number" id="nb-garcons" name="nb_garcons" required min="0">

            <button type="submit">Voir les suggestions</button>
        </form>
    </main>
    <footer>
        <a href="/retour" class="btn-back">Retour à l'accueil</a>
    </footer>
</body>
</html>
