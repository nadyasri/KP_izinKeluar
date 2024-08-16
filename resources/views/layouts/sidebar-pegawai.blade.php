@extends('layouts.layout')

@section('sidebar')
<div class="bg-green-700 text-white w-64 min-h-screen flex flex-col p-4">
    <div class="text-white flex flex-col items-center">
        <img src="{{ asset('resources/assets/ppAdm.jpg') }}" alt="Foto Profil" class="p-10 rounded-full w-24 h-24 mb-4">
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
                <a href="{{route('pegawai-dashboard')}}" class="font-semibold text-amber-100 block py-2.5 px-4 rounded transition duration-200 hover:bg-black">Dashboard</a>
            </li>
            <li class="mb-2">
                <a href="{{route('pegawai-formIzin')}}" class="font-semibold block py-2.5 px-4 rounded transition duration-200 hover:bg-black">Buat Pengajuan Surat Izin Keluar Kantor</a>
            </li>
        </ul>
    </nav>
    <div class="mt-auto">
        <a href="{{ route('logout') }}" class="text-yellow-500 font-bold block py-2.5 px-4 text-logout transition duration-200 hover:bg-black rounded">Logout</a>
    </div>
</div>
@endsection

@section('content')
@yield('pegawai-content')
@endsection

