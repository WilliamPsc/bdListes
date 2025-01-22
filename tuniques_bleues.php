<?php
include "template/header.php";
include "template/menu.php";
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Les Tuniques Bleues</h2>
    <?php
    // Path to the CSV file
    $csvFile = 'assets/bdTuniquesBleues.csv';

    // Open the file for reading
    if (($handle = fopen($csvFile, "r")) !== false) {
        echo '<table id="csvTable" class="table table-bordered table-striped">'; // Bootstrap table classes

        $isHeader = true; // Flag to check if it's the first row
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            echo "<tr>";
            foreach ($data as $cell) {
                // Use <th> for the first row (header), <td> otherwise
                if ($isHeader) {
                    echo "<th class='text-center'>" . htmlspecialchars($cell) . "</th>";
                } else {
                    echo "<td>" . htmlspecialchars($cell) . "</td>";
                }
            }
            echo "</tr>";
            $isHeader = false; // Set the flag to false after the first row
        }

        echo "</table>"; // End the HTML table
        fclose($handle); // Close the file
    } else {
        echo '<div class="alert alert-danger text-center">Unable to open the file.</div>';
    }
    ?>
</div>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // JavaScript for filtering table rows
    document.getElementById('filter').addEventListener('keyup', function() {
        const filterValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('#csvTable tr');

        rows.forEach((row, index) => {
            if (index === 0) return; // Skip the header row
            const cells = row.querySelectorAll('td');
            const rowText = Array.from(cells).map(cell => cell.textContent.toLowerCase()).join(' ');
            row.style.display = rowText.includes(filterValue) ? '' : 'none';
        });
    });
</script>

<?php
$dateMajFile = date("d/m/Y H:i.", filemtime(basename(__FILE__)));
include "template/footer.php";
?>