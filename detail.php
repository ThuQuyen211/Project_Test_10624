<?php
require ('header.php');
require_once('class/book.php');

// Check if book_id is set and valid
if (isset($_GET['book_id'])) {
    $book_id = intval($_GET['book_id']);
    $bookModel = new book();

    // Assuming you're using mysqli, call the function and fetch data as an associative array
    $result = $bookModel->get_idBook($book_id);
    
    if ($result) {
        // Use fetch_assoc to get the associative array from mysqli_result
        $book = $result->fetch_assoc();
        
        if (!$book) {
            echo "Book not found.";
            exit;
        }
    } else {
        echo "Query failed.";
        exit;
    }
} else {
    echo "Invalid book ID.";
    exit;
}

?>
<title><?php echo htmlspecialchars($book['book_name']); ?> - Book Details</title>
<div class="container">
    <h1 class="my-4"><?php echo htmlspecialchars($book['book_name']); ?></h1>
    <div class="row">
        <div class="col-md-4">
        <img src="\Project_Test_10624\admin\public\images\<?php echo $book['image']; ?>" alt="<?php echo $book['book_name']; ?>" class="img-fluid">
        </div>
        <div class="col-md-8">
            <h3>Author: <?php echo htmlspecialchars($book['au_name']); ?></h3>
            <p><strong>Category:</strong> <?php echo htmlspecialchars($book['cate_name']); ?></p>
            <p><strong>Description:</strong></p>
            <p><?php echo htmlspecialchars($book['summary']); ?></p>
            <a href="index.php" class="btn btn-primary">Back to Home</a>
        </div>
    </div>
</div>
<?php require 'footer.php' ?>
