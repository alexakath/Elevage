<main>
        <?php include "header.php"; ?>
    </main>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Liste des habitations</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Liste</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Liste des habitations -->
            <?php if (!empty($habitations)): ?>
    <div class="row">
        <?php foreach ($habitations as $habitat): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo $habitat['photo_url'] ?? 'default.jpg'; ?>" class="card-img-top" alt="Image de l'habitat">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($habitat['type']); ?> - <?php echo htmlspecialchars($habitat['localisation']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars(substr($habitat['description'], 0, 100)); ?>...</p>
                        <p><strong>Prix par jour :</strong> <?php echo htmlspecialchars($habitat['loyer_par_jour']); ?> €</p>
                        <a href="/detailsHabitat/<?php echo htmlspecialchars($habitat['idHabitat']); ?>" class="btn btn-primary">Voir les détails</a>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p class="text-center">Aucune habitation disponible pour le moment.</p>
<?php endif; ?>

</div>
    

      </div>
    </section>

  </main><!-- End #main -->

  <main>
        <?php include "footer.php"; ?>
    </main>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/js1/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main2.js"></script>

</body>

</html>