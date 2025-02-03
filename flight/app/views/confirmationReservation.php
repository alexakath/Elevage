<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de la réservation</title>
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            margin-top: 100px;
        }

        h2 {
            font-weight: bold;
            color: #343a40;
            margin-bottom: 20px;
            text-align: center;
        }

        .alert {
            margin-bottom: 20px;
            font-size: 16px;
            padding: 15px;
            border-radius: 5px;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            padding: 12px 25px;
            font-size: 18px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .btn-back {
            background-color: #6c757d;
            color: white;
            padding: 12px 25px;
            font-size: 18px;
            border-radius: 5px;
            border: none;
            width: 100%;
            margin-top: 15px;
            text-align: center;
            display: block;
            text-decoration: none;
        }

        .btn-back:hover {
            background-color: #5a6268;
        }

    </style>
</head>
<body>
    <?php include "header.php"; ?>

    <div class="container">
        <h2>Votre réservation a été confirmée !</h2>

        <div class="alert alert-success">
            <strong>Félicitations !</strong> Votre réservation a été effectuée avec succès. Vous recevrez bientôt un email de confirmation avec les détails de votre réservation.
        </div>

        <a href="/pageaccueil" class="btn-back">Retour à la liste des habitations</a>

        <a href="/dashboardAdmin" class="btn-back">Retour au tableau de bord de l'administrateur</a>
    </div>

    <?php include "footer.php"; ?>
</body>
</html>
