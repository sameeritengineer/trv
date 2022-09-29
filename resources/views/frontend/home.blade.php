@extends('layouts.frontapp')

@section('content')
<!-- ***home banner html start form here*** -->
            <section class="home-banner-section home-banner-slider">
               @foreach($data['banner'] as $banner)
               @php
                  $image = asset('/images/banner/'.$banner->image);
               @endphp
               <div class="home-banner d-flex flex-wrap align-items-center" style="background-image: url({{$image}});">
                  <div class="overlay"></div>
                  <div class="container">
                     <div class="banner-content text-center">
                        <div class="row">
                           <div class="col-lg-8 offset-lg-2">
                              <h2 class="banner-title">{{$banner->title}}</h2>
                              <p>{!!$banner->desc!!}</p>
                              <div class="banner-btn">
                                 <!-- <a href="about.html" class="round-btn">LEARN MORE</a> -->
                                 <a href="{{ route('destinations') }}" class="outline-btn outline-btn-white">Destinations</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </section>
            <!-- ***home banner html end here*** -->
            <!-- ***Home search field html start from here*** -->
            <!-- <div class="home-trip-search primary-bg">
               <div class="container">
                  <form method="get" class="trip-search-inner d-flex">
                     <div class="group-input">
                        <label> Search Destination* </label>
                        <input type="text" name="s" placeholder="Enter Destination">
                     </div>
                     <div class="group-input">
                        <label> Pax Number* </label>
                        <input type="text" name="s" placeholder="No.of People">
                     </div>
                     <div class="group-input width-col-3">
                        <label> Checkin Date* </label>
                        <i class="far fa-calendar"></i>
                        <input class="input-date-picker" type="text" name="s" placeholder="MM / DD / YY" autocomplete="off" readonly="readonly">
                     </div>
                     <div class="group-input width-col-3">
                        <label> Checkout Date* </label>
                        <i class="far fa-calendar"></i>
                        <input class="input-date-picker" type="text" name="s" placeholder="MM / DD / YY" autocomplete="off" readonly="readonly">
                     </div>
                     <div class="group-input width-col-3">
                        <input type="submit" name="travel-search" value="INQUIRE NOW">
                     </div>
                  </form>
               </div>
            </div> -->
            <!-- ***search search field html end here*** -->
            <!-- ***Home destination html start from here*** -->
<!--             <section class="home-destination">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-8 offset-lg-2 text-sm-center">
                        <div class="section-heading">
                           <h5 class="sub-title">UNCOVER PLACE</h5>
                           <h2 class="section-title">POPULAR DESTINATION</h2>
                           <p>Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec nemo, rutrum. Vestibulum cumque laudantium. Sit ornare mollitia tenetur, aptent.</p>
                        </div>
                     </div>
                  </div>
                  <div class="destination-section">
                     <div class="row">
                        <div class="col-lg-4 col-md-6">
                           <article class="destination-item" style="background-image: url(assets/images/img1.jpg);">
                              <div class="destination-content">
                                 <div class="rating-start-wrap">
                                    <div class="rating-start">
                                       <span style="width: 100%"></span>
                                    </div>
                                 </div>
                                 <span class="cat-link">
                                    <a href="destination.html">ITALY</a>
                                 </span>
                                 <h3>
                                    <a href="package-detail.html">SAN MIGUEL</a>
                                 </h3>
                                 <p>Fusce hic augue velit wisi ips quibusdam pariatur, iusto.</p>
                              </div>
                           </article>
                        </div>
                        <div class="col-lg-4 col-md-6">
                           <article class="destination-item" style="background-image: url(assets/images/img2.jpg);">
                              <div class="destination-content">
                                 <div class="rating-start-wrap">
                                    <div class="rating-start">
                                       <span style="width: 100%"></span>
                                    </div>
                                 </div>
                                 <span class="cat-link">
                                    <a href="destination.html">Dubai</a>
                                 </span>
                                 <h3>
                                    <a href="package-detail.html">BURJ KHALIFA</a>
                                 </h3>
                                 <p>Fusce hic augue velit wisi ips quibusdam pariatur, iusto.</p>
                              </div>
                           </article>
                        </div>
                        <div class="col-lg-4 col-md-6">
                           <article class="destination-item" style="background-image: url(assets/images/img3.jpg);">
                              <div class="destination-content">
                                 <div class="rating-start-wrap">
                                    <div class="rating-start">
                                       <span style="width: 100%"></span>
                                    </div>
                                 </div>
                                 <span class="cat-link">
                                    <a href="destination.html">Japan</a>
                                 </span>
                                 <h3>
                                    <a href="package-detail.html">KYOTO TEMPLE</a>
                                 </h3>
                                 <p>Fusce hic augue velit wisi ips quibusdam pariatur, iusto.</p>
                              </div>
                           </article>
                        </div>
                     </div>
                     <div class="section-btn-wrap text-center">
                        <a href="destination.html" class="round-btn">More Destination</a>
                     </div>
                  </div>
               </div>
            </section> -->
            <!-- ***Home destination html end here*** -->
            <!-- ***Home package html start from here*** -->
            <section class="home-package">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-8 offset-lg-2 text-sm-center">
                        <div class="section-heading">
                           <h5 class="sub-title">POPULAR DESTINATION</h5>
                           <h2 class="section-title">The Mr B Experience</h2>
                           <p>Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec nemo, rutrum. Vestibulum cumque laudantium. Sit ornare mollitia tenetur, aptent.</p>
                        </div>
                     </div>
                  </div>
                  <div class="package-section">
                                                               
                     @foreach($data['destination'] as $destination)
                     @php
                     $image = asset('/images/destination/'.$destination->image);
                     $start_date = strtotime($destination->start_date_time);
                     $sDate = date('m-d-Y',$start_date);
                     @endphp                                       
                        <article class="package-item">
                        <figure class="package-image" style="background-image: url({{$image}});"></figure>
                        <div class="package-content">
                           <h3>
                              <a href="{{ route('single-destination',$destination->id) }}">
                                 {{$destination->name}}
                              </a>
                           </h3>
                           <p>{!!$destination->getShortContentAttribute()!!}</p>
                           <div class="package-meta">
                              <ul>
                                 <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{$destination->getCountry($destination->countryId)}}
                                 </li>
                                 <li>
                                    <i class="fas fa-calendar-alt"></i>
                                    {{$destination->getDays()+1}}D/{{$destination->getDays()}}N
                                 </li>
                                 <li>
                                    <i class="fas fa-calendar-alt"></i>
                                    {{$sDate}}
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div class="package-price">
                           <!-- <div class="review-area">
                              <span class="review-text">(25 reviews)</span>
                              <div class="rating-start-wrap d-inline-block">
                                 <div class="rating-start">
                                    <span style="width: 80%"></span>
                                 </div>
                              </div>
                           </div> -->
                           <h6 class="price-list">
                              <span>${{$destination->price}}</span>
                              / per person
                           </h6>
                           <a href="#" class="outline-btn outline-btn-white">Book now</a>
                        </div>
                     </article>
                     @endforeach
                     
                     <div class="section-btn-wrap text-center">
                        <a href="{{ route('destinations') }}" class="round-btn">VIEW ALL DESTINATION</a>
                     </div>
                  </div>
               </div>
            </section>
            <!-- ***Home package html end here*** -->
            <!-- ***Home callback html start from here*** -->
            <section class="home-callback bg-img-fullcallback" style="background-image: url({{asset('frontend-asset/images/img7.jpg')}});">
               <div class="overlay"></div>
               <div class="container">
                  <div class="row">
                     <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="callback-content">
                           <div class="video-button">
                              <a  id="video-container" data-fancybox="video-gallery" href="https://www.youtube.com/watch?v=2OYar8OHEOU">
                                 <i class="fas fa-play"></i>
                              </a>
                           </div>
                           <h2 class="section-title">ARE YOU READY TO TRAVEL? REMEMBER US !!</h2>
                           <p>Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec nemo, rutrum. Vestibulum cumque laudantium. Sit ornare mollitia tenetur, aptent.</p>
                           <div class="callback-btn">
                              <a href="{{ route('destinations') }}" class="round-btn">View DESTINATIONS</a>
                              <a href="{{ route('pages',2) }}" class="outline-btn outline-btn-white">About Us</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- ***Home callback html end here*** -->
            <!-- ***Home counter html start from here*** -->
            <div class="home-counter">
               <div class="container">
                  <div class="counter-wrap">
                     <div class="counter-item">
                        <span class="counter-no">
                           <span class="counter">80</span>K+
                        </span>
                        <span class="counter-desc">
                           SATISFIED CUSTOMER
                        </span>
                     </div>
                     <div class="counter-item">
                        <span class="counter-no">
                           <span class="counter">18</span>+
                        </span>
                        <span class="counter-desc">
                           ACTIVE MEMBERS
                        </span>
                     </div>
                     <div class="counter-item">
                        <span class="counter-no">
                           <span class="counter">220</span>+
                        </span>
                        <span class="counter-desc">
                           TOUR DESTINATION
                        </span>
                     </div>
                     <div class="counter-item">
                        <span class="counter-no">
                           <span class="counter">75</span>+
                        </span>
                        <span class="counter-desc">
                           TRAVEL GUIDES
                        </span>
                     </div>
                  </div>
               </div>
            </div>
            <!-- ***Home counter html end here*** -->
            <!-- ***Home offer html start from here*** -->
<!--             <section class="home-offer">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-8 offset-lg-2 text-sm-center">
                        <div class="section-heading">
                           <h5 class="sub-title">OFFER & DISCOUNT</h5>
                           <h2 class="section-title">OUR SPECIAL PACKAGES</h2>
                           <p>Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec nemo, rutrum. Vestibulum cumque laudantium. Sit ornare mollitia tenetur, aptent.</p>
                        </div>
                     </div>
                  </div>
                  <div class="offer-section">
                     <div class="row">
                        <div class="col-md-6">
                           <article class="offer-item" style="background-image: url(assets/images/img8.jpg);">
                              <div class="offer-badge">
                                 UPTO <span>25%</span> off
                              </div>
                              <div class="offer-content">
                                 <div class="package-meta">
                                    <ul>
                                       <li>
                                          <i class="fas fa-clock"></i>
                                          7D/6N
                                       </li>
                                       <li>
                                          <i class="fas fa-user-friends"></i>
                                          pax: 10
                                       </li>
                                       <li>
                                          <i class="fas fa-map-marker-alt"></i>
                                          Malaysia
                                       </li>
                                    </ul>
                                 </div>
                                 <h3>
                                    <a href="package.html">TOUR TO SATORINI</a>
                                 </h3>
                                 <p>
                                    Fusce hic augue velit wisi ips quibus dam pariatur, iusto.
                                 </p>
                                 <div class="price-list">
                                    price: 
                                    <del>$1300 </del>
                                    <ins>$1105</ins>
                                 </div>
                                 <a href="booking.html" class="round-btn">Book Now</a>
                              </div>
                           </article>
                        </div>
                        <div class="col-md-6">
                           <article class="offer-item" style="background-image: url(assets/images/img9.jpg);">
                              <div class="offer-badge">
                                 UPTO <span>17%</span> off
                              </div>
                              <div class="offer-content">
                                 <div class="package-meta">
                                    <ul>
                                       <li>
                                          <i class="fas fa-clock"></i>
                                          5D/4N
                                       </li>
                                       <li>
                                          <i class="fas fa-user-friends"></i>
                                          pax: 10
                                       </li>
                                       <li>
                                          <i class="fas fa-map-marker-alt"></i>
                                          Malaysia
                                       </li>
                                    </ul>
                                 </div>
                                 <h3>
                                    <a href="package.html">WEEKEND TO PARIS</a>
                                 </h3>
                                 <p>
                                    Fusce hic augue velit wisi ips quibus dam pariatur, iusto.
                                 </p>
                                 <div class="price-list">
                                    price: 
                                    <del>$1100 </del>
                                    <ins>$900</ins>
                                 </div>
                                 <a href="booking.html" class="round-btn">Book Now</a>
                              </div>
                           </article>
                        </div>
                     </div>
                     <div class="section-btn-wrap text-center">
                        <a href="package-offer.html" class="round-btn">VIEW ALL PACKAGES</a>
                     </div>
                  </div>
               </div>
            </section> -->
            <!-- ***Home offer html end here*** -->
            <!-- ***Home gallery html start from here*** -->
            <section class="home-gallery">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-8 offset-lg-2 text-sm-center">
                        <div class="section-heading">
                           <h5 class="sub-title">PHOTO GALLERY</h5>
                           <h2 class="section-title">PHOTO'S FROM TRAVELLERS</h2>
                           <p>Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec nemo, rutrum. Vestibulum cumque laudantium. Sit ornare mollitia tenetur, aptent.</p>
                        </div>
                     </div>
                  </div>
                  <div class="gallery-section">
                     <div class="gallery-container grid">
                        <div class="single-gallery grid-item">
                           <figure class="gallery-img">
                              <a href="{{asset('frontend-asset/images/img14.jpg')}}" data-fancybox="gallery">
                                 <img src="{{asset('frontend-asset/images/img14.jpg')}}" alt="">
                              </a>
                           </figure>
                        </div>
                        <div class="single-gallery grid-item">
                           <figure class="gallery-img">
                              <a href="{{asset('frontend-asset/images/img11.jpg')}}" data-fancybox="gallery">
                                 <img src="{{asset('frontend-asset/images/img11.jpg')}}" alt="">
                              </a>
                           </figure>
                        </div>
                        <div class="single-gallery grid-item">
                           <figure class="gallery-img">
                              <a href="{{asset('frontend-asset/images/img12.jpg')}}" data-fancybox="gallery">
                                 <img src="{{asset('frontend-asset/images/img12.jpg')}}" alt="">
                              </a>
                           </figure>
                        </div>
                        <div class="single-gallery grid-item">
                           <figure class="gallery-img">
                              <a href="{{asset('frontend-asset/images/img13.jpg')}}" data-fancybox="gallery">
                                 <img src="{{asset('frontend-asset/images/img13.jpg')}}" alt="">
                              </a>
                           </figure>
                        </div>
                        <div class="single-gallery grid-item">
                           <figure class="gallery-img">
                              <a href="{{asset('frontend-asset/images/img10.jpg')}}" data-fancybox="gallery">
                                 <img src="{{asset('frontend-asset/images/img10.jpg')}}" alt="">
                              </a>
                           </figure>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- ***Home gallery html end here*** -->
            <!-- ***Home client html start from here*** -->
            <section class="home-client client-section" style="background-image: url({{asset('frontend-asset/images/banner-img1.jpg')}});">
               <div class="container">
                  <div class="row align-items-center">
                     <div class="col-lg-6">
                        <div class="client-content">
                           <h2 class="section-title">SIGN UP WITH US !</h2>
                           <p>Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec nemo, rutrum. Vestibulum cumque laudantm sit.</p>
                           <a href="contact.html" class="round-btn">Sign Up Now</a>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="client-logo">
                           <ul>
                              <li>
                                 <img src="{{asset('frontend-asset/images/client-img1.png')}}" alt="">
                              </li>
                              <li>
                                 <img src="{{asset('frontend-asset/images/client-img2.png')}}" alt="">
                              </li>
                              <li>
                                 <img src="{{asset('frontend-asset/images/client-img3.png')}}" alt="">
                              </li>
                              <li>
                                 <img src="{{asset('frontend-asset/images/client-img4.png')}}" alt="">
                              </li>
                              <li>
                                 <img src="{{asset('frontend-asset/images/client-img5.png')}}" alt="">
                              </li>
                              <li>
                                 <img src="{{asset('frontend-asset/images/client-img6.png')}}" alt="">
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="overlay"></div>
            </section>
            <!-- ***Home client html end here*** -->
            <!-- ***Home blog html start from here*** -->
            <section class="home-blog">
               <div class="container">
                  <div class="section-heading d-sm-flex align-items-center justify-content-between">
                     <div class="heading-group">
                        <h5 class="sub-title">LATEST BLOG</h5>
                        <h2 class="section-title">OUR RECENT POSTS</h2>
                        <p>Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec nemo, rutrum. <br/>Vestibulum cumque laudantium. Sit ornare mollitia tenetur, aptent.</p>
                     </div>
                     <div class="heading-btn">
                        <a href="blog-archive.html" class="round-btn">View All Blog</a>
                     </div>
                  </div>
                  <div class="blog-section">
                     <div class="row gx-4">
                        <div class="col-lg-6">
                           <article class="post">
                              <figure class="featured-post" style="background-image: url(assets/images/img16.jpg);"></figure>
                              <div class="post-content">
                                 <div class="cat-meta">
                                    <a href="blog-archive.html">TOUR</a>
                                 </div>
                                 <h3><a href="blog-single.html">BEST JOURNEY TO PEACEFUL PLACES</a></h3>
                                 <p>Laboris hac erat dolor, posuere volutpat fringilla gravida metus nonummy, blandit mi...</p>
                                 <div class="post-footer d-flex justify-content-between align-items-center">
                                    <div class="post-btn">
                                       <a href="blog-single.html" class="round-btn">Read More</a>
                                    </div>
                                    <div class="meta-comment">
                                       <a href="blog-archive.html">
                                          <i aria-hidden="true" class="fas fa-comment"></i>
                                          <span>0</span>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </article>
                        </div>
                        <div class="col-lg-6">
                           <article class="post">
                              <figure class="featured-post" style="background-image: url(assets/images/img17.jpg);"></figure>
                              <div class="post-content">
                                 <div class="cat-meta">
                                    <a href="blog-archive.html">TRAVEL</a>
                                 </div>
                                 <h3><a href="blog-single.html">BTRAVEL WITH FRIENDS IS BEST</a></h3>
                                 <p>Laboris hac erat dolor, posuere volutpat fringilla gravida metus nonummy, blandit mi...</p>
                                 <div class="post-footer d-flex justify-content-between align-items-center">
                                    <div class="post-btn">
                                       <a href="blog-single.html" class="round-btn">Read More</a>
                                    </div>
                                    <div class="meta-comment">
                                       <a href="blog-archive.html">
                                          <i aria-hidden="true" class="fas fa-comment"></i>
                                          <span>0</span>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </article>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- ***Home blog html end here*** -->
            <!-- ***Home testimonial html start from here*** -->
            <section class="home-testimonial">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="section-heading">
                           <h5 class="sub-title">CLIENT'S REVIEWS</h5>
                           <h2 class="section-title">TRAVELLER'S TESTIMONIAL</h2>
                           <p>Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec nemo, rutrum. Vestibulum cumque laudantium. Sit ornare mollitia tenetur, aptent.</p>
                        </div>
                     </div>
                  </div>
                  <div class="testimonial-section testimonial-slider">
                     @foreach($data['testimonial'] as $testi)
                     @php
                        $image = asset('/images/testimonial/'.$testi->image);
                     @endphp
                     <div class="testimonial-item">
                        <div class="testimonial-content">
                           <!-- <div class="rating-start-wrap">
                              <div class="rating-start">
                                 <span style="width: 80%"></span>
                              </div>
                           </div> -->
                           {!!$testi->description!!}
                           <div class="author-content">
                              <figure class="testimonial-img">
                                 <img src="{{$image}}" alt="">
                              </figure>
                              <div class="author-name">
                                 <h5>{{$testi->name}}</h5>
                                 <!-- <span>TRAVELLERS</span> -->
                              </div>
                           </div>
                           <div class="testimonial-icon">
                              <i aria-hidden="true" class="fas fa-quote-left"></i>
                           </div>
                        </div>
                     </div>
                     @endforeach
                     
                     
                  </div>
               </div>
            </section>
            <!-- ***Home testimonial html end here*** -->
            <!-- ***Home callback html start from here*** -->
            <section class="home-callback bg-color-callback primary-bg">
               <div class="container">
                  <div class="row align-items-center">
                     <div class="col-md-8">
                        <h5 class="sub-title">CALL TO ACTION</h5>
                        <h2 class="section-title">READY FOR UNFORGATABLE TRAVEL. REMEMBER US!</h2>
                        <p>Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec nemo, rutrum. Vestibulum cumque laudantium. Sit ornare mollitia tenetur, aptent.</p>
                     </div>
                     <div class="col-md-4 text-md-end">
                        <a href="contact.html" class="outline-btn outline-btn-white">Contact Us !</a>
                     </div>
                  </div>
               </div>
            </section>
            <!-- ***Home callback html end here*** -->
@endsection