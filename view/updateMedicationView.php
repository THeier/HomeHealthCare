<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
table:
Website: https://mdbootstrap.com/docs/jquery/tables/editable/#!

-->
<?php include 'view/header.php'; ?>
<html>
    <div class="container" style="height: auto;">
        <div class="row col-lg-20">
    <!-- Editable table -->
<div class="card2">
    <h3 class="card-header text-center font-weight-bold text-uppercase">Medications for <?php echo $_SESSION['PatientFN']; ?></h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i
            class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
      <table class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
            <th class="text-center">Patient ID</th>
            <th class="text-center">Medication ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Quantity</th>
            <th class="text-center">Times Per Day</th>
            <th class="text-center">Note</th>
            <th class="text-center">Edit</th>
          </tr>
        </thead>
        
        <?php foreach($medication as $med) :?>
          <tr class="hide">
              <td class="pt-3-half" contenteditable="true"><?php echo htmlspecialchars($med->getPatientID()); ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo htmlspecialchars($med->getMedID()) ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo htmlspecialchars($med->getDrug())  ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo htmlspecialchars($med->getQuantity())  ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo htmlspecialchars($med->getTimesPerDay()) ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo htmlspecialchars($med->getMedNote()) ?></td>
            <td>
              <form action="index.php" method="POST">
                    <input type="hidden" name="action" value="updateMedicationPage">
                    <input type="hidden" name="Pid" value="<?php echo htmlspecialchars($med->getPatientID()); ?>">
                    <input type="hidden" name="medID" value="<?php echo htmlspecialchars($med->getMedID()); ?>">
                    <span class="table-edit"><button type="submit"
                    class="btn btn-secondary btn-rounded btn-sm my-0">Edit</button></span>
                                               
              </form>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
 
  </div>
</div>
     </div>
  </div>
<?php include 'view/footer.php'; ?>
</html>


