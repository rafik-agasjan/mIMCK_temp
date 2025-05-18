<?php 

$expectedToken = "e1f23260dc901355f2c1adf80d2fa419";

if (!isset($_GET['hash']) || strpos($_GET['hash'], $expectedToken) === false) {
  http_response_code(404);
  echo "File not found.";
  exit;
} else {
  echo '
  <!-- Page Title -->
      <div class="page-title" data-aos="fade">
        <nav class="breadcrumbs">
          <div class="container">
            <ol>
              <li><a href="index.html">Home</a></li>
              <li class="current">Dock</li>
            </ol>
          </div>
        </nav>
      </div><!-- End Page Title -->

      <!-- Starter Section Section -->
      <section id="starter-section" class="starter-section section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Ambulatory Epicrisis</h2>
          <p>No. 11346486.S6890.1</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up">
          <a href="assets/service/load.php?download=1" class="btn btn-primary float-end" style="margin-bottom: 16px;">download</a>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Full Name</th>
                <th>Date of Treatment</th>
                <th>Patient ID</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Imre Krain</td>
                <td>March 30, 2025</td>
                <td>KIB-20250330-IG</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="container" data-aos="fade-up">
          <iframe
            style="border:0; width: 100%; height: 600px;"
            src="assets/service/load.php"
            frameborder="0"k
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>
      </section><!-- /Starter Section Section -->
  ';
  }