@extends('layouts.frontapp')

@section('content')
<section class="package-inner-page">
               <!-- ***Inner Banner html start form here*** -->
               <div class="inner-banner-wrap">
                  @php
                  $image = asset('/images/destination/original_featured/'.$destination->image);
                  $start_date = strtotime($destination->start_date_time);
                  $end_date = strtotime($destination->end_date_time);
                  $Sday = date('d', $start_date);
                  $Eday = date('d', $end_date);
                  $month = date('F', $start_date);
                  $year = date('Y', $start_date);
                  @endphp
                  <div class="inner-baner-container" style="background-image: url({{$image}});">
                     <div class="container">
                        <div class="inner-banner-content">
                           <h1 class="page-title">{{$destination->name}}</h1>
                           <h3 class="page-mydate">{{strtoupper($month)}} {{$Sday}}-{{$Eday}}, {{$year}}</h3>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- ***Inner Banner html end here*** -->
               <!-- ***career section html start form here*** -->
               <div class="inner-package-detail-wrap">
                  <div class="container">
                     <div class="row">
                        <div class="col-lg-8 primary right-sidebar">
                           <div class="single-packge-wrap">
                              <div class="single-package-head d-flex align-items-center">
                                 <div class="package-title">
                                    <h2>{{$destination->name}}</h2>
                                    <!-- <div class="rating-start-wrap">
                                       <div class="rating-start">
                                          <span style="width: 80%"></span>
                                       </div>
                                    </div> -->
                                 </div>
                                 <div class="package-price">
                                    <h6 class="price-list">
                                      <span>${{$destination->price}}</span>
                              / per person
                                    </h6>
                                 </div>
                              </div>
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
                                    {{strtoupper($month)}} {{$Sday}}-{{$Eday}}, {{$year}}
                                 </li>
                                 </ul>
                              </div>
                              <figure class="single-package-image">
                                 <img src="assets/images/img27.jpg" alt="">
                              </figure>
                              <div class="package-content-detail">
                                 <article class="package-overview">
                                    <h3>OVERVIEW :</h3>
                                    <p>{!!$destination->description!!}</p>
                                 </article>
                                 <article class="package-include bg-light-grey">
                                    <h3>INCLUDE & EXCLUDE :</h3>
                                    <ul>
                                       @foreach($destination->getIncludes($destination->includesId) as $data)
                                       <li><i class="fas fa-check"></i>{{$data->name}}</li>
                                       @endforeach
                                       
                                    </ul>
                                    <ul>
                                    	@foreach($destination->getExcludes($destination->excludesId) as $data)
                                    	<li><i class="fas fa-times"></i>{{$data->name}}</li>
                                    	@endforeach
                                    </ul>
                                 </article>
                                 <article class="package-ininerary">
                                    <h3>Additional Information :</h3>
                                    <p>{{$destination->addinfo}}</p>
                                    <h3>ITINERARY :</h3>
                                    <ul>
                                    	@php
                                        $activities = explode(',',$destination->activities);
                                        $i = 1;
                                    	@endphp
                                    	@foreach($activities as $data)
                                       <li>
                                          <i aria-hidden="true" class="fas fa-dot-circle"></i>
                                          <span>DAY {{$i}}</span>
                                          {{$data}}
                                       </li>
                                       @php
                                        $i++;
                                       @endphp
                                       @endforeach
                                    </ul>
                                 </article>
                                 <br>
                                 @if($destination->videoType($destination->video) == 'youtube')
                                  <iframe width="420" height="315" src="{{$destination->getYoutubeEmbedUrl($destination->video)}}"></iframe>
                                 @elseif($destination->videoType($destination->video) == 'vimeo')
                                  <iframe src="{{$destination->video}}" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                                 @else
                                  <p></p>
                                 @endif
                                 
                           
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="sidebar">
                              <div class="booking-form-wrap">
                                 <div class="booking-form-inner primary-bg">
                                    <h3>BOOKING FORM</h3>
                                    <p>Malesuada incidunt excepturi proident quo eros? Sinterdum praesent magnis, eius cumque.</p>
                                    <form method="get" class="booking-form">
                                       <p>
                                          <input type="text" name="name" placeholder="Your Name...">
                                       </p>
                                       <p>
                                          <input type="email" name="email" placeholder="Your Email...">
                                       </p>
                                       <p class="width-5">
                                          <label>Checkin Date</label>
                                          <input class="input-date-picker" type="text" name="s" placeholder="MM / DD / YY" autocomplete="off" readonly="readonly">
                                       </p>
                                       <p class="width-5">
                                          <label>Checkout Date</label>
                                          <input class="input-date-picker" type="text" name="s" placeholder="MM / DD / YY" autocomplete="off" readonly="readonly">
                                       </p>
                                       <p>
                                          <button type="submit" class="outline-btn outline-btn-white">INQUIRY NOW</button>
                                       </p>
                                    </form>
                                 </div>
                              </div>
                              <div class="related-package">
                                 <h3>RELATED IMAGES</h3>
                                 <div class="related-package-slide">
                                    @foreach(explode(',',$destination->dest_gallery) as $gal)
                                    <div class="related-package-item">
                                       <img src="{{asset('/images/destination/gallery/'.$gal)}}" alt="">
                                    </div>
                                    @endforeach
                                 </div>
                              </div>
                              <div class="prmProperty prmProperty--reducedTop">
                                 <h1 class="font26 blackText latoBlack appendBottom10">Hotel Detail's</h1>
                                 <h3>{{$destination->hotelname}}</h3>
                                 <p class="latoBold makeFlex"><span class="dtlSprite icLocationBlack appendRight5"></span><span><i class="fas fa-map-marker-alt"></i> {{$destination->hoteladd}}</span></p></div>
                              <div class="package-map">
                                 <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2483.540423056448!2d-0.12174238402827448!3d51.50330061882345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604b900d26973%3A0x4291f3172409ea92!2slastminute.com%20London%20Eye!5e0!3m2!1sen!2snp!4v1646314586610!5m2!1sen!2snp" width="600" height="320" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
                                 <iframe width="640" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo $destination->hoteladd; ?>&output=embed"></iframe>
                              </div>
                              <!-- <div class="package-list">
                                 <div class="overlay"></div>
                                 <h4>MORE PACKAGES</h4>
                                 <ul>
                                    <li>
                                       <a href="#"><i aria-hidden="true" class="icon icon-arrow-right-circle"></i>Vacation Packages</a>
                                    </li>
                                    <li>
                                       <a href="#"><i aria-hidden="true" class="icon icon-arrow-right-circle"></i>Homeymoon Packages</a>
                                    </li>
                                    <li>
                                       <a href="#"><i aria-hidden="true" class="icon icon-arrow-right-circle"></i>New Year Packages</a>
                                    </li>
                                    <li>
                                       <a href="#"><i aria-hidden="true" class="icon icon-arrow-right-circle"></i>Weekend Packages</a>
                                    </li>
                                 </ul>
                              </div> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- ***career section html start form here*** -->
            </section>
@endsection            