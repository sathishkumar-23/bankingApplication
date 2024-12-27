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
  <!-- nav section -->
  <section>
    <nav class="navbar navbar-expand-lg bg-body-tertiary ">
      <div class="container-fluid bg-primary p-1">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
  </section>
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