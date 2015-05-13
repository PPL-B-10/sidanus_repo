<footer id="footer"><!--Footer-->
<?php
// $base_url = 'http://dev.yoursite.com/'; if you work locally and have defined this in your vhosts file
?>
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="single-widget">
							<h2>Apa itu SiDanus?</h2>
							<p class="text-justify">SiDanus adalah toko online dimana penjualnya dikhususkan untuk mahasiswa UI. SiDanus bertujuan untuk mengakomodasi mahasiswa UI yang memiliki usaha untuk berjualan secara online dalam satu media yang terintegrasi.</p>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Panduan SiDanus</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="<?php echo base_url() ?>index.php/homecontroller/showPanduanJual">Cara Berjualan</a></li>
								<li><a href="<?php echo base_url() ?>index.php/homecontroller/showPanduanBelanja">Cara Berbelanja</a></li>
								<li><a href="<?php echo base_url() ?>index.php/homecontroller/showPembayaran">Pembayaran</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<br><br><br>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="<?php echo base_url() ?>index.php/homecontroller/showKebijakan">Kebijakan Privasi</a></li>
								<li><a href="<?php echo base_url() ?>index.php/homecontroller/showFAQ">Tanya Jawab</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<br><br>
							<a href="<?php echo base_url() ?>index.php/homecontroller/showKontak" class="btn btn-default hubungi-kami">Hubungi Kami</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">&copy; 2015 SiDanus. All rights reserved.</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->