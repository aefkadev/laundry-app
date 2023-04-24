@extends('layouts.client.app')

@section('title', 'Beranda')

@section('content')
@if(auth()->user()->roles_id == 1 || auth()->user()->roles_id == 2)
<body class="bg-dark">
    <div class="vh-100">
        <section class="nev-section py-5 px-4 d-flex justify-content-between align-items-center">
            <div class="p-2 d-flex rounded-4" style="background-color: #f1f1f1; color:black;">
@else
<body style="background-color: #AD48FA;">
    <div class="vh-100">
        <section class="nev-section py-5 px-4 d-flex justify-content-between align-items-center">
            <div class="p-2 d-flex rounded-4" style="background-color: #D6C37E;">
@endif
                <span class="fw-bolder m-2" style="font-size: 1rem">Laundry Sepatu SOC CLEAN Lampung</span>
            </div>
            <div class="button-container d-flex justify-content-center align-items-center">
                @if(auth()->user()->roles_id == 1 || auth()->user()->roles_id == 2)
                <div class="modal fade show" id="exampleModalFullscreen" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-modal="false" role="dialog">
                    <div class="modal-dialog fixed-bottom bottom-0">
                        <div class="modal-content" style="background-color: #E2DFEB;">
                            <div class="d-flex px-3 py-4">
                                <button type="button" class="border-0" data-bs-dismiss="modal" aria-label="Close" style="background-color: #E2DFEB; color: #2b2b2b; font-size: 20px;">
                                    <i class="fa-solid fa-arrow-left font-weight-bolder"></i>
                                </button>
                                <span class="font-weight-bolder px-2" style="color: #2b2b2b; font-size: 20px;">Menu</span>
                            </div>
                            <div class="d-flex flex-column gap-3 justify-content-start align-items-start w-100 pb-4">
                                    <a href="" class="d-flex align-items-center px-5 w-100">
                                        <i class="fa-solid fa-cart-arrow-down" style="color: #2b2b2b"></i>
                                        <p class="text-black m-0 px-2 text-lg">Layanan</p>
                                    </a>
                                    <a href="" class="d-flex align-items-center px-5 w-100">
                                        <i class="fa-solid fa-clock-rotate-left" style="color: #2b2b2b"></i>
                                        <p class="text-black m-0 px-2 text-lg">Riwayat Transaksi</p>
                                    </a>
                                    <a href="" class="d-flex align-items-center px-5 w-100">
                                        <i class="fa-solid fa-book" style="color: #2b2b2b"></i>
                                        <p class="text-black m-0 px-2 text-lg">Pembukuan</p>
                                    </a>
                                    <a href="" class="d-flex align-items-center px-5 w-100">
                                        <i class="fa-solid fa-users" style="color: #2b2b2b"></i>
                                        <p class="text-black m-0 px-2 text-lg">Kelola User</p>
                                    </a>
                                    <a href="" class="d-flex align-items-center px-5 w-100">
                                        <i class="fa-solid fa-person-walking-arrow-right" style="color: #ce1a1a"></i>
                                        <p class="text-black m-0 px-2 text-lg" style="color: #ce1a1a">Logout</p>
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <button data-bs-target="#exampleModalFullscreen" data-bs-toggle="modal" data-bs-dismiss="modal" class="btn" style="background-color: transparent">
                <i class="fa-solid fa-bars" style="font-size: 3rem; color: #E2DFEB;"></i>
                </button>
                @else
                <a class="px-2" href="#">
                    <i class="fa-solid fa-clock-rotate-left" style="font-size: 3rem; color: #E2DFEB;"></i>
                </a>
                @endif
                <a class="px-2" href="#">
                    <img src="{{ asset('assets/img/user-profile.png')}}" class="rounded-4" style="width: 60px; border:4px solid #E2DFEB;" alt="">
                </a>
            </div>
        </section>
        <section class="px-4">
            <div class="d-flex gap-4 align-items-center text-white text-md fw-normal mt-1">
                <i class="fa-solid fa-calendar-days"></i>
                <span>Senin-Jum'at</span>
            </div>
            <div class="d-flex gap-4 align-items-center text-white text-md fw-normal mt-1">
                <i class="fa-regular fa-clock"></i>
                <span>10.00 - 18.00</span>
            </div>
            <div class="d-flex gap-4 align-items-center text-white text-md fw-normal mt-1">
                <i class="fa-solid fa-location-dot"></i>
                <span>Jalan Mayor Sukardi Hamdani No.10, Kedaton, Bandar Lampung</span>
            </div>
            <div class="d-flex gap-4 align-items-center text-white text-md fw-normal mt-1">
                <i class="fa-brands fa-whatsapp"></i>
                <span>0813-9757-5460</span>
            </div>
            <div class="d-flex gap-4 align-items-center text-white text-md fw-normal mt-1">
                <i class="fa-brands fa-instagram"></i>
                <span>@soc.cleanlampung</span>
            </div>
        </section>
        <section class="d-flex flex-column gap-3 px-4 py-5">
            <a href="" class="d-flex align-items-center gap-4 bg-white ps-4 text-decoration-none font-weight-bolder text-black rounded-4">
                <img src="{{ asset('assets/img/clean-shoes.png')}}" style="width: 4.2rem;" alt="">
                <span>Premium Deep Clean</span>
            </a>
            <a href="" class="d-flex align-items-center gap-4 bg-white ps-4 text-decoration-none font-weight-bolder text-black rounded-4">
                <img src="{{ asset('assets/img/pain-shoes.png')}}" style="width: 4.2rem;" alt="">
                <span>Repaint</span>
            </a>
            <a href="" class="d-flex align-items-center gap-4 bg-white ps-4 text-decoration-none font-weight-bolder text-black rounded-4">
                <img src="{{ asset('assets/img/clean-shoes.png')}}" style="width: 4.2rem;" alt="">
                <span>Other</span>
            </a>
        </section>
    </div>
</body>
@endsection
