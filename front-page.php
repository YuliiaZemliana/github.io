<?php get_header(); ?>

<section class="hero" class="hero reveal">
    <div class="hero-slider">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/me.jpg" alt="">
    </div>

    <div class="hero-text">
        <h1>Hi, I'm Yulik</h1>
        <p class="subtitle">Frontend & WordPress Developer</p>
        <p class="description">У деталях — відчуття довіри до продукту, і я приділяю їм особливу увагу.</p>
    </div>
</section>
<section id="about" class="about reveal about">
  <div class="about-inner">

    <div class="about-text">
      <h2>Про мене</h2>
      <p>
        Я - frontend та WordPress-розробниця, яка із задоволенням перетворює ідеї на зручні, швидкі та естетичні сайти.
      </p>
      <p>
        Працюю з кастомними WordPress-темами, оптимізацією продуктивності та чистим, підтримуваним кодом.
        Мені важливо, щоб сайт був не лише красивим, а й приємним та зрозумілим у користуванні.
      </p>
    </div>

    <div class="about-cards">

      <div class="card">
        <span class="number">5+</span>
        <span class="label">Ключові<br>задачі</span>

        <div class="card-detail">
          <p>Перенесення сайтів з інших платформ, інтеграція форм, налаштування плагінів, робота з хостингом, оптимізація продуктивності та подальша підтримка сайтів.</p>
        </div>

        <div class="card-hint"><span></span></div>
      </div>

      <div class="card">
        <span class="number">HTML / CSS / JS</span>
        <span class="label">Ключові<br>навички</span>

        <div class="card-detail">
          <p>Семантична розмітка, адаптивна верстка, Flexbox / Grid, базові анімації, інтерактивність та робота з DOM, AJAX-запити</p>
        </div>

        <div class="card-hint"><span></span></div>
      </div>

      <div class="card">
        <span class="number">Освіта</span>
        <span class="label">Програмна<br>Інженерія</span>

        <div class="card-detail">
          <p>Дніпровський національний університет залізничного транспорту ім. академіка В. Лазаряна</p>
        </div>

        <div class="card-hint"><span></span></div>
      </div>

    </div>

  </div>
</section>



<div id="map"></div>

<div class="map-buttons">
  <button data-city="lviv">Львів</button>
  <button data-city="kyiv">Київ</button>
  <button data-city="kharkiv">Харків</button>
</div>
<!-- Підключення Leaflet CSS/JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>




<section  class="skills reveal skills">
  <h2 class="skills-title">Core Skills</h2>

  <div class="skills-grid">

    <div class="skill-card">
      <h3>Frontend</h3>
      <p>HTML • CSS • JavaScript</p>
      <span>UI Systems, Animations, Responsive Layouts</span>
    </div>

    <div class="skill-card">
      <h3>WordPress</h3>
      <p>Theme Development • ACF • CPT</p>
      <span>Speed Optimization, SEO, Security, Clean Code</span>
    </div>

    <div class="skill-card">
      <h3>Performance</h3>
      <p>Core Web Vitals</p>
      <span>TTFB, CLS, LCP, Caching, Server Tuning</span>
    </div>

    <div class="skill-card">
      <h3>UX / UI</h3>
      <p>Design Thinking</p>
      <span>Structure, Usability, Visual Hierarchy</span>
    </div>

  </div>
</section>
<section class="projects reveal experience">
  <div class="experience-inner">

    <h2 class="exp-title">Досвід роботи</h2>

    <div class="exp-row">

      <div class="exp-item">
        <div class="exp-circle">2025</div>
        <div class="exp-label">Системна адміністраторка / Асоціація Енергоефективні міста України </div>
      </div>
          <div class="exp-item">
        <div class="exp-circle">2025</div>
        <div class="exp-label">Адміністратока сайтів / Ветеринарна компанія "Кормотех"</div>
      </div>


      <div class="exp-item">
        <div class="exp-circle">2024–2023</div>
        <div class="exp-label">Розробниця сайтів/ Фріланс</div>
      </div>

      <div class="exp-item">
        <div class="exp-circle">2023-2019</div>
        <div class="exp-label">Моушен дизайнерка / LoopMe</div>
        
      </div>

    </div>
  </div>
  <div class="exp-modal" id="expModal">
  <div class="exp-modal-content">
    <div class="exp-modal-text" id="expModalText"></div>
    <button class="exp-close">Close</button>
  </div>
</div>

</section>


<section id="contact" class="contact reveal contact">
  <div class="contact-inner">

    <h2 class="contact-title">Let’s work together</h2>
    <p class="contact-subtitle">
      If my experience can be useful for your project —  
      leave me a message and I will contact you.
    </p>

    <form id="contactForm" class="contact-form">
      <input type="text" name="name" placeholder="Ваше імʼя" required>
      <input type="text" name="phone" placeholder="Телефон" required>
      <textarea name="message" placeholder="Повідомлення" required></textarea>
      <button type="submit" id="contactSubmit">Відправити</button>
      <div class="form-status" id="formStatus"></div> <!-- один div -->
    </form>
    <!-- Overlay повідомлення -->
<div class="form-success-overlay" id="formSuccessOverlay">
  <div class="form-success-inner">
    <h2>Дякую, буду рада з вами поспілкуватися</h2>
    <button id="overlayClose">Закрити</button>
  </div>
</div>

  </div>
</section>



<?php get_footer(); ?>
