
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faire un Dépôt</title>
    <link rel="stylesheet" href="assets/css/depot.css">
</head>
<body>
    <header>
        <h1>Faire un Dépôt </h1>
        <h1>Depot : <?php echo $depot ?> </h1>
    </header>
    <main>
        <form action="faire-un-depot" method="GET">
            <label for="montant">Montant du dépôt :</label>
            <input type="number" id="montant" name="montant" required min="0" step="0.01">
            <button type="submit">Déposer</button>
        </form>
    </main>
    <footer>
        <a href="/retour" class="btn-back">Retour à l'accueil</a>
        
    </footer>
</body>
</html>
