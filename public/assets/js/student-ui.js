(() => {
  const sidebar = document.getElementById('student-sidebar');
  const btnOpen  = document.querySelector('.js-stu-menu');
  const btnClose = document.querySelector('.js-stu-close');
  const scrim    = document.querySelector('.js-stu-scrim');

  const open = () => {
    if (!sidebar) return;
    sidebar.classList.add('is-open');
    scrim?.removeAttribute('hidden');
    btnOpen?.setAttribute('aria-expanded','true');
    // focus the first focusable element in the drawer
    setTimeout(() => (btnClose || sidebar.querySelector('a'))?.focus(), 0);
    // prevent body scroll behind drawer
    document.documentElement.style.overflow = 'hidden';
  };

  const close = () => {
    if (!sidebar) return;
    sidebar.classList.remove('is-open');
    scrim?.setAttribute('hidden','');
    btnOpen?.setAttribute('aria-expanded','false');
    btnOpen?.focus();
    document.documentElement.style.overflow = '';
  };

  btnOpen?.addEventListener('click', open);
  btnClose?.addEventListener('click', close);
  scrim?.addEventListener('click', close);

  // close on Escape
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && sidebar?.classList.contains('is-open')) close();
  });

  // close when a nav item is chosen (handy on mobile)
  sidebar?.addEventListener('click', (e) => {
    const a = e.target.closest('a');
    if (a) close();
  });
})();
