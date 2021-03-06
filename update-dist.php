<?php 
session_start();
if($_SESSION["user_type"] != 'admin_user'){
  header("Location:sell.php");
}
include("header.php"); 
include("db-config.php"); 
?>
  <body>
    <div class="container-fluid">
      <div class="row">
      <?php include("sidebar.php") ?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="row">
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Update Distribution</h4>
          <form class="needs-validation" novalidate="" method="POST" action="update-dist-process.php">
            <input type="hidden" name="dist_id" value="<?php echo $_GET['id'];?>">
            <hr class="mb-4">
            <div class="row">
            <?php
              $sql = "SELECT * FROM distributions WHERE ID =".$_GET['id'];
              $result = $conn->query($sql);
              if ($result->num_rows > 0):
              $row = $result->fetch_assoc()
            ?>
              <div class="col-md-4 mb-3">
                <label for="cc-name">Distribution Name</label>
                <input type="text" class="form-control" name="dist_name" value="<?php echo $row['dist_name']  ?>">
              </div>
              <div class="col-md-4 mb-2">
                <label for="cc-name">Update</label>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Update</button>
              </div>
              <?php
              endif;
              ?>
            </div>
            <hr class="mb-4">
            
          </form>
        </div>
      </div>
        </main>
      </div>
    </div>
    <?php include("footer.php") ?>    