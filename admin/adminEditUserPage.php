<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
           <div class="container">
        <div class="row justify-content-center">
            <div class="form-row">
                <h3>Register</h3> <br> 
                <form class="form" action="index.php" method="post">

                    <input type="hidden" name="action" value="register_user" />

                    <label>First Name</label>
                    <input class="form-control" type="text" name="fName" value="<?php echo htmlspecialchars($fName); ?>">
                    <span class="error"><?php echo htmlspecialchars($errfName); ?></span><br>
                    <span class="error"><?php echo htmlspecialchars($errfNamefirstchar); ?></span><br><br>
                    <label>Last Name</label>
                    <input class="form-control" type="text" name="lName" value="<?php echo htmlspecialchars($lName); ?>">
                    <span class="error"><?php
                        echo htmlspecialchars($errlName);
                        echo '<br>';
                        echo htmlspecialchars($errlNamefirstchar);
                        echo '<br><br>';
                        ?></span>
            </div>
            <div class="form-row">
                    <label>Email</label>
                    <input class="form-control" type="text" name="email" value="<?php echo htmlspecialchars($uname); ?>"><br>
                    <span class="error"><?php
                        echo htmlspecialchars($erremail);
                        echo '<br>';
                        htmlspecialchars($erremailTaken);
                        ?></span>
                                     
                        <select class="custom-select custom-select-sm" name="type" required="true">
                            <option>Select...</option>
                            <option value="cna">Certified Nurse Assistant</option>
                            <option value="cma">Certified Medication Assistant</option>
                            <option value="cma">Other (PAS/CHORE)</option>
                        </select>
                   
                    <label>&nbsp;</label><br>
                    <input class="subs" type="submit" value="Register">   

                    </div>           
                </form>   


            </div>      


        </div>   
    </body>
</html>
