<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Horizon Bank</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="header">
    <h1>Blue Horizon Bank</h1>
</header>

<div class="form_area">
    <h2 class="title">Welcome to Blue Horizon Bank</h2>
    <p style="text-align: center;">Choose an action below:</p>

    <div style="display: flex; flex-direction: column; gap: 10px; margin-top: 20px;">
        <form action="create_account.php" method="get">
            <button type="submit" class="btn">Create Account</button>
        </form>
        <form action="deposit.php" method="get">
            <button type="submit" class="btn">Deposit</button>
        </form>
        <form action="withdraw.php" method="get">
            <button type="submit" class="btn">Withdraw</button>
        </form>
        <form action="transfer.php" method="get">
            <button type="submit" class="btn">Transfer</button>
        </form>
        <form action="view_balance.php" method="get">
            <button type="submit" class="btn">View Balance</button>
        </form>
    </div>
    
    <form action="index.php" method="get" style="margin-top: 20px;">
        <button type="submit" class="btn">Home</button>
    </form>
</div>

<footer class="footer">
    <p>&copy; 2024 Blue Horizon Bank. All rights reserved.</p>
</footer>
</body>
</html>
