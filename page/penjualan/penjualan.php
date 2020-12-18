<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h3>Transaski Penjualan</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Penjualan</li>
      </ol>
    </div>
  </div><!-- /.container-fluid -->
  <hr>
</section>

<div class="row">
  <!-- Barcode -->
  <div class="col-xl-3 col-md-6">
    <div class="card  h-80">
      <div class="card-body">
        <div class="row">
          <div class="col mr-2">
            <form action="" method="post">
              <div class="row">
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Barcode" required autofocus>
                </div>
                <div class="col-sm-2">
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#jual">
                    <i class="fas fa-barcode fa-2x text-black"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pelanggan -->
  <div class="col-xl-3 col-md-6">
    <div class="card  h-80">
      <div class="card-body">
        <div class="row">
          <div class="col mr-2">
            <div class="row">
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" placeholder="Nama Pelanggan">
              </div>
              <div class="col-sm-2 pr-2">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pelanggan">
                  <i class="fas fa-users fa-2x text-black"></i>
                </button>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Invoice -->
  <div class="col-xl-3 col-md-6">
    <div class="card h-80">
      <div class="card-body">
        <div class="row">
          <div class="col mr-2 text-center">
            <?php

            $invoice = "LV" . date('Ymd');
            echo "<span class='h1'>$invoice</span>";

            ?>
            <div class="row">
              <div class="col-sm-10">
                <input type="hidden" class="form-control" value="<?= $invoice; ?>" name="invoice" id="nama_pelanggan">
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Total Harga -->
  <div class="col-xl-3 col-md-6">
    <div class="card h-80">
      <div class="card-body bg-secondary">
        <div class="row">
          <div class="col mr-2 text-center text-white">

            <?php

            $total = "Rp. 500.000";
            echo "<span class='h1'>$total</span>";

            ?>
            <!-- <div class="row">
              <div class="col-sm-10">
                <input type="hidden" class="form-control" value="<?= $total; ?>" name="total" id="total">
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="mt-5">
  <!-- Tabel Transaksi -->
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table>
</div>