<?php
require ('header.php'); 
require_once(__DIR__ . '/lib/database.php');
require ('class/contact.php');

$contact = new contact();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contact'])) {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
    } else {
        // Xử lý lưu thông tin liên hệ vào database
        $addCont = $contact->add($name, $email, $message);
        if ($addCont) {
            echo "Thank you for contacting us! We will get back to you soon.";
        } else {
            echo "Failed to submit your message. Please try again later.";
        }
    }
}
?>

<div class="container">
    <h1 class="my-4">Liên hệ với chúng tôi!</h1>
    <form action="contact.php" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" name="contact" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php
require 'footer.php';
?>