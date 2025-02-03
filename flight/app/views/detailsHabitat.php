<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'habitation</title>
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <style>
        /* Centrage général et footer fixé en bas */
        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            padding: 20px;
            justify-content: center; /* Centrer le contenu */
        }

        /* Conteneur principal */
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            width: 100%;
            text-align: center;
        }

        /* Titre */
        h2 {
            font-weight: bold;
            color: #343a40;
            margin-bottom: 20px;
        }

        /* Carrousel */
        .carousel {
            max-width: 750px;
            margin: auto;
        }

        .carousel-item img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 10px;
        }

        /* Informations */
        .info {
            font-size: 18px;
            text-align: left;
            margin-top: 20px;
        }

        .info p {
            margin-bottom: 10px;
        }

        /* Bouton Retour */
        .btn-custom {
            background-color: #007bff !important;
            color: white !important;
            padding: 12px 25px;
            font-size: 18px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease, border-color 0.3s ease;
            display: inline-block;
            margin-top: 20px;
            border: 2px solid #007bff;
        }

        .btn-custom:hover {
            background-color: #0056b3 !important;
            border-color: #0056b3 !important;
        }

        /* Bouton Réserver */
        .btn-reserver {
            background-color: #28a745 !important;
            color: white !important;
            padding: 12px 25px;
            font-size: 18px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease, border-color 0.3s ease;
            display: inline-block;
            margin-top: 20px;
            border: 2px solid #28a745;
        }

        .btn-reserver:hover {
            background-color: #218838 !important;
            border-color: #218838 !important;
        }

        /* Styles pour l'alerte */
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<?php include "header.php"; ?>

<div class="container" style="margin-right: 90px;">
    <h2><?php echo htmlspecialchars($habitat['type']); ?> - <?php echo htmlspecialchars($habitat['localisation']); ?></h2>

    <!-- Carrousel des photos -->
    <?php if (!empty($photos)): ?>
        <div id="carouselHabitat" class="carousel slide mb-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($photos as $index => $photo): ?>
                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                        <img src="<?php echo $photo; ?>" class="d-block w-100" alt="Photo de l'habitat">
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselHabitat" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselHabitat" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    <?php else: ?>
        <p class="text-muted">Aucune photo disponible.</p>
    <?php endif; ?>

    <!-- Informations -->
    <div class="info">
        <p><strong>Nombre de chambres :</strong> <?php echo htmlspecialchars($habitat['nbChambre']); ?></p>
        <p><strong>Loyer par jour :</strong> <?php echo htmlspecialchars($habitat['loyer_par_jour']); ?> €</p>
        <p><strong>Description :</strong> <?php echo htmlspecialchars($habitat['description']); ?></p>
        <p><strong>Localisation :</strong> <?php echo htmlspecialchars($habitat['localisation']); ?></p>
    </div>

    <!-- Message d'erreur si l'habitat est réservé -->
    <?php if (isset($messageError)): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($messageError); ?></div>
    <?php endif; ?>

    <!-- Boutons -->
    <a href="/pageaccueil" class="btn btn-custom">Retour à la liste</a>
    <a href="/reservationFormulaire/<?php echo $habitat['idHabitat']; ?>" class="btn btn-reserver">Réserver cet habitat</a>
</div>

<?php include "footer.php"; ?>

<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
