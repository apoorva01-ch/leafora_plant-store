<?php session_start(); ?>
<?php include("secure.php"); ?>
<?php
$conn = new mysqli("localhost", "root", "", "leafora");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$success = false;
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $sql = "INSERT INTO contact_messages(name, email, subject, message)
            VALUES ('$name', '$email', '$subject', '$message')";
    if($conn->query($sql) === TRUE){ $success = true; }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leafora | Contact Us</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

  <style>
    :root {
      --forest:    #1d3124;
      --moss:      #345c3c;
      --leaf:      #307649;
      --sage:      #9dd4a7;
      --cream:     #e1d4c2;
      --parchment: #f5efe6;
      --red:       #da3636;
      --white:     #ffffff;
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    html { scroll-behavior: smooth; }

    body {
      font-family: 'DM Sans', sans-serif;
      background: var(--forest);
      color: var(--white);
      overflow-x: hidden;
    }

    /* ── HOME BUTTON ── */
    .home-btn {
      position: fixed;
      top: 22px;
      left: 22px;
      background: var(--leaf);
      color: white;
      width: 48px;
      height: 48px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      text-decoration: none;
      z-index: 1000;
      box-shadow: 0 4px 15px rgba(0,0,0,0.3);
      transition: 0.3s;
    }
    .home-btn:hover { background: var(--red); transform: scale(1.1); color: white; }

    /* ── HERO ── */
    .hero {
      position: relative;
      min-height: 70vh;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      background: var(--forest);
    }

    .hero-bg {
      position: absolute;
      inset: 0;
      background: url('../images/bg2.jpg') center/cover no-repeat;
      filter: brightness(0.25) saturate(0.7);
      z-index: 0;
    }

    /* botanical SVG leaves */
    .leaf-deco {
      position: absolute;
      z-index: 1;
      pointer-events: none;
      opacity: 0.12;
    }
    .leaf-deco.tl { top: -30px; left: -30px; width: 320px; transform: rotate(-20deg); }
    .leaf-deco.br { bottom: -40px; right: -20px; width: 280px; transform: rotate(160deg); }

    .hero-content {
      position: relative;
      z-index: 2;
      text-align: center;
      padding: 60px 20px 40px;
    }

    .hero-tag {
      display: inline-block;
      background: rgba(157,212,167,0.15);
      border: 1px solid rgba(157,212,167,0.4);
      color: var(--sage);
      font-size: 12px;
      letter-spacing: 4px;
      text-transform: uppercase;
      padding: 6px 20px;
      border-radius: 50px;
      margin-bottom: 24px;
      animation: fadeUp 0.6s ease both;
    }

    .hero-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(44px, 8vw, 90px);
      font-weight: 900;
      line-height: 1.05;
      color: var(--white);
      animation: fadeUp 0.8s 0.1s ease both;
    }

    .hero-title span { color: var(--sage); font-style: italic; }

    .hero-sub {
      font-size: 17px;
      color: var(--cream);
      max-width: 560px;
      margin: 22px auto 0;
      line-height: 1.7;
      opacity: 0.85;
      animation: fadeUp 0.9s 0.2s ease both;
    }

    .hero-divider {
      width: 60px;
      height: 3px;
      background: var(--sage);
      margin: 28px auto 0;
      border-radius: 2px;
      animation: fadeUp 1s 0.3s ease both;
    }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(28px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* ── MAIN SECTION ── */
    .main-section {
      background: var(--parchment);
      padding: 90px 20px;
      position: relative;
    }

    .main-section::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 6px;
      background: linear-gradient(90deg, var(--forest), var(--leaf), var(--sage));
    }

    /* ── FORM CARD ── */
    .form-card {
      background: var(--white);
      border-radius: 24px;
      padding: 50px 45px;
      box-shadow: 0 20px 60px rgba(29,49,36,0.13);
      height: 100%;
    }

    .form-card h2 {
      font-family: 'Playfair Display', serif;
      color: var(--forest);
      font-size: 32px;
      font-weight: 700;
      margin-bottom: 8px;
    }

    .form-card .subtitle {
      color: #7a8a7e;
      font-size: 14px;
      margin-bottom: 36px;
    }

    .field-group {
      position: relative;
      margin-bottom: 22px;
    }

    .field-group label {
      display: block;
      font-size: 12px;
      font-weight: 500;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      color: var(--moss);
      margin-bottom: 8px;
    }

    .field-group input,
    .field-group textarea {
      width: 100%;
      padding: 14px 18px;
      border: 2px solid #e0dbd2;
      border-radius: 12px;
      font-family: 'DM Sans', sans-serif;
      font-size: 15px;
      color: var(--forest);
      background: var(--parchment);
      transition: 0.3s;
      outline: none;
    }

    .field-group input:focus,
    .field-group textarea:focus {
      border-color: var(--leaf);
      background: #fff;
      box-shadow: 0 0 0 4px rgba(48,118,73,0.08);
    }

    .field-group textarea { min-height: 145px; resize: none; }

    .btn-send {
      width: 100%;
      padding: 16px;
      background: linear-gradient(135deg, var(--forest), var(--leaf));
      color: white;
      border: none;
      border-radius: 12px;
      font-family: 'DM Sans', sans-serif;
      font-size: 16px;
      font-weight: 600;
      letter-spacing: 0.5px;
      cursor: pointer;
      transition: 0.3s;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }

    .btn-send:hover {
      background: linear-gradient(135deg, var(--red), #ff4d4d);
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(218,54,54,0.3);
    }

    /* success toast */
    .success-banner {
      background: linear-gradient(135deg, #2a5d33, #307649);
      color: white;
      padding: 16px 22px;
      border-radius: 12px;
      margin-bottom: 24px;
      display: flex;
      align-items: center;
      gap: 12px;
      font-weight: 500;
      animation: fadeUp 0.5s ease;
    }

    /* ── INFO CARDS ── */
    .info-stack { display: flex; flex-direction: column; gap: 18px; height: 100%; }

    .info-card {
      background: var(--moss);
      border-radius: 18px;
      padding: 24px 26px;
      display: flex;
      align-items: flex-start;
      gap: 18px;
      transition: 0.3s;
      border: 1px solid rgba(157,212,167,0.1);
    }

    .info-card:hover {
      transform: translateX(6px);
      background: var(--forest);
      border-color: rgba(157,212,167,0.3);
    }

    .info-icon {
      width: 50px;
      height: 50px;
      background: rgba(157,212,167,0.15);
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 22px;
      color: var(--sage);
      flex-shrink: 0;
      transition: 0.3s;
    }

    .info-card:hover .info-icon {
      background: rgba(157,212,167,0.25);
    }

    .info-text h5 {
      font-size: 14px;
      font-weight: 600;
      letter-spacing: 1px;
      text-transform: uppercase;
      color: var(--sage);
      margin-bottom: 5px;
    }

    .info-text p { color: var(--cream); font-size: 15px; line-height: 1.5; }

    /* socials */
    .social-row {
      display: flex;
      gap: 12px;
      margin-top: 6px;
    }

    .social-row a {
      width: 44px;
      height: 44px;
      border-radius: 12px;
      background: rgba(157,212,167,0.12);
      border: 1px solid rgba(157,212,167,0.2);
      color: var(--sage);
      font-size: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
      transition: 0.3s;
    }

    .social-row a:hover {
      background: var(--red);
      border-color: var(--red);
      color: white;
      transform: translateY(-3px);
    }

    /* ── MAP SECTION ── */
    .map-section {
      background: var(--moss);
      padding: 80px 20px;
      position: relative;
    }

    .section-label {
      text-align: center;
      margin-bottom: 48px;
    }

    .section-label .tag {
      display: inline-block;
      background: rgba(157,212,167,0.15);
      border: 1px solid rgba(157,212,167,0.3);
      color: var(--sage);
      font-size: 11px;
      letter-spacing: 3px;
      text-transform: uppercase;
      padding: 5px 18px;
      border-radius: 50px;
      margin-bottom: 14px;
    }

    .section-label h2 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(32px, 5vw, 52px);
      font-weight: 700;
      color: white;
    }

    .section-label h2 span { color: var(--sage); font-style: italic; }

    .map-frame {
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 20px 50px rgba(0,0,0,0.3);
      border: 3px solid rgba(157,212,167,0.2);
    }

    .map-frame iframe {
      width: 100%;
      height: 420px;
      border: 0;
      display: block;
      filter: saturate(0.8) contrast(1.1);
    }

    /* ── FAQ SECTION ── */
    .faq-section {
      background: var(--forest);
      padding: 90px 20px;
    }

    .accordion-item {
      background: transparent;
      border: none;
      margin-bottom: 12px;
    }

    .accordion-button {
      background: var(--moss);
      color: white;
      font-family: 'DM Sans', sans-serif;
      font-weight: 500;
      font-size: 16px;
      border-radius: 14px !important;
      padding: 20px 24px;
      border: 1px solid rgba(157,212,167,0.1);
      box-shadow: none !important;
    }

    .accordion-button::after {
      filter: brightness(0) invert(1);
    }

    .accordion-button:not(.collapsed) {
      background: var(--leaf);
      color: white;
      border-color: transparent;
    }

    .accordion-body {
      background: var(--parchment);
      color: var(--forest);
      font-size: 15px;
      line-height: 1.7;
      padding: 22px 26px;
      border-radius: 0 0 14px 14px;
    }

    /* ── FOOTER STRIP ── */
    .footer-strip {
      background: var(--forest);
      border-top: 1px solid rgba(157,212,167,0.1);
      text-align: center;
      padding: 28px 20px;
    }

    .footer-strip p { color: #7a9a82; font-size: 13px; }

    /* ── RESPONSIVE ── */
    @media (max-width: 991px) {
      .form-card { padding: 34px 26px; }
      .info-stack { margin-top: 32px; }
    }

    @media (max-width: 576px) {
      .hero-title { font-size: 42px; }
      .form-card { padding: 28px 20px; }
    }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav style="background:#1d3124; padding:12px 30px; display:flex; align-items:center; justify-content:space-between; position:sticky; top:0; z-index:999; box-shadow:0 4px 15px rgba(0,0,0,0.3);">

  <a href="plant.php">
    <img src="../images/logo2-removebg-preview.png" style="width:120px;">
  </a>

  <div style="display:flex; align-items:center; gap:20px;">
    <a href="plant.php" style="color:#9dd4a7; text-decoration:none; display:flex; flex-direction:column; align-items:center;">
      <i class="bi bi-house fs-5"></i>
      <span style="font-size:10px; margin-top:2px;">Home</span>
    </a>
    <?php include("navbar.php"); ?>
  </div>

</nav>

  <!-- leaf decorations -->
  <svg class="leaf-deco tl" viewBox="0 0 200 300" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M100 280 C20 200 -20 80 100 10 C220 80 180 200 100 280Z" fill="#9dd4a7"/>
    <line x1="100" y1="280" x2="100" y2="10" stroke="#9dd4a7" stroke-width="2"/>
    <line x1="100" y1="200" x2="60" y2="140" stroke="#9dd4a7" stroke-width="1.5"/>
    <line x1="100" y1="170" x2="140" y2="110" stroke="#9dd4a7" stroke-width="1.5"/>
    <line x1="100" y1="140" x2="68" y2="90" stroke="#9dd4a7" stroke-width="1.5"/>
  </svg>
  <svg class="leaf-deco br" viewBox="0 0 200 300" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M100 280 C20 200 -20 80 100 10 C220 80 180 200 100 280Z" fill="#9dd4a7"/>
    <line x1="100" y1="280" x2="100" y2="10" stroke="#9dd4a7" stroke-width="2"/>
  </svg>

  <div class="hero-content">
    <div class="hero-tag">🌿 We'd Love to Hear From You</div>
    <h1 class="hero-title">Get in <span>Touch</span><br>With Leafora</h1>
    <p class="hero-sub">Questions about your order, plant care advice, or just want to say hello — we're here for you every step of the way.</p>
    <div class="hero-divider"></div>
  </div>
</section>

<!-- ── CONTACT MAIN ── -->
<section class="main-section">
  <div class="container">
    <div class="row g-5 align-items-start">

      <!-- FORM -->
      <div class="col-lg-7">
        <div class="form-card">

          <?php if($success): ?>
          <div class="success-banner">
            <i class="bi bi-check-circle-fill fs-4"></i>
            <span>Your message has been sent! We'll get back to you within 24 hours. 🌿</span>
          </div>
          <?php endif; ?>

          <h2>Send Us a Message</h2>
          <p class="subtitle">Fill out the form below and our team will respond promptly.</p>

          <form method="POST" action="contact.php">
            <div class="row g-3">
              <div class="col-md-6">
                <div class="field-group">
                  <label>Your Name</label>
                  <input type="text" name="name" placeholder="John Doe" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="field-group">
                  <label>Email Address</label>
                  <input type="email" name="email" placeholder="you@example.com" required>
                </div>
              </div>
            </div>

            <div class="field-group">
              <label>Subject</label>
              <input type="text" name="subject" placeholder="How can we help you?" required>
            </div>

            <div class="field-group">
              <label>Message</label>
              <textarea name="message" placeholder="Write your message here..."></textarea>
            </div>

            <button type="submit" name="submit" class="btn-send">
              <i class="bi bi-send-fill"></i>
              Send Message
            </button>
          </form>
        </div>
      </div>

      <!-- INFO -->
      <div class="col-lg-5">
        <div class="info-stack">

          <div class="info-card">
            <div class="info-icon"><i class="bi bi-geo-alt-fill"></i></div>
            <div class="info-text">
              <h5>Our Location</h5>
              <p>Ratlam, Madhya Pradesh, India</p>
            </div>
          </div>

          <div class="info-card">
            <div class="info-icon"><i class="bi bi-envelope-fill"></i></div>
            <div class="info-text">
              <h5>Email Support</h5>
              <p>support@leafora.com</p>
            </div>
          </div>

          <div class="info-card">
            <div class="info-icon"><i class="bi bi-telephone-fill"></i></div>
            <div class="info-text">
              <h5>Call Us</h5>
              <p>+91 9876543210</p>
            </div>
          </div>

          <div class="info-card">
            <div class="info-icon"><i class="bi bi-clock-fill"></i></div>
            <div class="info-text">
              <h5>Working Hours</h5>
              <p>Monday – Saturday<br>9:00 AM – 7:00 PM IST</p>
            </div>
          </div>

          <!-- Social -->
          <div class="info-card" style="flex-direction: column; gap: 14px;">
            <div class="info-text">
              <h5>Follow Us</h5>
              <p style="margin-bottom: 14px;">Stay connected for plant tips & offers</p>
              <div class="social-row">
                <a href="#" title="Instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" title="Facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" title="YouTube"><i class="bi bi-youtube"></i></a>
                <a href="#" title="Twitter"><i class="bi bi-twitter-x"></i></a>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<!-- ── MAP ── -->
<section class="map-section">
  <div class="container">
    <div class="section-label">
      <div class="tag">📍 Find Us</div>
      <h2>Visit Our <span>Store</span></h2>
    </div>
    <div class="map-frame">
      <iframe src="https://www.google.com/maps?q=Ratlam,India&output=embed" allowfullscreen loading="lazy"></iframe>
    </div>
  </div>
</section>

<!-- ── FAQ ── -->
<section class="faq-section">
  <div class="container">
    <div class="section-label">
      <div class="tag">❓ FAQ</div>
      <h2>Common <span>Questions</span></h2>
    </div>

    <div class="accordion" id="faqAccordion">

      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
            🚚 How long does delivery take?
          </button>
        </h2>
        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Delivery usually takes <strong>3–7 business days</strong> depending on your location. Metro cities typically receive orders faster.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
            🌱 Do you provide plant care guidance?
          </button>
        </h2>
        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Yes! Every order includes <strong>detailed care instructions</strong> specific to the plant you purchase. Our team is also available via email for follow-up questions.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
            🔄 Can I return damaged plants?
          </button>
        </h2>
        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Absolutely. Contact us <strong>within 24 hours of delivery</strong> with a photo of the damaged plant and we'll arrange a free replacement.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
            💳 What payment methods do you accept?
          </button>
        </h2>
        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            We accept <strong>UPI, Net Banking, Credit/Debit Cards, and Cash on Delivery</strong> for most pin codes across India.
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- FOOTER STRIP -->
<div class="footer-strip">
  <p>© 2026 Leafora. All rights reserved &nbsp;·&nbsp; Fresh & Healthy Plants Guaranteed 🌿</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>