<?php
include("dbconn.php");

if ($_POST) {
    $account_name = $_POST['name'];
    $account_number = $_POST['accountNumber'];
    $account_balance = $_POST['balance'];
    try {
        
        $sql = "INSERT INTO account (account_name, account_number, account_balance) 
                VALUES (:name, :accountNumber, :balance)";

        $stmt = $conn->prepare($sql);
        
        $stmt->bindParam(':name', $account_name);
        $stmt->bindParam(':accountNumber', $account_number);
        $stmt->bindParam(':balance', $account_balance);
        
        if ($stmt->execute()) {
            $_SESSION['message'] = "Insert successful!";
            header("Location: index.php"); 
            exit();
        } else {
            $_SESSION['message'] = "Insert failed.";
            header('Location: index.php');
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Create Account</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .form-control {
            border-radius: 10px;
        }
        h3 {
            font-weight: bold;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 10px;
            padding: 10px 20px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h3>Add a New Account</h3>
    <form action="#" method="POST">
        <div class="mb-4">
            <label for="name" class="form-label">Account Name</label>
            <input type="text" class="form-control" name="name" id="name" required placeholder="Enter account holder's name">
        </div>
        <div class="mb-4">
            <label for="accountNumber" class="form-label">Account Number</label>
            <input type="text" class="form-control" name="accountNumber" id="accountNumber" required placeholder="Enter account number">
        </div>
        <div class="mb-4">
            <label for="balance" class="form-label">Initial Account Balance</label>
            <input type="number" class="form-control" name="balance" id="balance" required placeholder="Enter balance" min="0">
        </div>
        <button type="submit" class="btn btn-primary w-100">Create Account</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
