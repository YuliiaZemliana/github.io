/* =========================
   ГЛОБАЛНА ЗМІННА MAP
========================= */
let map; // глобальна змінна для кнопок

document.addEventListener('DOMContentLoaded', function () {

  /* =========================
     SCROLL REVEAL ANIMATION
  ========================= */
  const reveals = document.querySelectorAll('.reveal');
  if (reveals.length) {
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('active');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.2 });
    reveals.forEach(el => observer.observe(el));
  }

  /* =========================
     FORM SUBMISSION
  ========================= */
  const form = document.getElementById('contactForm');
  const submitBtn = document.getElementById('contactSubmit');
  const overlay = document.getElementById('formSuccessOverlay');
  const overlayClose = document.getElementById('overlayClose');

  if (form && typeof ajaxData !== 'undefined') {
    form.addEventListener('submit', e => {
      e.preventDefault();
      const data = new FormData(form);
      data.append('action', 'send_to_telegram');
      submitBtn.style.background = '#ff7a00';
      fetch(ajaxData.ajax_url, { method: 'POST', body: data })
        .then(res => res.json())
        .then(result => {
          if(result.success) {
            form.style.filter = 'blur(2px)';
            overlay.classList.add('active');
            form.reset();
            setTimeout(() => { submitBtn.style.background = '#111'; }, 2000);
          }
        })
        .catch(() => alert('Сталася помилка, спробуйте пізніше 😢'));
    });
  }

  if (overlayClose) {
    overlayClose.addEventListener('click', () => {
      overlay.classList.remove('active');
      form.style.filter = 'none';
    });
  }

  /* =========================
     LEAFLET MAP + BUTTONS
  ========================= */
  if (!map) {
    map = L.map('map').setView([50.500, 30.524], 11);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap'
    }).addTo(map);

    const clinics = [
      { name: "Alden-Vet Харків", address: "м. Харків, вул. Олексіївська, 20",phone: "+380 57 123 45 67", coords: [50.04006, 36.20391] },
      { name: "Alden-Vet Львів", address: "м. Львів, вул. Кульпарківська, 160",phone: "+380 57 123 45 67", coords: [49.80767, 24.01524] },
      { name: "Alden-Vet Київ (Лобановського)", address: "просп. Валерія Лобановського, 10а",phone: "+380 57 123 45 67", coords: [50.43924, 30.44437] },
      { name: "Alden-Vet Київ (Закревського)", address: "вул. Миколи Закревського, 87", phone: "+380 57 123 45 67", coords: [50.48663, 30.60641] },
      { name: "Alden-Vet Київ (Героїв Дніпра)", address: "вул. Героїв Дніпра, 18", phone: "+380 57 123 45 67", coords: [50.48927, 30.43828] },
      { name: "Alden-Vet Київ (Естонська)", address: "вул. Естонська, 51", phone: "+380 57 123 45 67", coords: [50.45768, 30.39831] },
      { name: "Alden-Vet Київ (Антоновича)", address: "вул. Антоновича, 32", coords: [50.42381, 30.53036] },
      { name: "Alden-Vet Київ (Гришка)", address: "вул. Михайла Гришка, 4", coords: [50.51888, 30.62977] },
      { name: "Alden-Vet Київ (Анни Ахматової)", address: "вул. Анни Ахматової, 16а",phone: "+380 57 123 45 67", coords: [50.39447, 30.58095] },
      { name: "Навівет", address: "вул. Котельникова, 32А, Київ", coords: [50.44327, 30.61270] },
      { name: "Крихітка Єнот", address: "вул. Європейська, 5А, Нові Петрівці",phone: "+380 57 123 45 67", coords: [50.60359, 30.30624] },
      { name: "Пес Патрон", address: "б-р Леоніда Бірюкова 2А корп. 1, Буча", coords: [50.54839, 30.25218] },
      { name: "Клініка Меридіан", address: "вул. Генерала Шаповалова, 2, Київ", coords: [50.47808, 30.61579] }
    ];

    clinics.forEach(clinic => {
  const marker = L.marker(clinic.coords).addTo(map);

  // Додаємо popup з назвою, адресою і телефоном
  marker.bindPopup(
    "<strong>" + clinic.name + "</strong><br>" +
    clinic.address + "<br>" +
    "Телефон: " + clinic.phone
  );

  // Плаваючий підпис над маркером (tooltip)
  marker.bindTooltip(
    clinic.name, // тільки назва в плашці
    {
      permanent: true,
      direction: "top",
      className: "clinic-tooltip"
    }
  );

  // При кліку на маркер — зум і відкриття popup
  marker.on('click', function() {
    map.setView(clinic.coords, 17); // максимально близько до вулиці
    marker.openPopup();
  });
});



  }

  const cityCoords = {
    lviv: [49.80767, 24.01524],
    kyiv: [50.445, 30.524],
    kharkiv: [50.04006, 36.20391]
  };

  document.querySelectorAll('.map-buttons button').forEach(btn => {
    btn.addEventListener('click', () => {
      const city = btn.dataset.city;
      if(cityCoords[city] && map) {
        map.setView(cityCoords[city], 12);
      }
    });
  });

  /* =========================
     EXPERIENCE MODAL
  ========================= */
  const items = document.querySelectorAll('.exp-item');
  const modal = document.getElementById('expModal');
  const modalText = document.getElementById('expModalText');
  const closeBtn = document.querySelector('.exp-close');

  items.forEach(item => {
    item.addEventListener('click', () => {
      modalText.innerText = item.querySelector('.exp-label').innerText;
      modal.classList.add('active');
    });
  });

  closeBtn.addEventListener('click', () => modal.classList.remove('active'));

});
