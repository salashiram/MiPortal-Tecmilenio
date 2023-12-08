<?php
session_start();
if (isset($_SESSION['usuario'])) {
   
    echo '
    <div class="menu_content">
        <ul class="menu_items">
          <li class="menu_item">
            <a href="../Views/home.html" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-home"></i>
              </span>
              <span class="navlink">Home</span>
            </a>
          </li>
          <li class="menu_item">
            <a href="../Views/misCalificaciones.html" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-cloud-upload"></i>
              </span>
              <span class="navlink">Mis calificaciones</span>
            </a>
          </li>
          <li class="menu_item">
            <a href="../Views/misCursos.html" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-cloud-upload"></i>
              </span>
              <span class="navlink">Mis cursos</span>
            </a>
          </li>
          <li class="menu_item">
            <a href="../Views/configuracion.html" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-cog"></i>
              </span>
              <span class="navlink">Settings</span>
            </a>
          </li>
          <li class="menu_item">
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
                <img src="../Resources/Profile-pics/kimson-doan-HD8KlyWRYYM-unsplash.jpg" alt="Imagen de perfil" class="profile_image">
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