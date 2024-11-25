<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("dbconn.php");

if ($_POST) {
    if (isset($_POST['credit'])) {
//  echo "<pre>"; print_r($_POST);exit;

        $transactor_type = $_POST['transactor_type']; 

        $transactor_name = $_POST['transactor_name'];
        $transaction_date = $_POST['transaction_date'];
        $transactor_accountNumber = $_POST['transactor_accountNumber'];
        $amount = $_POST['amount'];

        try {
            $sql = "INSERT INTO credit (account_id, transactor_name, transaction_date, transactor_accountNumber, amount) 
            VALUES (:account_id, :transactor_name, :transaction_date, :transactor_accountNumber, :amount)";
            $stmt = $conn->prepare($sql);

            // $account_id = $conn->lastInsertId();
            $account_id = 1; 

            $stmt->bindParam(':account_id', $account_id);
            $stmt->bindParam(':transactor_name', $transactor_name);
            $stmt->bindParam(':transaction_date', $transaction_date);
            $stmt->bindParam(':transactor_accountNumber', $transactor_accountNumber);
            $stmt->bindParam(':amount', $amount);

            
            if ($stmt->execute()) {
                $credit_id = $conn->lastInsertId();

                $sql_account = "SELECT account_id, account_name, account_number, account_balance FROM account WHERE account_id = :account_id";
                $stmt_account = $conn->prepare($sql_account);
                $stmt_account->bindParam(':account_id', $account_id);
                $stmt_account->execute();

                $account_data = $stmt_account->fetch(PDO::FETCH_ASSOC);

                if ($account_data) {
                    $account_id = $account_data['account_id'];
                    $account_name = $account_data['account_name'];
                    $account_number = $account_data['account_number'];
                    $account_balance = $account_data['account_balance']; 
                } else {
                    throw new Exception("Account not found.");
                }

                if (isset($transactor_type)) {
                    $sql_transaction = "INSERT INTO transaction 
                        (account_id, account_name, account_number, credit_id, debit_id, transaction_date, from_to_name, from_to_acc_number, transact_amount, transcat_type, open_balance, close_balance) 
                        VALUES 
                        (:account_id, :account_name, :account_number, :credit_id, :debit_id, :transaction_date, :transactor_name, :transactor_accountNumber, :transact_amount, :transcat_type, :open_balance, :close_balance)";
                    
                    $stmt_transaction = $conn->prepare($sql_transaction);
                    $transcat_type = "credit"; 
                    $debit_id = null; 
                    $open_balance = $account_balance;
                    // $open_balance = 1000;
                    $close_balance = $open_balance + $amount;
                    $stmt_transaction->bindParam(':account_id', $account_id);
                    $stmt_transaction->bindParam(':account_name', $account_name);
                    $stmt_transaction->bindParam(':account_number', $account_number);
                    $stmt_transaction->bindParam(':credit_id', $credit_id);
                    $stmt_transaction->bindParam(':debit_id', $debit_id);
                    $stmt_transaction->bindParam(':transaction_date', $transaction_date);
                    $stmt_transaction->bindParam(':transactor_name', $transactor_name);
                    $stmt_transaction->bindParam(':transactor_accountNumber', $transactor_accountNumber);
                    $stmt_transaction->bindParam(':transact_amount', $amount);
                    $stmt_transaction->bindParam(':transcat_type', $transcat_type);
                    $stmt_transaction->bindParam(':open_balance', $open_balance);
                    $stmt_transaction->bindParam(':close_balance', $close_balance);

                    if ($stmt_transaction->execute()) {
                        $_SESSION['message'] = "Insert successful!";
                        header("Location: statement_list.php");
                        exit();
                    } else {
                        $_SESSION['message'] = "Transaction insert failed.";
                        header('Location: index.php');
                        exit();
                    }
                } else {
                    echo "No transactor type provided.";
                }
            } else {
                $_SESSION['message'] = "Credit Insert failed.";
                header('Location: index.php');
                exit();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    }else{
        if(isset($_POST['debit'])){
            // echo "<pre>"; print_r($_POST);exit;
            $transactor_type = $_POST['transactor_type']; 
            $transactor_name = $_POST['transactor_name'];
            $transaction_date = $_POST['transaction_date'];
            $transactor_accountNumber = $_POST['transactor_accountNumber'];
            $amount = $_POST['amount'];

            try{
                $sql = "INSERT INTO debit (account_id,transactor_name, transaction_date,    transactor_accountNumber, amount) 
                        VALUES (:account_id,:transactor_name, :transaction_date, :transactor_accountNumber, :amount)";
                        $stmt = $conn->prepare($sql);
                        // echo "<pre>"; print_r($stmt);exit;
                        $account_id = "1";
                        $stmt->bindParam(':account_id', $account_id);
                        $stmt->bindParam(':transactor_name', $transactor_name);
                        $stmt->bindParam(':transaction_date', $transaction_date);
                        $stmt->bindParam(':transactor_accountNumber', $transactor_accountNumber);
                        $stmt->bindParam(':amount', $amount);

                    if ($stmt->execute()) {
                        // $account_id = $conn->lastInsertId();
                        $debit_id = $conn->lastInsertId();
                        $sql_account = "SELECT account_id account_name, account_number, account_balance FROM account WHERE account_id = :account_id";
                        $stmt_account = $conn->prepare($sql_account);
                        $stmt_account->bindParam(':account_id', $account_id);
                        $stmt_account->execute();
        
                        $account_data = $stmt_account->fetch(PDO::FETCH_ASSOC);
        
                        if ($account_data) {
                            $account_name = $account_data['account_name'];
                            $account_number = $account_data['account_number'];
                            $account_balance = $account_data['account_balance']; 
                        } else {
                            throw new Exception("Account not found.");
                        }
                        if(isset($transactor_type)){
                            $sql_transaction = "INSERT INTO transaction 
                            (account_id,account_name,account_number, credit_id, debit_id, transaction_date, from_to_name, from_to_acc_number, transact_amount, transcat_type, open_balance, close_balance) 
                            VALUES 
                            (:account_id,:account_name,:account_number,:credit_id, :debit_id, :transaction_date, :transactor_name, :transactor_accountNumber, :transact_amount, :transcat_type, :open_balance, :close_balance)";
                            $stmt_transaction = $conn->prepare($sql_transaction);
                            $transcat_type = "debit";
                            // $account_id = "1";
                            $credit_id = null; 
                            // $debit_id = 1; 
                            $open_balance = 1000; 
                            // $close_balance = 1100;
                            $close_balance = $open_balance - $amount;
                            $stmt_transaction->bindParam(':account_id', $account_id);
                            $stmt_transaction->bindParam(':account_name', $account_name);
                            $stmt_transaction->bindParam(':account_number', $account_number);
                            $stmt_transaction->bindParam(':credit_id', $credit_id);
                            $stmt_transaction->bindParam(':debit_id', $debit_id);
                            $stmt_transaction->bindParam(':transaction_date', $transaction_date);
                            $stmt_transaction->bindParam(':transactor_name', $transactor_name);
                            $stmt_transaction->bindParam(':transactor_accountNumber', $transactor_accountNumber);
                            $stmt_transaction->bindParam(':transact_amount', $amount);
                            $stmt_transaction->bindParam(':transcat_type', $transcat_type);
                            $stmt_transaction->bindParam(':open_balance', $open_balance);
                            $stmt_transaction->bindParam(':close_balance', $close_balance);
                            if ($stmt_transaction->execute()) {
                                $_SESSION['message'] = "Insert successful!";
                                header("Location: statement_list.php");
                                exit();
                            } else {
                                $_SESSION['message'] = "Transaction insert failed.";
                                header('Location: index.php');
                                exit();
                            }
                        } else
                        {
                           $_SESSION['message'] = "debit Insert failed.";
                           header('Location: index.php');
                           exit();
                       }
                    }
        
                } catch (PDOException $e) {
                        
                echo "Error: " . $e->getMessage();
            }
        }
    }
    


?>
