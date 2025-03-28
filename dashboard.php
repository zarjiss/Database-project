<?php
include('database.php'); // Include database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Dashboard</title>
    <link rel="stylesheet" href="styles.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center"> Welcome to Zarjis's Library</h2>

    <?php
    // Fetch book categories
    $categories = mysqli_query($con, "SELECT DISTINCT category FROM books");

    while ($cat = mysqli_fetch_assoc($categories)) {
        $category = $cat['category'];
        echo "<h3 class='mt-4'>$category</h3><div class='row'>";
        
        // Fetch books of this category
        $books = mysqli_query($con, "SELECT * FROM books WHERE category='$category'");
        while ($book = mysqli_fetch_assoc($books)) {
            echo "
            <div class='col-md-4'>
                <div class='card book-card'>
                    <img src='images/{$book['image']}' class='card-img-top' alt='Book Cover'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$book['title']}</h5>
                        <p class='card-text'>Author: {$book['author']}</p>
                        <button class='btn btn-primary'>Take</button>
                    </div>
                </div>
            </div>";
        }
        echo "</div>"; // Close row
    }
    ?>
</div>

</body>
</html>
