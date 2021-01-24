<main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Invoice<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item"><a href="#">Checkout</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Invoice</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="checkout">
	                <div class="container">
            			<form action="<?= base_url('index.php/home/action_checkout')?>" method="post" id="form_checkout">
		                	<div class="row">
		                		<div class="col-lg-6">
		                			<h2 class="checkout-title">Invoice Details</h2><!-- End .checkout-title -->
		                			<div class="col-md-12">
                                        <div class="accordion accordion-icon" id="accordion-3">
                                            <div class="card">
                                                <div class="card-header" id="heading3-1">
                                                    <h2 class="card-title">
                                                        <a role="button" data-toggle="collapse" href="#collapse3-1" aria-expanded="true" aria-controls="collapse3-1">
                                                            <i class="icon-star-o"></i>Detail Order
                                                        </a>
                                                    </h2>
                                                </div><!-- End .card-header -->
                                                <div id="collapse3-1" class="collapse show" aria-labelledby="heading3-1" data-parent="#accordion-3">
                                                    <div class="card-body">
                                                    <table class="table table-summary">
                                                        <thead>
                                                            <tr>
                                                                <th>Product</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php
                                                            $total_harga = 0;
                                                            foreach ($barang as $c):
                                                                $total = $c->jumlah_barang*$c->harga_barang;
                                                            ?>
                                                            <tr>
                                                                <td><a href="<?= base_url('index.php/home/product/').$c->id_barang?>"><?= $c->nama_barang?></a> Rp.<?= $c->harga_barang?> x <?= $c->jumlah_barang?></td>
                                                                <td>Rp.<?=$total?></td>
                                                            </tr>
                                                            <?php

                                                            $total_harga += $total;
                                                            endforeach;
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
                                                                <td>Rp. <?= $invoice->total_bayar?></td>
                                                            </tr><!-- End .summary-total -->
                                                        </tbody>
                                                    </table><!-- End .table table-summary --> 
                                                    </div><!-- End .card-body -->
                                                </div><!-- End .collapse -->
                                            </div><!-- End .card -->

                                            <div class="card">
                                                <div class="card-header" id="heading3-2">
                                                    <h2 class="card-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse3-2" aria-expanded="false" aria-controls="collapse3-2">
                                                            <i class="icon-info-circle"></i>Information
                                                        </a>
                                                    </h2>
                                                </div><!-- End .card-header -->
                                                <div id="collapse3-2" class="collapse" aria-labelledby="heading3-2" data-parent="#accordion-3">
                                                    <div class="card-body">
                                                        <?= $checkout->notes?>
                                                    </div><!-- End .card-body -->
                                                </div><!-- End .collapse -->
                                            </div><!-- End .card -->

                                            <div class="card">
                                                <div class="card-header" id="heading3-3">
                                                    <h2 class="card-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse3-3" aria-expanded="false" aria-controls="collapse3-3">
                                                            <i class="icon-heart-o"></i>Review
                                                        </a>
                                                    </h2>
                                                </div><!-- End .card-header -->
                                                <div id="collapse3-3" class="collapse" aria-labelledby="heading3-3" data-parent="#accordion-3">
                                                    <div class="card-body">
                                                        Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. 
                                                    </div><!-- End .card-body -->
                                                </div><!-- End .collapse -->
                                            </div><!-- End .card -->
                                        </div><!-- End .accordion -->
                                    </div><!-- End .col-md-6 -->
	
		                		</div><!-- End .col-lg-9 -->
		                		<aside class="col-lg-6">
		                			<div class="summary">
		                				<h3 class="summary-title">Your Order Status</h3><!-- End .summary-title -->
                                        <div class="col-md-12">
                                            <div class="tabs-vertical">
                                                <ul class="nav nav-tabs flex-column" id="tabs-8" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link <?php if($checkout->status == 1){echo "active";}?>" id="tab-29-tab" data-toggle="tab" href="#tab-29" role="tab" aria-controls="tab-29" aria-selected="true">Dipesan</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link <?php if($checkout->status == 2){echo "active";}?>" id="tab-30-tab" data-toggle="tab" href="#tab-30" role="tab" aria-controls="tab-30" aria-selected="false">Dibayar</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link <?php if($checkout->status == 3){echo "active";}?>" id="tab-31-tab" data-toggle="tab" href="#tab-31" role="tab" aria-controls="tab-31" aria-selected="false">Diproses</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link <?php if($checkout->status == 4){echo "active";}?>" id="tab-32-tab" data-toggle="tab" href="#tab-32" role="tab" aria-controls="tab-32" aria-selected="false">Dikirm</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link <?php if($checkout->status == 5){echo "active";}?>" id="tab-33-tab" data-toggle="tab" href="#tab-32" role="tab" aria-controls="tab-32" aria-selected="false">Selesai</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content tab-content-border" id="tab-content-8">
                                                    <div class="tab-pane fade show active" id="tab-29" role="tabpanel" aria-labelledby="tab-29-tab">
                                                        <p>Pesanan sudah Dipesan, sedang menunggu pembayaran</p>
                                                    </div><!-- .End .tab-pane -->
                                                    <div class="tab-pane fade" id="tab-30" role="tabpanel" aria-labelledby="tab-30-tab">
                                                        <p>Nobis perspiciatis natus cum, sint dolore earum rerum tempora aspernatur numquam velit tempore omnis, delectus repellat facere voluptatibus nemo non fugiat consequatur repellendus! Enim, commodi, veniam ipsa voluptates quis amet.</p>
                                                    </div><!-- .End .tab-pane -->
                                                    <div class="tab-pane fade" id="tab-31" role="tabpanel" aria-labelledby="tab-31-tab">
                                                        <p>Perspiciatis quis nobis, adipisci quae aspernatur, nulla suscipit eum. Dolorum, earum. Consectetur pariatur repellat distinctio atque alias excepturi aspernatur nisi accusamus sed molestias ipsa numquam eius, iusto, aliquid, quis aut.</p>
                                                    </div><!-- .End .tab-pane -->
                                                    <div class="tab-pane fade" id="tab-32" role="tabpanel" aria-labelledby="tab-32-tab">
                                                        <p>Quis nobis, adipisci quae aspernatur, nulla suscipit eum. Dolorum, earum. Consectetur pariatur repellat distinctio atque alias excepturi aspernatur nisi accusamus sed molestias ipsa numquam eius, iusto, aliquid, quis aut.</p>
                                                    </div><!-- .End .tab-pane -->
                                                    <div class="tab-pane fade" id="tab-32" role="tabpanel" aria-labelledby="tab-32-tab">
                                                        <p>Quis nobis, adipisci quae aspernatur, nulla suscipit eum. Dolorum, earum. Consectetur pariatur repellat distinctio atque alias excepturi aspernatur nisi accusamus sed molestias ipsa numquam eius, iusto, aliquid, quis aut.</p>
                                                    </div><!-- .End .tab-pane -->
                                                </div><!-- End .tab-content -->
                                            </div><!-- End .tabs-vertical -->
                                        </div><!-- End .col-md-6 -->
		                			</div><!-- End .summary -->
		                		</aside><!-- End .col-lg-3 -->
		                	</div><!-- End .row -->
            			</form>
	                </div><!-- End .container -->
                </div><!-- End .checkout -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->