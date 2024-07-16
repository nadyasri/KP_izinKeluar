<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Adminum</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex">

        <!-- Sidebar -->
        <div class="bg-green-900 text-white w-64 min-h-screen flex flex-col p-4">
            <div class="flex flex-col items-center">
                <img src="resources/assets/ppAdm.jpg" alt="Profile Picture" class="rounded-full w-24 h-24 mb-4">
                <h2 class="text-xl font-bold">Adminum</h2>
            </div>
            <nav class="mt-6 flex-grow">
                <ul>
                    <li class="mb-2">
                        <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-black-1000">Dashboard</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-black-1000">Daftar Akun Pengguna Pegawai dan Atasan</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-black-1000">Riwayat Pengajuan Izin Keluar Kantor Pegawai</a>
                    </li>
                </ul>
            </nav>
            <div class="mt-auto">
                <a href="#" class="block py-2.5 px-4 text-yellow-500 transition duration-200 hover:bg-black-1000 rounded">Logout</a>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex-grow p-4 bg-gray-100 rounded-tl-lg rounded-bl-lg">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h1 class="text-3xl font-bold mb-6">Hi, Adminum!</h1>
                <p class="text-gray-500 mb-6">Kelola data pegawai dan atasan di kantor anda</p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Card 1 -->
                <div class="bg-gray-200 p-6 rounded-lg shadow-md flex items-center">
                    <div class="w-16 h-16 flex-shrink-0 flex items-center justify-center bg-white rounded-full mr-4">
                        <img src="resources/assets/UserMale.jpg" alt="Icon" class="w-8 h-8">
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Jumlah Akun</h3>
                        <p class="text-2xl font-bold">{{ $jumlahAkun }}</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-gray-200 p-6 rounded-lg shadow-md flex items-center">
                    <div class="w-16 h-16 flex-shrink-0 flex items-center justify-center bg-white rounded-full mr-4">
                        <img src="resources/assets/Folder.png" alt="Icon" class="w-8 h-8">
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Jumlah Izin</h3>
                        <p class="text-2xl font-bold">{{ $jumlahIzin }}</p>
                    </div>
                </div>
                
                <!-- Card 3 -->
                <div class="bg-gray-200 p-6 rounded-lg shadow-md flex items-center">
                    <div class="w-16 h-16 flex-shrink-0 flex items-center justify-center bg-white rounded-full mr-4">
                        <img src="resources/assets/Document.png" alt="Icon" class="w-8 h-8">
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">User Guide</h3>
                        <a href="#" class="text-blue-500 underline">Download</a>
                    </div>
                </div>
                
                <!-- Card 4 -->
                <div class="bg-gray-200 p-6 rounded-lg shadow-md flex items-center">
                    <div class="w-16 h-16 flex-shrink-0 flex items-center justify-center bg-white rounded-full mr-4">
                        <img src="resources/assets/Done.png" alt="Icon" class="w-8 h-8">
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Izin Disetujui</h3>
                        <p class="text-2xl font-bold">{{ $izinSetuju }}</p>
                    </div>
                </div>
                <!-- Card 5 -->
                <div class="bg-gray-200 p-6 rounded-lg shadow-md flex items-center">
                    <div class="w-16 h-16 flex-shrink-0 flex items-center justify-center bg-white rounded-full mr-4">
                        <img src="resources/assets/Unavailable.png" alt="Icon" class="w-8 h-8">
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Izin Ditolak</h3>
                        <p class="text-2xl font-bold">{{ $izinTolak }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
