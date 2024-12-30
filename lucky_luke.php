<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV to HTML Table</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">CSV File Content</h1>
        <?php
        // Path to the CSV file
        $csvFile = 'assets/bdLuckyLuke.csv';

        // Open the file for reading
        if (($handle = fopen($csvFile, "r")) !== false) {
            echo '<table class="table table-bordered table-striped">'; // Bootstrap table classes

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
</body>
</html>