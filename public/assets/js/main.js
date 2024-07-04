function global() {
  return {
    isMobileMenuOpen: false,
    isDarkMode: false,
    themeInit() {
      if (
        localStorage.theme === "dark" ||
        (!("theme" in localStorage) &&
          window.matchMedia("(prefers-color-scheme: dark)").matches)
      ) {
        localStorage.theme = "dark";
        document.documentElement.classList.add("dark");
        this.isDarkMode = true;
        this.setLogo()
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
      $('#logo-img').attr('src', this.isDarkMode ? logoDark : logoLight);
    }
  };
}
