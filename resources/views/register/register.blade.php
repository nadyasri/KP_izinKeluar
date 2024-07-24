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
            background-image: url("img/bgpa.jpg"); /* Ganti dengan URL gambar latar belakang Anda */
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
    <main>
        <div class="container d-flex justify-content-center align-items-center min-vh-100  ">
            <div class="login-container col-md-6 col-lg-4 p-4 ">
                <div class="text-center mb-4">
                    <h1 class="h3 login-title mb-8">SIKAN</h1>
                    <p> Create and account</p>
                </div>
                <!-- Error handling (if needed) -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Login form -->
                <form action="{{ route('admin.register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" value="{{ old('username') }}" name="username" class="form-control" id="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="NIP" class="form-label">NIP</label>
                        <input type="text" name="NIP" class="form-control" id="NIP">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="Jabatan" class="form-label">Jabatan</label>
                        <input type="text" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <select 
                            name"role">
                            <option value="Pilih"></option>
                            <option value="Admin"></option>
                            <option value="Superadmin"></option>
                            <option value="Pegawai"></option>

                        </select>
                    <div class="d-grid">
                        <button name="submit" type="submit" class="btn btn-success">Create an account</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
