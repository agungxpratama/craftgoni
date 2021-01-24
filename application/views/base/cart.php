<main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="cart">
	                <div class="container">
                        <?php
                                    if ($this->session->flashdata('flash_message')) {
                                    ?>
                                    <div class="alert alert-<?= $this->session->flashdata('type'); ?>" role="alert">
                                        <?= $this->session->flashdata('flash_message'); ?>silahkan cek <a href="<?= base_url('index.php/home/checkout/')?>" class="text-white btn btn-success">pesanan anda</a>
                                    </div>
                                    <?php
                                    }
                                ?>
	                	<div class="row">
	                		<div class="col-lg-9">
	                			<table class="table table-cart table-mobile">
									<thead>
										<tr>
											<th>Product</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Total</th>
											<th></th>
										</tr>
									</thead>

									<tbody>
                                        <?php
                                        $total_harga = 0;
                                        foreach ($cart as $c):
                                            $total = $c->jumlah_barang*$c->harga_barang;
                                        ?>
										<tr>
											<td class="product-col">
												<div class="product">
													<figure class="product-media">
														<a href="#">
															<img src="<?= base_url('assets_admin/'.$c->gambar); ?>" alt="Product image">
														</a>
													</figure>

													<h3 class="product-title">
														<a href="<?= base_url('index.php/home/product/').$c->id_barang?>"><?= $c->nama_barang?></a>
													</h3><!-- End .product-title -->
												</div><!-- End .product -->
											</td>
											<td class="price-col">Rp.<?= $c->harga_barang?></td>
											<td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <input type="number" class="form-control" value="<?= $c->jumlah_barang?>" min="1" max="100" step="1" data-decimals="0" required>
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
											<td class="total-col">Rp.<?=$total?></td>
											<td class="remove-col"><button class="btn-remove"><a href="<?= base_url('index.php/home/del_item_cart/').$c->id_cart?>"><i class="icon-close"></i></a></button></td>
                                        </tr>
                                        <?php

                                        $total_harga += $total;
                                        endforeach;
                                        ?>
									</tbody>
								</table><!-- End .table table-wishlist -->

	                			<div class="cart-bottom">
			            			<!-- <div class="cart-discount"> -->
			            				<!-- <form action="#"> -->
			            					<!-- <div class="input-group"> -->
				        						<!-- <input type="text" class="form-control" required placeholder="coupon code"> -->
				        						<!-- <div class="input-group-append"> -->
													<!-- <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button> -->
												<!-- </div>.End .input-group-append -->
			        						<!-- </div>End .input-group -->
			            				<!-- </form> -->
			            			<!-- </div>End .cart-discount -->

			            			<a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a>
		            			</div><!-- End .cart-bottom -->
	                		</div><!-- End .col-lg-9 -->
	                		<aside class="col-lg-3">
	                			<div class="summary summary-cart">
	                				<h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->
                                        <form id="checkout_form" action="<?= base_url('index.php/home/action_cart'); ?>" method="post">
                                            <table class="table table-summary">
                                                <tbody>
                                                    <tr class="summary-subtotal">
                                                        <td>Subtotal:</td>
                                                        <td>Rp.<?= $total_harga?></td>
                                                    </tr><!-- End .summary-subtotal -->
                                                    <tr class="summary-shipping">
                                                        <td>Shipping:</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
    
                                                    <tr class="summary-shipping-row">
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="free-shipping" name="shipping" value="1" class="custom-control-input" required>
                                                                <label class="custom-control-label" for="free-shipping">Free Shipping</label>
                                                            </div><!-- End .custom-control -->
                                                        </td>
                                                        <td>Rp. 0</td>
                                                    </tr><!-- End .summary-shipping-row -->
    
                                                    <tr class="summary-shipping-row">
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="standart-shipping" name="shipping" value="2" class="custom-control-input" required>
                                                                <label class="custom-control-label" for="standart-shipping">Standart:</label>
                                                            </div><!-- End .custom-control -->
                                                        </td>
                                                        <td>Rp. 10000</td>
                                                    </tr><!-- End .summary-shipping-row -->
    
                                                    <tr class="summary-shipping-row">
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="express-shipping" name="shipping" value="3" class="custom-control-input" required>
                                                                <label class="custom-control-label" for="express-shipping">Express:</label>
                                                            </div><!-- End .custom-control -->
                                                        </td>
                                                        <td>Rp. 25000</td>
                                                    </tr><!-- End .summary-shipping-row -->
    
                                                    <!-- <tr class="summary-shipping-estimate">
                                                        <td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a></td>
                                                        <td>&nbsp;</td> -->
                                                    <!-- </tr>End .summary-shipping-estimate -->
    
                                                    <tr class="summary-total">
                                                        <td>Total:</td>
                                                        <td>Rp.<?= $total_harga?></td>
                                                        <input type="hidden" name="total_harga" value="<?= $total_harga?>">
                                                    </tr><!-- End .summary-total -->
                                                </tbody>
                                            </table><!-- End .table table-summary -->
                                            <!-- <input type="submit"> -->
                                        </form>
                                        <script>
                                        function checkout() {
                                        document.getElementById("checkout_form").submit();
                                        }
                                        </script>
	                				<button href="#" class="btn btn-outline-primary-2 btn-order btn-block" onclick="checkout()">PROCEED TO CHECKOUT</button>
	                			</div><!-- End .summary -->

		            			<a href="<?= base_url('index.php/home/shop'); ?>" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
	                		</aside><!-- End .col-lg-3 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .cart -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->