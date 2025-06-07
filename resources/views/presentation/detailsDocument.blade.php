<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Smart | Detalhes do contrato</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://smarttelecom.eng.br/new_template/assets/img/favicon.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!-- Config -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>

    <div class="container-form" style="width: 70%; margin: 0 auto; margin-top: 5%">

      <div class="col-xl">

        <div class="card mb-4">

          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Defina os termos e partes do contrato</h5>
          </div>

          <div class="card-body">

            <form>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Full Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="basic-default-fullname"
                  placeholder="John Doe"
                />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Company</label>
                <input
                  type="text"
                  class="form-control"
                  id="basic-default-company"
                  placeholder="ACME Inc."
                />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-email">Email</label>
                <div class="input-group input-group-merge">
                  <input
                    type="text"
                    id="basic-default-email"
                    class="form-control"
                    placeholder="john.doe"
                    aria-label="john.doe"
                    aria-describedby="basic-default-email2"
                  />
                  <span class="input-group-text" id="basic-default-email2">@example.com</span>
                </div>
                <div class="form-text">You can use letters, numbers & periods</div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-phone">Phone No</label>
                <input
                  type="text"
                  id="basic-default-phone"
                  class="form-control phone-mask"
                  placeholder="658 799 8941"
                />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-message">Message</label>
                <textarea
                  id="basic-default-message"
                  class="form-control"
                  placeholder="Hi, Do you have a moment to talk Joe?"
                ></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Send</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </body>
</html>