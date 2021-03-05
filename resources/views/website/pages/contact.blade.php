@extends('layouts.app')

@section('banner_area')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div
                    class="banner_content d-md-flex justify-content-between align-items-center"
                >
                    <div class="mb-3 mb-md-0">
                        <h2>Contactez Nous</h2>
                        <p>Service Client a votre écoute</p>
                    </div>
                    <div class="page_link">
                        <a href="{{url('/')}}">Accueil</a>
                        <a href="{{route('contact')}}">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

@endsection

@section('content')

    <!-- ================ contact section start ================= -->
    <section class="section_gap">
        <div class="container">
       <div style="width: 100%"><iframe width="100%" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=480&amp;hl=en&amp;q=cit%C3%A9%20el%20manar+(el%20khroub)&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>


            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Contact</h2>
                    @if(session()->has('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                </div>
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <form class="form-contact contact_form" action="{{route('contact.send')}}" method="post" id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100 @error('message') is-invalid @enderror" name="message" id="message" cols="30" rows="5" placeholder="Message">{{old('message')}}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" name="name" id="name" type="text" placeholder="votre nom">
                                    @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" name="email" id="email" type="email" placeholder="votre addresse email ">
                                    @error('email')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control @error('subject') is-invalid @enderror" value="{{old('subject')}}" name="subject" id="subject" type="text" placeholder="Sujet">
                                    @error('subject')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-lg-3">
                            <button type="submit" class="main_btn">Envoyer</button>
                        </div>
                    </form>


                </div>

                <div class="col-lg-4">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Sidi Mabrouk Superieure</h3>
                            <p>Constantine Algerie</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3><a href="tel:454545654">+213 560 23 23 16</a></h3>
                            <p>Du Samedi au jeudi de 9h a 16h</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3><a href="mailto:support@7clics.com">support@7clics.com</a></h3>
                            <p>Envoyez nous vos Messages!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection
