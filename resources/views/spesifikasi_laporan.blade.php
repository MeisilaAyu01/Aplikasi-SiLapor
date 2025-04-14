<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spesifikasi Laporan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg">
        <h2 class="text-3xl font-bold text-red-500 text-center">Spesifikasi Laporan</h2>
        <p class="text-center text-gray-600 mb-4">Ketentuan dan spesifikasi dalam mengupload laporan</p>

        <ol class="list-decimal list-inside text-gray-700 space-y-2">
            <li>Format laporan yang diperbolehkan: <strong>.PDF</strong></li>
            <li>Ukuran file maksimal: <strong>5MB</strong></li>
            <li>Laporan harus mencantumkan:
                <ul class="list-disc list-inside ml-4">
                    <li>Judul laporan</li>
                    <li>Nama penulis atau penyusun</li>
                    <li>Tanggal pembuatan laporan</li>
                    <li>Ringkasan isi laporan</li>
                </ul>
            </li>
            <li>Laporan harus menggunakan bahasa yang formal dan sesuai dengan standar perusahaan</li>
            <li>Pastikan laporan telah diperiksa sebelum diunggah untuk menghindari kesalahan</li>
            <li>Gunakan email yang aktif untuk konfirmasi pengiriman laporan</li>
        </ol>

        <div class="text-center mt-6">
            <p class="text-gray-600">Belum punya akun? <a href="{{ route('register') }}" class="text-red-500 font-bold">Daftar</a></p>
            <p class="text-gray-600">Sudah punya akun? <a href="{{ route('login') }}" class="text-red-500 font-bold">Masuk</a></p>
        </div>
    </div>
</body>
</html>
