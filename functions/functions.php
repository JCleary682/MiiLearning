<?php

function displayNonRegNav(){
    
    echo"
    <nav class='navbar navbar-expand-sm navbar-dark bg-success p-0'>
      <a href='index.php' class='navbar-brand'>miitutor</a>
      <button class='navbar-toggler' data-toggle='collapse' data-target='#navbarOpt'>
        <span class='navbar-toggler-icon'></span>
      </button>

      <!-- Start of navbar links -->
      <collapse class='collapse navbar-collapse' id='navbarOpt'>
        <ul class='navbar-nav justify-content-end' id='nonUserNavbar'>
          <li class='nav-item px-2'>
            <a href='index.php' class='nav-link'>Home</a>
          </li>
          <li class='nav-item px-2'>
            <a href='about.php' class='nav-link'>About Us</a>
          </li>
          <li class='nav-item px-2'>
            <a href='tutors.php' class='nav-link'>Tutors</a>
          </li>
          <li class='nav-item px-2'>
            <a href='register.php' class='nav-link'>Join Us</a>
          </li>
          <li class='nav-item px-2'>
            <a href='contact.php' class='nav-link'>Contact Us</a>
          </li>
          <li class='nav-item px-2'>
            <a href='search.php' class='nav-link'>Search</a>
          </li>
        </ul>

        <!-- Functions for users -->
        <ul class='navbar-nav ml-auto'>
          <!-- Login Button -->
          <li class='nav-item'>
            <a href='secure/login.php' class='nav-link'>
              <i class='fa fa-user-times'></i>Login
            </a>
          </li>
        </ul>
      </collapse>
    </nav>";
}

function RegFormNav(){
    
    echo"
    <nav class='navbar navbar-expand-sm navbar-dark bg-success p-0'>
      <a href='../index.php' class='navbar-brand'>miitutor</a>
      <button class='navbar-toggler' data-toggle='collapse' data-target='#navbarOpt'>
        <span class='navbar-toggler-icon'></span>
      </button>

      <!-- Start of navbar links -->
      <collapse class='collapse navbar-collapse' id='navbarOpt'>
        <ul class='navbar-nav justify-content-end' id='nonUserNavbar'>
          <li class='nav-item px-2'>
            <a href='../index.php' class='nav-link'>Home</a>
          </li>
          <li class='nav-item px-2'>
            <a href='../about.php' class='nav-link'>About Us</a>
          </li>
          <li class='nav-item px-2'>
            <a href='../tutors.php' class='nav-link'>Tutors</a>
          </li>
          <li class='nav-item px-2'>
            <a href='../register.php' class='nav-link'>Join Us</a>
          </li>
          <li class='nav-item px-2'>
            <a href='../contact.php' class='nav-link'>Contact Us</a>
          </li>
          <li class='nav-item px-2'>
            <a href='../search.php' class='nav-link'>Search</a>
          </li>
        </ul>

        <!-- Functions for users -->
        <ul class='navbar-nav ml-auto'>
          <!-- Login Button -->
          <li class='nav-item'>
            <a href='../secure/login.php' class='nav-link'>
              <i class='fa fa-user-times'></i>Login
            </a>
          </li>
        </ul>
      </collapse>
    </nav>";
}

function tutorNav(){
    echo"
    <nav class='navbar navbar-expand-sm navbar-dark bg-dark p-0'>
      <a href='index.php' class='navbar-brand'>miitutor</a>
      <button class='navbar-toggler' data-toggle='collapse' data-target='#navbarOpt'>
        <span class='navbar-toggler-icon'></span>
      </button>

      <!-- Start of navbar links -->
      <collapse class='collapse navbar-collapse' id='navbarOpt'>
        <ul class='navbar-nav justify-content-end' id='nonUserNavbar'>
          <li class='nav-item px-2'>
            <a href='tutorHome.php' class='nav-link'>Tutor Home</a>
          </li>
          <li class='nav-item px-2'>
            <a href='tutorprofileedit.php' class='nav-link'>Edit Details</a>
          </li>
          <li class='nav-item px-2'>
            <a href='tutorbookings.php' class='nav-link'>View Bookings</a>
          </li>
        </ul>

        <!-- Functions for users -->
        <ul class='navbar-nav ml-auto'>
          <!-- Login Button -->
          <li class='nav-item'>
            <a href='../secure/logout.php' class='nav-link'>
                  <i class='fa fa-user-times'></i>Logout
            </a>
          </li>
        </ul>
      </collapse>
    </nav>
    ";
}

function studentNav(){
    echo"
        <nav class='navbar navbar-expand-sm navbar-dark bg-dark p-0'>
            <div class='container'>
              <a href='studentHome.php' class='navbar-brand'>Mii Learning Students</a>
              <button class='navbar-toggler' data-toggle='collapse' data-target='#navbarNav'>
                <span class='navbar-toggler-icon'></span>
              </button>
              <collapse class='collapse navbar-collapse' id='navbarNav'>
                <ul class='navbar-nav'>
                  <li class='nav-item px-2'>
                    <a href='studentHome.php' class='nav-link'>Students Home</a>
                  </li>
                  <li class='nav-item px-2'>
                    <a href='studentviewtutor.php' class='nav-link'>View Tutors</a>
                  </li>
                  <li class='nav-item px-2'>
                    <a href='viewstudentbookings.php' class='nav-link'>View Bookings</a>
                  </li>
                  <li class='nav-item px-2'>
                    <a href='studentprofileedit.php' class='nav-link'>Edit Details</a>
                  </li>
                </ul>
                <ul class='navbar-nav ml-auto'>
                  <li class='nav-item'>
                      <a href='../secure/logout.php' class='nav-link'>
                      <i class='fa fa-user-times'></i>Logout
                    </a>
                  </li>
                </ul>
              </collapse>
            </div>
        </nav>
        ";
}

function parentNav(){
    echo"
        <nav class='navbar navbar-expand-sm navbar-light bg-dark p-0'>
            <div class='container'>
              <a href='parentHome.php' class='navbar-brand'>Mii Learning Students</a>
              <button class='navbar-toggler' data-toggle='collapse' data-target='#navbarNav'>
                <span class='navbar-toggler-icon'></span>
              </button>
              <collapse class='collapse navbar-collapse' id='navbarNav'>
                <ul class='navbar-nav'>
                  <li class='nav-item px-2'>
                    <a href='parentHome.php' class='nav-link'>Students Home</a>
                  </li>
                  <li class='nav-item px-2'>
                    <a href='parentviewtutor.php' class='nav-link'>View Tutors</a>
                  </li>
                  <li class='nav-item px-2'>
                    <a href='viewparentbookings.php' class='nav-link'>View Bookings</a>
                  </li>
                  <li class='nav-item px-2'>
                    <a href='parentprofileedit.php' class='nav-link'>Edit Details</a>
                  </li>
                </ul>
                <ul class='navbar-nav ml-auto'>
                  <li class='nav-item'>
                      <a href='../secure/logout.php' class='nav-link'>
                      <i class='fa fa-user-times'></i>Logout
                    </a>
                  </li>
                </ul>
              </collapse>
            </div>
        </nav>
        ";
}

?>