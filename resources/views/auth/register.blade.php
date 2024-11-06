<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Pengguna</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/style.css') }}">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
          <a href="{{ url('/') }}" class="d-flex justify-content-center">
            <img src="{{ asset('adminlte/logo-d.png') }}" alt="logo-brand" height="150px">
          </a>
            <div class="card-header text-center"><a href="{{ url('/') }}" class="h1"><b>Dann's</b> Store</a></div>
            <div class="card-body">
                <p class="register-box-msg">Silahkan daftar akun</p>
                <form action="{{ url('register') }}" method="POST" id="form-register">
                    @csrf
                    <div class="form-group row">
                        <div class="col-12">
                            <select name="level_id" id="level_id" class="form-control" required>
                                <option value="">- Pilih Level -</option>
                                @foreach ($level as $item)
                                    <option value="{{ $item->level_id}}">{{ $item->level_nama}}</option>
                                @endforeach
                            </select>
                            @error('level_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" id="username" name="username" class="form-control"
                            placeholder="Username">
                        <small id="error-username" class="error-text text-danger"></small>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" id="nama" name="nama" class="form-control"
                            placeholder="Nama">
                        <small id="error-nama" class="error-text text-danger"></small>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password" class="form-control"
                            placeholder="Password">
                        <small id="error-password" class="error-text text-danger"></small>
                    </div>
                    <div class="row">
                        <div class="col-8 mt-2">
                            <a href="{{ url('login') }}" class="text-left">Sudah punya akun?</a>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-outline-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- jquery-validation -->
    <script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

    <script>
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $(document).ready(function() {
        $('#form-register').validate({
          rules: {
            username: {required: true, minlength: 4, maxlength: 20},
            nama: {required: true, maxlength: 100},
            password: {required: true, minlength: 6, maxlength: 20}
          },
          submitHandler: function(form) {
            $.ajax({
              url: form.action,
              type: form.method,
              data: $(form).serialize(),
              success: function(response) {
                if(response.status) {
                  Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: response.message,
                  }).then(function() {
                    window.location = response.redirect;
                  });
                } else {
                  $('.error-text').text('');
                  $.each(response.msgField, function(prefix, val) {
                    $('#error-'+prefix).text(val[0]);
                  });
                  Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: response.message
                  });
                }
              }
            });
            return false;
          },
          errorElement: 'span',
          errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.input-group').append(error);
          },
          highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          }
        });
      });
    </script>
</body>
</html>