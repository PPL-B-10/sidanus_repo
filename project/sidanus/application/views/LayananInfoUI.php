<?php
session_start();
	if(!isset($_SESSION["role"]))
	{
		include("header.php");
	}else
	{
		if($_SESSION["role"]=="admin")
		{
			include("header3.php");
		} 
		if($_SESSION["role"]=="penjual")
		{
			include("header2.php");
		} 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cara Berbelanja</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link href="<?php echo base_url().'/assets/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'/assets/css/font-awesome.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'/assets/css/prettyPhoto.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'/assets/css/price-range.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'/assets/css/animate.css'; ?>" rel="stylesheet">
	<link href="<?php echo base_url().'/assets/css/main.css'; ?>" rel="stylesheet">
	<link href="<?php echo base_url().'/assets/css/responsive.css'; ?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <script src="<?php echo base_url().'/assets/js/jquery-1.11.2.min.js'; ?>"></script>
	<script src="<?php echo base_url().'/assets/js/bootstrap.min.js'; ?>"></script>
	<script src="<?php echo base_url().'/assets/js/main.js'; ?>"></script>
	<script src="<?php echo base_url().'/assets/js/modal.js'; ?>"></script>
	<script src="<?php echo base_url().'/assets/js/jquery.scrollUp.min.js'; ?>"></script>
    <script src="<?php echo base_url().'/assets/js/jquery.prettyPhoto.js'; ?>"></script>
    <script src="<?php echo base_url().'/assets/js/photogallery.js'; ?>"></script>
</head>
<body>
	<?php
		if($indi=="panduanbelanja")
		{
	?>
<div class="container">
    <div class="row">
      <br><br><br>
      <div class="col-lg-2">
        <br>
        <div class="btn-group-vertical" role="group" aria-label="...">
          <a href="#cari-produk" class="btn btn-default" role="button">Cari Produk</a>
          <a href="#beli-produk" class="btn btn-default" role="button">Beli Produk</a>
          <a href="#lihat-keranjang" class="btn btn-default" role="button">Lihat Keranjang</a>
          <a href="#cek-pesanan" class="btn btn-default" role="button">Cek Pesanan</a>
          <a href="#isi-review" class="btn btn-default" role="button">Isi Review</a>
        </div>
      </div>
      <div class="col-lg-8"><h1>Panduan SiDanus - Cara Berbelanja</h1>

        <h3 id="cari-produk">Cari Produk</h3>
        <p>Anda dapat mencari produk yang diinginkan dengan memasukkan keyword di search bar</p>
        <img src="" alt="">
        <p>Anda dapat mencari produk yang diinginkan sesuai dengan kategori produk</p>
        <img src="" alt="">

        <h3 id="beli-produk">Beli Produk</h3>
        <ol>
          <li>Pilih produk yang diinginkan</li>
          <li>Isi jumlah produk yang akan dibeli kemudian klik beli</li>
          <img src="" alt="">
          <img src="" alt="">
          <li>Produk yang diinginkan sudah masuk ke keranjang</li>
          <img src="" alt="">
        </ol>
        

        <h3 id="lihat-keranjang">Lihat Keranjang</h3>
        <ol>
          <li>Klik keranjang</li>
          <img src="" alt="">
          <li>Anda dapat melakukan perubahan kuantitas produk yang ingin di beli, hapus produk yang ada di keranjang dan melanjutkan ke pembayaran.</li>
          <img src="" alt="">
        </ol>
        

        <h3 id="cek-pesanan">Cek Pesanan</h3>
        <p>Pada halaman beranda SiDanus, isi form Status Pesanan, klik Lihat Status Pesanan</p>
        <img src="" alt="">
        <p></p>

        <h3 id="isi-review">Isi Review</h3>
        <p class="text-justify">Anda akan menerima email berisi link halaman isi Review setelah konfirmasi pembayaran yang anda lakukan berhasil. Link akan berisi form testimonial dan rating untuk setiap produk yang anda beli dan feedback untuk toko yang menjual produk yang anda beli. Anda dapat mengisi review setelah menerima barang yang dibeli.</p>
      </div>
    </div>
  </div>
  
  <?php
		}else if($indi=="panduanjual")
		{
	?>
	<div class="container">
    <div class="row">
      <br><br><br>
      <div class="col-lg-2">
        <br>
        <div class="btn-group-vertical" role="group" aria-label="...">
          <a href="#tambah-produk" class="btn btn-default" role="button">Tambah Produk</a>
          <a href="#ubah-status" class="btn btn-default" role="button">Ubah Status Pesanan</a>
          <a href="#terima-uang" class="btn btn-default" role="button">Terima Uang</a>
          <a href="#masuk-top-toko" class="btn btn-default" role="button">Cara Masuk Top Toko</a>
        </div>
      </div>
      <div class="col-lg-8"><h1>Panduan SiDanus - Cara Berjualan</h1>
    
        <h3 id="tambah-produk">Tambah Produk</h3>
        <ol>
          <li>Pilih tab produk yang ada pada halaman Profil Toko dan menu dropdown Toko</li>
          <img src="" alt="">
          <img src="" alt="">
          <li>Isi informasi produk yang akan ditambahkan. Kemudian simpan.</li>
          <li>Produk berhasil ditambahkan.</li>
        </ol>
        

        <h3 id="ubah-status">Ubah Status Pesanan</h3>
        <ol>
          <li>Pilih tab Data Transaksi pada menu dropdown toko.</li>
          <img src="" alt="">
          <li>Ubah status pesanan yang masuk ke Data Transaksi anda.</li>
          <img src="" alt="">
          <li>Simpan perubahan status pesanan.</li>
          <img src="" alt="">
        </ol>
        

        <h3 id="terima-uang">Terima Uang</h3>
        <p>Ketika pembeli berhasil melakukan konfirmasi pembayaran, uang akan otomatis ditransfer ke rekening yang anda masukkan di Profil Akun Toko anda.</p>

        <h3 id="masuk-top-toko">Cara Masuk Top Toko Minggu Ini</h3>
        <p>Tingkatkan transaksi toko anda per minggu.</p>

      </div>
    </div>
  </div>
  
  <?php
		}else if($indi=="faq")
		{
	?>
	<div class="container">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-10">
				<br><br><br>
				<h1>Panduan SiDanus - Tanya Jawab</h1>
				<p>Halaman ini menyediakan jawaban dari pertanyaan mengenai SiDanus</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				<a href="#1">Apakah saya harus membuat akun untuk berbelanja di SiDanus?</a><br>
				<a href="#2">Bagaimana cara saya untuk mendapatkan akun toko di SiDanus?</a><br>
				<a href="#3">Bagaimana cara saya untuk mengubah data pribadi saya di SiDanus?</a><br>
				<a href="#4">Apa yang terjadi setelah saya menekan tombol "Lanjut ke Pembayaran"?</a><br>
				<a href="#5">Apakah Saya bisa mengganti atau membatalkan pesanan saya?</a><br>
				<a href="#6">Bagaimana bila saya menerima barang yang berbeda dengan yang telah saya pesan?</a><br>
				<a href="#7">Apa arti status Pesanan Sedang Diproses?</a><br>
				<a href="#8">Apa arti status Pesanan Dalam Pengiriman?</a><br>
				<a href="#9">Apa arti status Pesanan Telah Terkirim?</a><br>
				<br>
				<br>
				<br>
				<ul class="media-list">
				  <li class="media">
				    <div class="media-body">
				      	<h4 id="1" class="media-heading">Apakah saya harus membuat akun untuk berbelanja di SiDanus?</h4>
						<p class="text-justify">Tidak. Anda cukup langsung melakukan pembelian dengan menggunakan button Beli pada produk yang diinginkan. Nantinya Anda dapat melihat ataupun mengubah isi keranjang pembelian Anda, kemudian transaksi Anda akan diproses ke form pembelian.</p><br>
				    </div>
				  </li>
				  <li class="media">
				    <div class="media-body">
				      	<h4 id="2" class="media-heading">Bagaimana cara saya untuk mendapatkan akun toko di SiDanus?</h4>
						<p class="text-justify">Anda dapat melakukan registrasi dengan meng-klik link"Log in" pada bagian pojok kanan atas halaman website. Perlu diperhatikan bahwa HANYA mahasiswa/i Universitas Indonesia yang dapat membuat akun toko di SiDanus. Setelah meng-klik “Login”, Anda akan diarahkan ke verifikasi SSO. Setelah verifikasi Anda valid, sistem akan redirect ke form pembuatan akun.</p><br>
				    </div>
				  </li>
				<li class="media">
				    <div class="media-body">
				      	<h4 id="3" class="media-heading">Bagaimana cara saya untuk mengubah data pribadi saya di SiDanus?</h4>
						<p class="text-justify">Anda dapat login dan akses halaman "Ubah Profil" untuk mengubah profil pribadi atau data lainnya.	</p> <br>
				    </div>
				</li>
				<li class="media">
				    <div class="media-body">
				      	<h4 id="4" class="media-heading">Apa yang terjadi setelah saya menekan tombol "Lanjut ke Pembayaran"?</h4>
						<p class="text-justify">Barang hanya akan dikirim setelah kami menerima pembayaran anda. Saat anda telah menyelesaikan proses pembayaran, anda melakukan konfirmasi dengan meng-klik "Konfirmasi Pembayaran" pada halaman beranda. Saat proses konfirmasi selesai, kami akan segera memproses pesanan anda dan mengirimkannya ke alamat yang telah anda cantumkan.</p><br>
				    </div>
				 </li>
				<li class="media">
				    <div class="media-body">
				      	<h4 id="4" class="media-heading">Apa yang terjadi setelah saya menekan tombol "Lanjut ke Pembayaran"?</h4>
						<p class="text-justify">Barang hanya akan dikirim setelah kami menerima pembayaran anda. Saat anda telah menyelesaikan proses pembayaran, anda melakukan konfirmasi dengan meng-klik "Konfirmasi Pembayaran" pada halaman beranda. Saat proses konfirmasi selesai, kami akan segera memproses pesanan anda dan mengirimkannya ke alamat yang telah anda cantumkan.</p><br>
				    </div>
				  </li>
				  <li class="media">
				    <div class="media-body">
				      	<h4 id="5" class="media-heading">Apakah Saya bisa mengganti atau membatalkan pesanan saya?</h4>
						<p class="text-justify">Jika anda belum melakukan pembayaran ke rekening kami, anda masih bisa untuk membatalkan pesanan anda dengan melakukan pesanan lainnya. Namun, begitu anda telah melakukan pembayaran, pesanan anda tidak bisa untuk dibatalkan maupun diganti.</p><br>
				    </div>
				  </li>
				  <li class="media">
				    <div class="media-body">
				      	<h4 id="6" class="media-heading">Bagaimana bila saya menerima barang yang berbeda dengan yang telah saya pesan?</h4>
						<p class="text-justify">Jika hal ini terjadi, anda dapat menghubungi kami untuk mengatur penggantiannya.</p><br>
				    </div>
				  </li>
				  <li class="media">
				    <div class="media-body">
				      	<h4 id="7" class="media-heading">Apa arti status Pesanan Sedang Diproses?</h4>
						<p class="text-justify">Barang yang Anda pesan sudah masuk ke dalam data transaksi penjual.</p><br>
				    </div>
				  </li>
				  <li class="media">
				    <div class="media-body">
				      	<h4 id="8" class="media-heading">Apa arti status Pesanan Dalam Pengiriman?</h4>
						<p class="text-justify">Barang sudah dikirim penjual dan sedang dalam proses pengiriman menuju lokasi Anda.</p><br>
				    </div>
				  </li>
				  <li class="media">
				    <div class="media-body">
				      	<h4 id="9" class="media-heading">Apa arti status Pesanan Telah Terkirim?</h4>
						<p class="text-justify">Barang telah diterima pemesan.</p>
 						<br>
				    </div>
				  </li>
				

			</div>
			<div class="col-lg-2"></div>
		</div>
	</div>
	
	<?php 
		}else if($indi =="pembayaran")
		{
	?>
	<div class="container">
    <div class="row">
      <br><br><br>
      <div class="col-lg-2">
        <br>
        <div class="btn-group-vertical" role="group" aria-label="...">
          <a href="#pembayaran" class="btn btn-default btn-block" role="button" style="width:150px;">Pembayaran</a>
          <a href="#konfirmasi" class="btn btn-default btn-block" role="button" style="width:150px;">Konfirmasi</a>
        </div>
      </div>
      <div class="col-lg-8"><h1>Panduan SiDanus - Pembayaran</h1>
        <h3 id="pembayaran">Pembayaran</h3>
        <ol>
          <li>Pilih Lanjut ke Pembayaran dari keranjang anda.</li>
          <li>Isi data Pengiriman.</li>
          <img src="" alt="">
          <li>Pilih Metode Pembayaran: Bank Transfer atau Cash On Delivery.</li>
          <img src="" alt="">
          <li>Klik Konfirmasi Pesanan. Halaman struk pesanan akan ditampilkan. Anda akan mendapatkan email berisi detil pesanan anda.</li>
        </ol>
        

        <h3 id="konfirmasi">Konfirmasi Pembayaran</h3>
        <ol>
          <li>Pada halaman beranda SiDanus, Klik Konfirmasi Pembayaran. Isi Form yang disediakan.</li>
          <img src="" alt="">
          <li>Cek email anda untuk mengetahui status konfirmasi pembayaran anda. Email akan berisi status konfirmasi pembayaran beserta link halaman status konfirmasi pembayaran.</li>
        </ol>
        
      </div>
    </div>
  </div>
  <?php 
		}else if($indi=="kontak")
		{
	?>
	<div class="container">
    <div class="row">
      <br><br><br>
      <div class="col-lg-1"></div>
      <div class="col-lg-8"><h1>Hubungi Kami</h1></div>
    </div>
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-lg-7"><br>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3965.227961124951!2d106.82866800000001!3d-6.364537!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec19efcdeb55%3A0x9cd2f96e04212361!2sUniversitas+Indonesia+-+Fakultas+Ilmu+Komputer!5e0!3m2!1sen!2s!4v1428817935899" width="950" height="400" frameborder="0" style="border:0"></iframe>
      </div>
      <div class="col-lg-3">
        <br><br><br><br>
        <div class="panel panel-warning">
          <div class="panel-body">
            <ul class="media-list">
              <li class="media">
                <div class="media-body">
                  <address>
                    <a href="mailto:#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> contact@sidanus.com</a>
                  </address>
                </div>
              </li>
              <li class="media">
                <div class="media-body">
                  <address>
                 
                    <strong><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Fakultas Ilmu Komputer</strong>
                    <br>Universitas Indonesia
                    <br>Depok, Jawa Barat
                 
                  </address>
                </div>
              </li>
              <li class="media">
              <div class="media-body">
                <a href="#">
                  <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Unduh Project Plan SiDanus
                </a>
              </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>
	
	<?php
		}else if($indi=="kebijakan")
		{
	?>
	<div class="container">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-10">
				<br><br><br>
				<h1>Panduan SiDanus - Kebijakan Privasi</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				<p class="text-justify">
					<br>Kebijakan privasi pada SiDanus adalah pedoman yang mengatur dan melindungi penggunaan data dan informasi penting para pengguna situs SiDanus. Data dan informasi yang telah dikumpulkan pada saat mendaftar, mengakses dan menggunakan layanan di SiDanus.
					<br><br>Kebijakan-kebijakan tersebut adalah:
					<ul>
						<li>SiDanus melindungi segala informasi yang diberikan pengguna pada saat pendaftaran, mengakses, dan menggunakan seluruh layanan SiDanus.</li>
		 				<li>SiDanus melindungi segala hak cipta dan merek dari pengguna situs baik itu berupa foto, username, logo, dan lain-lain.</li>
		 				<li>SiDanus berhak menggunakan data dan informasi para pengguna situs demi meningkatkan mutu dan pelayanan di SiDanus.</li>
		 				<li>SiDanus tidak bertanggung jawab atas pertukaran data yang dilakukan sendiri antar pengguna situs.</li>
		 				<li>SiDanus berhak menutup toko penjual jika penjual tidak melakukan login selama 6 (enam) bulan terhitung sejak terakhir kali login.</li>
					</ul>
				</p>
				
				
<br><br><br>
			</div>
		</div>

	</div>
	<?php
		}
	?>


<?php include("footer.php"); ?>
<a href="#top" id="scrollUp" style="position: fixed; z-index:2147483647; display: block;">
        <i class="fa fa-angle-up"></i>
    </a>
</body>
</html>