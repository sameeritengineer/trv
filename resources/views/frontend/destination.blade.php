@extends('layouts.frontapp')

@section('content')
<section class="inner-page-wrap">
               <!-- ***Inner Banner html start form here*** -->
               <div class="inner-banner-wrap">
                  <div class="inner-baner-container" style="background-image: url({{asset('frontend-asset/images/banner-img1.jpg')}});">
                     <div class="container">
                        <div class="inner-banner-content">
                           <h1 class="page-title">Destinations</h1>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- ***Inner Banner html end here*** -->
               <!-- ***package section html start form here*** -->
               <div class="package-item-wrap">
                  <div class="container">
                     @foreach($destinations as $destination)
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
                  </div>
               </div>
               <!-- ***package section html start form here*** -->
               <!-- ***client section html start form here*** -->
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
               <!-- ***clinet section html end here*** -->
            </section>
@endsection