<?php
session_start();
require_once "../config/db.php";

// proteksi admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

// =====================
// QUERY DASHBOARD
// =====================
// total users
$userResult = mysqli_query($conn, "SELECT COUNT(*) AS total_users FROM users");
$userData = mysqli_fetch_assoc($userResult);
$totalUsers = $userData['total_users'];

// total contacts
$contactResult = mysqli_query($conn, "SELECT COUNT(*) AS total_contacts FROM contacts");
$contactData = mysqli_fetch_assoc($contactResult);
$totalContacts = $contactData['total_contacts'];


?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NexaTech</title>
  <link rel="shortcut icon" type="image/png" href="../../back-end/assets/images/logos/company.png"/>
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!--  App Topstrip -->
    <div class="app-topstrip bg-dark py-6 px-3 w-100 d-lg-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center justify-content-center gap-5 mb-2 mb-lg-0">
        <a class="d-flex justify-content-center" href="#">
          <img src="../../back-end/assets/images/logos/NexaTech.png" alt="" width="150">
        </a>

        
      </div>

       <div class="d-lg-flex align-items-center gap-2">
    <h3 class="text-white mb-2 mb-lg-0 fs-5 text-center">
      Selamat Datang, <?= htmlspecialchars($_SESSION['user_name'] ?? 'Admin'); ?>
    </h3>
  </div>

    </div>
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="../index.html" class="text-nowrap logo-img">
            <img src="../../back-end/assets/images/logos/Solutions.png"  alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-6"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="dashboard.php" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <!-- ---------------------------------- -->
            <!-- Dashboard -->
            <!-- ---------------------------------- -->

            <li>
              <span class="sidebar-divider lg"></span>
            </li>
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">Extra</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between"  
                href="users.php" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-mood-smile"></i>
                  </span>
                  <span class="hide-menu">Daftar User</span>
                </div>
                
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="daftar_contact.php" aria-expanded="false">
                <i class="ti ti-archive"></i>
                <span class="hide-menu">List Contact Form</span>
              </a>
            </li>
            <!-- <li class="sidebar-item">
              <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                <i class="ti ti-file"></i>
                <span class="hide-menu">Laporan</span>
              </a>
            </li> -->
             <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">Pages</span>
            </li>
             <li class="sidebar-item">
              <a class="sidebar-link" href="../auth/logout.php" aria-expanded="false">
                <i class="ti ti-file"></i>
                <span class="hide-menu">Logout</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link " href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="ti ti-bell"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
              <div class="dropdown-menu dropdown-menu-animate-up" aria-labelledby="drop1">
                <div class="message-body">
                  <a href="javascript:void(0)" class="dropdown-item">
                    Item 1
                  </a>
                  <a href="javascript:void(0)" class="dropdown-item">
                    Item 2
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
               
              <li class="nav-item dropdown">
                <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <!-- <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a> -->
                    <!-- <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a> -->
                        <a href="../auth/logout.php"
                        class="btn btn-outline-primary mx-3 mt-2 d-block">
                        Logout
                        </a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="body-wrapper-inner">
        <div class="container-fluid">
          <!--  Row 1 -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card w-100">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title">Total Users & Contact</h4>
                      <p class="card-subtitle">
                        Data Users & Contact From 
                      </p>
                    </div>
                    <div class="ms-auto">
                      <ul class="list-unstyled mb-0">
                        <li class="list-inline-item text-primary">
                          <span class="round-8 text-bg-primary rounded-circle me-1 d-inline-block"></span>
                          Total Users
                        </li>
                        <li class="list-inline-item text-info">
                          <span class="round-8 text-bg-info rounded-circle me-1 d-inline-block"></span>
                          Total Pesan Masuk
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body">
                    <canvas id="dashboardChart" height="110"></canvas>
                  </div>
                </div>
              </div>
            </div>
          
           
            
            
          </div>
          <div class="py-6 px-6 text-center">
            <p class="mb-0 fs-4">Design and Developed by <a href="#"
                class="pe-1 text-primary text-decoration-underline">NexaTech.my.id</a> Distributed by <a href="https://nurulfikri.ac.id/" target="_blank" >NurulFikri</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

 

  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const canvas = document.getElementById("dashboardChart");
  if (!canvas) return;

  const ctx = canvas.getContext("2d");

  // 🎨 Gradient
  const gradientUsers = ctx.createLinearGradient(0, 0, 0, 300);
  gradientUsers.addColorStop(0, "rgba(1, 51, 126, 0.9)");
  gradientUsers.addColorStop(1, "rgba(2, 33, 80, 1)");

  const gradientContacts = ctx.createLinearGradient(0, 0, 0, 300);
  gradientContacts.addColorStop(0, "rgba(19, 156, 247, 1)");
  gradientContacts.addColorStop(1, "rgba(2, 119, 243, 0.3)");

  new Chart(ctx, {
    type: "bar",
    data: {
      labels: ["Users", "Pesan Masuk"],
      datasets: [{
        data: [<?= (int)$totalUsers ?>, <?= (int)$totalContacts ?>],
        backgroundColor: [gradientUsers, gradientContacts],
        borderRadius: 12,
        barThickness: 60,
        hoverBackgroundColor: [
          "rgba(4, 40, 140, 1)",
          "rgba(85, 179, 241, 1)"
        ]
      }]
    },
    options: {
      responsive: true,
      animation: {
        duration: 1200,
        easing: "easeOutQuart"
      },
      plugins: {
        legend: { display: false },
        tooltip: {
          backgroundColor: "#111",
          titleColor: "#fff",
          bodyColor: "#fff",
          padding: 12,
          cornerRadius: 8
        }
      },
      scales: {
        x: {
          grid: { display: false },
          ticks: {
            font: { size: 13, weight: "600" }
          }
        },
        y: {
          beginAtZero: true,
          grid: {
            color: "rgba(0,0,0,0.05)"
          },
          ticks: {
            stepSize: 1,
            font: { size: 12 }
          }
        }
      }
    }
  });
});
</script>


  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
