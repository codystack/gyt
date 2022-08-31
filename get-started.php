<?php
include './components/header.php';
require_once './auth/application.php';
?>


  <section class="bg-black overflow-hidden vh-100">
    <div class="d-flex flex-column container level-3 min-vh-100">
      <div class="row align-items-center justify-content-center my-auto">
        <div class="col-md-10 col-lg-8 col-xl-5">
            <div class="text-center mb-3">
                <a href="./">
                    <img src="assets/images/logo_white.svg" width="350" alt="Logo">
                </a>
            </div>
            <div class="card">
                <div class="card-header bg-white text-center pb-0">
                    <h5 class="fs-4 mb-1">Application Form<br>Request</h5>
                </div>
                <div class="card-body bg-white">
                    <?php
                        if (isset($_SESSION['error_message'])) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-message text-center">
                                    <?php
                                    echo $_SESSION['error_message'];
                                    session_destroy();
                                    ?>
                                </div>
                            </div>
                            <?php
                            unset($_SESSION['error_message']);
                        }
                    ?>
                    <?php
                        if (isset($_SESSION['success_message'])) {
                            ?>
                            <div class="alert alert-success" role="alert">
                                <div class="alert-message text-center">
                                    <?php echo $_SESSION['success_message']; ?>
                                </div>
                            </div>
                            <?php
                            unset($_SESSION['success_message']);
                        }
                    ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="name" placeholder="Full name">
                            <label for="floatingPassword">Full name</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="companyName" placeholder="Company name">
                            <label for="floatingPassword">Company name</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="email" class="form-control" name="email" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="d-grid mb-2">
                            <button type="sudmit" name="request_btn" class="btn btn-lg btn-black">Request Form</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer bg-opaque-black inverted text-center">
                    <p class="text-secondary"><a href="./"
                        class="underline"><b>Click Here</b></a> to go back to home
                    </p>
                </div>
            </div>
        </div>
      </div>
    </div>
    <figure class="background background-overlay" style="background-image: url('https://i.imgur.com/20JlGd0.jpg')">
    </figure>
  </section>


  <script src="https://cube.webuildthemes.com/assets/js/vendor.bundle.js"></script>
  <script src="https://cube.webuildthemes.com/assets/js/index.bundle.js"></script>

</body>

</html>