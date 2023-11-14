/*---------------------Load trang------------------------- */
// Sử dụng sự kiện 'load' để xác định khi trang đã tải xong
window.addEventListener('load', function() {
    // Cuộn lên đầu trang
    window.scrollTo(0, 0);
});

/*---------------------Thanh menu------------------------- */
window.onscroll = function() {
    var menu = document.getElementById('fixed-menu');
    if (window.pageYOffset > 120) {
        menu.classList.add('sticky');
    } else {
        menu.classList.remove('sticky');
    }
};




/*--------------------------Icon--------------------------- */

// function showSearchBox() {
//     var searchBox = document.getElementById("searchBox");
//     var loginBox = document.getElementById("loginBox");
//     var cartBox = document.getElementById("cartBox");

//     if (searchBox.style.display === "none" || searchBox.style.display === "") {
//         loginBox.style.display = "none";
//         cartBox.style.display = "none";
//         searchBox.style.display = "block";
//     } else {
//         searchBox.style.display = "none";
//     }

// }

// function showLoginBox() {
//     var searchBox = document.getElementById("searchBox");
//     var loginBox = document.getElementById("loginBox");
//     var cartBox = document.getElementById("cartBox");

//     if (loginBox.style.display === "none" || loginBox.style.display === "") {
//         searchBox.style.display = "none";
//         cartBox.style.display = "none";
//         loginBox.style.display = "block";
//     } else {
//         loginBox.style.display = "none";
//     }

// }

// function showCartBox() {
//     var searchBox = document.getElementById("searchBox");
//     var loginBox = document.getElementById("loginBox");
//     var cartBox = document.getElementById("cartBox");

//     if (cartBox.style.display === "none" || cartBox.style.display === "") {
//         searchBox.style.display = "none";
//         loginBox.style.display = "none";
//         cartBox.style.display = "block";
//     } else {
//         cartBox.style.display = "none";
//     }
// }

/*------------------------Kế thừa --------------------------- */
// JavaScript để xử lý sự kiện click trên menu
// document.getElementById('fixed-menu').addEventListener('click', function() {
//     window.location.href = 'new_collection.html';
// });