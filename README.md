- Cài đặt môi trường 

Bước 1: Tải phầm mềm Xampp tại https://www.apachefriends.org/download.html
Bước 2: Tiến hành cài đặt Xampp
Bước 3: Khởi động dịch vụ Apache, MySQL 

- Cài đặt dự án

Bước 1: Di chuyển file Project.zip vào thư mục C:\xampp\htdocs
Bước 2: Giải nén file Project.zip
Bước 3: Truy cập vào thư mục Project
Bước 4: Mở Powershell 
Bước 5: Chạy lệnh composer install
Bước 6: Chạy lệnh cp .env.example .env
Bước 7: Chay lệnh php artisan key:generate
Bước 8: Chay lệnh php artisan serve 
Bước 9: Chay lệnh php artisan migrate
Bước 10: Truy cập link http://localhost/phpmyadmin/ 
Bước 11: Tạo mới 1 Database  
Bước 12: Vào file .env sửa DB_DATABASE="tên database mới tạo ở bước 11"
Bước 13: Insert file Project.sql ở trong thư mục Đồ Án Tốt Nghiệp Lỗ Thị Thùy Trang