<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <!-- Editable table -->
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Editable table</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i
            class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
      <table class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
            <th class="text-center">User ID</th>
            <th class="text-center">Patient ID</th>
            <th class="text-center">First Name</th>
            <th class="text-center">Last Name</th>
            <th class="text-center">DOB</th>
            <th class="text-center">Gender</th>
            <th class="text-center">Disabled</th>
            <th class="text-center">Sort</th>
            <th class="text-center">Remove</th>
            <th class="text-center">Edit</th>
          </tr>
        </thead>
        <!-- This is our clonable table line -->
        <?php foreach($allPats as $p) :?>
          <tr class="hide">
              <td class="pt-3-half" contenteditable="true"><?php echo htmlspecialchars($p->getUserID()); ?></td>
            <td class="pt-3-half" contenteditable="true"><?php  ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo htmlspecialchars($p->getFName());  ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo htmlspecialchars($p->geLName());  ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo htmlspecialchars($p->getDob());  ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo htmlspecialchars($p->getSex());  ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo htmlspecialchars($p->getDisabled());  ?></td>
            <td class="pt-3-half">
              <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up"
                    aria-hidden="true"></i></a></span>
              <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down"
                    aria-hidden="true"></i></a></span>
            </td>
            <td>
                <form action="index.php" method="POST">
                    <input type="hidden" name="action" value="adminDelPatient">
                    <input type="hidden" name="pid" value="<?php echo htmlspecialchars($p->getPatientID()); ?>"
              <span class="table-remove"><button type="button"
                    class="btn btn-danger btn-rounded btn-sm my-0" name="remove">Remove</button></span>
                  </form>
            </td>
            <td>
              <form action="index.php" method="POST">
                    <input type="hidden" name="action" value="updateDemo">
                    <input type="hidden" name="pid" value="<?php echo htmlspecialchars($p->getPatientID()); ?>"
              <span class="table-edit"><button type="button"
                    class="btn btn-secondary btn-rounded btn-sm my-0" name="edit">Edit</button></span>
                                               
              </form>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Editable table -->
</html>