@extends('frontend.layout')

@section('content')
    <div class="hero overlay inner-page bg-primary py-5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h1 class="heading text-white mb-3" data-aos="fade-up">
                        Contact Us
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            @if (count($errors) > 0)
                <div class="content-header mb-0 pb-0">
                    <div class="container-fluid">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="p-0 m-0" style="list-style: none;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            @if (session()->has('message'))
                <div class="content-header mb-0 pb-4">
                    <div class="container-fluid">
                        <div class="mb-0 alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show"
                            role="alert">
                            <strong>{{ session()->get('message') }}</strong>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-info">
                        <div class="address mt-2">
                            <i class="icon-room"></i>
                            <h4 class="mb-2">Location:</h4>
                            <p>
                                43 Raymouth Rd. Baltemoer,<br />
                                London 3910
                            </p>
                        </div>

                        <div class="open-hours mt-4">
                            <i class="icon-clock-o"></i>
                            <h4 class="mb-2">Open Hours:</h4>
                            <p>
                                Sunday-Friday:<br />
                                11:00 AM - 2300 PM
                            </p>
                        </div>

                        <div class="email mt-4">
                            <i class="icon-envelope"></i>
                            <h4 class="mb-2">Email:</h4>
                            <p>info@Untree.co</p>
                        </div>

                        <div class="phone mt-4">
                            <i class="icon-phone"></i>
                            <h4 class="mb-2">Call:</h4>
                            <p>+1 1234 55488 55</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6 mb-3">
                                <input type="text" class="form-control" placeholder="Your Name" name="name" />
                            </div>
                            <div class="col-6 mb-3">
                                <input type="email" class="form-control" placeholder="Your Email" name="email" />
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" class="form-control" placeholder="Message"
                                    name="message"></input>
                            </div>

                            <div class="col-12">
                                <input type="submit" value="Send Message" class="btn btn-primary" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.untree_co-section -->
@endsection
