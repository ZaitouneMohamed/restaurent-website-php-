<?php
include('partial/menu.php');
require_once('connection.php');
$req = mysqli_query($con, "select o.* , f.* , u.* from tbl_client u join orders o on u.id=o.User_ID join food f on o.food_ID = f.id  ");
?>

<div class="container">
    <h1><strong><i>Hello Mr'<?php echo $_SESSION['admin_fullname']; ?> nothing here yet</i></strong></h1>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th>user name</th>
                                <th>image</th>
                                <th>food title</th>
                                <th>statue</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            while ($row = mysqli_fetch_array($req)) {
                                echo ("
                                    <tr>
                                        <td>$row[1]</td>
                                        <td>$row[2]</td>
                                        <td>$row[3]</td>
                                        <td>$row[17]</td>
                                        <td><img src='images/foods/$row[11]' class='rounded' width='50px' height='50px'></td>
                                        <td>$row[8]</td>
                                        <td>$row[4]</td>
                                        <td><a href='change_statue.php?id=$row[0]&&statue=new statue'  class='btn btn-primary'>change statue</a></td>
                                    </tr>           
                                     ");
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include('partial/footer.php'); ?>