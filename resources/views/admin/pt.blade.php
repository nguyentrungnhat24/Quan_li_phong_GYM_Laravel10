@include('admin.header')

<div class="main">
  <div class="main-top">
    <h1>Danh sách PT</h1>
  </div>
  <div class="main-skills">
    @if(isset($dspt) && count($dspt) > 0)
      @foreach($dspt as $pt)
        <div class="card">
          <i class="fa-solid fa-user"></i>
          <h3>{{ $pt['tenpt'] }}</h3>
          <p>{{ $pt['mota'] }}</p>
          <button onclick="window.location.href='{{ route('admin.pt.detail', ['id' => $pt['id']]) }}'">Chi tiết</button>
        </div>
      @endforeach
    @endif
  </div>
  <div class="main-course">
    <h2>Khóa học của PT</h2>
    <div class="course-box">
      <ul>
        <li class="active">Tất cả</li>
        <li>Yoga</li>
        <li>Fitness</li>
        <li>Cardio</li>
      </ul>
      <div class="course">
        @if(isset($dsptkhoahoc) && count($dsptkhoahoc) > 0)
          @foreach($dsptkhoahoc as $khoahoc)
            <div class="box">
              <i class="fa-solid fa-dumbbell"></i>
              <h4>{{ $khoahoc['tenkhoahoc'] }}</h4>
              <p>{{ $khoahoc['mota'] }}</p>
              <button onclick="window.location.href='{{ route('admin.pt.khoahoc.detail', ['id' => $khoahoc['id']]) }}'">Chi tiết</button>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>
</div>

@include('admin.footer') 