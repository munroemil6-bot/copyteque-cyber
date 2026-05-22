// ===== NAVBAR SCROLL EFFECT =====
const navbar = document.getElementById('navbar');
window.addEventListener('scroll', () => {
  if (window.scrollY > 40) {
    navbar.classList.add('scrolled');
  } else {
    navbar.classList.remove('scrolled');
  }
});

// ===== FOOTER: dynamic year and developer credit =====
(function updateFooter() {
  try {
    const footerBottom = document.querySelector('.footer-bottom p');
    if (!footerBottom) return;
    const year = new Date().getFullYear();
    footerBottom.innerHTML = `© ${year} Copyteque. All rights reserved. Proprietor: Moses Wanjala Laisa. Site developer: Myles Munroe.`;
  } catch (e) {
    // fail silently if footer not present
  }
})();
// ===== MOBILE MENU TOGGLE =====
const hamburger = document.getElementById('hamburger');
const navLinks = document.getElementById('navLinks');

hamburger.addEventListener('click', () => {
  navLinks.classList.toggle('open');
});

// Close menu when a link is clicked
navLinks.querySelectorAll('a').forEach(link => {
  link.addEventListener('click', () => {
    navLinks.classList.remove('open');
  });
});

// ===== ACTIVE NAV LINK HIGHLIGHT ON SCROLL =====
const sections = document.querySelectorAll('section[id]');
const allNavLinks = document.querySelectorAll('.nav-links a');

const observerOptions = {
  root: null,
  rootMargin: '-40% 0px -50% 0px',
  threshold: 0
};

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      allNavLinks.forEach(link => link.style.fontWeight = '400');
      const active = document.querySelector(`.nav-links a[href="#${entry.target.id}"]`);
      if (active) active.style.fontWeight = '600';
    }
  });
}, observerOptions);

sections.forEach(section => observer.observe(section));

// ===== SCROLL REVEAL ANIMATION =====
const revealElements = document.querySelectorAll(
  '.service-card, .supply-item, .about-content, .about-visual, .loc-detail, .hero-card'
);

const revealObserver = new IntersectionObserver((entries) => {
  entries.forEach((entry, i) => {
    if (entry.isIntersecting) {
      entry.target.style.opacity = '1';
      entry.target.style.transform = 'translateY(0)';
      revealObserver.unobserve(entry.target);
    }
  });
}, { threshold: 0.12 });

revealElements.forEach((el, i) => {
  el.style.opacity = '0';
  el.style.transform = 'translateY(28px)';
  el.style.transition = `opacity 0.55s ease ${(i % 6) * 0.08}s, transform 0.55s ease ${(i % 6) * 0.08}s`;
  revealObserver.observe(el);
});

// ===== CONTACT FORM SUBMISSION =====
function handleSubmit(event) {
  event.preventDefault();

  const name = document.getElementById('name').value.trim();
  const email = document.getElementById('email').value.trim();
  const phone = document.getElementById('phone').value.trim();
  const service = document.getElementById('service').value;
  const message = document.getElementById('message').value.trim();

  // Basic validation
  if (!name) {
    alert('Please enter your name.');
    return;
  }
  if (!email && !phone) {
    alert('Please enter at least an email or phone number so we can reach you.');
    return;
  }

  // Build WhatsApp message (optional quick contact)
  const waText = encodeURIComponent(
    `Hello Copyteque!\n\nName: ${name}\nPhone: ${phone || 'N/A'}\nEmail: ${email || 'N/A'}\nService: ${service || 'General Inquiry'}\nMessage: ${message || 'N/A'}`
  );

  // Show success message
  const form = document.getElementById('contactForm');
  const success = document.getElementById('form-success');
  success.classList.remove('hidden');

  // Reset form after short delay
  setTimeout(() => {
    form.reset();
    success.classList.add('hidden');
  }, 5000);

  // Optional: open WhatsApp (replace with real number)
  // window.open(`https://wa.me/254727799120?text=${waText}`, '_blank');
}

// ===== SMOOTH SCROLL FOR ALL ANCHOR LINKS =====
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', (e) => {
    const targetId = anchor.getAttribute('href').slice(1);
    const target = document.getElementById(targetId);
    if (target) {
      e.preventDefault();
      const offset = 80; // nav height buffer
      const top = target.getBoundingClientRect().top + window.scrollY - offset;
      window.scrollTo({ top, behavior: 'smooth' });
    }
  });
});

// ===== HERO CARD ENTRANCE ANIMATION =====
window.addEventListener('load', () => {
  document.querySelectorAll('.hero-card').forEach((card, i) => {
    card.style.opacity = '0';
    card.style.transform = 'translateX(40px)';
    setTimeout(() => {
      card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
      card.style.opacity = '1';
      card.style.transform = 'translateX(0)';
    }, 400 + i * 200);
  });

  // Hero title entrance
  const heroTitle = document.querySelector('.hero-title');
  const heroSub = document.querySelector('.hero-sub');
  const heroBadge = document.querySelector('.hero-badge');
  const heroActions = document.querySelector('.hero-actions');

  [heroBadge, heroTitle, heroSub, heroActions].forEach((el, i) => {
    if (!el) return;
    el.style.opacity = '0';
    el.style.transform = 'translateY(20px)';
    setTimeout(() => {
      el.style.transition = 'opacity 0.7s ease, transform 0.7s ease';
      el.style.opacity = '1';
      el.style.transform = 'translateY(0)';
    }, i * 150);
  });
});
