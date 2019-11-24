<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php include'view/header.php'; ?>

<html>
    <div class="container">
        <div class="row justify-content-center">
            <form class="form" action="index.php" method="POST">
                <input type="hidden" name="action" value="updateAddress" />

                <legend>Update Address</legend>

                <label>Client ID:</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars($patientid); ?><br>
                <label>Client Name:</label> <?php echo $name; ?><br>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Number:</label>
                        <input class="form-control" type="text" name="num" value="<?php echo htmlspecialchars($num); ?>" ><br>
                        <label>Street:</label>
                        <input class="form-control" type="text" name="street" value="<?php echo htmlspecialchars($street); ?>"><br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>City:</label>
                        <input class="form-control" type="text" name="city" value="<?php echo htmlspecialchars($city); ?>"><br>
                        <label>State:</label>
                        <input class="form-control" type="text" name="st" value="<?php echo htmlspecialchars($st); ?>"><br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Zip Code:</label>
                        <input class="form-control" type="text" name="zip" value="<?php echo htmlspecialchars($zip); ?>"><br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Email:</label>
                        <input class="form-control" type="text" name="email" value="<?php echo htmlspecialchars($email); ?>"><br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>End Date:</label>
                        <input class="form-control" type="date" name="endDate"><br>

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <input type="hidden" name="begdate" value="<?php echo $patientAddress->getBegDate(); ?>">
                        <input class="subs" type="submit" value="Update Address">
                    </div>
                </div>

            </form>

        </div>

    </div>  


</html>

