
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   
    <!-- Style -->
    <link rel="stylesheet" href="style.css">
    <!-- Title -->
    <title>Banking Application</title>
  </head>
  <body>
    <!-- Bank Container -->
    <div class="bank_container">
        <div class="card shadow-lg" style="max-width: 500px; margin: auto;">
            <!-- <img src="https://via.placeholder.com/150" alt="Bank Logo" class="card-img-top"> -->
            <div class="card-body text-center">
            <h3 class="card-title">Spark Bank </h3>
                <!-- Add account -->
                <button class="btn btn-info mb-3">
                    <a class="text-decoration-none text-white" href="acc_form.php">ADD ACC</a>
                </button>
                  <!--Account Holder Statement  -->
                  <button class="btn btn-info mb-3">
                    <a class="text-decoration-none text-white" href="account_holder_list.php">Account holder Statment</a>
                </button>
            </div>
        </div>
    </div>
  </body>
</html>
