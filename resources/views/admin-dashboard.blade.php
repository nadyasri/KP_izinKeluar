@extends('layouts.sidebar-admin')

@section('title', 'Dashboard Admin')

@section('admin-content')
<h1 class="text-green-900 text-4xl font-bold mb-6">Hi, Adminum!</h1>
<p class="text-gray-500 mb-12 -mt-5 tracking-wide">Kelola data pegawai dan atasan di kantor anda</p>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
<!-- Card 1 -->
<div class="bg-green-700 bg-opacity-30 p-6 rounded-lg shadow-md flex items-center">
    <div class="w-16 h-16 flex-shrink-0 flex items-center justify-center bg-white rounded-full mr-4">
        <img src="{{ asset('resources/assets/UserMale.jpg') }}" alt="Icon" class="w-8 h-8">
    </div>
    <div>
        <h3 class="text-xl font-bold">Jumlah Akun</h3>
        <p class="text-gray-600 text-xl font-bold">{{ $jumlahAkun }}</p>
    </div>
</div>

<!-- Card 2 -->
<div class="bg-green-700 bg-opacity-30 p-6 rounded-lg shadow-md flex items-center">
    <div class="w-16 h-16 flex-shrink-0 flex items-center justify-center bg-white rounded-full mr-4">
        <img src="{{ asset('resources/assets/Folder.png') }}" alt="Icon" class="w-8 h-8">
    </div>
    <div>
        <h3 class="text-xl font-bold">Jumlah Izin</h3>
        <p class="text-gray-600 text-xl font-bold">{{ $jumlahIzin }}</p>
    </div>
</div>
                
<!-- Card 3 -->
<div class="bg-green-700 bg-opacity-30 p-6 rounded-lg shadow-md flex items-center">
    <div class="w-16 h-16 flex-shrink-0 flex items-center justify-center bg-white rounded-full mr-4">
        <img src="{{ asset('resources/assets/Document.png') }}" alt="Icon" class="w-8 h-8">
    </div>
    <div>
        <h3 class="text-xl font-bold">User Guide</h3>
        <a href="{{ route('download.guidebook') }}" class="text-gray-600 font-bold">Download</a>
    </div>
</div>
                
<!-- Card 4 -->
<div class="bg-green-700 bg-opacity-30 p-6 rounded-lg shadow-md flex items-center">
    <div class="w-16 h-16 flex-shrink-0 flex items-center justify-center bg-white rounded-full mr-4">
        <img src="{{ asset('resources/assets/Done.png') }}" alt="Icon" class="w-8 h-8">
    </div>
    <div>
        <h3 class="text-xl font-bold">Izin Disetujui</h3>
        <p class="text-gray-600 text-xl font-bold">{{ $izinSetuju }}</p>
    </div>
</div>
                
<!-- Card 5 -->
<div class="bg-green-700 bg-opacity-30 p-6 rounded-lg shadow-md flex items-center">
    <div class="w-16 h-16 flex-shrink-0 flex items-center justify-center bg-white rounded-full mr-4">
        <img src="{{ asset('resources/assets/Unavailable.png') }}" alt="Icon" class="w-8 h-8">
    </div>
    <div>
        <h3 class="text-xl font-bold">Izin Ditolak</h3>
        <p class="text-gray-600 text-xl font-bold">{{ $izinTolak }}</p>
    </div>
</div>
</div>
@endsection