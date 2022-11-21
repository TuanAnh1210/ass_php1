const header__menuIcon = document.querySelector(".header__menu-icon");
const header_nav = document.querySelector(".header_nav");
const closeIcon = document.querySelector(".closeIcon");

header__menuIcon.onclick = () => {
  Object.assign(header_nav.style, {
    transform: "translateX(0%)",
  });
};

closeIcon.onclick = () => {
  Object.assign(header_nav.style, {
    transform: "translateX(-110%)",
  });
};
