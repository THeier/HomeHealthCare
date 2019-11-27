<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
       if(!isset($adminError))
        {
            $adminError = "";
        }
        
        include 'view/header.php'; 
?>
<div style="text-align: center !important;">
    <h3 class="error"><?php ?></h3>
    <h1>Hello <?php ?></h1>
    <br>
    <br>
</div>
<div class="adminConsole">
<form>
    <div class="form-row">
        <div class="form-group col-xs-12 col-sm-4 col-md-4">
            <div class="adminContainer">
                <input type="subs" onclick="window.location.href='index.php?action=addProviderPage'" type="submit" class="btn adminButtons">Add Provider</button>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-4 col-md-4">
            <div class="adminContainer">
            <input onclick="window.location.href='index.php?action=addServicePage'" type="button" class="btn adminButtons">Add Service</button>
            </div>
        </div>
        <div class="form-group col-xs-12 col-sm-4 col-md-4">
            <div class="adminContainer">
            <button onclick="window.location.href='index.php?action=viewSchedule'" type="button" class="btn">View Schedule</button>
            </div>
        </div>
    </div>
</form>
</div>
<?php include 'view/footer.php'; ?>
</html>
