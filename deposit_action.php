<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_number = $_POST['account_number'];
    $amount = $_POST['amount'];

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Update account balance
        $update_query = "UPDATE accounts SET balance = balance + ? WHERE account_number = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("ds", $amount, $account_number);
        $update_stmt->execute();

        // Record the transaction
        $insert_query = "INSERT INTO transactions (account_id, transaction_type, amount) VALUES ((SELECT account_id FROM accounts WHERE account_number = ?), 'deposit', ?)";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param("sd", $account_number, $amount);
        $insert_stmt->execute();

        // Commit the transaction
        $conn->commit();
        echo "Deposit successful! Amount deposited: $" . number_format($amount, 2);
    } catch (Exception $e) {
        // Rollback transaction if an error occurs
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
}

$conn->close();
?>
