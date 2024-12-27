<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <!-- Credit Button and Modal -->
    <div class="m-2">
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#creditModal">Click To Credit</button>
    </div>

    <!-- Credit Modal -->
    <div class="modal fade" id="creditModal" tabindex="-1" aria-labelledby="creditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="creditModalLabel">Credit Form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="insert.php" method="POST">
                        <input type="hidden" name="">
                        <div class="mb-3">
                            <label for="name" class="form-label">Transactor Name</label>
                            <input type="text" class="form-control" name="transactor_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" name="transaction_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="accountNumber" class="form-label">Account No</label>
                            <input type="text" class="form-control" name="transactor_accountNumber" required>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" class="form-control" name="amount" required>
                        </div>
                        <!-- account number -->
                        <input type="hidden" name="account_id" value="<?php echo $_GET['account_id']; ?>">

                        <!-- type -->
                        <input type="hidden" name="transactor_type" value="credit">

                        <button type="submit" name="credit" class="btn btn-custom">Save</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>