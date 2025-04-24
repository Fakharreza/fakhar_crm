# 22-04-2025
## Pembuatan Flow Dan Erd Sederhana

![CRM](https://github.com/user-attachments/assets/730679e1-7cfb-4266-9ee5-745b95b68e7e)

<p>Link Draw.io dari google drive (https://drive.google.com/drive/folders/14Gft5Q271cbbwUR5h8Lq8EqIZIpZN4h9?usp=sharing) </p>

# 23-04-2025
## Pembuatan Projek Aplikasi

## About Aplikasi
Untuk pembuatan aplikasi ini Framework yang saya gunakan adalah Laravel dan database yang saya gunakan adalah PostgreSql . Dalam pembentukan laravel ini saya menggunakan Laravel Breeze , dan Tailwind CSS .   

## Deploy Aplikasi
- **langkah pertama**
  
    Run menggunakan npm run serve untuk load tampilan Tailwindnya
  
![image](https://github.com/user-attachments/assets/282421f3-96ed-471c-8bf1-75521f6f1934)

- **langkah kedua**
  
   Buka link localhost maka selanjutnya akan muncul page login

    ![image](https://github.com/user-attachments/assets/9563def7-5179-4119-9f82-d0357b6174d3)

- **langkah ketiga**
  
  Login menggunakan user yang sudah tersedia . Untuk penjelasan saya akan menggunakan akun yang menggunakan Role manager .
  Karena perbedaan role sales dan manager terdapat perbedaan di 
  1. Menu manage user yang hanya ada di Role Manager
  2. Aksi edit projects karena yang bisa mengedit projects dan mengubah approval adalah manager

   ![image](https://github.com/user-attachments/assets/ff3c9112-b1fd-4b7a-bef0-6cb25e4694ea)

- **langkah keempat**
  
    *Menu User*
    Untuk menu user ini digunakan untuk melakukan Tampilan CRUD user yang tersedia
  
  ![image](https://github.com/user-attachments/assets/514fe3b6-7f34-44e1-937f-4c52221e6458)

   - Tambah User
     Sebagai Contoh yang akan saya tambahkan adalah dengan data seperti berikut
     - Nama User = user4
     - Email User = user4@example.com
     - Password = 123456
     - Role = Manager
     ![image](https://github.com/user-attachments/assets/e523e519-07e4-4a8a-a53d-f858fc02ec84)
     ![image](https://github.com/user-attachments/assets/138ff999-c07a-49ef-a9d5-536c6b365893)

   - Edit User
     Sebagai Contoh yang akan saya ubah adalah dengan data seperti berikut
     - Nama User = user4
     - Email User = user4@contoh.com
     - Role = sales
    ![image](https://github.com/user-attachments/assets/3225851f-9641-4c17-9477-d0aedb30c1f3)
    ![image](https://github.com/user-attachments/assets/8be605b8-f9c4-4b62-aeb9-e6781cf0612c)

  - Delete User
    Sebagai contoh saya akan menghapus data user4
    ![image](https://github.com/user-attachments/assets/6fb1f7aa-b166-448c-9644-143ad5579694)
    ![image](https://github.com/user-attachments/assets/710b82a0-313a-4a1b-86d7-d8398386c3e7)

- **langkah kelima**
  
    *Menu Lead*
   Untuk menu leads ini adalah tampilan daftar calon calon customer . Di tampilan ini terdapat beberapa perbedaan
   karena daftar leads yang tampil adalah tergantung dengan user yang login . Apabila user yang login adalah user
   reza , dikarenakan user reza adalah seorang sales maka leads yang tampil adalah para leads yang ditambahkan oleh
   reza . Apabila user yang login adalah user baru , karena dia adalah seorang user baru maka tampilan leads pasti akan kosong.
   Untuk contoh disini yang saya akan gunakan adalah tampilan leads di user manager ,karena untuk list di user manager adalah semua list leads yang ada.

   ![image](https://github.com/user-attachments/assets/0b1ce32e-dfb7-4ec7-8e16-88cc90fc97a9)

  - Tambah Lead
    Sebagai contoh saya akan menggunakan data seperti berikut
    - Nama lead = newLead3
    - Email = newLead3@example.com
    - Telepon = 123456
    - Alamat = address
    ![image](https://github.com/user-attachments/assets/9737b1b7-deaf-41b4-98f1-14ab8f20beb6)
    ![image](https://github.com/user-attachments/assets/0276b332-fb95-4d83-91a7-fb5827963814)

  - Edit Lead
    Sebagai contoh saya akan mengganti data seperti berikut
    - Nama lead = newLead3
    - Email = newLead3@contoh.com
    - Telepon = 123456
    - Alamat = address
    ![image](https://github.com/user-attachments/assets/4a470231-37c1-49a8-9802-088bdbe11a81)
    ![image](https://github.com/user-attachments/assets/a2e08523-2666-4714-9ff7-13e06a628545)

  - Hapus Lead
    Sebagai contoh saya akan menghapus data newLead3
    ![image](https://github.com/user-attachments/assets/be31457e-49b3-4c1c-be9b-06cce7e3b4f6)
    ![image](https://github.com/user-attachments/assets/dccc76ba-44cc-4065-9425-82408e33f401)

- **langkah keenam**
  
    *Menu Products*
   Untuk menu products ini tampilan disemua user sama karena ini hanya menampilkan semua daftar produk saja

   ![image](https://github.com/user-attachments/assets/1f802329-caa7-4578-b142-c070399a0263)

  - Tambah Products
    Sebagai contoh saya akan menggunakan data sebagai berikut
    - Nama produk = produk 4
    - deskripsi = deskripsi produk 4
    - harga = 100000
    - bandwith = 200 Mbps
    ![image](https://github.com/user-attachments/assets/ba5061dc-96fb-4b33-8cbc-74b4a779f813)
    ![image](https://github.com/user-attachments/assets/c620b960-7d4d-457a-aec7-423ee25dc20e)

 - Edit Products
   Sebagai contoh saya akan mengganti data sebagai berikut
   - Nama produk = produk 4
    - deskripsi = deskripsi produk 4
    - harga = 150000
    - bandwith = 210 Mbps
   ![image](https://github.com/user-attachments/assets/be23ea62-021f-464a-ba27-79e13bcb53a7)
   ![image](https://github.com/user-attachments/assets/e1c59f69-4e02-4ffb-a496-7e322be2dfbc)

- Hapus Products
  Sebagai contoh saya akan menghapus produk 4
  ![image](https://github.com/user-attachments/assets/270422c3-b61e-4677-844c-60ad48190eb1)
  ![image](https://github.com/user-attachments/assets/bfc5fb94-9025-4db7-a20c-e701abea02fd)

- **langkah ketujuh**
  
  *Menu Projects*
  Pada menu projects ini program ini adalah dimana para sales bisa mengambil leads atau bisa juga apabila manager mau mengassign lead kepada sales .

  ![image](https://github.com/user-attachments/assets/532b0be2-8b16-4b84-aa76-1c82e57d433a)
  
  - Tambah Projects
    Sebagai contoh saya akan memasukkan data sebagai berikut:
    - Nama Lead = newLead3
    - Nama Sales = user4
    - Nama Manager = ferin
  ![image](https://github.com/user-attachments/assets/1d9ac653-1b97-4596-956d-f773b1a18296)
  ![image](https://github.com/user-attachments/assets/81c567fd-6a9c-4ab3-a69b-4ae72a59b841)

 - Edit Projects
   disini saya akan langsung mengubah status menjadi approved
  ![image](https://github.com/user-attachments/assets/3aa81028-bf72-46a3-8841-0b6c49a780aa)
  ![image](https://github.com/user-attachments/assets/11dfcbb5-265a-4e97-a98a-1a0af3e4180e)

 - Hapus Projects
   disini saya akan menghapus newLead3
  ![image](https://github.com/user-attachments/assets/ac3e098b-d001-49be-9041-f9564361e8c0)
  ![image](https://github.com/user-attachments/assets/03cf77e5-fd0a-464b-a318-627c0dae28f6)


- **Langkah kedelapan**
- 
  *Menu Customer*
   Untuk menu customers ini adalah dimana orang orang leads yang memiliki status approved sebagai contoh yang kita telah approve sebelumnya yaitu newLead3 yang sudah masuk ke dalam tabel customer
  
  ![image](https://github.com/user-attachments/assets/71726384-be08-4614-a339-befab672a384)


- **langkah kesembilan**
  
  *Menu Transactions*
  Untuk menu transactions ini adalah dimana akhirnya sales bisa menjual produk kepada customer yang telah diapprove oleh manager
  
  ![image](https://github.com/user-attachments/assets/d312ab3a-df14-43c3-9786-dcb9380426f4)

  - Tambah Transaksi
    Sebagai contoh disini saya akan menambahkan data seperti berikut
    - Pelanggan = newLead3
    - Produk = product 4
    - quantity = 1
   
   ![image](https://github.com/user-attachments/assets/61bd1d1a-581c-4704-ae69-e32d0d09efe2)
   ![image](https://github.com/user-attachments/assets/6e599b9e-2a15-4d67-ae4c-91bb8f53c033)

  - Lihat detal transaksi
    ini adalah tampilan dimana kita bisa melihat customer dan jenis langganan milik customernya
    ![image](https://github.com/user-attachments/assets/8817fb85-6bf7-4711-abab-5ab1b6283999)

  - Edit transaksi
    Untuk edit disini saya mengubah data sebagai berikut 
    - Pelanggan = newLead3
    - Produk = product 4
    - quantity = 2
    ![image](https://github.com/user-attachments/assets/2d708a4d-70e4-4cc6-adca-1e626fd4ade1)
    ![image](https://github.com/user-attachments/assets/f0bde3a9-2a7b-48f9-9563-2f54e52063e2)
    ![image](https://github.com/user-attachments/assets/c18d465a-e09b-4556-a664-25280c01735f)

  - Hapus Transaksi
    Sebagai contoh disini saya akan menghapus newLead3
    ![image](https://github.com/user-attachments/assets/0917336e-bf55-415d-8850-a2bae59ee665)
    ![image](https://github.com/user-attachments/assets/2d96ca7c-954a-4b98-a3ae-ec030d1342a1)

  - **langkah kesepuluh(opsional)**
    
     *menu update profile*
        Pada menu ini bisa mengupdate profile sendiri dan mengupdate password apabila ingin mengganti password
    ![image](https://github.com/user-attachments/assets/5202119c-b7f9-4852-951f-d7907d7d8115)



# 24-04-2025
## Pengerjaan Readme Dan Revisi Beberapa Tampilan
      
  

