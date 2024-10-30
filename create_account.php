<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="header">
    <h1>Blue Horizon Bank</h1>
</header>

<div class="form_area">
    <h2 class="title">Create Account</h2>
    <form action="create_account_action.php" method="post">
        <div class="form_group">
            <label class="sub_title" for="customer_name">Name:</label>
            <input placeholder="Enter your full name" id="customer_name" name="customer_name" class="form_style" type="text" required>
        </div>
        <div class="form_group">
            <label class="sub_title" for="balance">Initial Deposit:</label>
            <input placeholder="Enter initial balance" id="balance" name="balance" class="form_style" type="number" step="0.01" required>
        </div>
        
        <button type="submit" class="btn">Create Account</button>
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
