<header class="admin-header" style="margin-bottom:0;">
    <div class="container-fluid px-0" style="background: linear-gradient(90deg, #16222A 60%, #1abc9c 100%);">
        <div class="row align-items-center g-0" style="min-height: 180px;">
            <div class="col-md-7 d-flex align-items-center ps-5" style="min-height: 180px;">
                <h1 class="fw-bold mb-0" style="font-size:2.7rem; color:#00eaff; text-shadow:0 2px 8px #1abc9c; letter-spacing: 1px;">
                    HỆ THỐNG QUẢN LÝ<br>PHÒNG GYM
                </h1>
            </div>
            <div class="col-md-5 d-flex align-items-center justify-content-center">
                <img src="{{ asset('admin/uploaded/header.jpg') }}" alt="Header" style="max-height:150px; width:auto; object-fit:cover; border-radius: 18px; box-shadow:0 2px 12px #0002;">
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg" style="background: #219150; margin-bottom:0;">
        <div class="container">
            <a class="navbar-brand fw-bold text-white" style="font-size:2rem; letter-spacing:2px;" href="#">FITNESS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarResponsive">
                <ul class="navbar-nav mb-2 mb-lg-0 gap-lg-3" style="font-size:1.25rem; text-transform:uppercase; font-weight:600;">
                    <li class="nav-item"><a class="nav-link text-white fw-bold @if(request()->routeIs('admin.trangchu')) active @endif" href="{{ route('admin.trangchu') }}">TRANG CHỦ</a></li>
                    <li class="nav-item"><a class="nav-link text-white @if(request()->routeIs('admin.nhanvien')) active @endif" href="{{ route('admin.nhanvien') }}">NHÂN VIÊN</a></li>
                    <li class="nav-item"><a class="nav-link text-white @if(request()->routeIs('admin.khachhang')) active @endif" href="{{ route('admin.khachhang') }}">KHÁCH HÀNG</a></li>
                    <li class="nav-item"><a class="nav-link text-white @if(request()->routeIs('admin.pt')) active @endif" href="{{ route('admin.pt') }}">PT</a></li>
                    <li class="nav-item"><a class="nav-link text-white @if(request()->routeIs('admin.dungcu')) active @endif" href="{{ route('admin.dungcu') }}">DỤNG CỤ</a></li>
                    <li class="nav-item"><a class="nav-link text-white @if(request()->routeIs('admin.lichtap')) active @endif" href="{{ route('admin.lichtap') }}">LỊCH TẬP</a></li>
                    <li class="nav-item"><a class="nav-link text-white @if(request()->routeIs('admin.goitap')) active @endif" href="{{ route('admin.goitap') }}">GÓI TẬP</a></li>
                    <li class="nav-item"><a class="nav-link text-white @if(request()->routeIs('admin.thongke')) active @endif" href="{{ route('admin.thongke') }}">DOANH THU</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>