@extends('main_landing.layout')
@section('title')
    LIKHAIN WORKS - Get your JOB HERE!
@endsection
@section('ellipse')
    <img class="ellipse-big" src="{{asset('img/landing_page/main_circle.svg')}}" alt="">
@endsection
{{-- SEARCHBAR --}}
@section('searchbar')
    <div class="row">
        <div class="col-md-6" id="logo_landing">
            <img class="col-md-12 pt-100" src="{{asset('img/landing_page/landing_page_03.svg')}}" alt="">
        </div>
        <div class="col-md-6 pt-120">
            <div class="row">
                <p style="font-size:4vw;" class="col-sm-12" id="heading1">Find the career you deserve</p>
                <div style="font-size:1.15rem; margin: 1.2rem 0rem 2rem 1rem;" id="heading2">
                <p> LikhainWorks is a support system to help Japanese Companies directly recuit or hire overseas engineers. </p>
                <p>
                    Directly recruit Engineers who meet your company’s requirements from all over the world.
                Search by factors such as language, security, cloud technology experience etc. to avoid any talent mismatch.

                Our system allows you to hire engineers from all over the world while drastically reducing recruitment
                costs. 
                </p>
                </div>
            </div>
                <div class="col-md-12">
                    <center>
                    <a href="/searchJob" class="btn btn-primary text-white joblist-btn"><h3 style="margin: 0 25px;"> Job List</h3></a>
                    </center>
                </div>
        </div>
    </div>


    {{-- <div class="row">
        <div class="col-md-12"  style="display: flex; justify-content: center; margin-top: 100px;">
                <div class="arrow-btn">
                        <a href="#procedure" class="down"><i class="fa animated bounce fa-angle-double-down" style="display: flex; justify-content: center;"></i></a>
                </div>
        </div>
    </div> --}}
@endsection
{{-- end SEARCHBAR --}}
{{-- PROCEDURE --}}
@section('procedure')
	<div class="container-fluid">
        <div class="row mt-30">
            <img class="col-md-2 offset-md-3" src="{{asset('img/landing_page/strikethrough.svg')}}" alt="">
            <div class="col-md-2">
                <h1 class="text-center"> Get Started </h1>
            </div>
            <img class="col-md-2" src="{{asset('img/landing_page/strikethrough.svg')}}" alt="">
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <p class="text-center txt-24">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum doloremque ipsum illo quisquam debitis veniam consequatur temporibus aperiam amet quo.</p>
            </div>
        </div>
        <div class="row mb-40">
            <div  class="col-md-9" style="display: flex; justify-content: center; margin: 0 auto;">
                <div class="row mb-40">
                    <div class="col-md-4 col-sm-12">
                        <div class="text-center">
                            <div class="card-body">
                                <div class="circle green-blueish mx-auto">
                                    <span class="fa fa-handshake text-center procedure-icon"></span>
                                </div>
                                <h4 class="card-title mt-10">Get hired fast</h4>
                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam dolores deserunt cum fuga ipsam doloribus sunt eligendi eos, non repellat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="text-center">
                            <div class="card-body">
                                <div class="circle blueish mx-auto">
                                    <span class="fa fa-paste text-center procedure-icon"></span>
                                </div>
                                <h4 class="card-title mt-10">Scheduled interview</h4>
                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam dolores deserunt cum fuga ipsam doloribus sunt eligendi eos, non repellat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="text-center">
                            <div class="card-body">
                                <div class="circle brownish mx-auto">
                                    <span class="fa fa-comments text-center procedure-icon"></span>
                                </div>
                                <h4 class="card-title mt-10">Video call interview</h4>
                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam dolores deserunt cum fuga ipsam doloribus sunt eligendi eos, non repellat.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- end PROCEDURE --}}
{{-- COUNT --}}
@section('count')
	<div class="container-fluid mb-5 count-gradient">
        <div class="row pt-60">
            <div class="col-md-6 offset-md-3">
                <div class="row text-center">
                    <div class="col-md-4">
                        <h1 class="mbot-n1">294</h1>
                        <br>
                        <p>Registered Companies</p>
                    </div>
                    <div class="col-md-4">
                        <h1 class="mbot-n1">10,000</h1>
                        <br>
                        <p>Applicants</p>
                    </div>
                    <div class="col-md-4">
                        <h1 class="mbot-n1">16,424</h1>
                        <br>
                        <p>Job Posts</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- end COUNT --}}
{{-- PARTNERS --}}
@section('partner')
	<div class="container-fluid mb-4">
        <div class="row">
            <div class="col-md-6 offset-md-1">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h3 class="card-title">IBM</h3>
                        <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem eum quas mollitia. Totam atque quos unde natus, minima obcaecati quisquam ipsum alias architecto asperiores, voluptas aspernatur aut eligendi at nihil accusantium, fugit repellendus ab porro aliquam cupiditate quo blanditiis voluptatem neque? Porro natus, ipsam in nisi corporis dolorum placeat? Velit necessitatibus temporibus consectetur accusamus impedit itaque ullam excepturi, atque magnam possimus. Hic fugit quo quod, illum animi quas iste recusandae praesentium earum qui ducimus quibusdam quasi corrupti quia dolor voluptate eum aspernatur, placeat sapiente nobis nemo impedit deleniti illo! Totam vero exercitationem corrupti quas odit magnam! Mollitia accusamus dolores similique.</p>
                    </div>
                </div>
                <div class="card text-white bg-cyan mb-3">
                    <div class="card-body">
                        <h3 class="card-title">ORACLE</h3>
                        <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem eum quas mollitia. Totam atque quos unde natus, minima obcaecati quisquam ipsum alias architecto asperiores, voluptas aspernatur aut eligendi at nihil accusantium, fugit repellendus ab porro aliquam cupiditate quo blanditiis voluptatem neque? Porro natus, ipsam in nisi corporis dolorum placeat? Velit necessitatibus temporibus consectetur accusamus impedit itaque ullam excepturi, atque magnam possimus. Hic fugit quo quod, illum animi quas iste recusandae praesentium earum qui ducimus quibusdam quasi corrupti quia dolor voluptate eum aspernatur, placeat sapiente nobis nemo impedit deleniti illo! Totam vero exercitationem corrupti quas odit magnam! Mollitia accusamus dolores similique.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 try">
                <h2>What they say about us</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere cumque porro repellendus quis debitis labore saepe odio molestias laboriosam minus?</p>
                <img class="col-md-8 offset-md-4 pt-100" src="{{asset('img/landing_page/partner.svg')}}" alt="">
            </div>
        </div>
    </div>
@endsection
{{-- end PARTNERS --}}
