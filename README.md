
# 📋 Antrean Uang – Laravel Queue App

Selamat datang di project Laravel ini! 🎉  
Aplikasi ini dirancang untuk manajemen antrean dan input form yang modern, menggunakan teknologi seperti **Laravel**, **Vite**, dan **Tailwind CSS**.

---

## 📦 Teknologi yang Digunakan

- ⚙️ [Laravel](https://laravel.com/) – Backend PHP Framework
- 🎨 [Tailwind CSS](https://tailwindcss.com/) – Utility-first CSS framework
- ⚡️ [Vite](https://vitejs.dev/) – Super fast frontend build tool
- 🧪 Laravel Migrations – untuk struktur database
- 🔐 Auth (login system, coming soon...)

---

## 🚀 Cara Install Project Ini (Wajib dibaca)

Ikuti langkah berikut agar project bisa dijalankan di laptop/PC kamu:

### 1. 🧲 Clone Repository

```bash
git clone https://github.com/iskandarjajuri/antrean-uang.git
cd antrean-uang

2. 🐘 Install Dependency Backend (Laravel)

Pastikan kamu sudah install PHP 8.1+ dan Composer

composer install

3. ⚙️ Install Dependency Frontend (Tailwind & Vite)

Pastikan kamu sudah install Node.js 18+ dan npm

npm install

4. 📝 Salin dan Konfigurasi .env

cp .env.example .env
php artisan key:generate

Edit file .env dan sesuaikan bagian ini:

DB_DATABASE=antrean_db
DB_USERNAME=root
DB_PASSWORD=

5. 🧱 Jalankan Migrasi Database

php artisan migrate

6. 🖥 Jalankan Server Laravel

php artisan serve

7. 🧵 Jalankan Vite Dev Server

npm run dev

⚡ Ini penting agar Tailwind CSS dan JS dapat berfungsi dengan baik

⸻

🗂 Struktur Folder Penting

Folder / File	Deskripsi
resources/views/	File tampilan (Blade template)
resources/css/app.css	CSS utama menggunakan Tailwind
vite.config.js	Konfigurasi Vite
routes/web.php	Daftar route aplikasi
app/Http/Controllers/	Semua controller Laravel
app/Models/	Model database
database/migrations/	Struktur database yang bisa dijalankan ulang



⸻

📷 Screenshot (Coming Soon)

Akan ditambahkan setelah UI selesai 👀

⸻

🤝 Kontribusi

Silakan clone dan modifikasi! Kalau kamu ingin berkontribusi atau bertanya:
	•	Fork repo ini
	•	Pull request kalau ada fitur baru
	•	Atau langsung tanya aja ke saya 😄

⸻

