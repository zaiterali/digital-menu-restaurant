// This is the code for the scroll behaviour
const menuCategoryContainer = document.querySelector(
  ".menu-category_container"
);
header = document.getElementById("header");
const offsetTop = menuCategoryContainer.offsetTop;
const lastScroll = 0; //this is used to track the previous scroll position
const foodOptionsContainer = document.querySelector(".food-options_container");

function onScroll() {
  if (window.pageYOffset >= offsetTop) {
    menuCategoryContainer.classList.add("fixed");
    foodOptionsContainer.style.paddingTop = `${40}px`; //This padding was added to make up for the space menuCategory leaves when it is set to fixed
  } else {
    header.classList.remove("fixed-header");
    menuCategoryContainer.classList.remove("fixed");
    foodOptionsContainer.style.paddingTop = 0;
  }

  if (header.classList.contains("fixed-header")) {
    menuCategoryContainer.style.marginTop = `${header.offsetHeight}px`;
  } else {
    menuCategoryContainer.style.marginTop = 0;
  }
}

window.addEventListener("scroll", onScroll);

let lastScrollTop = 0;
header = document.getElementById("header");
window.addEventListener("scroll", () => {
  let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  if (scrollTop === 0) {
    header.style.top = "0";
    header.classList.remove("fixed-header");
  } else if (scrollTop > lastScrollTop) {
    header.style.top = "-80px";
    header.classList.remove("fixed-header");
  } else {
    header.style.top = "0";
    header.classList.add("fixed-header");
  }
  lastScrollTop = scrollTop;
});

// This is for changing the col sizes of the items in the header when the screen is small. using header hover in the css.

if (window.matchMedia("(max-width: 500px)").matches) {
  const searchContainer = document.querySelector(".search_container");
  const districtName = document.querySelector(".district-name");
  const header = document.querySelector("header");

  searchContainer.addEventListener("mouseover", () => {
    districtName.style.opacity = "0";
    header.classList.add("header-hover");
  });

  searchContainer.addEventListener("mouseout", () => {
    districtName.style.opacity = "1";
    header.classList.remove("header-hover");
  });
}

// Active Carousel items for Menu Category item
const carouselItems = document.querySelectorAll(".carousel_item");

carouselItems.forEach((item) => {
  item.addEventListener("click", () => {
    carouselItems.forEach((item) => item.classList.remove("active"));
    item.classList.add("active");
  });
});

// New Item
// This is used to control the swiper in the new item part of the page

var swiper = new Swiper(".mySwiper", {
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

// When the card is clicked, show the modal and stop the swiper
$(".preview_card").on("click", function () {
  $("#myModal").modal("show");
  swiper.autoplay.stop();
});

// When the modal is closed, hide it and start the swiper
$("#modal-btn").on("click", function () {
  swiper.autoplay.start();
});

// This is the code used to show a few items on the preview card
const cardSnippets = document.querySelectorAll(".card_snippet");

cardSnippets.forEach((cardSnippet) => {
  let words;

  if (window.innerWidth < 300) {
    words = cardSnippet.textContent.split(" ").slice(0, 20);
  } else if (window.innerWidth < 530) {
    words = cardSnippet.textContent.split(" ").slice(0, 40);
  } else if (window.innerWidth < 960) {
    words = cardSnippet.textContent.split(" ").slice(0, 100);
  } else {
    words = cardSnippet.textContent.split(" ").slice(0, 100);
  }

  const truncatedText = words.join(" ");
  cardSnippet.textContent = truncatedText + "...";
});

// This is for the allergy information in the modal
const readMore = document.getElementById("read_more");
const readLess = document.getElementById("read_less");
const caution = document.getElementById("caution");

if (readMore !== null) {
  readMore.addEventListener("click", function () {
    caution.style.display = "block";
    readLess.style.display = "block";
    readMore.style.display = "none";
  });
}
if (readLess != null) {
  readLess.addEventListener("click", function () {
    caution.style.display = "none";
    readLess.style.display = "none";
    readMore.style.display = "inline";
  });
}
