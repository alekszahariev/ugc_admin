<?php
include("./php/conn.php")

?>


<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />


    <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>    
</head>
    <body>


    <div class="container">
    <h2>Създатели</h2>
    <table class="table table-fluid" id="myTable">
    <thead>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>age</th>
        <th>gender</th>
        <th>pets</th>
        <th>payout</th>
        <th>email</th>
        <th>phone</th>
        <th>discord</th>
        <th>Published</th>
        <th>Options</th>

    </tr>
    </thead>
    <tbody>


    <?php
    // SQL query to retrieve rows from the database table
$sql = "SELECT * FROM users order by published desc";
$result = $conn->query($sql);

// Check if any rows are returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["published"] === "0"){
            $button = "<a target='_blank' href='./php/table_options.php?id=" . $row["id"] . "&type=publish&email=" . $row["email"] . "&name=" . $row["name"] . "'>Публикувай</a></td>";
        }else{
            $button = "<a target='_blank' href='./php/table_options.php?id=" . $row["id"] . "&type=pause'>Спри</a></td>";
        }

        
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["age"] . "</td>";
        echo "<td>" . $row["gender"] . "</td>";
        echo "<td>" . $row["pets"] . "</td>";
        echo "<td>" . $row["payout"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . $row["discord"] . "</td>";
        echo "<td>" . $button . "</td>";
        echo "<td><a target='_blank' href='https://ugc-craft.com/profile.php?id=" . $row["id"] . "'>Профил</a>  /  <a target='_blank' href='./php/table_options.php?id=" . $row["id"] . "&type=delete'>Изтрий</a></td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

    ?>
   
    </tbody>
    </table>
</div>

<script>
         $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
