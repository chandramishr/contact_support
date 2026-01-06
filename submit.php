<?php
require 'config/Database.php';
require 'classes/Contact.php';
require 'classes/Mailer.php';

// Validate mobile number
if (! preg_match('/^[0-9]{10}$/', $_POST['mobile_no'])) {
    die("Invalid mobile number");
}

// File validation
$file        = $_FILES['image'];
$allowedType = 'image/jpeg';

if ($file['type'] !== $allowedType) {
    die("Only JPEG images are allowed");
}

if ($file['size'] > 500 * 1024) {
    die("File size must be under 500KB");
}

// Rename file
$filename   = uniqid() . ".jpg";
$uploadPath = "uploads/" . $filename;

if (! move_uploaded_file($file['tmp_name'], $uploadPath)) {
    die("File upload failed");
}

// Database insert
$db      = (new Database())->connect();
$contact = new Contact($db);

$data = [
    'full_name' => $_POST['full_name'],
    'email'     => $_POST['email'],
    'mobile_no' => $_POST['mobile_no'],
    'message'   => $_POST['message'],
    'image'     => $filename,
];

if ($contact->save($data)) {

    // Send confirmation mail
    $mailer = new Mailer();
    $mailer->sendMail($_POST['email'], $_POST['full_name'], $uploadPath);

    echo "Form submitted successfully!";
} else {
    echo "Something went wrong!";
}
