@include('admin.header')

<div id="id01" class="modal" style="width: 100%; height:100%;">
    <form style="width: 60%; margin: 0 auto; background: white; padding: 20px;" action="{{ route('admin.lichtap.add') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <h5 style="color: blue;">*Thông tin lịch tập:</h5>
            <label for="tengt"><b>Tên Gói tập</b></label>
            <input type="text" name="tengt" required>
            <label for="giobd"><b>Giờ bắt đầu</b></label>
            <input type="text" name="giobd">
            <label for="giokt"><b>Giờ kết thúc</b></label>
            <input type="text" name="giokt" required>
            <label for="ngaytap"><b>Ngày tập</b></label>
            <input type="text" name="ngaytap" required>
            <label for="phongtap"><b>Phòng tập</b></label>
            <input type="text" name="phongtap" required>
        </div>
        <div class="container" style="background-color: #f1f1f1; padding: 20px;">
            <input class="btn btn-success p-2 mb-2" type="submit" name="themmoilichtap" value="Thêm">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        </div>
    </form>
</div>

<div class="main-body">
  <div class="promo_card">
      <h1>QUẢN LÝ LỊCH TẬP</h1>
      <span>Ấn nút bên dưới để thêm!</span>
      <button style=" display: block; padding: 6px 12px; border-radius: 5px; cursor: pointer;width:150px" onclick="document.getElementById('id01').style.display='block'">Thêm</button>
    </div>
  <div class="list1">
    <form class="modal-content animate" action="{{ route('admin.lichtap.update') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="container">
        <label for="tengt"><b>Tên Gói tập</b></label>
        <input type="text" name="tengt" required value="{{ $ltct[0]['Ten'] ?? '' }}">
        <label for="giobd"><b>Giờ bắt đầu</b></label>
        <input type="text" name="giobd" value="{{ $ltct[0]['BatDau'] ?? '' }}">
        <label for="giokt"><b>Giờ kết thúc</b></label>
        <input type="text" name="giokt" required value="{{ $ltct[0]['KetThuc'] ?? '' }}">
        <label for="ngaytap"><b>Ngày tập</b></label>
        <input type="text" name="ngaytap" required value="{{ $ltct[0]['NgayTap'] ?? '' }}">
        <label for="phongtap"><b>Phòng tập</b></label>
        <input type="text" name="phongtap" required value="{{ $ltct[0]['phongtap'] ?? '' }}">
        <input type="submit" name="updatelichtap" value="Cập nhập" class="form-control text-bg-danger">
      </div>
    </form>
    <div class="list1 col-md-12 col-sm-12">
      <div class="row">
        <h4>THÔNG TIN LỊCH TẬP</h4>
      </div>
      <table>
        <thead>
          <tr>
            <th>Tên gói tập</th>
            <th>Giờ bắt đầu</th>
            <th>Giờ kết thúc</th>
            <th>Ngày tập</th>
            <th>Phòng tập</th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @if(isset($dslt) && count($dslt) > 0)
            @foreach($dslt as $lt)
              <tr>
                <td>{{ $lt['Ten'] }}</td>
                <td>{{ $lt['BatDau'] }}</td>
                <td>{{ $lt['KetThuc'] }}</td>
                <td>{{ $lt['NgayTap'] }}</td>
                <td>{{ $lt['phongtap'] }}</td>
                <td><a href="{{ route('admin.lichtap.edit', ['id' => $lt['id']]) }}">Sửa</a></td>
                <td><a href="{{ route('admin.lichtap.delete', ['id' => $lt['id']]) }}">Xóa</a></td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>

@include('admin.footer') 