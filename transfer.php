<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Funds</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="header">
    <h1>Blue Horizon Bank</h1>
</header>

<div class="form_area">
    <h2 class="title">Transfer Funds</h2>
    <form action="transfer_action.php" method="post">
        <div class="form_group">
            <label class="sub_title" for="from_account">Your Account Number:</label>
            <input placeholder="Enter your account number" id="from_account" name="from_account" class="form_style" type="text" required>
        </div>
        <div class="form_group">
            <label class="sub_title" for="to_account">Recipient's Account Number:</label>
            <input placeholder="Enter recipient's account number" id="to_account" name="to_account" class="form_style" type="text" required>
        </div>
        <div class="form_group">
            <label class="sub_title" for="amount">Amount to Transfer:</label>
            <input placeholder="Enter amount to transfer" id="amount" name="amount" class="form_style" type="number" step="0.01" required>
        </div>

        <button type="submit" class="btn">Transfer</button>
    </form>

    <form action="index.php" method="get" style="margin-top: 20px;">
        <button type="submit" class="btn">Home</button>
    </form>
</div>

<footer class="footer">
    <p>&copy; 2024 Blue Horizon Bank. All rights reserved.</p>
</footer>
</body>
</html>
