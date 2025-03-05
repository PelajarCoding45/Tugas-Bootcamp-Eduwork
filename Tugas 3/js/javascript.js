    // JavaScript untuk menampilkan dan menyembunyikan pop-up
    function showPopup() {
      document.getElementById("welcomePopup").style.display = "block";
    }

    function closePopup() {
      document.getElementById("welcomePopup").style.display = "none";
    }

    // Tampilkan pop-up saat halaman dimuat
    window.onload = function() {
      showPopup();
    };
