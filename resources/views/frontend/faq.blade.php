@extends('layouts.frontapp')

@section('content')
<section class="contact-inner-page">
               <!-- ***Inner Banner html start form here*** -->
               <div>
                  <div class="inner-baner-container" style="background-image: url({{asset('frontend-asset/images/banner-img1.jpg')}});">
                     <div class="container">
                        <div class="inner-banner-content">
                           <h1 class="page-title">FAQ</h1>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- ***Inner Banner html end here*** -->
               <!-- ***faq section html start form here*** -->
               <div class="faq-page-section">
                  <!-- <div class="faq-page-container">
                     <div class="container">
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="section-head">
                                 <div class="sub-title">QUESTIONS / ANSWERS</div>
                                 <h2 class="section-title">FREQUENTLY ASKED QUESTIONS</h2>
                                 <p>Aperiam sociosqu urna praesent, tristique, corrupti condimentum asperiores platea ipsum ad arcu. Nostrud. Esse? Aut nostrum, ornare quas provident laoreet nesciunt odio voluptates etiam, omnis.</p>
                              </div>
                              <div id="accordion-tab-one" class="accordion-content" role="tablist">
                                 <div id="accordion-A" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="accordion-A">
                                    <div class="card-header" role="tab" id="qus-A">
                                       <h5 class="mb-0">
                                          <a data-bs-toggle="collapse" href="#collapse-one" aria-expanded="true" aria-controls="collapse-one">
                                             HOW CAN I PAY FOR MY BOOKING?
                                          </a>
                                       </h5>
                                    </div>
                                    <div id="collapse-one" class="collapse show" data-bs-parent="#accordion-tab-one" role="tabpanel" aria-labelledby="qus-A">
                                       <div class="card-body">
                                          Natoque consequat sodales autem nihil nec. Fusce molestias? Reiciendis voluptas, harum officia ante aliquet blanditiis scelerisque donec illo aperiam commodi hymenaeos.
                                       </div>
                                    </div>
                                 </div>
                                 <div id="accordion-B" class="card tab-pane" role="tabpanel" aria-labelledby="accordion-B">
                                    <div class="card-header" role="tab" id="qus-B">
                                       <h5 class="mb-0">
                                          <a class="collapsed" data-bs-toggle="collapse" href="#collapse-two" aria-expanded="false" aria-controls="collapse-two">
                                             WHAT ARE ACCEPTABLE PAYMENT METHOD?
                                          </a>
                                       </h5>
                                    </div>
                                    <div id="collapse-two" class="collapse" data-bs-parent="#accordion-tab-one" role="tabpanel" aria-labelledby="qus-B">
                                       <div class="card-body">
                                          Natoque consequat sodales autem nihil nec. Fusce molestias? Reiciendis voluptas, harum officia ante aliquet blanditiis scelerisque donec illo aperiam commodi hymenaeos.
                                       </div>
                                    </div>
                                 </div>
                                 <div id="accordion-C" class="card tab-pane" role="tabpanel" aria-labelledby="accordion-C">
                                    <div class="card-header" role="tab" id="qus-C">
                                       <h5 class="mb-0">
                                          <a class="collapsed" data-bs-toggle="collapse" href="#collapse-three" aria-expanded="true" aria-controls="collapse-three">
                                             How we provide services for you ?
                                          </a>
                                       </h5>
                                    </div>
                                    <div id="collapse-three" class="collapse" data-bs-parent="#accordion-tab-one" role="tabpanel" aria-labelledby="qus-C">
                                       <div class="card-body">
                                          Natoque consequat sodales autem nihil nec. Fusce molestias? Reiciendis voluptas, harum officia ante aliquet blanditiis scelerisque donec illo aperiam commodi hymenaeos.
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="faq-testimonial">
                                 <figure class="faq-image">
                                    <img src="assets/images/img29.jpg" alt="">
                                 </figure>
                                 <div class="testimonial-content">
                                    <span class="quote-icon">
                                       <i aria-hidden="true" class="icon icon-quote1"></i>
                                    </span>
                                    <p>Tempora sem nostrum porta libero ad parturient vestibulum laboriosam luctus dis, reprehenderit modi, felis esse laudan tium.</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div> -->
                  <div class="faq-page-container bg-light-grey">
                     <div class="container">
                        <div class="row">
                           <div class="col-lg-8 offset-lg-2 text-sm-center">
                              <div class="section-heading">
                                 <h2 class="section-title">FREQUENTLY ASKED QUESTIONS</h2>
                                 <p>Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec nemo, rutrum. Vestibulum cumque laudantium. Sit ornare mollitia tenetur, aptent.</p>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="faq-content-wrap">
                                 <div id="accordion-tab-two" class="accordion-content" role="tablist">
                                 	@foreach($faqs as $faq)
                                    <div id="accordion-{{$faq->id}}" class="card tab-pane" role="tabpanel" aria-labelledby="accordion-{{$faq->id}}">
                                       <div class="card-header" role="tab" id="qus-{{$faq->id}}">
                                          <h5 class="mb-0">
                                             <a class="collapsed" data-bs-toggle="collapse" href="#collapse-{{$faq->id}}" aria-expanded="true" aria-controls="collapse-{{$faq->id}}">
                                                {!!$faq->question!!}
                                             </a>
                                          </h5>
                                       </div>
                                       <div id="collapse-{{$faq->id}}" class="collapse" data-bs-parent="#accordion-tab-two" role="tabpanel" aria-labelledby="qus-{{$faq->id}}">
                                          <div class="card-body">
                                             {{$faq->answer}}
                                          </div>
                                       </div>
                                    </div>
                                   @endforeach
                                 </div> 
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- ***faq section html start form here*** -->
            </section>
@endsection