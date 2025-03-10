<?php
include 'db/database.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion SmartTech</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">SmartTech</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="employees/list.php">Employés</a></li>
                <li class="nav-item"><a class="nav-link" href="clients/list.php">Clients</a></li>
                <li class="nav-item"><a class="nav-link" href="documents/list.php">Documents</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-4">
    <h2 class="text-center">Gestion des Employés et Clients</h2>

 <!-- Section Employés -->
    <h3> Liste des Employés</h3>
    <a href="employees/add.php" class="btn btn-primary mb-2"> Ajouter un Employé</a>
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
            $sql = "SELECT * FROM employees";
            $result = $conn->query($sql);
if ($result->num_rows == 0) {
    echo "<tr><td colspan='6' class='text-center'>Aucun employé trouve</td></tr>";
}
print_r($row);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nom']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['numTel']}</td>
                    <td>{$row['department']}</td>
                    <td>
                        <a href='employees/modifier.php?id={$row['id']}' class='btn btn-warning btn-sm'>Modifier</a>
                        <a href='employees/supprimer.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='retur>
                    </td>
                </tr>";
            }
?>
       </tbody>
    </table>
