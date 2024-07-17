<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Adminum</title>
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
                <img src="resources/assets/ppAdm.jpg" alt="Profile Picture" class="p-10 rounded-full w-24 h-24 mb-4">
                <h2 class="text-xl font-bold p-6">Adminum</h2>
            </div>
            <nav class="mt-6 flex-grow">
                <ul>
                    <li class="mb-2 text-amber-50">
                        <a href="#" class="font-semibold text-amber-100 block py-2.5 px-4 rounded transition duration-200 hover:bg-black">Dashboard</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="font-semibold block py-2.5 px-4 rounded transition duration-200 hover:bg-black">Daftar Akun Pengguna Pegawai dan Atasan</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="font-semibold block py-2.5 px-4 rounded transition duration-200 hover:bg-black">Riwayat Pengajuan Izin Keluar Kantor Pegawai</a>
                    </li>
                </ul>
            </nav>
            <div class="mt-auto">
                <a href="#" class="text-yellow-500 font-bold block py-2.5 px-4 text-logout transition duration-200 hover:bg-black rounded">Logout</a>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex-grow bg-green-700">
            <div class="bg-white p-10 rounded-tl-3xl rounded-bl-3xl shadow-xl min-h-full">
                <h1 class="text-green-900 text-4xl font-bold mb-6">Hi, Adminum!</h1>
                <p class="text-gray-500 mb-12 -mt-5 tracking-wide">Kelola data pegawai dan atasan di kantor anda</p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Card 1 -->
                <div class="bg-green-700 bg-opacity-30 p-6 rounded-lg shadow-md flex items-center">
                    <div class="w-16 h-16 flex-shrink-0 flex items-center justify-center bg-white rounded-full mr-4">
                        <img src="resources/assets/UserMale.jpg" alt="Icon" class="w-8 h-8">
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">Jumlah Akun</h3>
                        <p class="text-gray-600 text-xl font-bold">{{ $jumlahAkun }}</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-green-700 bg-opacity-30 p-6 rounded-lg shadow-md flex items-center">
                    <div class="w-16 h-16 flex-shrink-0 flex items-center justify-center bg-white rounded-full mr-4">
                        <img src="resources/assets/Folder.png" alt="Icon" class="w-8 h-8">
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">Jumlah Izin</h3>
                        <p class="text-gray-600 text-xl font-bold">{{ $jumlahIzin }}</p>
                    </div>
                </div>
                
                <!-- Card 3 -->
                <div class="bg-green-700 bg-opacity-30 p-6 rounded-lg shadow-md flex items-center">
                    <div class="w-16 h-16 flex-shrink-0 flex items-center justify-center bg-white rounded-full mr-4">
                        <img src="resources/assets/Document.png" alt="Icon" class="w-8 h-8">
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">User Guide</h3>
                        <a href="#"class="text-gray-600 font-bold">Download</a>
                    </div>
                </div>
                
                <!-- Card 4 -->
                <div class="bg-green-700 bg-opacity-30 p-6 rounded-lg shadow-md flex items-center ">
                    <div class="w-16 h-16 flex-shrink-0 flex items-center justify-center bg-white rounded-full mr-4">
                        <img src="resources/assets/Done.png" alt="Icon" class="w-8 h-8">
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">Izin Disetujui</h3>
                        <p class="text-gray-600 text-xl font-bold">{{ $izinSetuju }}</p>
                    </div>
                </div>
                
                <!-- Card 5 -->
                <div class="bg-green-700 bg-opacity-30 p-6 rounded-lg shadow-md flex items-center">
                    <div class="w-16 h-16 flex-shrink-0 flex items-center justify-center bg-white rounded-full mr-4">
                        <img src="resources/assets/Unavailable.png" alt="Icon" class="w-8 h-8">
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">Izin Ditolak</h3>
                        <p class="text-gray-600 text-xl font-bold">{{ $izinTolak }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
