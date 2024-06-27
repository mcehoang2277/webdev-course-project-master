// document.addEventListener("DOMContentLoaded", function() {
//     var splashScreen = document.getElementById("splash-screen");
//     var homepage = document.getElementById("homepage");
//     // Fetch dữ liệu
//     fetchDataFromDatabase(function(data) {
//         // Ẩn splash screen sau khi tải dữ liệu xong
//         setTimeout(function() {
//             // Đặt opacity của splash screen thành 0 để tạo hiệu ứng fade out
//             splashScreen.style.opacity = 0;
//             splashScreen.style.display='none';
//             // Hiển thị trang "homepage" bằng cách đặt opacity thành 1 để tạo hiệu ứng fade in
//             homepage.style.opacity = 1; // Hiển thị trang "homepage"
//         }, 2000); // 2000 milliseconds (2 giây)

//         // Thực hiện các thao tác cài đặt dữ liệu trên trang "homepage" ở đây
//     });
// });

// function fetchDataFromDatabase(callback) {
//     // Giả định tải dữ liệu
//     setTimeout(function() {
//         // Giả định rằng dữ liệu đã được tải xong
//         var data = 'DONE';

//         // Gọi hàm callback để thông báo rằng dữ liệu đã sẵn sàng
//         if (typeof callback === "function") {
//             callback(data);
//         }
//     }, 3000); // 3000 milliseconds (3 giây) để giả lập việc tải dữ liệu
// }