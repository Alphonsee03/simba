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
    // === CHART 1: Pie chart jumlah user ===
    const userPieChart = document.getElementById("userPieChart");
    if (userPieChart) {
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
                        backgroundColor: ["#0d6efd", "#198754", "#ffc107"],
                        hoverOffset: 28,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    animateScale: true,
                    duration: 900,
                },
                plugins: {
                    legend: {
                        position: "bottom",
                        labels: {
                            font: { size: 14, weight: "bold" },
                            color: "#333",
                            padding: 16,
                        },
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                return `${context.label}: ${context.raw} orang`;
                            },
                        },
                    },
                },
            },
        });
    }

    // === CHART 2: Pie chart jumlah pendaftar per beasiswa ===
    const beasiswaPieChart = document.getElementById("beasiswaPieChart");
    if (beasiswaPieChart) {
        const labels = JSON.parse(beasiswaPieChart.dataset.labels);
        const values = JSON.parse(beasiswaPieChart.dataset.values);

        new Chart(beasiswaPieChart, {
            type: "pie",
            data: {
                labels: labels,
                datasets: [
                    {
                        data: values,
                        backgroundColor: [
                            "#0d6efd",
                            "#198754",
                            "#dc3545",
                            "#ffc107",
                            "#6610f2",
                            "#20c997",
                            "#fd7e14",
                        ],
                        hoverOffset: 22,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                animation: {
                    animateScale: true,
                    duration: 900,
                },
                plugins: {
                    legend: {
                        position: "bottom",
                        labels: {
                            font: { size: 12, weight: "bold" },
                            color: "#333",
                            padding: 4,
                        },
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                return `${context.label}: ${context.raw} pendaftar`;
                            },
                        },
                    },
                },
            },
        });
    }

    const pendaftarChart = document.getElementById("pendaftarChart");
    if (pendaftarChart) {
        const totalPendaftar = parseInt(pendaftarChart.dataset.total);
        const totalDiterima = parseInt(pendaftarChart.dataset.diterima);

        new Chart(pendaftarChart, {
            type: "doughnut", // Change the chart type to doughnut
            data: {
                labels: ["Total Pendaftar", "Total Diterima"],
                datasets: [
                    {
                        label: "Jumlah",
                        data: [totalPendaftar, totalDiterima],
                        backgroundColor: ["#0d6efd", "#198754"],
                        borderWidth: 2, // Optional: Add border width
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 900,
                    easing: "easeOutQuart",
                },
                plugins: {
                    legend: {
                        display: true, // Show legend
                        position: "bottom", // Position of the legend
                    },
                    tooltip: {
                        enabled: true,
                        callbacks: {
                            label: function (tooltipItem) {
                                return (
                                    tooltipItem.label +
                                    "   : " +
                                    tooltipItem.raw
                                ); // Show value in tooltip
                            },
                        },
                    },
                },
            },
        });
    }
});

const avatarButton = document.getElementById("avatarButton");
const dropdown = document.getElementById("user-dropdown");

avatarButton.addEventListener("click", function (event) {
    event.stopPropagation();
    const expanded = this.getAttribute("aria-expanded") === "true";
    this.setAttribute("aria-expanded", String(!expanded));
    dropdown.classList.toggle("open");
});

// Close dropdown if clicking outside
document.addEventListener("click", (event) => {
    if (
        !dropdown.contains(event.target) &&
        !avatarButton.contains(event.target)
    ) {
        dropdown.classList.remove("open");
        avatarButton.setAttribute("aria-expanded", "false");
    }
});

// Accessibility: close dropdown with ESC
document.addEventListener("keydown", (event) => {
    if (event.key === "Escape") {
        dropdown.classList.remove("open");
        avatarButton.setAttribute("aria-expanded", "false");
        avatarButton.focus();
    }
});
