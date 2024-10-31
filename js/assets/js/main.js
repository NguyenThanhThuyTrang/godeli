const arr = [
  {
    src: "../assets/img/Gallery/Products/Pizza Chicken.jpg",
    types: ["Foody"],
    name: "Pizza Chicken",
    day: "11/08/2017",
    view: "1288",
    cmt: "4",
    href: "product1.html",
  },
  {
    src: "../assets/img/Gallery/Products/Banana Bread.jpg",
    types: ["Foody", "Healthy"],
    name: "Banana Bread",
    day: "02/01/2018",
    view: "1280",
    cmt: "2",
    href: "product2.html",
  },
  {
    src: "../assets/img/Gallery/Products/MeMe's Pasta Fagioli.jpg",
    types: ["Foody"],
    name: "MeMe's Pasta Fagioli",
    day: "04/03/2018",
    view: "1117",
    cmt: "1",
    href: "product3.html",
  },
  {
    src: "../assets/img/Gallery/Products/Grilled Sesame-Soy Shishito Peppers.jpg",
    types: ["Healthy", "Side dishes"],
    name: "Grilled Sesame-Soy Shishito Peppers",
    day: "22/08/2018",
    view: "1023",
    cmt: "2",
    href: "product4.html",
  },
  {
    src: "../assets/img/Gallery/Products/Overnight Slow Cooker Breakfast Casserole.jpg",
    types: ["Foody", "Side dishes"],
    name: "Overnight Slow Cooker Breakfast Casserole",
    day: "30/03/2018",
    view: "988",
    cmt: "0",
    href: "product5.html",
  },
  {
    src: "../assets/img/Gallery/Products/Classic Old Fashioned.jpg",
    types: ["Drinks"],
    name: "Classic Old Fashioned",
    day: "21/06/2018",
    view: "922",
    cmt: "0",
    href: "product6.html",
  },
  {
    src: "../assets/img/Gallery/Products/Cedar Planked Salmon.jpg",
    types: ["Foody", "Healthy"],
    name: "Cedar Planked Salmon",
    day: "30/05/2018",
    view: "800",
    cmt: "0",
    href: "product7.html",
  },
  {
    src: "../assets/img/Gallery/Products/Instant Pot® Rutabaga Mash.jpg",
    types: ["Foody", "Healthy"],
    name: "Instant Pot® Rutabaga Mash",
    day: "11/09/2017",
    view: "775",
    cmt: "0",
    href: "product8.html",
  },
  {
    src: "../assets/img/Gallery/Products/Spicy Air Fryer Pork Chops with Apricot Glaze.jpg",
    types: ["Foody"],
    name: "Spicy Air Fryer Pork Chops with Apricot Glaze",
    day: "22/11/2017",
    view: "766",
    cmt: "0",
    href: "product9.html",
  },
  {
    src: "../assets/img/Gallery/Products/Mom's Buttermilk Pancakes.jpg",
    types: ["Foody", "Side dishes"],
    name: "Mom's Buttermilk Pancakes",
    day: "22/08/2017",
    view: "665",
    cmt: "0",
    href: "product10.html",
  },
  {
    src: "../assets/img/Gallery/Products/PB & J Smoothie.jpg",
    types: ["Healthy", "Drinks"],
    name: "PB & J Smoothie",
    day: "12/06/2018",
    view: "663",
    cmt: "0",
    href: "product11.html",
  },
  {
    src: "../assets/img/Gallery/Products/Easy Apple Cider.jpg",
    types: ["Healthy", "Drinks"],
    name: "Easy Apple Cider",
    day: "30/04/2017",
    view: "656",
    cmt: "0",
    href: "product12.html",
  },
];

function getElement(s) {
  return document.querySelector(s);
}

let bannerImg = getElement(".banner__img");
let dishTypes = getElement(".dish__types");
let dishName = getElement(".dish__name");
let dishDay = getElement(".dish__uploadDate");
let dishView = getElement(".dish__viewNumber span");
let dishCmt = getElement(".dish__comtNumber span");
let li = document.querySelectorAll(".banner__number ul li");
let i = 0;
const bannerImgs = [
  {
    src: "../assets/img/Gallery/Products/Pizza Chicken.jpg",
    types: ["Foody"],
    name: "Pizza Chicken",
    day: "11/08/2017",
    view: "1288",
    cmt: "4",
    href: "product1.html",
  },
  {
    src: "../assets/img/Gallery/Products/Banana Bread.jpg",
    types: ["Foody", "Healthy"],
    name: "Banana Bread",
    day: "02/01/2018",
    view: "1280",
    cmt: "2",
    href: "product2.html",
  },
  {
    src: "../assets/img/Gallery/Products/MeMe's Pasta Fagioli.jpg",
    types: ["Foody"],
    name: "MeMe's Pasta Fagioli",
    day: "04/03/2018",
    view: "1117",
    cmt: "1",
    href: "product3.html",
  },
  {
    src: "../assets/img/Gallery/Products/Grilled Sesame-Soy Shishito Peppers.jpg",
    types: ["Healthy", "Side dishes"],
    name: "Grilled Sesame-Soy Shishito Peppers",
    day: "22/08/2018",
    view: "1023",
    cmt: "2",
    href: "product4.html",
  },
  {
    src: "../assets/img/Gallery/Products/Overnight Slow Cooker Breakfast Casserole.jpg",
    types: ["Foody", "Side dishes"],
    name: "Overnight Slow Cooker Breakfast Casserole",
    day: "30/03/2018",
    view: "988",
    cmt: "0",
    href: "product5.html",
  },
  {
    src: "../assets/img/Gallery/Products/Classic Old Fashioned.jpg",
    types: ["Drinks"],
    name: "Classic Old Fashioned",
    day: "21/06/2018",
    view: "889",
    cmt: "0",
    href: "product6.html",
  },
];
// console.log(bannerImg, types, dishName, day, view, cmt, bannerImgs);

if (bannerImg) {
  function nextImg() {
    i++;
    if (i == bannerImgs.length) i = 0;
    bannerImg.src = bannerImgs[i].src;
    var s = "";
    bannerImgs[i].types.forEach((e) => {
      s += `<span class="dish__type">${e}</span>`;
    });
    dishTypes.innerHTML = `${s}`;
    dishName.innerHTML = `${bannerImgs[i].name}`;
    dishDay.innerHTML = `${bannerImgs[i].day}`;
    dishView.innerHTML = `${bannerImgs[i].view}`;
    dishCmt.innerHTML = `${bannerImgs[i].cmt}`;
    for (let j = 0; j < li.length; j++) {
      if (j == i) {
        li[j].classList.add("banner__number-active");
      } else {
        if (li[j].classList.contains("banner__number-active")) {
          li[j].classList.remove("banner__number-active");
        }
      }
    }
  }
  setInterval("nextImg()", 3000);

  bannerImg.addEventListener("click", (e) =>
  {
    let a = document.querySelector(".banner__link")
    bannerImgs.forEach((item) =>{
      if(item.name == dishName.innerHTML)
      {
        a.href = `${item.href}`
      }
    })
  })
}

let width = window.innerWidth > 0 ? window.innerWidth : screen.width;
let mobileMenu = document.querySelector(".menu__expand");
let mobileBar = document.querySelector("#menu__bar");
let mobileClose = document.querySelector("#menu__close");
let mobileMenuList = document.querySelector(".mobile__menu");
let searchButton = document.querySelector(".search-button");
let exitSearch = document.querySelector(".exit-search");
let searchInput = document.querySelector(".search__input");
let header = document.querySelector(".header");

function searchBox() {
  exitSearch.classList.toggle("hidden");
  searchInput.classList.toggle("hidden");
}

function toggleMobileMenu() {
  // document.querySelector("#menu__close").classList.toggle("hidden")
  // document.querySelector("#menu__bar").classList.toggle("hidden")
  mobileBar.classList.toggle("hidden");
  mobileClose.classList.toggle("hidden");
  mobileMenuList.classList.toggle("mobile__menu-block");
  mobileMenuList.classList.toggle("slide-from-right");
}

// if (bannerImg) {
//   window.onload = function () {
//     var s = ``;
//     arr.forEach((e) => {
//       let typeList = "";
//       e.types.forEach((x) => {
//         typeList += `<span class="item__type">${x}</span>`;
//       });
//       s =
//         s +
//         `
//               <div class="col l-4 m-6 c-12">
//               <div class="article__item d-flex">
//                                         <div class="item__wrapper">
//                                         <a class="product__link" href="${e.href}">
//                                           <div class="item__img__wrapper">
//                                             <img
//                                               src="${e.src}"
//                                               alt="article__item img"
//                                               class="item__img"
//                                             />

//                                             <div class="item__img__before"></div>
//                                           </div>
//                                           <div class="item__types">
//                                                 ${typeList}
//                                           </div>
//                                           <p class="item__name">${e.name}</p>
//                                           <div class="item__desc d-flex-start">
//                                             <p class="item__uploadDate">${e.day}</p>
//                                             <p class="item__viewNumber d-flex-bet">
//                                               <i class="fa-regular fa-eye"></i>
//                                               <span>${e.view}</span>
//                                             </p>
//                                             <p class="item__comtNumber d-flex-bet">
//                                               <i class="fa-regular fa-message"></i>
//                                               <span>${e.cmt}</span>
//                                             </p>
//                                           </div>
//                                           </a>
//                                         </div>
//                                       </div>
//                                       </div>
//               `;
//     });
//     getElement(".articles .row").innerHTML = s;
//   };
// }


const body = document.querySelector(".container")