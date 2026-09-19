(function () {
  'use strict';

  var canvas = document.getElementById('ct-hero-canvas');
  if (!canvas) return;

  var ctx = canvas.getContext('2d');
  if (!ctx) return;

  var particles = [];
  var raf = 0;
  var running = true;
  var dpr = Math.min(window.devicePixelRatio || 1, 2);

  function resize() {
    var rect = canvas.getBoundingClientRect();
    canvas.width = Math.max(1, Math.floor(rect.width * dpr));
    canvas.height = Math.max(1, Math.floor(rect.height * dpr));
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);

    var count = Math.max(28, Math.min(72, Math.floor(rect.width / 18)));
    particles = Array.from({ length: count }, function (_, i) {
      return {
        x: Math.random() * rect.width,
        y: Math.random() * rect.height,
        r: 1 + Math.random() * 2.6,
        vx: (Math.random() - 0.5) * 0.25,
        vy: -0.12 - Math.random() * 0.22,
        phase: i * 0.4
      };
    });
  }

  function draw(time) {
    if (!running) return;

    var w = canvas.clientWidth;
    var h = canvas.clientHeight;
    ctx.clearRect(0, 0, w, h);

    var glow = ctx.createRadialGradient(w * 0.5, h * 0.28, 0, w * 0.5, h * 0.28, Math.max(w, h) * 0.68);
    glow.addColorStop(0, 'rgba(3, 109, 54, 0.26)');
    glow.addColorStop(0.45, 'rgba(0, 132, 255, 0.12)');
    glow.addColorStop(1, 'rgba(7, 26, 44, 0)');
    ctx.fillStyle = glow;
    ctx.fillRect(0, 0, w, h);

    ctx.lineWidth = 1;
    particles.forEach(function (p, index) {
      p.x += p.vx + Math.sin(time * 0.0006 + p.phase) * 0.08;
      p.y += p.vy;

      if (p.y < -12) p.y = h + 12;
      if (p.x < -12) p.x = w + 12;
      if (p.x > w + 12) p.x = -12;

      ctx.beginPath();
      ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
      ctx.fillStyle = index % 3 === 0 ? 'rgba(153, 243, 174, 0.74)' : 'rgba(0, 214, 255, 0.58)';
      ctx.fill();
    });

    raf = window.requestAnimationFrame(draw);
  }

  if ('ResizeObserver' in window) {
    new ResizeObserver(resize).observe(canvas);
  } else {
    window.addEventListener('resize', resize);
  }

  if ('IntersectionObserver' in window) {
    new IntersectionObserver(function (entries) {
      running = entries[0] ? entries[0].isIntersecting : true;
      if (running && !raf) raf = window.requestAnimationFrame(draw);
      if (!running && raf) {
        window.cancelAnimationFrame(raf);
        raf = 0;
      }
    }).observe(canvas);
  }

  resize();
  raf = window.requestAnimationFrame(draw);
})();
