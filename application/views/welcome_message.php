<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Autoselected</title>
  </head>
  <body>
  	<div class="container my-5">
  		<div class="row">
  			<div class="col-md-6 offset-md-3">

			  	<h1 class="text-center my-3">AUTOSELECTED</h1>

  				<!-- Alert -->
  				<?php if ($this->session->flashdata('success')): ?>
	  				<div class="alert alert-success alert-dismissible fade show" role="alert">
	  				  <strong>Success!</strong> Berhasil menambahkan data. :)
	  				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  				    <span aria-hidden="true">&times;</span>
	  				  </button>
	  				</div>
  				<?php endif ?>
  				<!-- /Alert -->

			    <form action="<?= base_url('welcome/insert') ?>" method="POST">
			      <div class="form-group">
			        <label for="provinsi">Provinsi</label>
			        <select name="provinsi" id="provinsi" class="form-control" required>
			        	<option value="">- Pilih Provinsi -</option>
			        	<?php foreach ($provinsi as $value): ?>
				        	<option value="<?= $value['id'] ?>"><?= $value['provinsi'] ?></option>
				        <?php endforeach ?>
			        </select>
			      </div>
			      <div class="form-group kota" style="display: none;">
			        <label for="kota">Kota</label>
			        <select name="kota" id="kota" class="form-control" required>
			        	<option value=""></option>
			        </select>
			      </div>
			      <div class="form-group kecamatan" style="display: none;">
			        <label for="kecamatan">Kecamatan</label>
			        <select name="kecamatan" id="kecamatan" class="form-control" required>
			        	<option value=""></option>
			        </select>
			      </div>
			      <div class="form-group kelurahan" style="display: none;">
			        <label for="kelurahan">Kelurahan</label>
			        <select name="kelurahan" id="kelurahan" class="form-control" required>
			        	<option value=""></option>
			        </select>
			      </div>
			      <button type="submit" id="insert" class="btn btn-primary btn-block">Submit</button>
			    </form>
		    </div>
	    </div>
    </div>

    <!-- Table -->
    <div class="container">
      <table id="table" class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Provinsi</th>
            <th scope="col">Kabupaten</th>
            <th scope="col">Kecamatan</th>
            <th scope="col">Kelurahan</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach ($wilayah as $value): ?>
          <tr>
            <th scope="row"><?= $no++ ?></th>
            <td><?= $value['provinsi'] ?></td>
            <td><?= $value['kabupaten_kota'] ?></td>
            <td><?= $value['kecamatan'] ?></td>
            <td><?= $value['kelurahan'] ?></td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
    <!-- /Table -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>

  <script type="text/javascript">
  	$(document).ready(function(){

  		// function Get Id Kota
  		$('#provinsi').on('change', function(){
  			$('.kota').slideDown();
  			var id_provinsi = $(this).val();

  			$.ajax({
  				type	: 'POST',
  				url		: '<?= base_url('welcome/get_kota') ?>',
  				data	: 'provinsi=' + id_provinsi,
  				success: function(html) {
  					$('#kota').html(html);
  				}
  			});

  		});


  		// function Get Id Kecamatan
  		$('#kota').on('change', function(){
  			$('.kecamatan').slideDown();
  			var id_kota = $(this).val();

  			$.ajax({
  				type	: 'POST',
  				url		: '<?= base_url('welcome/get_kecamatan') ?>',
  				data	: 'kota=' + id_kota,
  				success: function(html) {
  					$('#kecamatan').html(html);
  				}
  			});

  		});


  		// function Get Id Kelurahan
  		$('#kecamatan').on('change', function(){
  			$('.kelurahan').slideDown();
  			var id_kec = $(this).val();

  			$.ajax({
  				type	: 'POST',
  				url		: '<?= base_url('welcome/get_kelurahan') ?>',
  				data	: 'kecamatan=' + id_kec,
  				success: function(html) {
  					$('#kelurahan').html(html);
  				}
  			});

  		});

  	});
  </script>
</html>