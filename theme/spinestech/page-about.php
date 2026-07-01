<?php
/**
 * Template Name: About
 */
get_header();
$locale = st_locale();
$dir = st_dir();
$is_rtl = $dir === 'rtl';
?>

<div dir="<?php echo esc_attr($dir); ?>" class="page-about">

  <!-- ==================== HERO SECTION ==================== -->
  <section class="about-hero">
    <div class="container about-hero__inner">
      <div class="about-hero__content">
        <span class="about-label">
          <span class="material-symbols-outlined about-label__icon">group</span>
          <?php echo $is_rtl ? 'من نحن' : 'About Us'; ?>
        </span>
        
        <h1 class="about-hero__title">
          <?php echo $is_rtl
            ? 'نصمم مستقبل الأعمال الرقمية بأيدٍ سعودية عالمية'
            : 'Designing the Future of Digital Business with Global Saudi Expertise'; ?>
        </h1>
        
        <p class="about-hero__subtitle">
          <?php echo $is_rtl
            ? 'SpinesTech شريكك الاستراتيجي في التحول الرقمي. نبني حلولاً تقنية متطورة تجمع بين الخبرة المحلية العميقة والمعايير الهندسية العالمية.'
            : 'SpinesTech is your strategic partner in digital transformation. We build advanced tech solutions combining deep local expertise with global engineering standards.'; ?>
        </p>

        <div class="about-hero__tags">
          <?php foreach ([
            ['verified', $is_rtl ? 'ثقة وأمان' : 'Trust & Security'],
            ['security', $is_rtl ? 'أمن سيبراني' : 'Cybersecurity'],
            ['category', $is_rtl ? 'صناعة تقنية' : 'Tech Industry'],
            ['support_agent', $is_rtl ? 'دعم فني' : 'Tech Support'],
          ] as $tag): ?>
            <span class="about-hero__tag">
              <span class="material-symbols-outlined"><?php echo $tag[0]; ?></span>
              <?php echo $tag[1]; ?>
            </span>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="about-hero__image-wrapper">
        <img src="<?php echo esc_url(st_asset('images/about/hero.png')); ?>" alt="SpinesTech Office" class="about-hero__image">
      </div>
    </div>
  </section>

  <!-- ==================== VISION & MISSION ==================== -->
  <section class="about-vision">
    <div class="container about-vision__grid">
      
      <!-- Vision Card -->
      <div class="about-vision__card about-vision__card--light">
        <div class="about-vision__card-icon">
          <span class="material-symbols-outlined">visibility</span>
        </div>
        <h2 class="about-vision__card-title"><?php echo $is_rtl ? 'رؤيتنا 2030' : 'Our Vision 2030'; ?></h2>
        <p class="about-vision__card-text">
          <?php echo $is_rtl
            ? 'أن نكون الخيار الأول والعمود الفقري التقني للتحول الرقمي في المنطقة، محركاً دولياً لمركز الابتكار والتميز الهندسي المنطلق من قلب المملكة العربية السعودية.'
            : 'To be the first choice and technical backbone for digital transformation in the region, an international engine for innovation and engineering excellence originating from the heart of Saudi Arabia.'; ?>
        </p>
        <div class="about-vision__card-footer">
          <span class="material-symbols-outlined">calendar_month</span>
          <?php echo $is_rtl ? 'رؤية طموحة' : 'Ambitious Vision'; ?>
        </div>
      </div>

      <!-- Mission Card -->
      <div class="about-vision__card about-vision__card--dark">
        <div class="about-vision__card-icon about-vision__card-icon--green">
          <span class="material-symbols-outlined">rocket_launch</span>
        </div>
        <h2 class="about-vision__card-title"><?php echo $is_rtl ? 'رسالتنا' : 'Our Mission'; ?></h2>
        <p class="about-vision__card-text">
          <?php echo $is_rtl
            ? 'تمكين المؤسسات الحكومية والخاصة في الشرق الأوسط من خلال حلول تقنية مبتكرة، آمنة، وقابلة للتوسع تساهم في تسريع عجلة التطور الرقمي وتعزز السيادة التقنية المحلية.'
            : 'Empowering public and private institutions in the Middle East through innovative, secure, and scalable tech solutions that accelerate digital evolution and enhance local technological sovereignty.'; ?>
        </p>
      </div>

    </div>
  </section>

  <!-- ==================== LOCATIONS ==================== -->
  <section class="about-locations">
    <div class="container">
      <div class="about-section-header">
        <span class="about-label">
          <span class="material-symbols-outlined about-label__icon">public</span>
          <?php echo $is_rtl ? 'تواجدنا الجغرافي' : 'Our Presence'; ?>
        </span>
        <h2 class="about-section-title"><?php echo $is_rtl ? 'تواجدنا الجغرافي' : 'Geographic Reach'; ?></h2>
        <p class="about-section-subtitle">
          <?php echo $is_rtl ? 'نخدم عملاءنا من مراكز عمل متعددة مع فرق عمل كفء وموثوقة.' : 'We serve our clients from multiple centers with highly capable and reliable teams.'; ?>
        </p>
      </div>

      <div class="about-locations__grid">
        <?php foreach ([
          ['KSA', $is_rtl ? 'المملكة العربية السعودية' : 'Saudi Arabia'],
          ['GCC', $is_rtl ? 'دول مجلس التعاون الخليجي' : 'GCC Countries'],
          ['ARA', $is_rtl ? 'الوطن العربي' : 'Arab World'],
          ['CAN', $is_rtl ? 'كندا (المركز التقني)' : 'Canada (Tech Hub)'],
        ] as $loc): ?>
          <div class="about-locations__card">
            <span class="about-locations__badge"><?php echo $loc[0]; ?></span>
            <span class="about-locations__name"><?php echo $loc[1]; ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ==================== CORE VALUES ==================== -->
  <section class="about-values">
    <div class="container">
      <div class="about-section-header about-section-header--center">
        <span class="about-label">
          <span class="material-symbols-outlined about-label__icon">star</span>
          <?php echo $is_rtl ? 'قيمنا الأساسية' : 'Core Values'; ?>
        </span>
        <h2 class="about-section-title"><?php echo $is_rtl ? 'قيمنا الأساسية' : 'Our Core Values'; ?></h2>
      </div>

      <div class="about-values__grid">
        <?php foreach ([
          ['lightbulb', $is_rtl ? 'الابتكار' : 'Innovation', $is_rtl ? 'نسعى دائماً لتحدي الوضع الراهن وإيجاد حلول ذكية تسبق زمنها.' : 'We constantly challenge the status quo and find smart, ahead-of-time solutions.'],
          ['security', $is_rtl ? 'الأمان' : 'Security', $is_rtl ? 'حماية بياناتك وسياساتك الرقمية هي أولويتنا القصوى وغير قابلة للمساومة.' : 'Protecting your data and digital policies is our top, non-negotiable priority.'],
          ['verified', $is_rtl ? 'الموثوقية' : 'Reliability', $is_rtl ? 'نحن الشريك الذي تعتمد عليه في أصعب التحديات التقنية وأكثرها حساسية.' : 'We are the partner you rely on in the toughest and most sensitive tech challenges.'],
          ['open_in_full', $is_rtl ? 'قابلية التوسع' : 'Scalability', $is_rtl ? 'حلولنا مصممة لتنمو مع طموحاتك، من الشركات الناشئة إلى المؤسسات الكبرى.' : 'Our solutions are designed to grow with your ambitions, from startups to enterprises.'],
        ] as $val): ?>
          <div class="about-values__card">
            <div class="about-values__icon">
              <span class="material-symbols-outlined"><?php echo $val[0]; ?></span>
            </div>
            <h3 class="about-values__title"><?php echo $val[1]; ?></h3>
            <p class="about-values__text"><?php echo $val[2]; ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ==================== WHY SPINESTECH ==================== -->
  <section class="about-why">
    <div class="container">
      <div class="about-why__header">
        <span class="about-label about-label--dark">
          <span class="material-symbols-outlined about-label__icon">workspace_premium</span>
          <?php echo $is_rtl ? 'لماذا SpinesTech' : 'Why SpinesTech'; ?>
        </span>
        <h2 class="about-why__title"><?php echo $is_rtl ? 'لماذا SpinesTech؟' : 'Why SpinesTech?'; ?></h2>
      </div>

      <div class="about-why__grid">
        <!-- List side -->
        <div class="about-why__list">
          <?php foreach ([
            ['01', $is_rtl ? 'خبرة محلية برؤية عالمية' : 'Local Expertise, Global Vision', $is_rtl ? 'فهم عميق للبيئة التنظيمية والثقافية في المملكة مع تطبيق أفضل الممارسات الهندسية العالمية والمعايير.' : 'Deep understanding of the regulatory and cultural environment in the Kingdom with the application of the best global engineering practices.'],
            ['02', $is_rtl ? 'السيادة التقنية التامة' : 'Total Tech Sovereignty', $is_rtl ? 'نضمن لك ملكية وتوطين الحلول التقنية بما يتماشى مع متطلبات الأمن الوطني وتوجيهات الهيئة الوطنية للأمن السيبراني.' : 'We guarantee ownership and localization of tech solutions in line with national security requirements and NCA directives.'],
            ['03', $is_rtl ? 'فريق من النخبة' : 'Elite Team', $is_rtl ? 'نضم نخبة من المهندسين والمستشارين الذين قادوا مشاريع تحول رقمي ضخمة على مستوى المنطقة.' : 'An elite group of engineers and consultants who have led massive digital transformation projects across the region.'],
          ] as $step): ?>
            <div class="about-why__item">
              <div class="about-why__item-num"><?php echo $step[0]; ?></div>
              <div class="about-why__item-content">
                <h3 class="about-why__item-title"><?php echo $step[1]; ?></h3>
                <p class="about-why__item-text"><?php echo $step[2]; ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Stats side -->
        <div class="about-why__stats">
          <?php foreach ([
            ['99%', $is_rtl ? 'نسبة رضا العملاء' : 'Client Satisfaction'],
            ['+50', $is_rtl ? 'مشروع حكومي ناجح' : 'Successful Gov Projects'],
            ['+100', $is_rtl ? 'خبير تقني' : 'Tech Experts'],
            ['24/7', $is_rtl ? 'دعم فني مخصص' : 'Dedicated Support'],
          ] as $stat): ?>
            <div class="about-why__stat-card">
              <div class="about-why__stat-val"><?php echo $stat[0]; ?></div>
              <div class="about-why__stat-label"><?php echo $stat[1]; ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Footer CTA -->
      <div class="about-why__cta">
        <h3 class="about-why__cta-title"><?php echo $is_rtl ? 'تبدأ المشاريع الكبرى بخطوة' : 'Great Projects Start With One Step'; ?></h3>
        <p class="about-why__cta-text"><?php echo $is_rtl ? 'فريقنا جاهز لتحليل احتياجاتك وتقديم خارطة طريق تقنية واضحة تناسب طموحاتك.' : 'Our team is ready to analyze your needs and provide a clear tech roadmap that fits your ambitions.'; ?></p>
        <div class="about-why__cta-actions">
          <a href="<?php echo esc_url(st_url('/consultation/')); ?>" class="button button--secondary">
            <?php echo $is_rtl ? 'احجز استشارة مجانية' : 'Book Free Consultation'; ?>
            <span class="material-symbols-outlined" style="font-size:1.125rem;">arrow_outward</span>
          </a>
          <a href="<?php echo esc_url(st_url('/solutions/')); ?>" class="button button--outline-light">
            <?php echo $is_rtl ? 'تصفح الحلول' : 'Browse Solutions'; ?>
            <span class="material-symbols-outlined" style="font-size:1.125rem;">arrow_<?php echo $is_rtl ? 'back' : 'forward'; ?></span>
          </a>
        </div>
      </div>
    </div>
  </section>

</div>

<?php get_footer(); ?>