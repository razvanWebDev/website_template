<?php include "includes/header.php"; ?>
<div class="wrapper">

  <?php include "includes/top_navbar.php"; ?>
  <?php include "includes/sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php $page_title = "Home"; ?>
    <?php include "includes/page_title.php"; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <?php
                    $query = "SELECT * FROM users";
                    $select_users = mysqli_query($connection, $query);
                    $num_users = mysqli_num_rows($select_users);
                    ?>
                <h3>
                  <?php echo $num_users ?>
                </h3>
                <p>Admin Users</p>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
              <a href="users.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                  $query = "SELECT * FROM contact";
                  $result = mysqli_query($connection, $query);
                  $num_items = mysqli_num_rows($result);
                  ?>
                <h3>
                  <?php echo $num_items ?>
                </h3>
                <p>Total Messages</p>
              </div>
              <div class="icon">
                <i class="fas fa-envelope"></i>
              </div>
              <a href="contact.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<?php include "includes/footer.php"; ?>