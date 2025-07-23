@include('admin.header')

<script>
$(document).ready(function(){
  $("#hide").click(function(){
    $(".attendance").hide();
  });
  $("#show").click(function(){
    $(".attendance").show();
  });
});
</script>

<div id="id01" class="modal" style="width: 100%;height:100%">
  <form style="width:800px;margin-left:300px;background:white;padding:10px" action="{{ route('admin.nhanvien.add') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container ">
      <h5 style="color:blue">Thông tin cá nhân:</h5>
      <label><b>Tên nhân viên</b></label>
      <input type="text" name="tennv" required>
      <label><b>Hình ảnh</b></label>
      <input type="file" name="image" required>
      <label><b>Số điện thoại</b></label>
      <input type="number" name="sodt" required>
      <label><b>Email</b></label>
      <input type="text" name="email" required id="txtEmail" aria-describedby="msgEmail">
      <small id="msgEmail" class="text-muted" style="color:red !important;display:none"></small>
      <label><b>Địa chỉ</b></label>
      <input type="text" name="diachi" required>
      <label><b>Vai trò</b></label>
      <input type="text" name="vaitro" required>
      <select name="role">
        <option value="Nhân viên quản lý thiết bị">Nhân viên quản lý thiết bị</option>
        <option value="Bảo vệ">Bảo vệ</option>
        <option value="Nhân viên quản lý chung">Nhân viên quản lý chung</option>
        <option value="Quản lý hệ thống">Quản lý hệ thống</option>
      </select>
      <input type="submit" name="themmoi" class="form-control text-bg-success" value="Đăng ký" onclick="return ktEmail('txtEmail','msgEmail','Sai định dạng Email !')">
    </div>
    <script>
      function ktEmail(idTag, idMsg, msg) {
        var idTag = document.getElementById(idTag);
        var idMsg = document.getElementById(idMsg);
        var valueInput = idTag.value;
        var redExr = /^^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        if (!redExr.test(valueInput) != "") {
          idMsg.style.display = "block";
          idMsg.innerHTML = msg;
          return false;       
        } else {
          idMsg.style.display = "none";
          return true;
        }
      }
    </script>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="form-control text-bg-danger">Cancel</button>
    </div>
  </form>
</div>
<div  class="container1">
  <section class="container">
    <div class="main-top">
      <h1 style="text-shadow: 0 0 5px gold, 0 0 7px #0000FF;">DANH SÁCH NHÂN VIÊN</h1>
    </div>
    <div class="d-flex flex-wrap">
      @if(isset($ketqua) && count($ketqua) > 0)
        @foreach($ketqua as $nv)
          <div class="users">
            <div class="card">
              <img style="margin-left: 130px;width: 70px;height: 70px;border-radius: 50%;" src="{{ asset($nv['image']) }}">
              <h4>{{ $nv['tennv'] }}</h4>
              <p>{{ $nv['vaitro'] }}</p>
              <div class="per">
                <table>
                  <tr>
                    <td><span>100%</span></td>
                    <td><span>90%</span></td>
                  </tr>
                  <tr>
                    <td>Nhiệt tình</td>
                    <td>Kinh nghiệm</td>
                  </tr>
                </table>
              </div>
              <a class="p-2 form-control text-bg-warning text-decoration-none text-center" href="{{ route('admin.nhanvien.update', ['id' => $nv['id']]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            </div>
          </div>
        @endforeach
      @endif
    </div>
    <button id="show" style="border-radius:8px"  class="text-bg-info p-2 mb-2 ">XEM CHI TIẾT!</button>
    <section class="attendance">
      <div class="attendance-list">
        <h1 style="text-shadow: 0 0 5px gold, 0 0 7px #0000FF;">THÔNG TIN CÁ NHÂN:</h1>
        <div class="d-flex flex-row">
          <div>
            <button onclick="document.getElementById('id01').style.display='block'" class="form-control ms-2 ps-3 pe-3 text-bg-success"><i class="fa fa-plus-square" aria-hidden="true"></i></button>
          </div>
          <div>
            <button class="form-control ms-2 text-bg-success">Xuất file</button>
          </div>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Họ và tên</th>
              <th>Ảnh</th>
              <th>Số điện thoại</th>
              <th>Email</th>
              <th>Địa chỉ</th>
              <th>Vai trò</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @if(isset($dsnv) && count($dsnv) > 0)
              @foreach($dsnv as $i => $nv)
                <tr>
                  <td>{{ $i+1 }}</td>
                  <td>{{ $nv['tennv'] }}</td>
                  <td><img style="width:120px;height:100px" src="{{ asset($nv['image']) }}"></td>
                  <td>{{ $nv['sodt'] }}</td>
                  <td>{{ $nv['email'] }}</td>
                  <td>{{ $nv['diachi'] }}</td>
                  <td>{{ $nv['vaitro'] }}</td>
                  <td>
                    <a class="p-2 form-control text-bg-warning text-decoration-none text-center" href="{{ route('admin.nhanvien.update', ['id' => $nv['id']]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                  </td>
                  <td><a class="p-2 form-control text-bg-danger text-center" href="{{ route('admin.nhanvien.delete', ['id' => $nv['id']]) }}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </section>
    <br><button id="hide" style="border-radius:8px;width:125px" class="text-bg-info p-2">RÚT GỌN!</button>
  </section>
</div>

@include('admin.footer') 