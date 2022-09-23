@extends('layouts.frontapp')

@section('content')
<section class="inner-page-wrap">
               <!-- ***Inner Banner html start form here*** -->
               <div class="inner-banner-wrap">
               	@php
                  $image = asset('/images/pages/'.$page->image);
               @endphp
                  <div class="inner-baner-container" style="background-image: url({{$image}});">
                     <div class="container">
                        <div class="inner-banner-content">
                           <h1 class="page-title">{{$page->name}}</h1>
                        </div>
                     </div>
                  </div>
               </div>
               {!!$page->description!!}
            </section>
@endsection