<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Balance</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="header">
    <h1>Blue Horizon Bank</h1>
</header>

<div class="form_area">
    <h2 class="title">View Balance</h2>
    <form action="view_balance_action.php" method="post">
        <div class="form_group">
            <label class="sub_title" for="account_number">Account Number:</label>
            <input placeholder="Enter your account number" id="account_number" name="account_number" class="form_style" type="text" required>
        </div>

        <button type="submit" class="btn">View Balance</button>
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
