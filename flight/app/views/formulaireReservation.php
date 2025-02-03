<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver l'habitation</title>
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

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
            font-size: 16px;
            padding: 10px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
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

        .form-group input[type="date"] {
            font-size: 16px;
        }

        /* Style du bouton de retour */
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

    <div class="container" style="margin-top: 220px;margin-right: 90px;">
        <h2>Réservation pour <?php echo htmlspecialchars($habitat['type']); ?> - <?php echo htmlspecialchars($habitat['localisation']); ?></h2>

        <!-- Affichage du message d'erreur en cas de disponibilité -->
        <?php if (isset($messageError)): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($messageError); ?></div>
        <?php endif; ?>

        <form action="/traiterReservation" method="post">
            <input type="hidden" name="idHabitat" value="<?php echo $habitat['idHabitat']; ?>">

            <div class="form-group">
                <label for="dateDeb">Date de début :</label>
                <input type="date" id="dateDeb" name="dateDeb" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="dateFin">Date de fin :</label>
                <input type="date" id="dateFin" name="dateFin" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="prixTotal">Prix total :</label>
                <input type="number" id="prixTotal" name="prixTotal" class="form-control" value="<?php echo htmlspecialchars($habitat['loyer_par_jour']); ?>" readonly>
            </div>

            <button type="submit" class="btn-custom">Confirmer la réservation</button>
        </form>

        <!-- Bouton Retour -->
        <a href="/pageaccueil" class="btn-back">Retour à la liste des habitations</a>
    </div>

    <?php include "footer.php"; ?>
</body>
</html>
