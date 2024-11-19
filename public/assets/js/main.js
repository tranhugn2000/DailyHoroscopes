function global() {
  return {
    isMobileMenuOpen: false,
    isDarkMode: true,
    themeInit() {
      if (
        localStorage.theme === "dark" ||
        !("theme" in localStorage)
      ) {
        localStorage.theme = "dark";
        document.documentElement.classList.add("dark");
        this.isDarkMode = true;
        this.setLogo();
      } else {
        localStorage.theme = "light";
        document.documentElement.classList.remove("dark");
        this.isDarkMode = false;
        this.setLogo();
      }
    },
    themeSwitch() {
      if (localStorage.theme === "dark") {
        localStorage.theme = "light";
        document.documentElement.classList.remove("dark");
        this.isDarkMode = false;
        this.setLogo();
      } else {
        localStorage.theme = "dark";
        document.documentElement.classList.add("dark");
        this.isDarkMode = true;
        this.setLogo();
      }
    },
    setLogo() {
      var logoLight = "assets/images/logo/logo-2.png";
      var logoDark = "assets/images/logo/logo-dark-2.png";

      var aquarius = "assets/images/horoscope/aquarius-gold.png";
      var aries    = "assets/images/horoscope/aries-gold.png";
      var cancer   = "assets/images/horoscope/cancer-gold.png";
      var capricorn = "assets/images/horoscope/capricorn-gold.png";
      var gemini = "assets/images/horoscope/gemini-gold.png";
      var libra = "assets/images/horoscope/libre-gold.png";
      var pisces = "assets/images/horoscope/pisces-gold.png";
      var sagittarius = "assets/images/horoscope/sagittarius-gold.png";
      var scorpio = "assets/images/horoscope/scorpio-gold.png";
      var taurus = "assets/images/horoscope/tarius-gold.png";
      var virgo = "assets/images/horoscope/virgo-gold.png";
      var leo = "assets/images/horoscope/leo-gold.png";

      var aquarius_bl = "assets/images/horoscope/aquarius-bl.png";
      var aries_bl    = "assets/images/horoscope/aries-bl.png";
      var cancer_bl   = "assets/images/horoscope/cancer-bl.png";
      var capricorn_bl = "assets/images/horoscope/capricorn-bl.png";
      var gemini_bl = "assets/images/horoscope/gemini-bl.png";
      var libra_bl = "assets/images/horoscope/libre-bl.png";
      var pisces_bl = "assets/images/horoscope/pisces-bl.png";
      var sagittarius_bl = "assets/images/horoscope/sagittarius-bl.png";
      var scorpio_bl = "assets/images/horoscope/scorpio-bl.png";
      var taurus_bl = "assets/images/horoscope/tarius-bl.png";
      var virgo_bl = "assets/images/horoscope/virgo-bl.png";
      var leo_bl = "assets/images/horoscope/leo-bl.png";

      $('#logo-img').attr('src', this.isDarkMode ? logoDark : logoLight);
      $('.aquarius').attr('src', this.isDarkMode ? aquarius : aquarius_bl);
      $('.aries').attr('src', this.isDarkMode ? aries : aries_bl);
      $('.cancer').attr('src', this.isDarkMode ? cancer : cancer_bl);
      $('.capricorn').attr('src', this.isDarkMode ? capricorn : capricorn_bl);
      $('.gemini').attr('src', this.isDarkMode ? gemini : gemini_bl);
      $('.libra').attr('src', this.isDarkMode ? libra : libra_bl);
      $('.pisces').attr('src', this.isDarkMode ? pisces : pisces_bl);
      $('.sagittarius').attr('src', this.isDarkMode ? sagittarius : sagittarius_bl);
      $('.scorpio').attr('src', this.isDarkMode ? scorpio : scorpio_bl);
      $('.taurus').attr('src', this.isDarkMode ? taurus : taurus_bl);
      $('.virgo').attr('src', this.isDarkMode ? virgo : virgo_bl);
      $('.leo').attr('src', this.isDarkMode ? leo : leo_bl);

    }
  };
}
