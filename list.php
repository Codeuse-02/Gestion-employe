<?php
include '../db/database.php';

// Vérifier si un filtre de recherche est appliqué
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Requête SQL avec recherche
$sql = "SELECT * FROM employees";
if (!empty($search)) {
    $sql .= " WHERE nom LIKE '%$search%' OR email LIKE '%$search%' OR department LIKE '%$search%'";
}
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Employés</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center"> Liste des Employés</h2>

    <!-- Barre de recherche -->
    <form method="GET" class="d-flex mb-3">
        <input type="text" name="search" class="form-control me-2" placeholder="Rechercher un employé..." value="<?php echo $search; ?>">
        <button type="submit" class="btn btn-primary"> Rechercher</button>
    </form>

    <a href="add.php" class="btn btn-success mb-3">Ajouter un Employé</a>
    <a href="../index.php" class="btn btn-secondary mb-3"> Retour à l'accueil</a>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Département</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nom']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['numTel']}</td>
                        <td>{$row['department']}</td>
                        <td>
                            <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Modifier</a>
                            <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Supprimer cet employé ?\");'>Supprimer</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='text-center'>Aucun employé trouvé.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
