@extends('userInterface.layout.master')

@section('content')
 <!-- HERO SECTION START -->
    @include('userInterface.pages.hero')
 <!-- HERO SECTION END -->

 <!-- SERVICES SECTION START -->
 @include('userInterface.pages.services')
 <!-- SERVICES SECTION END -->

 <!-- start: Service Popup -->
 @include('userInterface.pages.servicesPopup')
 <!-- end: Service Popup -->

 <!-- PORTFOLIO SECTION START -->
 @include('userInterface.pages.portfolio')
 <!-- PORTFOLIO SECTION END -->

 <!-- start: Portfolio Popup -->
@include('userInterface.pages.portfolioPopup')
 <!-- end: Portfolio Popup -->

 <!-- RESUME SECTION START -->
@include('userInterface.pages.resume')
 <!-- RESUME SECTION END -->

 <!-- SKILLS SECTION START -->
@include('userInterface.pages.skills')
 <!-- SKILLS SECTION END -->

 <!-- TESTIMONIAL SECTION START -->
@include('userInterface.pages.testimonial')
 <!-- TESTIMONIAL SECTION END -->

 <!-- BLOG SECTION STAR -->
<!-- @include('userInterface.pages.blog') -->
 <!-- BLOG SECTION END -->

 <!-- CONTACT SECTION START -->
@include('userInterface.pages.contact')
 <!-- CONTACT SECTION END -->

 <!-- BEGIN: Contact Form Success Modal Message -->
@include('userInterface.pages.contactFormSuccessModal')
 <!-- END: Contact Form Success Modal Message -->

 <!-- BEGIN: Contact Form Fail Modal Message -->
@include('userInterface.pages.contactFormFailModal')
 <!-- END: Contact Form Fail Modal Message End -->
@endsection
