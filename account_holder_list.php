<?php
include("dbconn.php");
try {
    $sql = "SELECT account_id,account_name, account_number, account_balance FROM account";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Account Holder List</title>
    <style>
        body {
            background-color: #f4f7fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 30px;
        }
        h3.card-title {
            font-weight: 600;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }
        td {
            background-color: #fff;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .btn {
            padding: 8px 16px;
            border-radius: 5px;
            font-size: 14px;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }
        .btn-info:hover, .btn-success:hover, .btn-danger:hover {
            opacity: 0.9;
        }
        .btn a {
            color: white;
            text-decoration: none;
        }
        .action-buttons a {
            margin-right: 10px;
        }
        .action-buttons button {
            width: 100px;
        }
    </style>
</head>
<body>

<div class="container">
    <h3 class="card-title text-center">Bank Account List</h3>

    <?php if (!empty($accounts)): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Roll.NO</th>
                    <th>Name</th>
                    <th>Account No</th>
                    <th>Balance</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($accounts as $key =>$account): ?>
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $account['account_name']; ?></td>
                        <td><?php echo $account['account_number']; ?></td>
                        <td>₹<?php echo number_format($account['account_balance'], 2); ?></td>
                        <td class="action-buttons">
                            <a href="credit.php?account_id=<?php echo $account['account_id']; ?>" class="btn btn-success">Credit</a>
                            <a href="debit.php?account_id=<?php echo $account['account_id']; ?>" class="btn btn-danger">Debit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center text-muted">No accounts found.</p>
    <?php endif; ?>

    <!-- Navigation Buttons -->
    <div class="d-flex justify-content-center gap-3 mt-4">
        <a href="index.php" class="btn btn-info">Go Home</a>
        <a href="statement_list.php" class="btn btn-info">View Statement</a>
    </div>
</div>

</body>
</html>
