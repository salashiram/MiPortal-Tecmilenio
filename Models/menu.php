<?php
session_start();
if (isset($_SESSION['usuario'])) {
    if (!isset($_SESSION['showGrades'])) {
        $_SESSION['showGrades'] = true; 
    }
    if (!isset($_SESSION['showCourses'])) {
        $_SESSION['showCourses'] = true; 
    }
    if (!isset($_SESSION['showKardex'])) {
        $_SESSION['showKardex'] = false; 
    }
    if (isset($_SESSION['usuario'])) {
        echo ' <div class="menu_content">
        <ul class="menu_items">
          <li class="menu_item" id="homeButton">
            <a href="../Views/home.html" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-home"></i>
              </span>
              <span class="navlink">Home</span>
            </a>
          </li>';
    }

    if ($_SESSION['showGrades']) {
        echo '<li class="menu_item" id="gradesButton">
        <a href="../Views/misCalificaciones.html" class="nav_link">
          <span class="navlink_icon">
            <i class="bx bx-cloud-upload"></i>
          </span>
          <span class="navlink">Mis calificaciones</span>
        </a>
      </li>';
    }

    if ($_SESSION['showCourses']) {
        echo ' <li class="menu_item" id="coursesButton">
        <a href="../Views/misCursos.html" class="nav_link">
          <span class="navlink_icon">
            <i class="bx bx-cloud-upload"></i>
          </span>
          <span class="navlink">Mis cursos</span>
        </a>
      </li>';
    }

    if ($_SESSION['showKardex']) {
        echo '<li class="menu_item" id="kardexButton">
        <a href="../Views/kardex.html" class="nav_link">
          <span class="navlink_icon">
            <i class="bx bx-cloud-upload"></i>
          </span>
          <span class="navlink">Mi Kardex</span>
        </a>
      </li>';
    }


    echo '   
          <li class="menu_item" id="settingsButton">
            <a href="../Views/configuracion.html" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-cog"></i>
              </span>
              <span class="navlink">Settings</span>
            </a>
          </li>
          <li class="menu_item" id="seeAllButton">
            <a href="../Views/moreOptions.html" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-cog"></i>
              </span>
              <span class="navlink">Ver todo</span>
            </a>
          </li>
          <div class="bottom-content">
          <!-- user profile  -->
          <div class="profile_section">
            <div class="profile_info">
              <a href="../Views/userProfile.html">
                <img src="../Resources/Profile-pics/kimson-doan-HD8KlyWRYYM-unsplash.jpg" alt="Imagen de perfil" class="profile_image" id="profileImage">
              </a>
              <!-- <p class="user-name" id="correo"></p> -->
            </div>
          </div>
          <!-- Cerrar sesión -->
          <div class="logout-container">
            <li class="menu_item">
              <a href="#" id="logoutButton" class="nav_link">
                <span class="navlink_icon">
                  <i class="bx bx-log-out"></i>
                </span>
                <span class="navlink">Cerrar sesión</span>
              </a>
            </li>
          </div>
          </div>
          <div class="collapse_content">
          <div class="collapse expand_sidebar">
            <span></span>
            <i class="bx bx-chevron-right"></i>
          </div>
          <div class="collapse collapse_sidebar">
            <span></span>
            <i class="bx bx-chevron-left"></i>
          </div>
        </div>
      </div>';
      
}
?>