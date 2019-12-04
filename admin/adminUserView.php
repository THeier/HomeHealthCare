<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
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
  <h3 class="card-header text-center font-weight-bold text-uppercase">User Table</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i
            class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
      <table class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
            <th class="text-center">User ID</th>
            <th class="text-center">First Name</th>
            <th class="text-center">Last Name</th>
            <th class="text-center">User Name</th>
            <th class="text-center">Type</th>
            <th class="text-center">Begin Date</th>
            <th class="text-center">End Date</th>
            <th class="text-center">Sort</th>
            <th class="text-center">Remove</th>
            <th class="text-center">Edit</th>
          </tr>
        </thead>
        <!-- This is our clonable table line -->
        <?php foreach($allUsers as $u) :?>
          <tr class="hide">
            <td class="pt-3-half" contenteditable="true"><?php echo htmlspecialchars($u->getUserID()); ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo htmlspecialchars(ucfirst($u->getFName()));  ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo htmlspecialchars(ucfirst($u->getLName()));  ?></td>
             <td class="pt-3-half" contenteditable="true"><?php echo htmlspecialchars($u->getUserName());  ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo strtoupper($u->getUserType());  ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo date('m-d-Y',strtotime($u->getBegDate())); ?></td>
            <td class="pt-3-half" contenteditable="true"><?php echo htmlspecialchars($u->getEndDate()); ?></td>
            <td class="pt-3-half">
              <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up"
                    aria-hidden="true"></i></a></span>
              <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down"
                    aria-hidden="true"></i></a></span>
            </td>
            <td>
                <form action="index.php" method="POST">
                    <input type="hidden" name="action" value="adminDelUser">
                    <input type="hidden" name="userID" value="<?php echo htmlspecialchars($u->getUserID()); ?>"
                           <span class="table-remove"><button type="submit"
                    class="btn btn-danger btn-rounded btn-sm my-0" name="remove">Remove</button></span>
                  </form>
            </td>
            <td>
              <form action="index.php" method="POST">
                    <input type="hidden" name="action" value="adminUpdateUser">
                    <input type="hidden" name="userID" value="<?php echo htmlspecialchars($u->getUserID()); ?>"
                           <span class="table-edit"><button type="submit"
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
     </div>
<!-- Editable table -->
    </div>
</div>
<?php include 'view/footer.php'; ?>
</html>




