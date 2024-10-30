<?php
include 'config.php'; // Include database configuration

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $from_account = $_POST['from_account'];
    $to_account = $_POST['to_account'];
    $amount = floatval($_POST['amount']);

    if ($amount <= 0) {
        echo "Invalid transfer amount. Please enter a positive amount.";
        exit;
    }

    $conn->begin_transaction();

    try {
        // Check sender's balance
        $stmt = $conn->prepare("SELECT balance FROM accounts WHERE account_number = ?");
        $stmt->bind_param("s", $from_account);
        $stmt->execute();
        $stmt->bind_result($from_balance);
        $stmt->fetch();
        $stmt->close();

        if ($from_balance === null) {
            throw new Exception("Sender's account does not exist.");
        } elseif ($from_balance < $amount) {
            throw new Exception("Insufficient balance in sender's account.");
        }

        // Check if recipient account exists
        $stmt = $conn->prepare("SELECT balance FROM accounts WHERE account_number = ?");
        $stmt->bind_param("s", $to_account);
        $stmt->execute();
        $stmt->bind_result($to_balance);
        $stmt->fetch();
        $stmt->close();

        if ($to_balance === null) {
            throw new Exception("Recipient's account does not exist.");
        }

        // Deduct from sender's account
        $stmt = $conn->prepare("UPDATE accounts SET balance = balance - ? WHERE account_number = ?");
        $stmt->bind_param("ds", $amount, $from_account);
        $stmt->execute();
        $stmt->close();

        // Add to recipient's account
        $stmt = $conn->prepare("UPDATE accounts SET balance = balance + ? WHERE account_number = ?");
        $stmt->bind_param("ds", $amount, $to_account);
        $stmt->execute();
        $stmt->close();

        $conn->commit();
        echo "Transfer successful!";
    } catch (Exception $e) {
        $conn->rollback();
        echo "Transfer failed: " . $e->getMessage();
    }

    $conn->close();
}
?>
