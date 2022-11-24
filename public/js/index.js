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

// handle active item
const items = document.querySelectorAll(".nav_link");

const pathPage = window.location.pathname;

const arrPath = pathPage.split("/");

if (
  arrPath[arrPath.length - 1] == "category" ||
  arrPath[arrPath.length - 1] == "detail"
) {
  items.forEach((item) => {
    if (item.innerText == "Sản Phẩm") {
      item.classList.add("active");
    }
  });
} else {
  items[0].classList.add("active");
}
