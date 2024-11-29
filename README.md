# BOOK API w/ Laravel 11 MySQL

```bash
composer install
```

```bash
cp .evn.example .env
```

```bash
php artisan key:generate
```

```bash
php artisan migrate
```

```bash
php artisan db:seed --class=BukuSeeeder
```

```bash
php artisan serve
```


> [!NOTE] GET
> http://127.0.0.1:8000/api/buku
> Retrieve all of book


> [!NOTE] GET
> http://127.0.0.1:8000/api/buku/{id}
> Retrieve book by id


> [!abstract] POST
> http://127.0.0.1:8000/api/buku
> key: judul, pengarang, tanggal
> value: string, string, date
> Adding data of book


> [!tip] PUT
> http://127.0.0.1:8000/api/buku/{id}
> [Same as POST attribute values]
> Update data of book by id


> [!danger] DELETE
> http://127.0.0.1:8000/api/buku/{id}
> Delete data of buku by id


