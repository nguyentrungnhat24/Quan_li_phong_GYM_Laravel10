@include('admin.header')

<div class="main-body">
  <div class="list1">
    <form class="modal-content animate" action="{{ route('admin.goitap.update') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="container">
        <label for="tenloptap"><b>Tên lớp tập</b></label>
        <input type="text" name="tenloptap" required value="{{ $gtct[0]['tenloptap'] ?? '' }}">
        <label for="gia"><b>Giá</b></label>
        <input type="text" name="gia" value="{{ $gtct[0]['gia'] ?? '' }}">
        <label for="soluong"><b>Số lượng</b></label>
        <input type="text" name="soluong" required value="{{ $gtct[0]['soluong'] ?? '' }}">
        <label for="thoigian"><b>Thời gian</b></label>
        <input type="text" name="thoigian" required value="{{ $gtct[0]['thoigian'] ?? '' }}">
        <label for="tenkh"><b>Tên khách hàng</b></label>
        <input type="text" name="tenkh" value="{{ $gtct[0]['tenkh'] ?? '' }}">
        <label for="diachi"><b>Địa chỉ</b></label>
        <input type="text" name="diachi" value="{{ $gtct[0]['diachi'] ?? '' }}">
        <label for="sdt"><b>Số điện thoại</b></label>
        <input type="text" name="sdt" value="{{ $gtct[0]['sdt'] ?? '' }}">
        <label for="email"><b>Email</b></label>
        <input type="text" name="email" value="{{ $gtct[0]['email'] ?? '' }}">
        <input type="submit" name="update_goitap" value="Cập nhập" class="form-control text-bg-danger">
      </div>
    </form>
    <div class="container1">
      <div class="main-body">
        <div class="list1">
          <div class="row">
            <h4>THÔNG TIN GÓI TẬP</h4>
          </div>
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Tên lớp tập</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thời gian</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if(isset($dsgt) && count($dsgt) > 0)
                @foreach($dsgt as $gt)
                  <tr>
                    <td>{{ $gt['id'] }}</td>
                    <td>{{ $gt['tenloptap'] }}</td>
                    <td>{{ $gt['gia'] }}</td>
                    <td>{{ $gt['soluong'] }}</td>
                    <td>{{ $gt['thoigian'] }}</td>
                    <td>{{ $gt['tenkh'] }}</td>
                    <td>{{ $gt['diachi'] }}</td>
                    <td>{{ $gt['sdt'] }}</td>
                    <td>{{ $gt['email'] }}</td>
                    <td><a href="{{ route('admin.goitap.edit', ['id' => $gt['id']]) }}">Sửa</a></td>
                    <td><a href="{{ route('admin.goitap.delete', ['id' => $gt['id']]) }}">Xóa</a></td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@include('admin.footer') 