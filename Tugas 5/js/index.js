// Bagian JavaScript Slideshow
let slideIndex = 0;
showSlides();
function showSlides() {
    let i;
    let slides = document.getElementsByClassName("slide");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    slides[slideIndex-1].classList.add("fade");
    setTimeout(showSlides, 2000); // Ganti gambar setiap 2 detik
}
// Akhir Bagian

// Bagian Countdown Flash Sale 
// Atur tanggal dan waktu target
var countDownDate = new Date("Mar 7, 2025 23:59:00").getTime();

// Perbarui hitungan mundur setiap 1 detik
var x = setInterval(function() {

  // Dapatkan tanggal dan waktu saat ini
  var now = new Date().getTime();

  // Hitung selisih waktu
  var distance = countDownDate - now;

  // Konversi selisih waktu ke hari, jam, menit, dan detik
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Tampilkan hasil hitungan mundur di elemen HTML
  document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // Jika hitungan mundur selesai, tampilkan pesan
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("countdown").innerHTML = "WAKTU HABIS";
  }
}, 1000);

