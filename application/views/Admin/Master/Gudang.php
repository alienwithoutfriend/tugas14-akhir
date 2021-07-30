<!-- Page -->
<div class="page">
  <div class="page-header">
    <div class="card card-inverse" style="background-color: #589FFC">
      <div class="card-block">
        <h4 class="card-title">Kelola Gudang</h4>
        <p class="card-text text-white">Lorem ipsum Dolor dolor enim Ut consequat tempor quis minim enim
          sit ad in qui Ut in ut elit minim quis eiusmod reprehenderit
          aute cillum consequat enim Ut veniam labore dolor anim quis
          ullamco in cupidatat dolore ut amet elit sint magna exercitation
          aliquip.</p>
      </div>
    </div>
  </div>

  <div class="page-content">
    <div class="row">
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h6 class="panel-title">Input Data Gudang</h6>
        </div>
        <div class="panel-body" style="padding:10px">    
            <?php if (isset($_GET['id'])): ?>
              <form action="<?= base_url().'Admin/UpdateGudang'?>" method="post">
            <?php else: ?>
              <form action="<?= base_url().'Admin/InsertGudang'?>" method="post">
            <?php endif; ?>

            <div class="form-group"><br>
              <?php if (isset($_GET['id'])): ?>
                <input type="text" class="form-control" name="kdgudang" required readonly value="<?= $data->kode_gudang ?>">  
              <?php else: ?>
                  <input type="text" class="form-control" name="kdgudang" required readonly value="<?= $kode_gudang?>">
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label class="col-xl-12 col-md-3 form-control-label">Nama Gudang
                <span class="required">*</span>
              </label>
              <?php if (isset($_GET['id'])): ?>
                <input type="text" class="form-control" name="ngudang" required value="<?= $data->nama_gudang ?>" autocomplete="off">  
              <?php else: ?>
                <input type="text" class="form-control" name="ngudang" required="required" autocomplete="off">
              <?php endif; ?>
            </div>
            <div class="text-right">
            <a href="<?= base_url('kelola-gudang')?>" class="btn btn-danger"><i class="wb-close"></i> Batal</a>
            <button type="submit" class="btn btn-info"><i class="wb-check" aria-hidden="true"></i> Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Panel Basic -->
    <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-heading">
          <h6 class="panel-title">Data Gudang</h6>
      </div>
      <div class="panel-body" style="padding: 35px">
        <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Gudang</th>
              <th>Nama Gudang</th>
              <th>Delete / Edit</th>
            </tr>
          </thead>
          <?php $no=1; ?>
          <tbody>
            <?php foreach ($tb_gudang as $gdg): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $gdg['kode_gudang']?></td>
                <td style="text-transform: capitalize;"><?= $gdg['nama_gudang']?></td>
                <td align="center">
                  <a href="<?= base_url('Admin/deleteGdg/'.$gdg['kode_gudang'])?>" data-original-title="Delete" class="btn btn-xs btn-icon btn-pure btn-danger wb-trash" data-toggle="tooltip"></a>
                  <a href="?id=<?= $gdg['kode_gudang'] ?>" class="btn btn-xs btn-icon btn-pure btn-info wb-edit" data-original-title="Edit" data-toggle="tooltip"></a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- End Panel Basic -->
  </div>
  </div>
  </div>
</div>
