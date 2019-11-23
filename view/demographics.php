<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include'view/header.php'; ?>
<html>
    <form>
   <input type="hidden" name="action" value="updateDemo" />
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputFName">First Name</label>
      <input type="text" class="form-control" id="inputFName" name="fname">
    </div>
    <div class="form-group col-md-6">
      <label for="inputLName">Last Name</label>
      <input type="text" class="form-control" id="inputPassword4" name="lname">
    </div>
  </div>
  <div class="form-group">
    <label for="inputNumber">Number</label>
    <input type="text" class="form-control" id="inputNumber" placeholder="Number">
  </div>
  <div class="form-group">
    <label for="inputStreet">Street</label>
    <input type="text" class="form-control" id="inputStreet" placeholder="Street">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email">
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</html>
<?php include 'view/footer.php'; ?>