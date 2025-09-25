(function () {
  const btnOpen = document.querySelector('.js-admin-menu');
  const btnClose = document.querySelector('.js-admin-close');
  const sidebar  = document.getElementById('admin-sidebar');
  const scrim    = document.querySelector('.js-admin-scrim');

  const open = () => {
    if (!sidebar) return;
    sidebar.classList.add('open');
    if (scrim) { scrim.hidden = false; }
    if (btnOpen) btnOpen.setAttribute('aria-expanded', 'true');
  };

  const close = () => {
    if (!sidebar) return;
    sidebar.classList.remove('open');
    if (scrim) { scrim.hidden = true; }
    if (btnOpen) btnOpen.setAttribute('aria-expanded', 'false');
  };

  btnOpen && btnOpen.addEventListener('click', open);
  btnClose && btnClose.addEventListener('click', close);
  scrim   && scrim.addEventListener('click', close);

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') close();
  });
})();
