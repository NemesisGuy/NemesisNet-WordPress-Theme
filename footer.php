	<footer id="colophon" class="site-footer site-footer--page">
        <div class="container footer-inner">
            <div class="footer-line">
                <span>&copy; <span id="footer-month"></span> <span id="footer-year"></span></span>
                <span class="footer-divider">|</span>
                <span>Built by <a href="https://github.com/NemesisGuy" target="_blank" rel="noopener"><i class="fab fa-github" aria-hidden="true"></i> NemesisGuy</a></span>
                <span class="footer-divider">|</span>
                <span>Powered by <a href="https://nemesisnet.co.za" target="_blank" rel="noopener">NemesisNet.co.za</a></span>
                <span class="footer-divider">|</span>
                <span>All rights reserved.</span>
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<script>
(function(){
  const themeToggle = document.getElementById('theme-toggle');
  const themeToggleIcon = document.getElementById('theme-toggle-icon');
  const STYLE_STORAGE_KEY = 'nemesis-theme-mode';

  function setLight(light){
    if(light){
      document.documentElement.setAttribute('data-theme','light');
    } else {
      document.documentElement.removeAttribute('data-theme');
    }

    if(themeToggle){
      themeToggle.classList.toggle('is-light', light);
      themeToggle.setAttribute('aria-pressed', String(light));
      themeToggle.setAttribute('aria-label', light ? 'Switch to dark mode' : 'Switch to light mode');
      themeToggle.setAttribute('title', light ? 'Switch to dark mode' : 'Switch to light mode');
    }

    if(themeToggleIcon){
      themeToggleIcon.classList.toggle('fa-sun', light);
      themeToggleIcon.classList.toggle('fa-moon', !light);
    }
    
    localStorage.setItem(STYLE_STORAGE_KEY, light ? 'light' : 'dark');
  }

  if(themeToggle){
    themeToggle.addEventListener('click', ()=>{
      const isLight = document.documentElement.getAttribute('data-theme') === 'light';
      setLight(!isLight);
    });
  }

  // Init theme
  const savedTheme = localStorage.getItem(STYLE_STORAGE_KEY);
  const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
  
  if (savedTheme === 'light') {
      setLight(true);
  } else if (savedTheme === 'dark') {
      setLight(false);
  } else {
      setLight(!prefersDark); // Default to system preference if no save
  }

  // Footer Dates
  const now = new Date();
  const monthName = now.toLocaleString('default',{month:'long'});
  const footerYear = document.getElementById('footer-year');
  const footerMonth = document.getElementById('footer-month');
  
  if(footerYear) footerYear.textContent = now.getFullYear();
  if(footerMonth) footerMonth.textContent = monthName;

  // Mobile Menu Toggle
  const menuToggle = document.getElementById('menu-toggle');
  const siteNavigation = document.getElementById('site-navigation');
  
  if(menuToggle && siteNavigation) {
    menuToggle.addEventListener('click', function() {
      const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
      menuToggle.setAttribute('aria-expanded', !isExpanded);
      menuToggle.classList.toggle('is-active');
      siteNavigation.classList.toggle('is-open');
    });
  }
})();
</script>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
