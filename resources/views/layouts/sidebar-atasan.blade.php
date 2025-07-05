@extends('layouts.layout')

@section('title', 'Dashboard Atasan')

@section('sidebar')
<div class="bg-green-700 text-white w-64 min-h-screen flex flex-col p-4">
    <div class="text-white flex flex-col items-center">
        <h3 class="text-xl text-white font-bold mt-2 mb-2">SIKAN</h3>
        <div class="relative">
            <img src="{{ asset('assets/pfpAtasan.jpg') }}" alt="Foto Profil" class="p-10 rounded-full w-24 h-24 mb-4">
            <a href={{ route('editProfile') }}>
                <img src="{{ asset('assets/userEdit.png') }}" alt="edit profil" class="absolute bottom-2 right-2 bg-black rounded-full p-1 shadow-md w-8 h-8">
            </a>
        </div>
            @if(auth()->check())
                <h2 class="text-xl font-bold p-6">{{ auth()->user()->nama }}</h2>
                <h3 class="text-sm font-semibold p-6">{{auth()->user()->nip}}</h3>
            @else
                <h2 class="text-xl font-bold p-6">Nama tidak tersedia</h2>
            @endif
    </div>
    <nav class="mt-6 flex-grow">
        <ul>
            <li class="mb-2 text-amber-50">
                <a href="{{route('atasan-dashboard')}}" class="font-semibold text-amber-100 block py-2.5 px-4 rounded transition duration-200 hover:bg-black">Dashboard</a>
            </li>
            <li class="mb-2">
                <a href="{{route('atasan-formIzin')}}" class="font-semibold block py-2.5 px-4 rounded transition duration-200 hover:bg-black">Buat Pengajuan Surat Izin Keluar Kantor</a>
            </li>
            <li class="mb-2">
                <a href="{{route('atasan-manageIzin')}}" class="font-semibold block py-2.5 px-4 rounded transition duration-200 hover:bg-black">Verifikasi Pengajuan Surat Izin Keluar Kantor</a>
            </li>
            </li>
        </ul>
    </nav>
    <div class="mt-auto">
        <a href="{{ route('logout') }}" class="text-yellow-500 font-bold block py-2.5 px-4 text-logout transition duration-200 hover:bg-black rounded">Logout</a>
    </div>
</div>
@endsection

@section('content')
@yield('atasan-content')
@endsection

