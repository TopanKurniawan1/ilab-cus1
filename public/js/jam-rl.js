function updateClock() {
    const now = new Date();

    const jam = String(now.getHours()).padStart(2, '0');
    const menit = String(now.getMinutes()).padStart(2, '0');
    const detik = String(now.getSeconds()).padStart(2, '0');

    const waktu = `${jam}:${menit}:${detik}`;

    document.getElementById("jam-realtime").textContent = "Waktu sekarang: " + waktu;
}

// update setiap 1 detik
setInterval(updateClock, 1000);

// eksekusi pertama kali saat halaman dibuka
updateClock();
