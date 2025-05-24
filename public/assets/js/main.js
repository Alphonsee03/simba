function slideToggle(t, e, o) {
    0 === t.clientHeight ? j(t, e, o, !0) : j(t, e, o);
}
function slideUp(t, e, o) {
    j(t, e, o);
}
function slideDown(t, e, o) {
    j(t, e, o, !0);
}
function j(t, e, o, i) {
    void 0 === e && (e = 400),
        void 0 === i && (i = !1),
        (t.style.overflow = "hidden"),
        i && (t.style.display = "block");
    var p,
        l = window.getComputedStyle(t),
        n = parseFloat(l.getPropertyValue("height")),
        a = parseFloat(l.getPropertyValue("padding-top")),
        s = parseFloat(l.getPropertyValue("padding-bottom")),
        r = parseFloat(l.getPropertyValue("margin-top")),
        d = parseFloat(l.getPropertyValue("margin-bottom")),
        g = n / e,
        y = a / e,
        m = s / e,
        u = r / e,
        h = d / e;
    window.requestAnimationFrame(function l(x) {
        void 0 === p && (p = x);
        var f = x - p;
        i
            ? ((t.style.height = g * f + "px"),
              (t.style.paddingTop = y * f + "px"),
              (t.style.paddingBottom = m * f + "px"),
              (t.style.marginTop = u * f + "px"),
              (t.style.marginBottom = h * f + "px"))
            : ((t.style.height = n - g * f + "px"),
              (t.style.paddingTop = a - y * f + "px"),
              (t.style.paddingBottom = s - m * f + "px"),
              (t.style.marginTop = r - u * f + "px"),
              (t.style.marginBottom = d - h * f + "px")),
            f >= e
                ? ((t.style.height = ""),
                  (t.style.paddingTop = ""),
                  (t.style.paddingBottom = ""),
                  (t.style.marginTop = ""),
                  (t.style.marginBottom = ""),
                  (t.style.overflow = ""),
                  i || (t.style.display = "none"),
                  "function" == typeof o && o())
                : window.requestAnimationFrame(l);
    });
}

let sidebarItems = document.querySelectorAll(".sidebar-item.has-sub");
for (var i = 0; i < sidebarItems.length; i++) {
    let sidebarItem = sidebarItems[i];
    sidebarItems[i]
        .querySelector(".sidebar-link")
        .addEventListener("click", function (e) {
            e.preventDefault();

            let submenu = sidebarItem.querySelector(".submenu");

            // Cek apakah submenu ada dan tidak sedang dalam animasi
            if (submenu) {
                if (submenu.classList.contains("active")) {
                    submenu.classList.remove("active");
                    submenu.style.display = "none"; // Sembunyikan submenu
                } else {
                    submenu.classList.add("active");
                    submenu.style.display = "block"; // Tampilkan submenu
                }
                slideToggle(submenu, 300); // Panggil fungsi slideToggle
            }
        });
}

document.addEventListener("DOMContentLoaded", function () {
    const userPieChart = document.getElementById("userPieChart");
    const pendaftarChart = document.getElementById("pendaftarChart");

    const adminCount = parseInt(userPieChart.dataset.admin);
    const petugasCount = parseInt(userPieChart.dataset.petugas);
    const mahasiswaCount = parseInt(userPieChart.dataset.mahasiswa);

    new Chart(userPieChart, {
        type: "pie",
        data: {
            labels: ["Admin", "Petugas", "Mahasiswa"],
            datasets: [
                {
                    data: [adminCount, petugasCount, mahasiswaCount],
                    backgroundColor: ["#0d6efd", "#198754", "#0dcaf0"],
                    hoverOffset: 28,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            width: 400, // Mengubah lebar pie chart
            height: 400, // Mengubah tinggi pie chart
            animation: {
                animateScale: true,
                duration: 900,
            },
            plugins: {
                legend: {
                    position: "bottom",
                    align: "center", // Tambahkan ini
                    labels: {
                        font: { size: 14, weight: "bold" },
                        color: "#f8f9fa",
                        padding: 16,
                    },
                },
            },
        },
    });

    const totalPendaftar = parseInt(pendaftarChart.dataset.total);
    const totalDiterima = parseInt(pendaftarChart.dataset.diterima);

 
    new Chart(pendaftarChart, {
        type: "bar", // Tipe masih bar tetapi dengan orientasi kolom
        data: {
            labels: ["Total Pendaftar", "Diterima"],
            datasets: [
                {
                    data: [totalPendaftar, totalDiterima],
                    backgroundColor: ["#0d6efd", "#198754"],
                    borderRadius: 5,
                    maxBarThickness: 300, // Memperbesar ketebalan bar
                    barPercentage: 1, // Memperbesar proporsi lebar bar
                    categoryPercentage: 0.8, // Memperbesar kategori
                },
            ],
        },
        options: {
            indexAxis: "y", // Menyeting agar menjadi orientasi kolom
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 900,
                easing: "easeOutQuart",
            },
            scales: {
                x: {
                    // Mempersiapkan skala X untuk orientasi kolom
                    beginAtZero: true,
                    ticks: { stepSize: 1 },
                    grid: { color: "#3a3f56" },
                },
                y: {
                    // Mempersiapkan skala Y untuk label
                    grid: { display: false },
                    ticks: {
                        font: { weight: "bold" },
                        color: "#f8f9fa",
                    },
                },
            },
            plugins: {
                legend: { display: false },
                tooltip: {
                    enabled: true,
                    mode: "index",
                    intersect: false,
                },
            },
        },
    });
});
