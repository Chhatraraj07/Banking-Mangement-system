<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_number = $_POST['account_number'];

    $query = "SELECT balance FROM accounts WHERE account_number = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $account_number);
    $stmt->execute();
    $stmt->bind_result($balance);
    $stmt->fetch();
    
    if ($balance !== null) {
        echo "Account Number: $account_number <br> Current Balance: $" . number_format($balance, 2);
    } else {
        echo "Account not found.";
    }

    $stmt->close();
}

$conn->close();
?>
