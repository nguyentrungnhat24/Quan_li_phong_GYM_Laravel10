@include('admin.header')

<section class="services">
  <div class="container">
    <div class="title">
      <h1>Welcome to the <span>gym management system</span></h1>
    </div>
    <div class="services_boxes">
      <div class="box">
        <a class="nav-link text-white" href="{{ route('admin.nhanvien') }}"><i class="fa-solid fa-person-breastfeeding"></i></a>
        <h4>Nhân viên</h4>
      </div>
      <div class="box br col-sm-6 col-md-4">
        <a class="nav-link text-white" href="{{ route('admin.khachhang') }}"><i class="fa-sharp fa-solid fa-person"></i></a>
        <h4>Khách hàng</h4>
      </div>
      <div class="box col-sm-6 col-md-4">
        <a class="nav-link text-white" href="{{ route('admin.pt') }}"><i class="fa-solid fa-people-group"></i></a>
        <h4>PT</h4>
      </div>
      <div class="box col-sm-6 col-md-4">
        <a class="nav-link text-white" href="{{ route('admin.dungcu') }}"><i class="fa-solid fa-dumbbell"></i></a>
        <h4>Dụng cụ</h4>
      </div>
      <div class="box col-sm-6 col-md-4">
        <a class="nav-link text-white" href="{{ route('admin.thongke') }}"><i class="fa-solid fa-money-check-dollar"></i></a>
        <h4>Doanh thu</h4>
      </div>
      <div class="box col-sm-6 col-md-4">
        <a class="nav-link text-white" href="{{ route('admin.bmi') }}"><i class="fa-sharp fa-solid fa-list-check"></i></a>
        <h4>Kiểm tra chỉ số BMI</h4>
      </div>
      <div class="box col-sm-6 col-md-4">
        <a class="nav-link text-white" href="{{ route('admin.logout') }}"><i class="fa-solid fa-right-from-bracket"></i></a>
        <h4>Đăng xuất</h4>
      </div>
      <div class="box col-sm-6 col-md-4">
        <a class="nav-link text-white" href="{{ route('admin.user') }}"><i class="fa-solid fa-user-plus"></i></a>
        <h4>Thay đổi mật khẩu</h4>
      </div>
    </div>
  </div>
</section>

@include('admin.footer') 