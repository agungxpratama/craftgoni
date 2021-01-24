<main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Checkout<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="checkout">
	                <div class="container">
            			<form action="<?= base_url('index.php/home/action_checkout')?>" method="post" id="form_checkout">
		                	<div class="row">
		                		<div class="col-lg-9">
		                			<h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
		                				<div class="row">
		                					<div class="col-sm-6">
		                						<label>First Name *</label>
		                						<input type="text" class="form-control" name="first_name" value="<?= $address->nama_depan ?? ''?>" required>
		                					</div><!-- End .col-sm-6 -->

		                					<div class="col-sm-6">
		                						<label>Last Name *</label>
		                						<input type="text" class="form-control" name="last_name" value="<?= $address->nama_belakang ?? ''?>" required>
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->

	            						<label>Street address *</label>
	            						<input type="text" class="form-control" placeholder="House number and Street name" name="alamat_jalan" value="<?= $address->alamat_jalan ?? ''?>" required>
	            						<input type="text" class="form-control" placeholder="Appartments, suite, unit etc ..." name="alamat_jalan_tam" required>

	            						<div class="row">
		                					<div class="col-sm-6">
		                						<label>Town / City *</label>
		                						<input type="text" class="form-control" name="kota" value="<?= $address->alamat_kota ?? ''?>" required>
		                					</div><!-- End .col-sm-6 -->

		                					<div class="col-sm-6">
		                						<label>State / County *</label>
		                						<input type="text" class="form-control" name="negara" value="<?= $address->alamat_negara ?? ''?>" required>
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->

		                				<div class="row">
		                					<div class="col-sm-6">
		                						<label>Postcode / ZIP *</label>
		                						<input type="text" class="form-control" name="kode_pos" value="<?= $address->kode_pos ?? ''?>" required>
		                					</div><!-- End .col-sm-6 -->

		                					<div class="col-sm-6">
		                						<label>Phone *</label>
		                						<input type="tel" class="form-control" name="nomor_telepon" value="<?= $address->nomor_telepon ?? ''?>" required>
		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->

	                					<label>Email address *</label>
	        							<input type="email" class="form-control" name="email" value="<?= $address->alamat_email ?? ''?>" required>

	        							<!-- <div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="checkout-create-acc">
											<label class="custom-control-label" for="checkout-create-acc">Create an account?</label>
                                        </div> -->
                                        <!-- End .custom-checkbox -->

	                					<label>Order notes (optional)</label>
	        							<textarea class="form-control" cols="30" rows="4" name="notes" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
		                		</div><!-- End .col-lg-9 -->
		                		<aside class="col-lg-3">
		                			<div class="summary">
		                				<h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

		                				<table class="table table-summary">
		                					<thead>
		                						<tr>
		                							<th>Product</th>
		                							<th>Total</th>
		                						</tr>
		                					</thead>

		                					<tbody>
                                                <?php
                                                    foreach ($cart as $c) {
                                                        ?>
                                                        
                                                        <tr>
                                                            <td><a href="#"><?= $c->nama_barang?></a></td>
                                                            <td>Rp.<?= $c->harga_barang?> x <?= $c->jumlah_barang?></td>
                                                        </tr>
                                                        
                                                        <?php
                                                    }
                                                ?>
		                						<tr class="summary-subtotal">
		                							<td>Subtotal:</td>
		                							<td>Rp. <?= $checkout->jumlah_bayar?></td>
		                						</tr><!-- End .summary-subtotal -->
		                						<tr>
		                							<td>Shipping:</td>
		                							<td>
                                                    <?php
                                                        if ($checkout->id_shipping == 1) {
                                                            echo "Free shipping";
                                                        }elseif ($checkout->id_shipping == 2) {
                                                            echo "Standard";
                                                        }elseif ($checkout->id_shipping == 3) {
                                                            echo "Express";
                                                        }
                                                    ?>
                                                    </td>
		                						</tr>
		                						<tr class="summary-total">
		                							<td>Total:</td>
		                							<td>
                                                    <?php
                                                        $total = $checkout->jumlah_bayar;
                                                        $grand_total = 0;
                                                        if ($checkout->id_shipping == 1) {
                                                            $grand_total = $total;
                                                        }elseif ($checkout->id_shipping == 2) {
                                                            $grand_total = $total + 10000;
                                                        }elseif ($checkout->id_shipping == 3) {
                                                            $grand_total = $total + 25000;
                                                        }
                                                    ?>
                                                    Rp. <?= $grand_total?>
                                                    </td>
                                                    <input type="hidden" name="harga_total" value="">
                                                    <input type="hidden" name="harga_grand_total" value="<?= $grand_total?>">
                                                    <input type="hidden" name="jumlah_item" value="<?= $count_cart?>">
                                                    <input type="hidden" name="id_checkout" value="<?= $checkout->id_checkout?>">
		                						</tr><!-- End .summary-total -->
		                					</tbody>
		                				</table><!-- End .table table-summary -->

		                				<div class="accordion-summary" id="accordion-payment">
										    <div class="card">
										        <div class="card-header" id="heading-1">
										            <h2 class="card-title">
														<!-- <input type="radio" role="button"></input>	 -->
										                <input type="radio" name="method" value="1" role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1" required>
															Direct bank transfer
														</input>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
										            <div class="card-body">
										                Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
											</div><!-- End .card -->
											<br>

										    <div class="card">
										        <div class="card-header" id="heading-3">
										            <h2 class="card-title">
										                <input type="radio" name="method" value="2" class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3" required>
										                    Cash on delivery (COD)
														</input>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
										            <div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. 
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->

										    
										</div><!-- End .accordion -->

		                				<button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
		                					<span class="btn-text">Place Order</span>
		                					<span class="btn-hover-text">Proceed to Checkout</span>
		                				</button>
		                			</div><!-- End .summary -->
		                		</aside><!-- End .col-lg-3 -->
		                	</div><!-- End .row -->
            			</form>
	                </div><!-- End .container -->
                </div><!-- End .checkout -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->