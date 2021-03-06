 <!-- ======= Intro Section ======= -->
    <section id="intro">

        <div class="intro-text">
            <h2>Selamat Datang di <?= $title ?></h2>
            <p>Sedot Septic tank Banten</p>
            <a href="#about" class="btn-get-started scrollto">Mulai Jelajah</a>
        </div>

        <div class="product-screens">

            <div class="product-screen-1 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="0.6s">
                <img src="<?= base_url('public/img/banner/banner.png'); ?>" alt="" style="width: 270px; height: 300px">
            </div>

            <div class="product-screen-2 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.6s">
                <img src="<?= base_url('public/img/banner/banner1.jpg'); ?>" alt="" style="width: 270px; height: 300px;">
            </div>

            <div class="product-screen-3 wow fadeInUp" data-wow-duration="0.6s">
                <img src="<?= base_url('public/img/banner/banner2.jpg'); ?>" alt="" style="width: 270px; height: 300px">
            </div>

        </div>

    </section><!-- End Intro Section -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="section-bg">
            <div class="container-fluid">
                <div class="section-header">
                    <h3 class="section-title">Tentang Kami</h3>
                </div>

                <div class="row">
                    <div class="col-lg-6 about-img wow fadeInLeft">
                        <img src="<?= base_url('public/img/banner/banner2.jpg'); ?>" alt="">
                    </div>

                    <div class="col-lg-6 content wow fadeInRight">
                       <p>
                            E - jasa Sedot septic tank banten adalah spesialis mengatasi masalah wc mampet, saluran mampet, pipa mampet, sedot wc dan kuras wc yang berlokasi di Banten. Kami hadir di tengah masyarakat Banten, menawarkan jasa dan memberikan layanan bergaransi dengan harga murah untuk anda yang mempunyai keluhan atau masalah pada saluran pipa pembuangan baik itu mampet, lambat ataupun tersumbat, limbah dan lain sebagainya.
                       </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Featuress Section ======= -->
        <section id="features">
            <div class="container">

                <div class="row">

                    <div class="col-lg-8 offset-lg-4">
                        <div class="section-header wow fadeIn" data-wow-duration="1s">
                            <h3 class="section-title">Layanan Kami</h3>
                            <span class="section-divider"></span>
                        </div>
                    </div>

                   <!--  <div class="col-lg-4 col-md-5 features-img">
                        <img src="assets/img/product-features.png" alt="" class="wow fadeInLeft">
                    </div> -->

                    <div class="col-lg-12 col-md-7 ">
                        
                        <div class="row">
                          <?php foreach ($barang as $brg) : ?>
                             <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card h-100 shadow">
                                   <a href="<?= base_url('home/detail/') . $brg['id_barang']; ?>"><img class="card-img-top" src="<?= base_url('public/img/upload/') . $brg['gambar']; ?>"></a>
                                   <div class="card-body mx-0 my-0 px-0 py-0 p-2 text-center">
                                      <h6>
                                         <?= $brg['nama_barang']; ?>
                                      </h6>
                                      <small class="card-subtitle text-muted">Rp. <?= number_format($brg['harga']); ?></small><br>
                                      <div class="d-inline d-flex mt-3 justify-content-center">
                                          <button class="tambah_keranjang btn btn-sm btn-dark" data-gambar="<?= $brg['gambar']; ?>" data-produkid="<?= $brg['id_barang']; ?>" data-produknama="<?= $brg['nama_barang']; ?>" data-produkharga="<?= $brg['harga']; ?>" name="pesan">Pesan</button>

                                         <input style="text-align: center; margin-left: 15px;" type="number" id="<?= $brg['id_barang']; ?>" name="quantity" min="0" max="100" value="1" hidden>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          <?php endforeach; ?>

                       </div>
                       
                    </div>

                </div>

            </div>

        </section><!-- End Featuress Section -->

        <!-- ======= Advanced Featuress Section ======= -->
        <!-- <section id="advanced-features">

            <div class="features-row section-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <img class="advanced-feature-img-right wow fadeInRight" src="assets/img/advanced-feature-1.jpg" alt="">
                            <div class="wow fadeInLeft">
                                <h2>Duis aute irure dolor in reprehenderit in voluptate velit esse</h2>
                                <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="features-row">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <img class="advanced-feature-img-left" src="assets/img/advanced-feature-2.jpg" alt="">
                            <div class="wow fadeInRight">
                                <h2>Duis aute irure dolor in reprehenderit in voluptate velit esse</h2>
                                <i class="ion-ios-paper-outline" class="wow fadeInRight" data-wow-duration="0.5s"></i>
                                <p class="wow fadeInRight" data-wow-duration="0.5s">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                <i class="ion-ios-color-filter-outline wow fadeInRight" data-wow-delay="0.2s" data-wow-duration="0.5s"></i>
                                <p class="wow fadeInRight" data-wow-delay="0.2s" data-wow-duration="0.5s">Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                                <i class="ion-ios-barcode-outline wow fadeInRight" data-wow-delay="0.4" data-wow-duration="0.5s"></i>
                                <p class="wow fadeInRight" data-wow-delay="0.4s" data-wow-duration="0.5s">Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="features-row section-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <img class="advanced-feature-img-right wow fadeInRight" src="assets/img/advanced-feature-3.jpg" alt="">
                            <div class="wow fadeInLeft">
                                <h2>Duis aute irure dolor in reprehenderit in voluptate velit esse</h2>
                                <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                <i class="ion-ios-albums-outline"></i>
                                <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --><!-- End Advanced Featuress Section -->

        <!-- ======= Call To Action Section ======= -->
       <!--  <section id="call-to-action">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 text-center text-lg-left">
                        <h3 class="cta-title">Call To Action</h3>
                        <p class="cta-text"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div class="col-lg-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" href="#">Call To Action</a>
                    </div>
                </div>

            </div>
        </section> --><!-- End Call To Action Section -->

        <!-- ======= More Features Section ======= -->
       <!--  <section id="more-features" class="section-bg">
            <div class="container">

                <div class="section-header">
                    <h3 class="section-title">More Features</h3>
                    <span class="section-divider"></span>
                    <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="box wow fadeInLeft">
                            <div class="icon"><i class="ion-ios-stopwatch-outline"></i></div>
                            <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident etiro rabeta lingo.</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="box wow fadeInRight">
                            <div class="icon"><i class="ion-ios-bookmarks-outline"></i></div>
                            <h4 class="title"><a href="">Dolor Sitema</a></h4>
                            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata nodera clas.</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="box wow fadeInLeft">
                            <div class="icon"><i class="ion-ios-heart-outline"></i></div>
                            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur trinige zareta lobur trade.</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="box wow fadeInRight">
                            <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
                            <h4 class="title"><a href="">Magni Dolores</a></h4>
                            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum rideta zanox satirente madera</p>
                        </div>
                    </div>

                </div>
            </div>
        </section> --><!-- End More Features Section -->

        <!-- ======= Clients Section ======= -->
       <!--  <section id="clients">
            <div class="container">

                <div class="row wow fadeInUp">

                    <div class="col-md-2">
                        <img src="assets/img/clients/client-1.png" alt="">
                    </div>

                    <div class="col-md-2">
                        <img src="assets/img/clients/client-2.png" alt="">
                    </div>

                    <div class="col-md-2">
                        <img src="assets/img/clients/client-3.png" alt="">
                    </div>

                    <div class="col-md-2">
                        <img src="assets/img/clients/client-4.png" alt="">
                    </div>

                    <div class="col-md-2">
                        <img src="assets/img/clients/client-5.png" alt="">
                    </div>

                    <div class="col-md-2">
                        <img src="assets/img/clients/client-6.png" alt="">
                    </div>

                </div>
            </div>
        </section> --><!-- End Clients Section -->

        <!-- ======= Pricing Section ======= -->
       <!--  <section id="pricing" class="section-bg">
            <div class="container">

                <div class="section-header">
                    <h3 class="section-title">Pricing</h3>
                    <span class="section-divider"></span>
                    <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                </div>

                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="box wow fadeInLeft">
                            <h3>Free</h3>
                            <h4><sup>$</sup>0<span> month</span></h4>
                            <ul>
                                <li><i class="ion-android-checkmark-circle"></i> Quam adipiscing vitae proin</li>
                                <li><i class="ion-android-checkmark-circle"></i> Nec feugiat nisl pretium</li>
                                <li><i class="ion-android-checkmark-circle"></i> Nulla at volutpat diam uteera</li>
                                <li><i class="ion-android-checkmark-circle"></i> Pharetra massa massa ultricies</li>
                                <li><i class="ion-android-checkmark-circle"></i> Massa ultricies mi quis hendrerit</li>
                            </ul>
                            <a href="#" class="get-started-btn">Get Started</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="box featured wow fadeInUp">
                            <h3>Business</h3>
                            <h4><sup>$</sup>29<span> month</span></h4>
                            <ul>
                                <li><i class="ion-android-checkmark-circle"></i> Quam adipiscing vitae proin</li>
                                <li><i class="ion-android-checkmark-circle"></i> Nec feugiat nisl pretium</li>
                                <li><i class="ion-android-checkmark-circle"></i> Nulla at volutpat diam uteera</li>
                                <li><i class="ion-android-checkmark-circle"></i> Pharetra massa massa ultricies</li>
                                <li><i class="ion-android-checkmark-circle"></i> Massa ultricies mi quis hendrerit</li>
                            </ul>
                            <a href="#" class="get-started-btn">Get Started</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="box wow fadeInRight">
                            <h3>Developer</h3>
                            <h4><sup>$</sup>49<span> month</span></h4>
                            <ul>
                                <li><i class="ion-android-checkmark-circle"></i> Quam adipiscing vitae proin</li>
                                <li><i class="ion-android-checkmark-circle"></i> Nec feugiat nisl pretium</li>
                                <li><i class="ion-android-checkmark-circle"></i> Nulla at volutpat diam uteera</li>
                                <li><i class="ion-android-checkmark-circle"></i> Pharetra massa massa ultricies</li>
                                <li><i class="ion-android-checkmark-circle"></i> Massa ultricies mi quis hendrerit</li>
                            </ul>
                            <a href="#" class="get-started-btn">Get Started</a>
                        </div>
                    </div>

                </div>
            </div>
        </section> --><!-- End Pricing Section -->

        <!-- ======= Frequently Asked Questions Section ======= -->
        <!-- <section id="faq">
            <div class="container">

                <div class="section-header">
                    <h3 class="section-title">Frequently Asked Questions</h3>
                    <span class="section-divider"></span>
                    <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                </div>

                <ul id="faq-list" class="wow fadeInUp">
                    <li>
                        <a data-toggle="collapse" class="collapsed" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="ion-android-remove"></i></a>
                        <div id="faq1" class="collapse" data-parent="#faq-list">
                            <p>
                                Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-toggle="collapse" href="#faq2" class="collapsed">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="ion-android-remove"></i></a>
                        <div id="faq2" class="collapse" data-parent="#faq-list">
                            <p>
                                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-toggle="collapse" href="#faq3" class="collapsed">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="ion-android-remove"></i></a>
                        <div id="faq3" class="collapse" data-parent="#faq-list">
                            <p>
                                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-toggle="collapse" href="#faq4" class="collapsed">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="ion-android-remove"></i></a>
                        <div id="faq4" class="collapse" data-parent="#faq-list">
                            <p>
                                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-toggle="collapse" href="#faq5" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="ion-android-remove"></i></a>
                        <div id="faq5" class="collapse" data-parent="#faq-list">
                            <p>
                                Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-toggle="collapse" href="#faq6" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="ion-android-remove"></i></a>
                        <div id="faq6" class="collapse" data-parent="#faq-list">
                            <p>
                                Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
                            </p>
                        </div>
                    </li>

                </ul>

            </div>
        </section> --><!-- End Frequently Asked Questions Section -->

        <!-- ======= Gallery Section ======= -->
       <!--  <section id="gallery">
            <div class="container-fluid">
                <div class="section-header">
                    <h3 class="section-title">Gallery</h3>
                    <span class="section-divider"></span>
                    <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                </div>

                <div class="row no-gutters">

                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item wow fadeInUp">
                            <a href="assets/img/gallery/gallery-1.jpg" data-gall="portfolioGallery" class="venobox">
                                <img src="assets/img/gallery/gallery-1.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item wow fadeInUp">
                            <a href="assets/img/gallery/gallery-2.jpg" data-gall="portfolioGallery" class="venobox">
                                <img src="assets/img/gallery/gallery-2.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item wow fadeInUp">
                            <a href="assets/img/gallery/gallery-3.jpg" data-gall="portfolioGallery" class="venobox">
                                <img src="assets/img/gallery/gallery-3.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item wow fadeInUp">
                            <a href="assets/img/gallery/gallery-4.jpg" data-gall="portfolioGallery" class="venobox">
                                <img src="assets/img/gallery/gallery-4.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item wow fadeInUp">
                            <a href="assets/img/gallery/gallery-5.jpg" data-gall="portfolioGallery" class="venobox">
                                <img src="assets/img/gallery/gallery-5.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item wow fadeInUp">
                            <a href="assets/img/gallery/gallery-6.jpg" data-gall="portfolioGallery" class="venobox">
                                <img src="assets/img/gallery/gallery-6.jpg" alt="">
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </section> --><!-- End Gallery Section -->

        <!-- ======= Contact Section ======= -->
        <!-- <section id="contact">
            <div class="container">
                <div class="row wow fadeInUp">

                    <div class="col-lg-4 col-md-4">
                        <div class="contact-about">
                            <h3>Avilon</h3>
                            <p>Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
                            <div class="social-links">
                                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="info">
                            <div>
                                <i class="ion-ios-location-outline"></i>
                                <p>A108 Adam Street<br>New York, NY 535022</p>
                            </div>

                            <div>
                                <i class="ion-ios-email-outline"></i>
                                <p>info@example.com</p>
                            </div>

                            <div>
                                <i class="ion-ios-telephone-outline"></i>
                                <p>+1 5589 55488 55s</p>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-5 col-md-8">
                        <div class="form">
                            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                        <div class="validate"></div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                                        <div class="validate"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                                    <div class="validate"></div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                    <div class="validate"></div>
                                </div>
                                <div class="mb-3">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>
                                </div>
                                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </section> --><!-- End Contact Section -->

    </main><!-- End #main -->