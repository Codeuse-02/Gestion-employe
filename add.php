<?php
include '../db/database.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nom'];
    $email = $_POST['email'];
    $phone = $_POST['numTel'];
    $department = $_POST['department'];

    $sql = "INSERT INTO employees (nom, email, numTel, department) VALUES ('$nom', '$email', '$numTel', '$department')";

    if ($conn->query($sql) === TRUE) {
        $message = "<div class='alert alert-success'>Nouvel employé ajouté avec succès.</div>";
    } else {
        $message = "<div class='alert alert-danger'>Erreur: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Employé</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Ajouter un Employé</h2>

    <!-- Affichage du message de confirmation ou d'erreur -->
    <?php echo $message; ?>

    <div class="card shadow p-4">
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Nom :</label>
                <input type="text" name="nom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email :</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Téléphone :</label>
                <input type="text" name="numTel" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Département :</label>
                <input type="text" name="department" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
            <a href="../index.php" class="btn btn-secondary"> Retour à l'accueil</a>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
