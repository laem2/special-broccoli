<?php
session_start();
include 'config.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Demande de travail</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script>
        // Function to delete a row
        function deleteRow(btn) {
            var row = btn.closest('tr');
            row.parentNode.removeChild(row);
        }

        // Function to print a row's content as PDF
        async function printRow(btn) {
            var row = btn.closest('tr');
            var cells = row.getElementsByTagName('td');
            var doc = new jspdf.jsPDF();

            let content = '';
            for (var i = 0; i < cells.length - 1; i++) { // -1 to exclude the last cell containing icons
                content += cells[i].innerText + ' ';
            }

            doc.text(content, 10, 10);
            doc.save('row-content.pdf');
        }

        document.addEventListener('DOMContentLoaded', function() {
            var trashIcons = document.querySelectorAll('.trash-icon');
            var printIcons = document.querySelectorAll('.print-icon');

            trashIcons.forEach(function(icon) {
                icon.addEventListener('click', function() {
                    deleteRow(this);
                });
            });

            printIcons.forEach(function(icon) {
                icon.addEventListener('click', function() {
                    printRow(this);
                });
            });
        });
    </script>
</head>
<body>
    <header>
        <img src="imgg/images.png" alt="Logo" class="logo">
        <div class="profile"><?php echo htmlspecialchars($_SESSION['username']); ?></div>
    </header>
    <hr class="trai">
    <div class="conteneur">
        <div class="gauche">
            <h2>GMI</h2>
            <div class="cadre">
               <p class="text">Tableau de bord</p>
            </div>
        </div>
        <div class="droite">
            <div class="header-droite">
                <h2 class="title"><strong>Demande De Travail</strong></h2>
                <input type="text" placeholder="Rechercher..." class="recherche">
            </div>
            <table class="table">
                <thead>
                <tr>
                    
                    <th>Date</th>
                    <th>num DT</th>
                    <th>Code</th>
                    <th>Designation</th>
                    <th>Provenance</th>
                    <th>Affectation</th>
                    <th>Ordre de travail</th>
                    <th>Liste des
                         consommations</th>
                    <th>Sous traitance externe</th>
                    <th>Sous traitance interne</th>
                    <th>Cout de reparation</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php include 'DTat.php'; ?>
                </tbody>
               
            </table>
        </div>
    </div>
</body>
</html>