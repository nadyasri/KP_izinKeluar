<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
    <!-- CSS only -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
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
    <title>SIKAN | Tambahkan Akun</title>
</head> -->
<!-- <body>
    <header>
        <h1>SIKAN</h1>
    </header> -->

@extends('layouts.sidebar-admin')

@section('title', 'SIKAN | Registrasi Akun Pengguna')

@section('admin-content')
<h1 class="text-green-900 text-3xl font-bold mb-6">Registrasi Akun Pengguna</h1>
<hr class="border-t-2 border-gray-200 my-6">

<div class="container mx-auto">
    <div class="text-center mb-4">
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
    <form action="{{ route('register.register') }}" method="POST">
        @csrf
        <div class="mb-3 gap-y-40">
            <label for="nip" class="label-field">NIP</label>
            <input type="text" name="nip" class="input-field" id="nip" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="block form-label ml-4 font-semibold">Nama Lengkap</label>
            <input type="text" value="{{ old('nama') }}" name="nama" class="border-1 border-gray-700 form-control bg-gray-200 outline-none focus:bg-white focus:ring-2 focus:ring-green-500 rounded-md px-3 py-2 mt-2" id="nama" required>
        </div>
        <div class="mb-3">
            <label for="pangkat" class="label-field">Pangkat</label>
            <input type="text" name="pangkat" class="input-field" id="pangkat" required>
        </div>
        <div class="mb-3">
            <label for="jabatan" class="label-field">Jabatan</label>
            <select name="Users_groupId" id="jabatan" class="input-field" required>
                @foreach($jabatan as $jab)
                    <option value="{{ $jab->groupId }}">{{ $jab->jabatan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="username" class="label-field">Username</label>
            <input type="text" value="{{ old('username') }}" name="username" class="input-field" id="username" required>
        </div>                    
        <div class="mb-3">
            <label for="password" class="label-field">Password</label>
            <input type="password" name="password" class="input-field" id="password" required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="label-field">Confirm Password</label>
            <input type="password" name="password_confirmation" class="input-field" id="password_confirmation" required>
        </div>
        <div class="mb-3">
            <label for="role" class="label-field">Role</label>
            <select id="role" name="role" class="form-select" required>
                <option value="pegawai">Pegawai</option>      
                <option value="admin">Admin</option>
                <option value="superadmin">Superadmin</option>
            </select>
        </div>
        <div class="d-grid">
            <button name="submit" type="submit" value="submit" class="regist-button">
                Create an account
            </button>
        </div>                
    </form>
</div>
@endsection