
<?php
// add code to control the navigation view based on user id and patient id and admin id
// limit to one navigation bar for all views
?>




<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Patient Manager</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="?action=home">Home</a></li>
      <li><a href="?action=addNewPatientPage">Add Patient</a></li>
      <li><a href="?action=charts">Charts</a></li>
      <li><a href="?action=default">Logout</a></li>
      <li><a href="?action=register">Register</a></li>
    </ul>
  </div>
</nav>

