<section class="pb-4 bottom-0 fixed-bottom">
    @if(auth()->user()->roles_id == 1)
        <a href="/super" class="d-flex flex-column align-items-center text-decoration-none fw-bold" style="color: black;">
            <i class="fa-solid fa-house"></i>
            <span>Beranda</span>
        </a>
    @elseif(auth()->user()->roles_id == 2)
        <a href="/admin" class="d-flex flex-column align-items-center text-decoration-none fw-bold" style="color: black;">
            <i class="fa-solid fa-house"></i>
            <span>Beranda</span>
        </a>
    @elseif(auth()->user()->roles_id == 3)
        <a href="/" class="d-flex flex-column align-items-center text-decoration-none fw-bold" style="color: black;">
            <i class="fa-solid fa-house"></i>
            <span>Beranda</span>
        </a>
    @endif
</section>