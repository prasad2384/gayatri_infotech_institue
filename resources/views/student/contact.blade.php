@extends('student.header')
@section('matter')
<section class="page-title-section overlay" data-background="images/backgrounds/page-title.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-inline custom-breadcrumb">
                    <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Contact Us</a></li>
                    <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
                </ul>
                <p class="text-lighten">Do you have other questions? Don't worry, there aren't any dumb questions. Just
                    fill out the form below and we'll get back to you as soon as possible.</p>
            </div>
        </div>
    </div>
</section>
<!-- /page title -->

<!-- contact -->
<section class="section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-title">Contact Us</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <form action="/addcontact" method="post">
                    @csrf

                    <div class="mb-2">
                        <input type="text" class="form-control " id="name" name="name" placeholder="Your Name" value="{{ old('name') }}">
                        @error('name')
                        <span style="color:red;">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control " id="mail" name="email" placeholder="Your Email" value="{{ old('email') }}">
                        @error('email')
                        <span style="color:red;">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <input type="number" maxlength="10" class="form-control " id="subject" name="number" placeholder="Mobile No" value="{{ old('number') }}">
                        @error('number')
                        <span style="color:red;">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <textarea name="message" id="message" class="form-control " placeholder="Your Message" value="{{ old('message') }}"></textarea>
                        @error('message')
                        <span style="color:red;">{{$message}}</span>
                        @enderror
                    </div>
                    <br>
                    <button type="submit" value="send" class="btn btn-primary">SEND MESSAGE</button>
                </form>
            </div>
            <div class="col-lg-5">
                <!-- <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit recusandae voluptates
                    doloremque veniam temporibus porro culpa ipsa, nisi soluta minima saepe laboriosam debitis nesciunt.
                    Dolore, labore. Accusamus nulla sed cum aliquid exercitationem debitis error harum porro maxime quo
                    iusto aliquam dicta modi earum fugiat, vel possimus commodi, deleniti et veniam, fuga ipsum
                    praesentium. Odit unde optio nulla ipsum quae obcaecati! Quod esse natus quibusdam asperiores quam
                    vel, tempore itaque architecto ducimus expedita</p> -->
                <p class=" mb-5 text-color h5 d-block">Contact : +91 9422781840 <small>(Mon to Fri 9am to 6pm)</small></p>
                <p class="mb-5 text-color h5 d-block">Email-ID : gayatriinfotech123@gmail.com <small>(Send us your query anytime!)</small></p>
                <p class="mb-5 text-color h5 d-block">Gayatri Infotech : 9/4, Shri Markendaya Yantramag Dharak Society, Near New WIT College, Next to Upahar Bakery lane,
                    Solapur - 413006</p>
            </div>
        </div>
    </div>
</section>
<!-- /contact -->

<!-- gmap -->
<section class="section pt-0">
    <!-- Google Map -->
    {{-- <div id="map_canvas" data-latitude="51.507351" data-longitude="-0.127758"></div> --}}
    <iframe id="map_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15206.67817606205!2d75.90768313737733!3d17.66580352825758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc5dbef58e4318f%3A0x8f310059042c5445!2sGayatri%20Infotech!5e0!3m2!1sen!2sin!4v1694164013106!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
<!-- /gmap -->
@endsection