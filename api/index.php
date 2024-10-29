<?php 
  require "function.php";
  session_start();
  $data_course = pg_query($con, "SELECT * FROM kursus ORDER BY jumlah_siswa DESC LIMIT 3");
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BelajarSkuy</title>
    <link rel="icon" href="./images/logo.png" sizes="32x32" type="image/png" />
    <!-- Fonts -->
    <!-- Racing Sans One -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Racing+Sans+One&display=swap" rel="stylesheet" />
    <!-- Quicksand -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet" />
    <!-- Style -->
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <header>
      <nav>
        <h1>BelajarSkuy</h1>
        <div class="navigation">
          <a href="#about">About</a>
          <a href="#courses">Courses</a>
          <a href="#social-media">Contact</a>
        </div>
        <div class="login_register">
          <a href="./home/login.php" class="login">Login</a>
          <div class="register">
            <button href="" class="register-button">Register</button>
            <div class="register-option">
              <a href="./home/register_student.php">as student</a>
              <a href="./home/register_teacher.php">as teacher</a>
            </div>
          </div>
        </div>
      </nav>
      <div class="jumbotron">
        <div class="text">
          <header>
            <h2>Lets</h2>
            <h2 class="highlight">E-Learning</h2>
            <h2>At Your Home</h2>
          </header>
          <p>Improve your skills with interactive online courses. Access quality materials, experienced mentors, and a learning community ready to support your journey. Start learning today and achieve your dreams!</p>
          <div class="link">
            <div class="apply">
              <button class="apply-button">Apply Now</button>
              <div class="apply-option">
                <a href="./home/register_student.php">as student</a>
                <a href="./home/register_teacher.php">as teacher</a>
              </div>
            </div>
            <a href="#about" class="readmore">Read More</a>
          </div>
        </div>
        <img src="./images/vektor.png" alt="gambar vektor dua orang sedang berbicara" />
      </div>
    </header>
    <main>
      <a href="./home/faq.html" class="faq"><img src="./images/Main Logo.png" alt="logo faq" /></a>
      <article id="about">
        <h2>About Us</h2>
        <p>
          We are an online course platform dedicated to helping you develop skills and knowledge in various fields, from technology to creativity. With access to up-to-date materials and professional mentors, we believe that everyone has
          the right to learn without limitations of time and place. Our mission is to create flexible, interactive and quality learning experiences, so you can achieve your career and personal goals with more confidence.
        </p>
        <div class="image">
          <img src="./images/development.jpg" alt="gambar vektor pengembangan aplikasi" />
          <img src="./images/science.jpg" alt="gambar vektor sains" />
          <img src="./images/business.jpg" alt="gambar vektor bisnis" />
        </div>
      </article>
      <article id="courses"> 
        <h2>Most Popular Courses</h2>
        <div class="course-container">
          <?php while($row = pg_fetch_assoc($data_course)) { ?>
          <div class="course"> 
            <img src="./thumbnail/<?= $row["thumbnail"] ?>" alt="gambar kelas <?= $row["judul"] ?>" />
            <h3><?= $row["judul"] ?></h3>
            <p>
              <?php 
                $query = pg_fetch_assoc(pg_query($con,"SELECT * FROM pengajar WHERE id = {$row["id_pengajar"]}"));
              ?>
              <?= $query["nama"] ?>
            </p>
            <p><?= $row["jumlah_siswa"]?> registered students</p>
            <p>Rp<?= $row["harga"] ?></p>
            <?php if ($row["harga"] == 0 ) { ?>
              <a href="home/login.php">Enroll</a>
            <?php } else { ?>
              <a href="home/login.php">pay</a>
            <?php } ?>
          </div>
          <?php }; ?>
        </div>
      </article>
    </main>
    <footer>
      <div class="nama-website">
        <img src="./images/logo.png" alt="logo belajarskuy" />
        <h2>BelajarSkuy</h2>
      </div>
      <div id="social-media">
        <h2>Contact Us</h2>
        <div class="gambar">
          <a href="mailto:andrelim806@gmail.com" target="_blank"><img src="./images/gmail.png" alt="logo gmail" /></a>
          <a href="https://www.instagram.com/dree_lim" target="_blank"><img src="./images/instagram.png" alt="logo instagram" /></a>
          <a href="https://wa.me/6281361926580" target="_blank"><img src="./images/whatsapp.png" alt="logo whatsapp" /></a>
        </div>
      </div>
    </footer>
    <script>
      const registerButton = document.querySelector(".register-button");
      const registerOption = document.querySelector(".register-option");
      registerButton.addEventListener("click", () => {
        if (registerOption.style.opacity == 0) {
          registerOption.style.opacity = 1;
        } else {
          registerOption.style.opacity = 0;
        }
      });

      const applyButton = document.querySelector(".apply-button");
      const applyOption = document.querySelector(".apply-option");
      applyButton.addEventListener("click", () => {
        if (applyOption.style.opacity == 0) {
          applyOption.style.opacity = 1;
        } else {
          applyOption.style.opacity = 0;
        }
      });
    </script>
  </body>
</html>

