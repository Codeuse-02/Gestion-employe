<?php
include '../db/database.php';

$message = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Vérifier si l'employé existe
    $check = "SELECT * FROM employees WHERE id = $id";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        // Supprimer l'employé
        $sql = "DELETE FROM employees WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            $message = "<div class='alert alert-success'>Employé supprimé avec succès.</div>";
        } else {
            $message = "<div class='alert alert-danger'> Erreur: " . $conn->error . "</div>";
        }
    } else {
        $message = "<div class='alert alert-warning'>Employé non trouvé.</div>";
    }
} else {
    $message = "<div class='alert alert-danger'>Aucune ID spécifiée.</div>";
}

// Redirection après 2 secondes
header("refresh:2;url=list.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5 text-center">
    <?php echo $message; ?>
    <p>Redirection en cours... </p>
    <a href="list.php" class="btn btn-secondary">Retour à la liste</a>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
