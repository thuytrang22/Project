@extends('.layouts.admin')
@section('content')

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Hồ Sơ</li>
    </ul>
  </div>
</section>
@if(auth()->user()->role_id == "1")
  <section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <a href="{{route ('list.users') }}" class="button green"> Danh sách tài khoản</a>
    </div>
  </section>
@endif

  <section class="section main-section">
      <div class="card grid grid-cols-1 gap-6 mb-6">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-account"></i></span>
            Hồ Sơ
          </p>
        </header>
        <div class="card-content">
          <div class="image w-48 h-48 mx-auto">
          @if ($currentUser->image)
            <img src="{{ asset('storage/' .substr($currentUser->image, 6)) }}" alt="Hình ảnh" class="rounded-full">
          @else
            <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe" class="rounded-full">
          @endif
          </div>
          <hr>
          <div class="field">
            <label class="label">Họ & Tên</label>
            <div class="control">
              <input type="text" readonly value="{{ $currentUser->name }}" class="input is-static">
            </div>
          </div>
          <hr>
          <div class="field">
            <label class="label">E-mail</label>
            <div class="control">
              <input type="text" readonly value="{{ $currentUser->email }}" class="input is-static">
            </div>
          </div>
        </div>
      </div>
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">
    @if(auth()->user()->role_id == "1")
      <div class="card">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-account-circle"></i></span>
            Sửa Hồ Sơ
          </p>
        </header>
        <div class="card-content">
          <form action="{{ route('edit.profile')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="field">
              <label class="label">Ảnh đại diện</label>
              <div class="field-body">
              <div class="mb-3">
                <label for="" class="form-label">Hình Ảnh:</label>
                <img id="preview" class="image mt-2">
                <input type="file" id="uploadImage" onchange="previewImage()" name="image" accept="image/*" value="{{old('image')}}" class="form-control" @error('image') is-invalid @enderror>
                @error('image')
                  <div class="invalid-feedback">
                      {{$message}}
                  </div>
                @enderror
              </div>
              </div>
            </div>
            <hr>
            <div class="field">
              <label class="label">Họ & Tên</label>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <input type="text" autocomplete="on" name="name" value="{{ old('name') }}" class="input" required @error('name') is-invalid @enderror>
                      @error('name')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                      @enderror
                  </div>
                </div>
              </div>
            </div>
            <div class="field">
              <label class="label">E-mail</label>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <input type="email" autocomplete="on" name="email" value="{{old('email') }}" class="input" required @error('name') is-invalid @enderror>
                      @error('email')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                      @enderror
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="field">
              <div class="control">
                <button type="submit" class="button green">
                  Lưu
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="card">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-lock"></i></span>
            Thay đổi mật khẩu
          </p>
        </header>
        <div class="card-content">
          <form action="{{ route('change.password')}}" method="POST">
            @csrf
            <div class="field">
                <label class="label">Mật khẩu hiện tại</label>
                <div class="control">
                    <input type="password" name="current_password" autocomplete="current-password" class="input" required>
                    @error('current_password')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <hr>
            <div class="field">
                <label class="label">Mật khẩu mới</label>
                <div class="control">
                    <input type="password" name="password" autocomplete="new-password" value="{{ old('password') }}" class="input" required @error('password') is-invalid @enderror>
                    @error('password')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label">Xác nhận mật khẩu mới</label>
                <div class="control">
                    <input type="password" name="password_confirmation" autocomplete="new-password" class="input" required>
                </div>
            </div>
            <hr>
            <div class="field">
                <div class="control">
                    <button type="submit" class="button green">
                        Lưu
                    </button>
                </div>
            </div>
          </form>
        </div>
      </div>
    @endif
  </div>
  </section>

<div id="sample-modal" class="modal">
  <div class="modal-background --jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Sample modal</p>
    </header>
    <section class="modal-card-body">
      <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
      <p>This is sample modal</p>
    </section>
    <footer class="modal-card-foot">
      <button class="button --jb-modal-close">Cancel</button>
      <button class="button red --jb-modal-close">Confirm</button>
    </footer>
  </div>
</div>

<div id="sample-modal-2" class="modal">
  <div class="modal-background --jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Sample modal</p>
    </header>
    <section class="modal-card-body">
      <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
      <p>This is sample modal</p>
    </section>
    <footer class="modal-card-foot">
      <button class="button --jb-modal-close">Cancel</button>
      <button class="button blue --jb-modal-close">Confirm</button>
    </footer>
  </div>
</div>

<script>
    function previewImage() {
        let fileInput = document.getElementById('uploadImage');
        let preview = document.getElementById('preview');
        if (fileInput.files && fileInput.files[0]) {
            let reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(fileInput.files[0]);
        } else {
            preview.src = "";
        }
    }
</script>
@endsection