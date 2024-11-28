<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
  <title>Transaction List</title>
  <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        td {
            text-align: right;
        }
    </style>
</head>
<body>
<div class="container">
<h4>Transaction List</h4>
<?php
include('dbconn.php');
$sql = "SELECT * FROM transaction;";
$stmt = $conn->prepare($sql);
$stmt->execute();
$transaction = $stmt->fetchAll();
?>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Account ID</th>
      <th>Account Holder</th>
      <th>Credit ID</th>
      <th>Debit ID</th>
      <th>Transaction Date</th>
      <th>From_TO_name</th>
      <th>From_TO_acc_number</th>
      <th>Transaction Amount</th>
      <th>Transact Type</th>
      <th>Open Balance</th>
      <th>Close Balance</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if (count($transaction) > 0) {
      foreach ($transaction as $key=>$row) {
    ?>
      <tr>
        <td><?php echo $key+1 ?></td>
        <td><?php echo $row['account_id']; ?></td>
        <td><?php echo $row['account_name']; ?></td>
        <td><?php echo $row['credit_id']; ?></td>
        <td><?php echo $row['debit_id']; ?></td>
        <td><?php echo $row['transaction_date']; ?></td>
        <td><?php echo $row['from_to_name']; ?></td>
        <td><?php echo $row['from_to_acc_number']; ?></td>
        <td><?php echo $row['transact_amount']; ?></td>
        <td><?php echo $row['transcat_type']; ?></td>
        <td><?php echo $row['open_balance']; ?></td>
        <td><?php echo $row['close_balance']; ?></td>
      </tr>
    <?php
      }
    } else {
      echo "<tr><td colspan='11'>No transactions found.</td></tr>";
    }
    ?>
  </tbody>
</table>
<div>
  <a href="index.php"><button class="btn btn-primary">go to Home</button></a>
  <button id="downloadBtn"class=" btn btn-info">Download statement</button>
</div>
</div>
<script>
        document.getElementById('downloadBtn').addEventListener('click', function() {
            // Get the HTML content of the page
            //const pageContent = document.documentElement.outerHTML;
            const heading = document.querySelector('h4').outerHTML;
            const table = document.querySelector('table').outerHTML;

            const contnent = headding+table;

            // Create a Blob with the HTML content
            const blob = new Blob([pageContent], { type: 'text/html' });

            // Create a link element
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'downloaded-page.html';

            // Trigger the download by simulating a click
            link.click();
        });
</script>
</body>
</html>
