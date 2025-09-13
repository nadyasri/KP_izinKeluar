@extends('layouts.sidebar-atasan')

@section('title', 'SIKAN | Dashboard Atasan')

@section('atasan-content')
<h1 class="text-green-900 text-4xl font-bold mb-6">Hi, {{auth()->user()->nama}}!</h1>
<p class="text-gray-500 mb-12 -mt-5 tracking-wide">Mau pergi ke mana hari ini?</p>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

<!-- Card 1 -->
<div class="bg-green-700 bg-opacity-30 p-6 rounded-lg shadow-md flex items-center">
    <div class="w-16 h-16 flex-shrink-0 flex items-center justify-center bg-white rounded-full mr-4">
        <img src="resources/assets/UserMale.jpg" alt="Icon" class="w-8 h-8">
    </div>
    <div>
        <h3 class="text-xl font-bold">Belum Dikonfirmasi</h3>
        <p class="text-gray-600 text-xl font-bold">{{ $menunggu }}</p>
    </div>
</div>

<!-- Card 2 -->
<div class="bg-green-700 bg-opacity-30 p-6 rounded-lg shadow-md flex items-center">
    <div class="w-16 h-16 flex-shrink-0 flex items-center justify-center bg-white rounded-full mr-4">
        <img src="resources/assets/Folder.png" alt="Icon" class="w-8 h-8">
    </div>
    <div>
        <h3 class="text-xl font-bold">Sudah Dikonfirmasi</h3>
        <p class="text-gray-600 text-xl font-bold">{{ $konfirmasi }}</p>
    </div>
</div>

<!-- Card 3 -->
<div class="bg-green-700 bg-opacity-30 p-6 rounded-lg shadow-md flex items-center">
    <div class="w-16 h-16 flex-shrink-0 flex items-center justify-center bg-white rounded-full mr-4">
        <img src="resources/assets/Document.png" alt="Icon" class="w-8 h-8">
    </div>
    <div>
        <h3 class="text-xl font-bold">User Guide</h3>
        <a href="{{ route('download.guidebook') }}"class="text-gray-600 font-bold">Download</a>
    </div>
</div>
@endsection