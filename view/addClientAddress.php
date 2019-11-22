<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include'view/header.php'; ?>
<html>
    <form class="form">
        <div class="form-row">
            <input type="hidden" name="action" value="updateDemo" />
            <div class="form-group col-md-2">
                <br>
                <label>Number</label>
                <input type="text" class="form-control" id="inputNumber" placeholder="Number">
            </div>
            <div class="form-group col-md-2">
                <br>
                <label>Street</label>
                <input type="text" class="form-control" id="inputStreet" placeholder="Street"><br>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity"><br>
            </div>
            <div class="form-group col-md-2">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option selected>NE</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip">
            </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-2">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email"><br>
        </div>
        </div>    
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
</html>
<?php include 'view/footer.php'; ?>