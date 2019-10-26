
<?php include 'view/header.php'; ?>
 <?php include 'view/sidebar_profile.php'; ?>

<div class="row">
    <div class="column">
       
        <h2 class="cardh2"><?php echo htmlspecialchars("Welcome" . " " . $_SESSION['fname'] . " " . $_SESSION['lname']); ?></h2> 
        <div class="card">
            <img src="<?php echo $_SESSION['pic']; ?>" alt="picture" style="width: 100%"/>
            <div class="container">
                <h4><b><?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname']; ?></b></h4>
                <p><?php echo $_SESSION['email']; ?></p>
            </div>
        </div>
    </div>

    <div class="column1">
        <table class="patientList">
          
            <tr>
                <th colspan="1">Name</th>
                <th colspan="2">Action</th>
            </tr>
           
           
            <?php foreach ($p as $active) : ?>
             <tr>
                 <td colspan="2"><?php echo htmlspecialchars($active[2]. " ".$active[3]);  ?></td>
                <td>
                    <a href='?action=patient_page'value='<?php echo $active[0]; ?>'class="select_btn">Select</a>
               
                </td>
             </tr>
           <?php endforeach; ?>  
         
           
        </table>
        </div>    
    </div>
</div>

<?php include 'view/footer.php'; ?>