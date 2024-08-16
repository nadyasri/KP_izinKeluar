<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        body {
            background-image: url("img/bg.jpg");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
        }
        header {
            background-color: #436850;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed; /* Header tetap di atas */
            top: 0; /* Posisi di bagian atas */
            width: 100%; /* Lebar penuh */
            z-index: 1000; /* Di atas elemen lain */
        }
        .main-content {
            padding-top: 60px; /* Sesuaikan dengan tinggi header */
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 20px;
        }
        .login-title {
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
    <title>SIKAN</title>
</head>
<body>
    <header>
        <h1>SIKAN</h1>
    </header>
    <main class="main-content"> <!-- Menambahkan kelas main-content -->
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="login-container col-md-6 col-lg-4 p-4">
                <div class="text-center mb-4">
                    <h1 class="h3 login-title mb-8">SIKAN</h1>
                    <p>Edit an account</p>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.update', ['nip' => $user->nip]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" value="{{$user->nip}}" name="nip" class="form-control" id="nip" required>
                    </div>
                    <div class="mb-3">
                        <label for="namaDepan" class="form-label">Nama Lengkap</label>
                        <input type="text" value="{{$user->nama}}" name="namaDepan" class="form-control" id="namaDepan" required>
                    </div>
                    <div class="mb-3">
                        <label for="pangkat" class="form-label">Pangkat</label>
                        <input type="text" value="{{$user->pangkat}}" name="pangkat" class="form-control" id="pangkat" required>
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <select name="Users_groupId" id="jabatan" class="form-control" required>
                            @foreach($jabatan as $jab)
                                <option value="{{ $jab->groupId }}">{{ $jab->jabatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" value="{{$user->username}}" name="username" class="form-control" id="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" value="{{Crypt::decryptString($user->password)}}" name="password" class="form-control" id="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="text" name="password_confirmation" class="form-control" id="password_confirmation" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select id="role" name="role" class="form-select" required>
                            <option value="pegawai" @if($user->role == 'pegawai') selected @endif>Pegawai</option>
                            <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                            <option value="superadmin" @if($user->role == 'superadmin') selected @endif>Superadmin</option>
                        </select>
                    </div>
                    <div class="d-grid">
                        <button name="submit" type="submit" onclick="window.location='{{ route('register.register') }}'" value="submit" class="btn btn-success">Change data</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
