
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Register Form</title>
      <!-- Bootstrap CSS -->
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom CSS -->
      <style>
          .btn-color {
              background-color: #0e1c36;
              color: #fff;
          }
  
          .profile-image-pic {
              height: 200px;
              width: 200px;
              object-fit: cover;
          }
  
          .cardbody-color {
              background-color: #ebf2fa;
          }
  
          a {
              text-decoration: none;
          }
      </style>
  </head>
  <body>
  
  <div class="container">
      <div class="row">
          <div class="col-md-6 offset-md-3">
              <h2 class="text-center text-dark mt-5">Register Form</h2>
              <div class="text-center mb-5 text-dark">Made with Bootstrap</div>
              <div class="card my-5">
                  <form class="card-body cardbody-color p-lg-5" action="../MVC/actions/register_process.php" method="post">
                      <div class="text-center">
                          <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png"
                               class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                               width="200px" alt="profile">
                      </div>

                      <!-- <div class="mb-3">
                          <input type="text" class="form-control" aria-describedby="emailHelp"
                                 placeholder="ID" id="id" name="id" required>
                      </div>

                      <div class="mb-3">
                          <input type="text" class="form-control" aria-describedby="emailHelp"
                                 placeholder="user_role" id="user_role" name="user_role" required>
                      </div> -->

                      <div class="mb-3">
                          <input type="text" class="form-control" aria-describedby="emailHelp"
                                 placeholder="First Name" id="firstname" name="firstname" required>
                      </div>

                      <div class="mb-3">
                          <input type="text" class="form-control" aria-describedby="emailHelp"
                                 placeholder="Last Name" id="lastname" name="lastname" required>
                      </div>

                      <div class="mb-3">
                          <input type="text" class="form-control" aria-describedby="emailHelp"
                                 placeholder="E Mail" id="email" name="email" required>
                      </div>

                      
                      <div class="mb-3">
                          <input type="text" class="form-control" aria-describedby="emailHelp"
                                 placeholder="Password" id="password_hash" name="password_hash" required>
                      </div>

                      <div class="mb-3">
                          <input type="text" class="form-control" aria-describedby="emailHelp"
                                 placeholder="Country" id="country" name="country" required>
                      </div>

                      <div class="mb-3">
                          <input type="text" class="form-control" aria-describedby="emailHelp"
                                 placeholder="City" id="city" name="city" required>
                      </div>

                      <div class="mb-3">
                          <input type="text" class="form-control" aria-describedby="emailHelp"
                                 placeholder="Contact Number" id="contact_number" name="contact_number" required>
                      </div>

<!-- 
                      <div class="mb-3">
                          <input type="text" class="form-control" aria-describedby="emailHelp"
                                 placeholder="User Name" id="username" name="username" required>
                      </div>
                      <div class="mb-3">
                          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                      </div> -->
                      <div class="text-center">
                          <button type="submit" class="btn btn-color px-5 mb-5 w-100">Register</button>
                      </div>
                      <div id="emailHelp" class="form-text text-center mb-5 text-dark">
                          Not Registered? <a href="#" class="text-dark fw-bold"> Create an Account</a>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  
  <!-- Bootstrap JS and Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  </body>
  </html>
  



	