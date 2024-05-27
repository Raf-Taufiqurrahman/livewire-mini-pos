## Livewire Mini POS (Point Of Sales)
Project ini merupakan hasil saya belajar livewire selama kurang lebih 2 minggu, tech yang saya gunakan didalam website ini:
- Larvel 11
- Livewire 3
- Alpine.js
- Tailwind Css

## INSTALASI PROJECT

Pastikan `git` sudah terinstall, kemudian jalankan semua perintah dibawah ini :
```
1. clone repository
2. copy .env.example rename menjadi .env kemudian atur database di .env
3. composer install
4. php artisan key:generate
5. npm install
6. npm run dev (selalu dijalankan di terminal)
7. php artisan migrate --seed
8. php artisan server (selalu dijalankan di dalam terminal)
```

## FITUR APLIKASI
- Terdapat `module dashboard` untuk menampilkan data overview aplikasi
- Terdapat `module categories` untuk menampilkan data categories (Create, Read, Update, Delete)
- Terdapat `module products` untuk menampilkan data products (Create, Read, Update, Delete)
- Terdapat `module pos` dengan berbagi fitur sebagai berikut :
    - Transaksi barang 
    - Pengurangan barang yang ada didalam keranjang
    - Penambahan barang yang ada didalam keranjang
    - Mengeluarkan barang yang ada didalam kerajang
    - Menyimpan Data Transaksi 
- Design layout halaman menggunakan tailwind css
- Responsive design hingga mobile view
  
## OVERVIEW APLIKASI
<table>
  <tr>
        <td> 
            <img src="https://imgur.com/uxBtkfW.png" alt="categories">
        </td>
        <td>
            <img src="https://imgur.com/QRzXyCf.png" alt="products">
        </td>
   </tr>
    <tr>    
        <td>
            <img src="https://imgur.com/VrdmwMT.png" alt="products-create">
        </td>
        <td>
             <img src="https://imgur.com/hY1kMiO.png" alt="product-delete">
        </td>
    </tr>
    <tr>
        <td> 
            <img src="https://imgur.com/UPoxB9F.png" alt="pos-view">
        </td>
        <td>
           <img src="https://imgur.com/Puuf5Oo.png" alt="pos-transaction">
        </td>
   </tr> 
   <tr>
       <td>
           <img src="https://imgur.com/HmWTKeR.png" alt="dashboard">
       </td>
   </tr>
</table>


## LISENSI
Aplikasi ini bersifat open source dapat digunakan oleh siapa pun dengan syarat tidak untuk di perjual belikan.
