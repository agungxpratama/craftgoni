<main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Pesanan<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="container">
					<table class="table table-wishlist table-mobile">
						<thead>
							<tr>
								<th>Product</th>
								<th>Price</th>
								<th>Status</th>
								<th></th>
								<th></th>
							</tr>
						</thead>

						<tbody>
                            <?php
                                foreach ($pesanan as $p) {
                                    ?>
                                <tr>
								<td class="product-col">
									<div class="product">
										<!-- <figure class="product-media">
											<a href="#">
												<img src="assets/images/products/table/product-2.jpg" alt="Product image">
											</a>
										</figure> -->

										<h3 class="product-title">
                                            <a href="#"><?= $p->tanggal?></a>
                                            <br>Jumlah Item : <?=$p->jumlah_item?>
										</h3><!-- End .product-title -->
									</div><!-- End .product -->
								</td>
								<td class="price-col">Rp. <?= $p->total_bayar?></td>
								<td class="stock-col"><span class="in-stock">
									<?php
										if ($p->status == 0) {
											echo "Error";
										}elseif ($p->status == 1) {
											echo "Dipesan";
										}elseif ($p->status == 2) {
											echo "Dibayar";
										}
									?>
								</span></td>
								<td class="action-col">
									<a href="<?= base_url('index.php/home/lihat_pesanan/'.$p->id_invoice)?>" class="btn btn-block btn-outline-primary-2"><i class="icon-search"></i>Cek</a>
								</td>
								<td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>
							</tr>
                            <?php
                                }
                            ?>
						</tbody>
					</table><!-- End .table table-wishlist -->
	            	<div class="wishlist-share">
	            		<div class="social-icons social-icons-sm mb-2">
	            			<label class="social-label">Share on:</label>
	    					<a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
	    					<a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
	    					<a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
	    					<a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
	    					<a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
	    				</div><!-- End .soial-icons -->
	            	</div><!-- End .wishlist-share -->
            	</div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->