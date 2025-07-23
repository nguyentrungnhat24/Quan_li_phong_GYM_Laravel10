@include('admin.header')

<div id="id01" class="modal" style="width: 100%;height:100%">
  <form style="width:800px;margin-left:300px;background:white;padding:10px" action="{{ route('admin.khachhang.add') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container ">
      <h5 style="color:blue">*Thông tin cá nhân:</h5>
      <label><b>Tên khách hàng</b></label>
      <input type="text" name="tenkh" required>
      <label><b>Hình ảnh</b></label>
      <input type="file" name="image">
      <label><b>Số điện thoại</b></label>
      <input type="number" name="sodt" required>
      <label><b>Email</b></label>
      <input type="text" name="email" required id="txtEmail" aria-describedby="msgEmail">
      <small id="msgEmail" class="text-muted" style="color:red !important;display:none"></small><br>
      <label><b>Địa chỉ</b></label>
      <input type="text" name="diachi" required>
    </div>
    <div class="container" style="background-color:#f1f1f1">
      <input class="btn btn-success p-2 mb-2" type="submit" name="themmoikh" value="Đăng ký" onclick="return ktEmail('txtEmail','msgEmail','Sai định dạng Email !')">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>
<header class="header">
  <div class="logo">
    <a href="#">Tìm kiếm</a>
    <div class="search_box">
      <form class="d-flex flex-row" action="{{ route('admin.khachhang.search') }}" method="post">
        @csrf
        <input type="text" name="kyw" placeholder="Nhập tên để tìm!" >
        <input type="submit" name="timkiem" value="Tìm kiếm" >
      </form>
    </div>
  </div>
  <div class="header-icons">
    <i class="fas fa-bell"></i>
    <div class="account">
      <img src="{{ asset('admin/uploaded/icon.jpg') }}" alt="">
      <h4>FITNESS</h4>
    </div>
  </div>
</header>
<div class="container1">
  <div class="main-body">
    <div class="promo_card">
      <h1>QUẢN LÝ KHÁCH HÀNG</h1>
      <span>Ấn nút bên dưới để đăng ký!</span>
      <button style=" display: block;padding: 6px 12px;border-radius: 5px;cursor: pointer;width:150px" onclick="document.getElementById('id01').style.display='block'" >Đăng ký</button>
    </div>
    <div class="list1 col-md-12 col-sm-12">
      <div class="row">
        <h4>THÔNG TIN KHÁCH HÀNG</h4>
      </div>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Họ và tên</th>
            <th>Ảnh</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Địa Chỉ</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @if(isset($dskh) && count($dskh) > 0)
            @foreach($dskh as $i => $kh)
              <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $kh['tenkh'] }}</td>
                <td><img style="width:120px;height:100px" src="{{ asset($kh['image']) }}"></td>
                <td>{{ $kh['sodt'] }}</td>
                <td>{{ $kh['email'] }}</td>
                <td>{{ $kh['diachi'] }}</td>
                <td><a class="p-2 form-control text-bg-warning text-decoration-none text-center" href="{{ route('admin.khachhang.update', ['id' => $kh['id']]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                <td><a class="p-2 form-control text-bg-danger text-center" href="{{ route('admin.khachhang.delete', ['id' => $kh['id']]) }}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
@include('admin.footer') 