<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Selin - Sistem Presensi Polines</title>
</head>
<body>
  <h1>Selin - Sistem Presensi Polines</h1>
  <p>
    <strong>Selin</strong> adalah sistem informasi presensi dan absensi terpadu yang dibangun dengan Laravel. 
    Aplikasi ini dirancang untuk membantu Polines dalam mengelola presensi mahasiswa, perizinan, dan pencatatan aktivitas secara efisien.
  </p>

  <h2>Fitur</h2>
  <ul>
    <li>Manajemen profil pengguna</li>
    <li>Sistem presensi/absensi dengan validasi geolokasi</li>
    <li>Manajemen izin/cuti</li>
    <li>Fitur catatan/notes</li>
    <li>REST API untuk integrasi dengan aplikasi mobile</li>
    <li>Sistem otentikasi berbasis token menggunakan Laravel Sanctum</li>
  </ul>

  <h2>Persyaratan Sistem</h2>
  <ul>
    <li>PHP 8.0 atau lebih tinggi</li>
    <li>MySQL/MariaDB</li>
    <li>Composer</li>
    <li>Node.js dan NPM</li>
  </ul>

  <h2>Instalasi</h2>
  <ol>
    <li>Clone repositori ini ke komputer lokal Anda.</li>
    <li>Instal semua dependensi PHP:
      <pre><code>composer install</code></pre>
    </li>
    <li>Instal semua dependensi JavaScript:
      <pre><code>npm install</code></pre>
    </li>
    <li>Salin file <code>.env.example</code> ke <code>.env</code> dan sesuaikan konfigurasi.</li>
    <li>Generate key aplikasi:
      <pre><code>php artisan key:generate</code></pre>
    </li>
    <li>Jalankan migrasi database:
      <pre><code>php artisan migrate</code></pre>
    </li>
    <li>(Opsional) Jalankan seeder:
      <pre><code>php artisan db:seed</code></pre>
    </li>
    <li>Kompilasi aset frontend:
      <pre><code>npm run dev</code></pre>
    </li>
    <li>Jalankan aplikasi:
      <pre><code>php artisan serve</code></pre>
    </li>
  </ol>
  <p>Aplikasi akan berjalan di <strong>http://localhost:8000</strong> secara default.</p>

  <h2>Konfigurasi</h2>

  <h3>Konfigurasi Perusahaan</h3>
  <p>Anda perlu mengatur informasi institusi termasuk:</p>
  <ul>
    <li>Nama institusi</li>
    <li>NIP institusi</li>
    <li>Email</li>
    <li>Alamat</li>
    <li>Koordinat lokasi (latitude dan longitude)</li>
    <li>Radius validasi lokasi</li>
    <li>Jam masuk dan jam pulang</li>
  </ul>
  <p>Atur melalui menu <strong>Company</strong> di panel admin.</p>

  <h3>Konfigurasi Firebase (Notifikasi)</h3>
  <p>
    Untuk fitur notifikasi, aplikasi menggunakan Firebase. Sesuaikan konfigurasi di file <code>firebase.php</code>.
  </p>

  <h2>Struktur Aplikasi</h2>
  <ul>
    <li><strong>Controllers</strong> - Logika bisnis aplikasi</li>
    <li><strong>Models</strong> - Model basis data</li>
    <li><strong>Fortify</strong> - Autentikasi Laravel Fortify</li>
    <li><strong>views</strong> - Template Blade</li>
    <li><strong>routes</strong> - Rute aplikasi</li>
    <li><strong>migrations</strong> - Struktur tabel database</li>
  </ul>

  <h2>API Endpoints</h2>
  <h3>Autentikasi</h3>
  <ul>
    <li>POST /api/login - Login pengguna</li>
    <li>POST /api/logout - Logout pengguna</li>
  </ul>

  <h3>Absensi</h3>
  <ul>
    <li>POST /api/checkin - Waktu masuk (dengan geolokasi)</li>
    <li>POST /api/checkout - Waktu keluar (dengan geolokasi)</li>
  </ul>

  <h3>Izin/Cuti</h3>
  <ul>
    <li>POST /api/permissions - Ajukan izin/cuti</li>
  </ul>

  <h3>Catatan/Notes</h3>
  <ul>
    <li>GET /api/notes - Daftar catatan</li>
    <li>POST /api/notes - Tambah catatan</li>
  </ul>

  <h2>Kontribusi</h2>
  <ol>
    <li>Fork repositori</li>
    <li>Buat branch fitur baru:
      <pre><code>git checkout -b feature/nama-fitur</code></pre>
    </li>
    <li>Commit perubahan:
      <pre><code>git commit -m "Add fitur baru"</code></pre>
    </li>
    <li>Push ke branch:
      <pre><code>git push origin feature/nama-fitur</code></pre>
    </li>
    <li>Buka Pull Request</li>
  </ol>

  <h2>Lisensi</h2>
  <p>Proyek ini dilisensikan di bawah MIT License. Lihat file <code>LICENSE</code> untuk informasi lebih lanjut.</p>

  <h2>Kontak</h2>
  <p>Jika ada pertanyaan atau kendala, silakan buka <strong>issue</strong> baru di repositori ini.</p>
</body>
</html>
