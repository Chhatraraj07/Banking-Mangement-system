<?php
include 'config.php'; // Include database configuration

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_name = $_POST['customer_name'];
    $balance = floatval($_POST['balance']);

    // Insert new account without specifying account_number (auto-generated)
    $stmt = $conn->prepare("INSERT INTO accounts (customer_name, balance) VALUES (?, ?)");
    $stmt->bind_param("sd", $customer_name, $balance);

    if ($stmt->execute()) {
        // Get the auto-generated account number
        $account_number = $conn->insert_id;
        echo "Account created successfully! Your account number is: " . $account_number;
    } else {
        echo "Error creating account: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
