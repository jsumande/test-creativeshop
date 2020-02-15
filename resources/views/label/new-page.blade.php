<div class="wrapper">
      <div class="container">
        <nav class="navbar navbar-expand-md navbar-light nav-white bg-light fixed-top">
          <div class="container">
            <a class="navbar-brand" href="#">Appointo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto navbar-right">
                  <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#main">Home</a></li>
                  <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#features">About</a></li>
                  <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Features</a></li>
                  <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#pricing">Pricing</a></li>
                  <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                  <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">Buy Now</a></li>
                  <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Sign In</a></li>
                </ul>
            </div>
          </div>
        </nav>
      </div>

      <div id="main" class="main">
        <div class="hero-home">
          <div class="container">
            <div class="row text-center">
              <div class="col-sm-12">
                <div class="intro-block">
                  <h4>Label made for your big data needs</h4>
                  <h1>Manage all your data at just one place</h1>
                  <!--<p>Best in class big data software and analytics services will render your huge chunks into <br class="hidden-xs"> meaningful data. Try the demo now.</p>-->
                </div>
                <div class="subform wow fadeInDown" data-wow-delay="0.3s">
                  <form id="signup" class="formee" action="assets/php/subscribe.php" method="post">
                   <input name="email" id="email" type="text" /><input class="right inputnew" type="submit" title="Send" value="Start my trial" />
                 </form>
                  <div id="response"></div>
                </div>
                <div class="form-note">
                  <p>14-day free trial and no credit card required.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Client Section -->
        <div class="client-section">
          <div class="container text-center">
            <div class="clients owl-carousel owl-theme">
              <div class="single">
                <img src="{{ asset('label-assets/assets/icons/client1.png') }}" alt="Client" />
              </div>
              <div class="single">
                <img src="{{ asset('label-assets/assets/icons/client6.png') }}" alt="Client" />
              </div>
              <div class="single">
                <img src="{{ asset('label-assets/assets/icons/client3.png') }}" alt="Client" />
              </div>
              <div class="single">
                <img src="{{ asset('label-assets/assets/icons/client4.png') }}" alt="Client" />
              </div>
              <div class="single">
                <img src="{{ asset('label-assets/assets/icons/client5.png') }}" alt="Client" />
              </div>
              <div class="single">
                <img src="{{ asset('label-assets/assets/icons/client2.png') }}" alt="Client" />
              </div>
            </div>
          </div>
        </div>


        <div id="features" class="features">
          <div class="flex-split">
            <div class="container">
              <div class="row align-center">
                <div class="col-md-5">
                  <div class="f-left">
                    <div class="left-content wow fadeInLeft" data-wow-delay="0s">
                      <h2>Daily Charts & moving averages.</h2>
                      <p> Not just your messages, but all your files, images, PDFs, documents, and spreadsheets can be dropped
                          right into Slack and shared with anyone you want. Add comments, star for later reference.
                    </div>
                  </div>
                </div>
                <div class="col-md-6 offset-md-1">
                  <div class="f-right">
                    <img class="img-fluid" src="{{ asset('label-assets/assets/images/f2.jpg') }}" alt="Feature">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="flex-split">
            <div class="container">
              <div class="row align-center">
                <div class="col-md-6">
                  <div class="f-right">
                    <img class="img-fluid" src="{{ asset('label-assets/assets/images/f2.jpg') }}" alt="Feature">
                  </div>
                </div>
                <div class="col-md-5  offset-md-1">
                  <div class="f-left">
                    <div class="left-content wow fadeInLeft" data-wow-delay="0s">
                      <h2>Daily Charts & moving averages.</h2>
                      <p> Not just your messages, but all your files, images, PDFs, documents, and spreadsheets can be dropped
                          right into Slack and shared with anyone you want. Add comments, star for later reference.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div id="services" class="lbl-services">
          <div class="container">
            <div class="row justify-center">
              <div class="col-md-8">
                <div class="service-intro text-center">
                 <h1 class="wow fadeInDown">Designed for startups to excel.</h1>
                 <h6>
                   Best in class big data software and analytics services will render your huge chunks into meaningful
                  data. Try the demo now.
                </h6>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4 wow fadeInDown" data-wow-delay="0.1s">
                <div class="lbl-service-card">
                  <div class="card-icon">
                    <img src="{{ asset('label-assets/assets/icons/pricing-1.png') }}" width="60" alt="Feature">
                  </div>
                  <div class="card-text">
                    <h1>Cart Management</h1>
                    <p>Big data software and analytics services will render your huge chunks into meaningful data.
                      Try it now.</p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 wow fadeInDown" data-wow-delay="0.1s">
                <div class="lbl-service-card">
                  <div class="card-icon">
                    <img src="{{ asset('label-assets/assets/icons/downloads.png') }}" width="60" alt="Feature">
                  </div>
                  <div class="card-text">
                    <h1>Unlimited Downloads</h1>
                    <p>Big data software and analytics services will render your huge chunks into meaningful data.
                      Try it now.</p>                  </div>
                </div>
              </div>
              <div class="col-sm-4 wow fadeInDown" data-wow-delay="0.1s">
                <div class="lbl-service-card">
                  <div class="card-icon">
                    <img src="{{ asset('label-assets/assets/icons/projects.png') }}" width="60" alt="Feature">
                  </div>
                  <div class="card-text">
                    <h1>Personal Projects</h1>
                    <p>Big data software and analytics services will render your huge chunks into meaningful data.
                      Try it now.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="vid-feature">
          <div class="container">
            <div class="row text-center">
              <div class="col-sm-8 col-lg-6">
                <h1>Building Statups to Excel - Label</h1>
                <div class="vid-cover">
                  <iframe src="https://www.youtube.com/embed/W-C4xu5u1ls?autoplay=0" allowfullscreen="allowfullscreen"></iframe>
                </div>
                <h6><b>Label</b> does more than just building a landing page, it brings life to it - <span><a href="#">Buy now</a></span></h6>
              </div>
            </div>
          </div>
        </div>


        <!-- f-box Section Starts -->
        <div class="f-box">
          <div class="container">
            <div class="row text-center">
              <div class="col-sm-4">
                <div class="f-box-single wow fadeInUp" data-wow-delay="0.6s">
                  <div class="f-box-image">
                    <img  src="{{ asset('label-assets/assets/icons/growth.png') }}" alt="Icon" />
                  </div>
                  <div class="f-box-content">
                    <h3>Growth Charts</h3>
                    <p>
                      Lorem ipsum dolor sit amet, ei pro unum forensibus. His quis doming eu. Has no tollit detracto.
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="f-box-single wow fadeInUp" data-wow-delay="1.2s">
                  <div class="f-box-image">
                    <img  src="{{ asset('label-assets/assets/icons/mobile.png') }}" alt="Icon" />
                  </div>
                  <div class="f-box-content">
                    <h3>Mobile Responsive</h3>
                    <p>
                      Lorem ipsum dolor sit amet, ei pro unum forensibus. His quis doming eu. Has no tollit detracto.
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="f-box-single wow fadeInUp" data-wow-delay="1.8s">
                  <div class="f-box-image">
                    <img  src="{{ asset('label-assets/assets/icons/safe.png') }}" alt="Icon" />
                  </div>
                  <div class="f-box-content">
                    <h3>Highly Secure</h3>
                    <p>
                      Lorem ipsum dolor sit amet, ei pro unum forensibus. His quis doming eu. Has no tollit detracto.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- f-box Section Ends Here -->


        <div id="pricing" class="pricing-section text-center">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="pricing-intro">
                  <h1 class="wow fadeInDown" data-wow-delay="0s">Our Pricing Plans.</h1>
                  <p class="wow fadeInDown" data-wow-delay="0.2s">
                    Our plans are designed to meet the requirements of both beginners <br class="hidden-xs"> and players.
                    Get the right plan that suits you.
                  </p>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="table-left wow fadeInDown" data-wow-delay="0.4s">

                      <div class="pricing-details">
                       <h2>Freemium</h2>
                       <span>Free</span>
                          <ul>
                            <li>First basic feature </li>
                            <li>Second feature goes here</li>
                            <li>Any other third feature</li>
                          </ul>
                        <button class="btn btn-primary btn-action" type="button">Get Plan</button>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="table-right table-center wow fadeInDown" data-wow-delay="0.6s">

                      <div class="pricing-details">
                        <h2>Beginner</h2>
                        <span class="text-green">$29.99</span>
                        <ul>
                          <li>First premium feature </li>
                          <li>Second premium one goes here</li>
                          <li>Third premium feature here</li>
                        </ul>
                        <button class="btn btn-primary btn-action btn-green" type="button">Buy Now</button>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="table-right wow fadeInDown" data-wow-delay="0.6s">

                      <div class="pricing-details">
                       <h2>Premium</h2>
                       <span>$99.99</span>
                       <ul>
                         <li>First premium feature </li>
                         <li>Second premium one goes here</li>
                         <li>Third premium feature here</li>
                       </ul>
                       <button class="btn btn-primary btn-action" type="button">Buy Now</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="cta-big">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-lg-5">
                <div class="cta-big-inner wow fadeInRight">
                  <h4>Why you need label</h4>
                  <h1>Join the fraternity of millions of users and be found.</h1>
                  <p>Some lorem ipsum text to make this section look more appealing.Now, it looks okay ish. </p>
                  <a href="#" class="btn btn-action btn-white">Join now</a>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div id="contact" class="contact">
          <div class="container">
            <div class="row text-center">
              <div class="col-sm-8 offset-sm-2 text-center">
                <div class="contact-intro wow fadeInDown">
                  <h1>Still confused? Drop us a word, we'll get back to you asap.</h1>

                </div>
              </div>
              <div class="col-sm-8 offset-sm-2">
                <div class="contact-form wow fadeInDown">
                    <form id="contact-form" method="post" action="assets/php/contact.php">
                      <div class="messages"></div>
                      <div class="controls">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="form_name">Name*</label>
                                  <input id="form_name" type="text" name="name" class="form-control" required="required" data-error="Firstname is required.">
                                  <div class="help-block with-errors"></div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="form_email">Email *</label>
                                  <input id="form_email" type="email" name="email" class="form-control" required="required" data-error="Valid email is required.">
                                  <div class="help-block with-errors"></div>
                              </div>
                          </div>
                        </div>
                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_message">Message *</label>
                                <textarea id="form_message" name="message" class="form-control" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-success btn-send" value="Send message">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="footer">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <h2>Label Inc</h2>
                <p> Some great details about your brand can fill this section. There will always be someone who reads footer.</p>
                <ul class="footer-sub">
                  <li>&copy; 2017 Label Inc.</li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Legal</a></li>
                </ul>
              </div>
              <div class="col-md-6 text-right d-none d-md-block">
                <ul class="social">
                  <li><a href="#"><img src="{{ asset('label-assets/assets/icons/facebook.png') }}" width="35" alt="Social"></a></li>
                  <li><a href="#"><img src="{{ asset('label-assets/assets/icons/twitter.png') }}" width="35" alt="Social"></a></li>
                  <li><a href="#"><img src="{{ asset('label-assets/assets/icons/youtube.png') }}" width="35" alt="Social"></a></li>
                  <li><a href="#"><img src="{{ asset('label-assets/assets/icons/instagram.png') }}" width="35" alt="Social"></a></li>
                </ul>
                <ul class="footer-nav">
                  <li><a href="#">About</a></li>
                  <li><a href="#">Support</a></li>
                  <li><a href="#">Contact</a></li>
                </ul>
                <a class="f-mail" href="tel:180032472349">Call: 1800 3247 2349</a>
                <br>
                <a class="f-mail" href="mailto:info@label.co">support@label.co</a>
              </div>
            </div>
          </div>
        </div>


        <!-- Scroll To Top -->
          <a id="back-top" class="back-to-top js-scroll-trigger" href="#main">
          <i class="ion-android-navigate"></i>
          </a>
        <!-- Scroll To Top Ends-->
      </div> <!-- Main -->
    </div><!-- Wrapper -->