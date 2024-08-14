<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan Surat Izin Keluar Kantor</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Istok+Web:ital,wght@0,400;0,700;1,400;1,700&display=swap');
</style>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <div class="bg-green-700 text-white w-64 min-h-screen flex flex-col p-4">
            <div class="text-white flex flex-col items-center">
                <img src="{{ asset('resources/assets/ppAdm.jpg') }}" alt="Foto Profil" class="p-10 rounded-full w-24 h-24 mb-4">
                @if(auth()->check())
                    <h2 class="text-xl font-bold p-6">{{ auth()->user()->nama }}</h2>
                @else
                    <h2 class="text-xl font-bold p-6">Nama tidak tersedia</h2>
                @endif
            </div>
            <nav class="mt-6 flex-grow">
                <ul>
                    <li class="mb-2 text-amber-50">
                        <a href="#" class="font-semibold text-amber-100 block py-2.5 px-4 rounded transition duration-200 hover:bg-black">Dashboard</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="font-semibold block py-2.5 px-4 rounded transition duration-200 hover:bg-black">Buat Pengajuan Surat Izin Keluar Kantor</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="font-semibold block py-2.5 px-4 rounded transition duration-200 hover:bg-black">Verifikasi Pengajuan Surat Izin Keluar Kantor</a>
                    </li>
                </ul>
            </nav>
            <div class="mt-auto">
                <a href="{{ route('logout') }}" class="text-yellow-500 font-bold block py-2.5 px-4 text-logout transition duration-200 hover:bg-black rounded">Logout</a>
            </div>
        </div>

        <!-- Konten Utama -->
        <div class="flex-grow bg-green-700">
            <div class="bg-white p-10 rounded-tl-3xl rounded-bl-3xl shadow-xl min-h-full">
                <h1 class="text-green-900 text-4xl font-bold mb-6">Form Pengajuan Surat Izin Keluar Kantor</h1>
                
                <form action="{{ route('surat.formizin') }}" method="POST" class="bg-gray-100 p-6 rounded-lg shadow-md">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" name="nama" id="nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ auth()->user()->nama?? '' }}" readonly>
                        </div>
                        <div>
                            <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                            <input type="text" name="nip" id="nip" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ auth()->user()->nip ?? '' }}" readonly>
                        </div>
                        <div>
                            <label for="pangkat" class="block text-sm font-medium text-gray-700">Pangkat/Gol/Ruang</label>
                            <input type="text" name="pangkat" id="pangkat" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ auth()->user()->pangkat ?? '' }}" readonly>
                        </div>
                        <div>
                            <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                            <input type="date" name="tanggal" id="Tanggal" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div>
                            <label for="waktu_keluar" class="block text-sm font-medium text-gray-700">Jam Keluar</label>
                            <input type="time" name="waktu_keluar" id="waktu_keluar" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div>
                            <label for="waktu_kembali" class="block text-sm font-medium text-gray-700">Jam Kembali</label>
                            <input type="time" name="waktu_kembali" id="waktu_kembali" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="Keperluan" class="block text-sm font-medium text-gray-700">Keperluan</label>
                        <textarea name="Keperluan" id="Keperluan" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded-md shadow-md hover:bg-green-800">Buat Pengajuan</button>
                        <button type="button" class="bg-red-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-700 ml-2">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
