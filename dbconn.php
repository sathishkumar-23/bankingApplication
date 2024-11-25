<?php
try {
    $servername = 'localhost';
    $dbname = 'sparkBank';
    $username = 'root';
    $password = 'P@ssword_001';
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
?>


<!-- 
Table Details:

account table  - id account_id , account_name, account_Number,account_balance

credit table   - id account_id, transactor_name, transaction_date, transactor_accountNumber,amount

debit table    - id account_id,transactor_name, transaction_date,transactor_accountNumber,amount

transation tbale - id,account_id,account_name,account_number,credit_id,debit_id,transaction_date,from_to_name,from_to_acc_numeber,transact_amount,open_balance,close_balance

-->