
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Page</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="./ecom/css/admin_style.css">
<style>
* {
  box-sizing: border-box;
  font-family: sans-serif;
  padding: 0;
  margin: 0;
}

/* xs */
p {
  color: #ccc;
  font-size: 1.25rem;
  padding: 0 0.3rem;
  font-weight: 400;
}
p:after {
  content: " Handhelds";
  color: darkslategray;
  font-weight: 700;
}

section.dashboard-buttons {
  max-width: 980px;
  margin: 3rem auto;
}
.tile-button {
  list-style: none;
  overflow: hidden;
  padding: 0.5rem;
  max-width: 76rem;
}
.tile-button li {
  padding: 40px 25px;
  background-color: dodgerblue;
  color: white;
  display: block;
  max-width: 100%;
  border-radius: 5px;
  margin: 5px;
  text-align: center;
  height: 175px;
  overflow: hidden;
  font-weight: 700;
  cursor: pointer;
}
.tile-button li:hover {
  box-shadow: 0 0 25px rgba(0, 0, 0, 0.3);
}
.tile-button li small {
  font-weight: 400;
  font-style: italic;
}
.tile-button li i {
  font-size: 30px;
  margin-bottom: 10px;
}

/* small */
@media all and (min-width: 20em) {
  p:after {
    content: " small screens";
    color: darkslategray;
    font-weight: 700;
  }
  .dashboard-buttons {
    margin-left: 1rem;
  }
  .tile-button li {
    width: 45.5%;
    float: left;
  }
}

/* large */
@media all and (min-width: 40em) {
  p:after {
    content: " med screens && larger";
    color: darkslategray;
    font-weight: 700;
  }
  .tile-button li {
    width: 23%;
  }
}
</style>

  
  <body>
    <div class="container-fluid">
    <section class="dashboard-buttons">
  <p>Screen Size :</p>
  <ul class="tile-button">
    <a href="www.google.com"><li>
      <i class="fa fa-clipboard"></i>
      <br>Start a New Application
    </li></a>
    <li>
      <i class="fa fa-files-o"></i>
      <br>Continue Unfinished Application
      <br><small>123 Example Road Longer Long</small>
    </li>
    <li>
      <i class="fa fa-user"></i>
      <br>My Account
    </li>
    <li>
      <i class="fa fa-youtube-play"></i>
      <br>Tips for Success Video Series
    </li>
  </ul>
</section>
</div>
</body>

</html>

<!-- <li><a class="sidebar-nav-link">Logout</a></li> -->
