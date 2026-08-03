# Customer Management System

PHP ve MySQL kullanılarak geliştirilmiş admin paneli tabanlı müşteri yönetim sistemi.

Bu proje, admin kullanıcıların sisteme giriş yaparak müşteri kayıtlarını yönetmesini sağlar. Sistem içerisinde müşteri ekleme, listeleme, güncelleme, silme ve arama işlemleri bulunmaktadır.

## Kullanılan Teknolojiler

- PHP
- MySQL
- PDO
- HTML5
- CSS3
- XAMPP

## Özellikler

- Admin kayıt sistemi
- Admin giriş sistemi
- Session tabanlı kullanıcı doğrulama
- Güvenli şifre saklama (`password_hash`)
- Şifre doğrulama (`password_verify`)
- Müşteri CRUD işlemleri:
  - Müşteri ekleme
  - Müşteri listeleme
  - Müşteri bilgilerini güncelleme
  - Müşteri silme
- Müşteri arama sistemi
- Form doğrulama işlemleri
- PDO Prepared Statements ile güvenli veritabanı işlemleri

## Proje Yapısı

```
customer-management-system
│
├── assets/
│   └── css/
│       └── Stil dosyaları
│
├── customers/
│   ├── create.php       # Müşteri ekleme
│   ├── read.php         # Müşteri listeleme
│   ├── update.php       # Müşteri güncelleme
│   └── delete.php       # Müşteri silme
│
├── dashboard.php        # Admin paneli
├── login.php            # Admin giriş sayfası
├── register.php         # Admin kayıt sayfası
├── database.php         # Veritabanı bağlantısı
└── customers_database.sql # Veritabanı dosyası
```

## Kurulum

### 1. XAMPP Kurulumu

Projeyi çalıştırmak için bilgisayarınızda XAMPP kurulu olmalıdır.

XAMPP Control Panel üzerinden:

- Apache
- MySQL

servislerini başlatın.


### 2. Proje Dosyalarını Taşıma

Proje klasörünü XAMPP içerisindeki `htdocs` klasörüne taşıyın.

Örnek:

```
C:\xampp\htdocs\
```

Projenin yolu şu şekilde olmalıdır:

```
C:\xampp\htdocs\customer-management-system
```


### 3. Veritabanını Oluşturma

Tarayıcı üzerinden:

```
http://localhost/phpmyadmin
```

adresine gidin.

Daha sonra:

1. **Import** sekmesine girin.
2. Proje içerisindeki:

```
customers_database.sql
```

dosyasını seçin.
3. **Go** butonuna basın.

Bu işlem sonucunda gerekli veritabanı ve tablolar otomatik olarak oluşturulacaktır.


### 4. Veritabanı Bağlantısı

`database.php` dosyasındaki bağlantı bilgilerini kontrol edin.

Varsayılan XAMPP ayarları:

- Host: localhost
- Kullanıcı adı: root
- Şifre: boş


Örnek:

```php
$database = new PDO(
    "mysql:host=localhost;dbname=customers_database;charset=utf8",
    "root",
    ""
);
```


### 5. Projeyi Çalıştırma

Tarayıcıya aşağıdaki adresi yazın:

```
http://localhost/customer-management-system/login.php
```

Giriş sayfası açılacaktır.


### 6. Admin Hesabı Oluşturma

1. Kayıt ol sayfasından yeni admin hesabı oluşturun.
2. Kullanıcı adı ve şifreniz ile giriş yapın.
3. Dashboard üzerinden müşteri işlemlerini gerçekleştirin.


## Güvenlik Özellikleri

Projede aşağıdaki güvenlik önlemleri kullanılmıştır:

- Şifrelerin hashlenerek saklanması
- PDO Prepared Statements kullanımı
- Session kontrolü
- Form veri kontrolleri

## Geliştirici

PHP ve MySQL backend geliştirme pratiği amacıyla hazırlanmış müşteri yönetim sistemi projesidir.