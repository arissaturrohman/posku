<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

include("inc/config.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Point of Sale</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-shopping-cart-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Point of Sale <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Master
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Master</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="?page=barang">Data Barang</a>
            <a class="collapse-item" href="?page=pelanggan">Data Pelanggan</a>
            <a class="collapse-item" href="?page=level">Data Level</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Data Transaksi</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="?page=beli">Pembelian</a>
            <a class="collapse-item" href="?page=penjualan">Penjualan</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Laporan
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder-open"></i>
          <span>Data Laporan</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Laporan</h6>
            <a class="collapse-item" href="?page=lap_pembelian">Pembelian</a>
            <a class="collapse-item" href="?page=lap_penjualan">Penjualan</a>

          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Piutang
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#piutang" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder-open"></i>
          <span>Data Piutang</span>
        </a>
        <div id="piutang" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Laporan</h6>
            <a class="collapse-item" href="?page=piutang">Piutang</a>
            <a class="collapse-item" href="?page=hutang">Hutang</a>

          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Settings
      </div>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetting" aria-expanded="true" aria-controls="collapseSetting">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Pengaturan</span>
        </a>
        <div id="collapseSetting" class="collapse" aria-labelledby="headingSetting" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="?page=brand">Brand</a>
            <a class="collapse-item" href="?page=pengguna">Pengguna</a>
            <!-- <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a> -->
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>



          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">



          <?php

          $page = $_GET['page'];
          $aksi = $_GET['aksi'];

          if ($page == "barang") {
            if ($aksi == "") {
              include('page/barang/barang.php');
            } elseif ($aksi == "add") {
              include('page/barang/add.php');
            } elseif ($aksi == "edit") {
              include('page/barang/edit.php');
            } elseif ($aksi == "delete") {
              include('page/barang/delete.php');
            }
          } elseif ($page == "pelanggan") {
            if ($aksi == "") {
              include('page/pelanggan/pelanggan.php');
            } elseif ($aksi == "add") {
              include('page/pelanggan/add.php');
            }
          } elseif ($page == "level") {
            if ($aksi == "") {
              include('page/level/level.php');
            } elseif ($aksi == "add") {
              include('page/level/add.php');
            }
          } elseif ($page == "beli") {
            if ($aksi == "") {
              include('page/pembelian/pembelian.php');
            } elseif ($aksi == "add") {
              include('page/pembelian/add.php');
            } elseif ($aksi == "edit") {
              include('page/pembelian/edit.php');
            } elseif ($aksi == "delete") {
              include('page/pembelian/delete.php');
            }
          } elseif ($page == "penjualan") {
            if ($aksi == "") {
              include('page/penjualan/penjualan.php');
            }
          } elseif ($page == "laporan") {
            if ($aksi == "") {
              include('page/laporan/lap_pembelian.php');
            }
          } elseif ($page == "laporan") {
            if ($aksi == "") {
              include('page/laporan/lap_penjualan.php');
            }
          } elseif ($page == "pengguna") {
            if ($aksi == "") {
              include('page/pengguna/pengguna.php');
            }
          } elseif ($page == "brand") {
            if ($aksi == "") {
              include('page/brand/brand.php');
            } elseif ($aksi == "add") {
              include('page/brand/add.php');
            } elseif ($aksi == "edit") {
              include('page/brand/edit.php');
            } elseif ($aksi == "delete") {
              include('page/brand/delete.php');
            }
          } elseif ($page == "") {
            include "dashboard.php";
          } else {
            echo "Halaman tidak ditemukan";
          }

          ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-responsive" id="dataTable">
            <thead>
              <tr>
                <th>Barcode</th>
                <th>Nama Barang</th>
                <th>Ukuran</th>
                <th>Satuan</th>
                <th>Stok</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php

              $sql = $conn->query("SELECT * FROM tb_barang");
              while ($data = $sql->fetch_assoc()) {

              ?>
                <tr>
                  <td><?= $data['barcode']; ?></td>
                  <td><?= $data['nama_barang']; ?></td>
                  <td><?= $data['ukuran']; ?></td>
                  <td><?= $data['satuan']; ?></td>
                  <td><?= $data['stok']; ?></td>
                  <td>
                    <button class="btn btn-sm btn-info" id="select" data-id="<?= $data['id_barang']; ?>" data-barcode="<?= $data['barcode']; ?>" data-barang="<?= $data['nama_barang']; ?>" data-ukuran="<?= $data['ukuran']; ?>" data-satuan="<?= $data['satuan']; ?>" data-qty="<?= $data['stok']; ?>">
                      <i class=" fas fa-check"></i>
                    </button>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <script>
    $('#dataTable').DataTable({
      ordering: false,
      info: false
    });
  </script>

  <script>
    $(document).ready(function() {
      $(document).on('click', '#select', function() {
        var id_barang = $(this).data('id');
        var barcode = $(this).data('barcode');
        var nama_barang = $(this).data('barang');
        var ukuran = $(this).data('ukuran');
        var satuan = $(this).data('satuan');
        var qty = $(this).data('qty');
        $('#id_barang').val(id_barang);
        $('#barcode').val(barcode);
        $('#nama_barang').val(nama_barang);
        $('#ukuran').val(ukuran);
        $('#satuan').val(satuan);
        $('#qty').val(qty);
        $('#exampleModal').modal('hide');
      })
    })
  </script>

</body>

</html>