<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_number = $_POST['account_number'];
    $amount = $_POST['amount'];

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Check current balance
        $query = "SELECT balance FROM accounts WHERE account_number = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $account_number);
        $stmt->execute();
        $stmt->bind_result($current_balance);
        $stmt->fetch();
        $stmt->close();

        // Check if sufficient funds are available
        if ($current_balance >= $amount) {
            // Update account balance
            $new_balance = $current_balance - $amount;
            $update_query = "UPDATE accounts SET balance = ? WHERE account_number = ?";
            $update_stmt = $conn->prepare($update_query);
            $update_stmt->bind_param("ds", $new_balance, $account_number);
            $update_stmt->execute();

            // Record the transaction
            $insert_query = "INSERT INTO transactions (account_id, transaction_type, amount) VALUES ((SELECT account_id FROM accounts WHERE account_number = ?), 'withdrawal', ?)";
            $insert_stmt = $conn->prepare($insert_query);
            $insert_stmt->bind_param("sd", $account_number, $amount);
            $insert_stmt->execute();

            // Commit the transaction
            $conn->commit();
            echo "Withdrawal successful! New balance: $" . number_format($new_balance, 2);
        } else {
            echo "Insufficient funds.";
        }
    } catch (Exception $e) {
        // Rollback transaction if an error occurs
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
}

$conn->close();
?>
