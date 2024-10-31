// const $ = document;
function getElement(selector) {
  return document.querySelector(selector);
}

const authorList = [
  {
    name: "Tracyg654",
    followers: 347,
  },
  // {
  //   name: "Tracyg654",
  //   followers: 123
  // },
  // {
  //   name: "Tracyg654",
  //   followers: 111
  // },
  {
    name: "France C",
    followers: 321,
  },
  {
    name: "Jones Dairy Farm",
    followers: 177,
  },
  // {
  //   name: "Jones Dairy Farm",
  //   followers: 124
  // },
  // {
  //   name: "Jones Dairy Farm",
  //   followers: 232
  // },
  // {
  //   name: "Cinnken",
  //   followers: 423
  // },
  // {
  //   name: "Cinnken",
  //   followers: 323
  // },
  {
    name: "Cinnken",
    followers: 212,
  },
  {
    name: "JANE MN",
    followers: 54,
  },
];

const productsList = [
  {
    src: "../assets/img/Gallery/Products/Pizza Chicken.jpg",
    types: ["Foody"],
    name: "Pizza Chicken",
    day: "11/08/2017",
    view: "1288",
    cmt: "4",
    by: "Tracyg654",
    rate: "5.0",
    desc: "Plain breaded chicken is so boring. Spice it up with a little touch of pizza.",
    video: `<iframe width="1294" height="480" src="https://www.youtube.com/embed/QyV1ts-lsIQ" title="How to Make Pizza Chicken | Chicken Recipes | Allrecipes.com" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>`,
    ingredients: [
      "½ cup Italian-seasoned bread crumbs",
      "¼ cup grated Parmesan cheese",
      "1 teaspoon salt",
      "1 teaspoon ground black pepper",
      "½ cup all-purpose flour",
      "1 egg",
      "1 tablespoon lemon juice",
      "2 skinless, boneless chicken breast halves",
      "½ cup pizza sauce, divided",
      "½ cup shredded mozzarella cheese, divided",
      "4 slices pepperoni, or to taste - divided",
    ],
    directions: [
      "4 slices pepperoni, or to taste - divided",

      "Combine bread crumbs, Parmesan cheese, salt, and black pepper in a shallow bowl; place flour into a second bowl. Whisk egg and lemon juice together in a third bowl.",

      "Dip each chicken breast in egg mixture and dredge in flour; dip again in egg mixture and dredge chicken in crumb mixture until coated. Place coated chicken breasts into a baking dish.",

      "Bake in the preheated oven until chicken is heated through and crumbs are golden, about 20 minutes.",

      "Spoon 2 tablespoons pizza sauce onto each chicken breast, sprinkle each with half the mozzarella cheese, and top each with half the pepperoni slices.",

      "Bake until chicken is no longer pink inside and the juices run clear, about 10 more minutes. An instant-read meat thermometer inserted into the thickest part of a breast should read at least 160 degrees F (70 degrees C).",
    ],
    href: "product1.html",
  },
  {
    src: "../assets/img/Gallery/Products/Banana Bread.jpg",
    types: ["Foody", "Healthy"],
    name: "Banana Bread",
    day: "02/01/2018",
    view: "1280",
    cmt: "2",
    by: "Tracyg654",
    rate: "5.0",
    desc: "This banana bread recipe creates the most delicious, moist loaf with loads of banana flavor. Why compromise the banana flavor? Friends and family love my recipe and say it's by far the best! It tastes wonderful toasted. Enjoy!",
    video: `<iframe width="727" height="409" src="https://www.youtube.com/embed/0W9lXaHcXL4" title="How to Make Banana Bread | Allrecipes.com" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>`,
    ingredients: [
      "Flour: All-purpose flour gives the banana bread structure.",
      "Baking soda: Baking soda acts as a leavener, which means it helps the banana bread rise.",
      "Salt: A pinch of salt enhances the overall flavor, but it won't make the loaf taste salty.",
      "Butter: A stick of butter lends richness, moisture, and irresistible flavor.",
      "Brown sugar: Brown sugar sweetens things up and adds a hint of warmth.",
      "Eggs: Eggs act as a binding agent, which means they hold the batter together.",
      "Bananas: Of course, you'll need bananas! Choose overripe bananas.",
    ],
    directions: [
      "Combine the dry ingredients in one bowl.",
      "Beat the butter and sugar in another bowl. Add the eggs and mashed bananas.",
      "Add the wet mixture to the dry mixture.",
      "Pour the batter into a loaf pan and bake in a preheated oven.",
    ],
    href: "product2.html",
  },
  {
    src: "../assets/img/Gallery/Products/MeMe's Pasta Fagioli.jpg",
    types: ["Foody"],
    name: "MeMe's Pasta Fagioli",
    day: "04/03/2018",
    view: "1117",
    cmt: "1",
    by: "Tracyg654",
    rate: "5.0",
    desc: "MeMe's fagioli recipe features white cannellini beans, ditalini pasta with vegetables, lean hamburger, and herbs simmered in vegetable juice and chicken broth. It is similar to Italian chili, like Olive Garden's Pasta Fagioli, and even better on the second day.",
    video: `<iframe width="727" height="409" src="https://www.youtube.com/embed/Jm1AGk6dhLs" title="How to Make Pasta e Fagioli (Pasta and Beans) | Get Cookin’ | Allrecipes.com" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>`,
    ingredients: [
      "1 pound lean ground beef",

      "1 tablespoon olive oil",

      "1 thin slice onion, diced",

      "1 stalk celery, diced",

      "1 carrot, diced",

      "1 teaspoon minced garlic",

      "1 (32 ounce) bottle tomato-vegetable juice cocktail (such as V8®)",

      "1 (14 ounce) can chicken broth",

      "1 tablespoon dried parsley",

      "1 tablespoon dried basil",

      "1 teaspoon dried oregano",

      "freshly ground black pepper to taste",

      "1 ½ cups ditalini pasta",

      "1 (15 ounce) can cannellini beans, drained and rinsed",
    ],
    directions: [
      "Heat a large skillet over medium-high heat. Cook and stir beef in the hot skillet until browned and crumbly, 5 to 7 minutes. Use a slotted spoon to transfer beef to a paper towel-lined plate to drain; discard grease.",

      "Heat olive oil in the same skillet over medium-high heat; sauté onion, celery, and carrot until softened, 5 to 10 minutes. Add garlic and sauté until fragrant, 1 to 2 minutes. Stir vegetable juice cocktail, chicken broth, parsley, basil, oregano, and black pepper into vegetable mixture; bring to a boil. Reduce heat and simmer soup for 20 minutes.",

      "Meanwhile, bring a large pot of lightly salted water to a boil. Cook ditalini pasta in boiling water, stirring occasionally, until tender yet firm to the bite, about 8 minutes. Drain and set aside.",

      "Stir beef and cannellini beans into soup; cook and stir until soup is heated through, about 10 minutes.",

      "Spoon about 1/3 cup pasta into each serving bowl; ladle soup over pasta.",
    ],
    href: "product3.html",
  },
  {
    src: "../assets/img/Gallery/Products/Grilled Sesame-Soy Shishito Peppers.jpg",
    types: ["Healthy", "Side dishes"],
    name: "Grilled Sesame-Soy Shishito Peppers",
    day: "22/08/2018",
    view: "1023",
    cmt: "2",
    by: "France C",
    rate: "4.0",
    desc: "These grilled shishito peppers make a great side dish with grilled steak or salmon. Change things up at dinner time and give them a try! Careful, 1 in 10 peppers are hot.",
    video: `<iframe width="818" height="409" src="https://www.youtube.com/embed/A7N-1taGX-0" title="Grilled Shishito Peppers Recipe" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>`,
    ingredients: [
      "1 tablespoon sesame oil",

      "1 tablespoon soy sauce",

      "½ teaspoon finely grated ginger",

      "½ teaspoon grated garlic",

      "8 ounces shishito peppers, rinsed",

      "salt to taste",
    ],
    directions: [
      "1 tablespoon sesame oil",

      "1 tablespoon soy sauce",

      "½ teaspoon finely grated ginger",

      "½ teaspoon grated garlic",

      "8 ounces shishito peppers, rinsed",

      "salt to taste",
    ],
    href: "product4.html",
  },
  {
    src: "../assets/img/Gallery/Products/Overnight Slow Cooker Breakfast Casserole.jpg",
    types: ["Foody", "Side dishes"],
    name: "Overnight Slow Cooker Breakfast Casserole",
    day: "30/03/2018",
    view: "988",
    cmt: "0",
    by: "Jones Dairy Farm",
    rate: "4.0",
    desc: "We're obsessed with this easy slow cooker breakfast recipe. Layer the ingredients overnight and wake to savory, breakfast perfection.",
    video: `<iframe width="727" height="409" src="https://www.youtube.com/embed/F2xPE_pRmPI" title="Recipe: Slow Cooker Overnight Breakfast Casserole" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>`,
    ingredients: [
      "2 packages (12 ounces each) JOHNSONVILLE Original Breakfast Sausage, or Firecracker Spicy Breakfast Sausage",

      "1 cup chopped green onions",

      "1 medium sweet red bell pepper, chopped",

      "1 can (4 ounces) diced mild green chilies",

      "1/4 cup chopped fresh cilantro",

      "1 package (30 ounces) frozen shredded hash browns",

      "1-1/2 cups (6 ounces) shredded Cheddar cheese",

      "12 eggs",

      "1 cup milk",

      "1/2 teaspoon salt",

      "1/8 teaspoon pepper",
    ],
    directions: [
      "Cook sausage according to package directions; cut into 3/4-inch coin-slice pieces and set aside.",

      "In a bowl, combine the green onions, red pepper, chilies and cilantro; set aside.",

      "Spray a 5- or 6-qt. slow cooker with cooking spray.",

      "Layer a third of the hash browns, sausage, green onion mixture and cheese. Repeat layers twice.",

      "In a large bowl, whisk the eggs, milk, salt and pepper; pour over casserole.",

      "Cover and cook on low for 7-8 hours or until a thermometer inserted into the center reads 160°F.",
    ],
    href: "product5.html",
  },
  {
    src: "../assets/img/Gallery/Products/Classic Old Fashioned.jpg",
    types: ["Drinks"],
    name: "Classic Old Fashioned",
    day: "21/06/2018",
    view: "922",
    cmt: "0",
    by: "Jones Dairy Farm",
    rate: "5.0",
    desc: "The old fashioned is a classic cocktail that was invented in Louisville, KY. You can make it with bourbon, rye, or a blended whiskey. You can also substitute one sugar cube for the simple syrup.",
    video: `<iframe width="727" height="409" src="https://www.youtube.com/embed/puvpot3jD3g" title="How to Make a Classic Old Fashioned | Drink Recipes | Allrecipes.com" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>`,
    ingredients: [
      "2 teaspoons simple syrup",

      "1 teaspoon water",

      "2 dashes bitters",

      "1 cup ice cubes",

      "1 (1.5 fluid ounce) jigger bourbon whiskey",

      "1 slice orange",

      "1 maraschino cherry",
    ],
    directions: [
      "Pour simple syrup, water, and bitters into a whiskey glass; stir to combine. Add ice cubes and pour in bourbon. Garnish with orange slice and maraschino cherry.",
    ],
    href: "product6.html",
  },
  {
    src: "../assets/img/Gallery/Products/Cedar Planked Salmon.jpg",
    types: ["Foody", "Healthy"],
    name: "Cedar Planked Salmon",
    day: "30/05/2018",
    view: "800",
    cmt: "0",
    by: "Jones Dairy Farm",
    rate: "5.0",
    desc: "This cedar plank salmon is a dish my brother prepared for me in Seattle. It is by far the best salmon I've ever eaten. I like to serve it with an Asian-inspired rice and roasted asparagus.",
    video: `<iframe width="727" height="409" src="https://www.youtube.com/embed/TXX9J83UwWI" title="How to Make Cedar Planked Salmon | Seafood Recipe | Allrecipes.com" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>`,
    ingredients: [
      "3 (12 inch) untreated cedar planks",

      "⅓ cup soy sauce",

      "⅓ cup vegetable oil",

      "1 ½ tablespoons rice vinegar",

      "1 teaspoon sesame oil",

      "¼ cup chopped green onions",

      "1 tablespoon grated fresh ginger",

      "1 teaspoon minced garlic",

      "2 (2 pound) salmon fillets, skin removed",
    ],
    directions: [
      "Soak cedar planks for at least 1 hour in warm water. Soak longer if you have time.",

      "Stir soy sauce, vegetable oil, rice vinegar, sesame oil, green onions, ginger, and garlic together in a shallow dish.",

      "Place salmon fillets in soy mixture and turn to coat. Cover and marinate for at least 15 minutes, or up to 1 hour refrigerated.",

      "Preheat an outdoor grill for medium heat. Place planks on the grill grate. Heat planks until they start to smoke and crackle just a little.",

      "Remove salmon from marinade and place on planks; discard marinade.",

      "Close grill cover. Grill salmon until it flakes easily with a fork, about 20 minutes; salmon will continue to cook after you remove it from the grill.",
    ],
    href: "product7.html",
  },
  {
    src: "../assets/img/Gallery/Products/Instant Pot® Rutabaga Mash.jpg",
    types: ["Foody", "Healthy"],
    name: "Instant Pot® Rutabaga Mash",
    day: "11/09/2017",
    view: "775",
    cmt: "0",
    by: "France C",
    rate: "3.0",
    desc: "This lower-carb alternative to mashed potatoes can easily be made in a fraction of the time using a pressure cooker. The mash has a nice creamy and chunky texture, which complements any meat. I especially enjoy it with corned beef.",
    video: `<iframe width="727" height="409" src="https://www.youtube.com/embed/VYWb0V0Id2g" title="Instant Pot Rutabaga Mash" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>`,
    ingredients: [
      "1 cup water",

      "2 pounds rutabaga, peeled and chopped into 1-inch cubes",

      "¼ cup half-and-half",

      "1 tablespoon butter",

      "¾ teaspoon salt",

      "¼ teaspoon pepper",

      "¼ teaspoon garlic powder",
    ],
    directions: [
      "Pour water into a multi-functional pressure cooker (such as Instant Pot®) and set the trivet inside. Place rutabaga into a steamer basket and set inside the pot. Close and lock the lid. Select high pressure according to manufacturer's instructions; set timer for 8 minutes. Allow 10 to 15 minutes for pressure to build.",

      "Release pressure carefully using the quick-release method according to manufacturer's instructions, about 5 minutes. Unlock and remove the lid. Drain rutabaga. Return rutabaga to pot or place into a medium bowl.",

      "Add half-and-half, butter, salt, pepper, and garlic powder to the rutabaga and mash to desired consistency. The rutabaga will have a chunky texture. For a smoother texture, use a food processor. Serve warm.",
    ],
    href: "product8.html",
  },
  {
    src: "../assets/img/Gallery/Products/Spicy Air Fryer Pork Chops with Apricot Glaze.jpg",
    types: ["Foody"],
    name: "Spicy Air Fryer Pork Chops with Apricot Glaze",
    day: "22/11/2017",
    view: "766",
    cmt: "0",
    by: "Cinnken",
    rate: "5.0",
    desc: "A combination of chili powder and other herbs and spices make a spicy rub for pork chops. Brush with a spicy-sweet glaze in the last 2 minutes of cooking, and take the extra glaze to the table for even more goodness. We enjoyed these chops with simple sauteed zucchini and steamed white rice.",
    video: `<iframe width="727" height="409" src="https://www.youtube.com/embed/9LNEAFd4YkA" title="Apricot glazed Kassler steak recipe with SA Pork" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>`,
    ingredients: [
      "4 cups water",

      "2 tablespoons kosher salt",

      "2 tablespoons white sugar",

      "4 (5 ounce) bone-in center loin pork chops, about 3/4-inch thick",

      "1 teaspoon chili powder, or to taste",

      "1 teaspoon onion powder",

      "½ teaspoon salt",

      "¼ teaspoon white pepper",

      "½ cup apricot all-fruit spread",

      "3 tablespoons hoisin sauce",

      "1 (1 inch) piece ginger root, peeled and grated",

      "2 cloves minced garlic",

      "1 ½ teaspoons Asian chili-garlic sauce",

      "½ medium lime, juiced",

      "cooking spray",

      "2 tablespoons finely minced fresh parsley",
    ],
    directions: [
      "Combine water, salt, and sugar in a bowl and stir until the crystals are dissolved. Add pork chops, cover, and refrigerate for at least 2 hours, or up to 4 hours.",

      "Remove pork chops from the brine and shake off excess. Discard the remaining brine. Pat chops dry with paper towels and place on a plate or cutting board.",

      "Combine chili powder, onion powder, salt, and white pepper in a small bowl. Distribute 1/2 of the rub mixture among the 4 chops and rub to coat the entire surface. Turn the chops and repeat. Allow chops to come to room temperature, about 30 minutes.",

      "Meanwhile, combine apricot all-fruit spread, hoisin sauce, ginger, garlic, chili-garlic sauce, and lime juice for the glaze in a medium, microwave-safe bowl.",

      "Microwave mixture on high for 3 minutes, stirring halfway through. Carefully remove glaze and set aside.",

      "Preheat air fryer to 400 degrees F (200 degrees C) if recommended by manufacturer. Spray each side of seasoned and rubbed chops with cooking spray.",

      "Place chops in the air fryer in a single layer and air-fry for 8 minutes, turning halfway through.",

      "Brush the tops of the chops with prepared glaze and air-fry until pork chops are no longer pink in the center, 2 to 3 minutes. An instant-read thermometer inserted into the center should read 145 degrees F (63 degrees C).",

      "Sprinkle chops with minced parsley, and serve with remaining glaze.",
    ],
    href: "product9.html",
  },
  {
    src: "../assets/img/Gallery/Products/Mom's Buttermilk Pancakes.jpg",
    types: ["Foody", "Side dishes"],
    name: "Mom's Buttermilk Pancakes",
    day: "22/08/2017",
    view: "665",
    cmt: "0",
    by: "Cinnken",
    rate: "5.0",
    desc: "These buttermilk pancakes are passed down from my grandmother, who was fully Scandinavian. They are light and fluffy, and great with berry syrups. I have made these for years as a special treat, and I hope you enjoy them as much as my family has.",
    video: `<iframe width="727" height="409" src="https://www.youtube.com/embed/hSn8UtQ5d8o" title="How to Make Buttermilk Pancakes | Get Cookin’ | Allrecipes.com" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>`,
    ingredients: [
      "1 cup flour",

      "1 teaspoon salt",

      "1 teaspoon baking soda",

      "1 large egg",

      "1 ⅛ cups buttermilk",

      "2 tablespoons butter, melted",
    ],
    directions: [
      "Preheat and lightly grease a large skillet or electric griddle.",

      "Mix flour, salt, and baking soda together in a bowl. Add egg, buttermilk, and butter; stir together lightly, but keep it lumpy. The batter should look thick, spongy, and puffy.",

      "Drop 1/3 cup of the batter onto the cooking surface, spreading lightly with the bottom of the cup. Cook until lightly browned on each side, 1 to 2 minutes per side.",
    ],
    href: "product10.html",
  },
  {
    src: "../assets/img/Gallery/Products/PB & J Smoothie.jpg",
    types: ["Healthy", "Drinks"],
    name: "PB & J Smoothie",
    day: "12/06/2018",
    view: "663",
    cmt: "0",
    by: "Cinnken",
    rate: "5.0",
    desc: "I made this smoothie with peanut butter but it can be made with powdered peanut butter for a lower calorie smoothie.",
    video: `<iframe width="727" height="409" src="https://www.youtube.com/embed/3NCxt6chRlA" title="PB&amp;J Smoothie" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>`,
    ingredients: [
      "6 frozen strawberries, or more to taste",

      "¾ cup milk",

      "1 ½ tablespoons peanut butter",

      "1 tablespoon blue agave nectar, or more to taste",

      "1 tablespoon flax seeds",
    ],
    directions: [
      "Combine strawberries, milk, peanut butter, blue agave, and flax seeds in a blender and blend until well combined.",
    ],
    href: "product11.html",
  },
  {
    src: "../assets/img/Gallery/Products/Easy Apple Cider.jpg",
    types: ["Healthy", "Drinks"],
    name: "Easy Apple Cider",
    day: "30/04/2017",
    view: "656",
    cmt: "0",
    by: "JANE MN",
    rate: "5.0",
    desc: "This apple cider recipe is super easy to make. I used to buy the spices already mixed at the grocery store, and they stopped carrying them, so I just made my own. Great for a shower or get-together, and the slow cooker keeps it warm so guests can enjoy it through the night! Serve with a slice of orange, and add spiced rum, if desired.",
    video: `<iframe width="727" height="409" src="https://www.youtube.com/embed/T7glpazMgko" title="How to Make Homemade Apple Cider | Get Cookin&#39; | Allrecipes.com" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>`,
    ingredients: [
      "1 (64 fluid ounce) bottle apple cider",

      "3 cinnamon sticks",

      "1 teaspoon whole allspice",

      "1 teaspoon whole cloves",

      "⅓ cup brown sugar",
    ],
    directions: [
      "Combine apple cider and cinnamon sticks in a slow cooker.",

      "Place allspice and cloves onto the center of an 8-inch square piece of cheesecloth. Gather edges of the cheesecloth together and tie to secure; place in the slow cooker. Stir in brown sugar. Cook on High until it comes to a boil. Reduce heat to Low and keep warm.",
    ],
    href: "product12.html",
  },
];

if (document.title === "Category") {
  const list = getElement(".dish__list .row");
  const all = getElement("#all");
  const foody = getElement("#foody");
  const drink = getElement("#drinks");
  const healthy = getElement("#healthy");
  const side = getElement("#side");
  const btns = [all, foody, drink, healthy, side];

  btns.forEach((btn) => {
    var btnText = btn.innerText;
    console.log(btnText);
    btn.onclick = function () {
      btns.forEach((e) => {
        if (e.classList.contains("menu-cal__item-active")) {
          e.classList.remove("menu-cal__item-active");
        }
      });
      btn.classList.add("menu-cal__item-active");

      var s = ``;
      if (btnText !== "All") {
        productsList.forEach((e) => {
          // alert("shfisdf")
          if (e.types.includes(btnText)) {
            let typeList = "";
            e.types.forEach((x) => {
              typeList += `<span class="item__type">${x}</span>`;
            });
            s =
              s +
              `
              <div class="col l-4 m-6 c-12">
              <div class="article__item d-flex">
                                        <div class="item__wrapper">
                                          <a class="product__link" href="${e.href}">
                                          <div class="item__img__wrapper">
                                            <img
                                              src="${e.src}"
                                              alt="article__item img"
                                              class="item__img"
                                            />
  
                                            <div class="item__img__before"></div>
                                          </div>
                                          <div class="item__types">
                                                ${typeList}
                                          </div>
                                          <p class="item__name">${e.name}</p>
                                          <div class="item__desc d-flex-start">
                                            <p class="item__uploadDate">${e.day}</p>
                                            <p class="item__viewNumber d-flex-bet">
                                              <i class="fa-regular fa-eye"></i>
                                              <span>${e.view}</span>
                                            </p>
                                            <p class="item__comtNumber d-flex-bet">
                                              <i class="fa-regular fa-message"></i>
                                              <span>${e.cmt}</span>
                                            </p>
                                          </div>
                                          </a>
                                        </div>
                                      </div>
                                      </div>
              `;
          }
        });
      } else {
        productsList.forEach((e) => {
          // alert("shfisdf")

          let typeList = "";
          e.types.forEach((x) => {
            typeList += `<span class="item__type">${x}</span>`;
          });
          s =
            s +
            `
              <div class="col l-4 m-6 c-12">
              <div class="article__item d-flex">
                                        <div class="item__wrapper">
                                          <a class="product__link" href="${e.href}">
                                          <div class="item__img__wrapper">
                                            <img
                                              src="${e.src}"
                                              alt="article__item img"
                                              class="item__img"
                                            />
  
                                            <div class="item__img__before"></div>
                                          </div>
                                          <div class="item__types">
                                                ${typeList}
                                          </div>
                                          <p class="item__name">${e.name}</p>
                                          <div class="item__desc d-flex-start">
                                            <p class="item__uploadDate">${e.day}</p>
                                            <p class="item__viewNumber d-flex-bet">
                                              <i class="fa-regular fa-eye"></i>
                                              <span>${e.view}</span>
                                            </p>
                                            <p class="item__comtNumber d-flex-bet">
                                              <i class="fa-regular fa-message"></i>
                                              <span>${e.cmt}</span>
                                            </p>
                                          </div>
                                          </a>
                                        </div>
                                      </div>
                                      </div>
              `;
        });
      }
      list.innerHTML = s;
    };
  });

  window.onload = function () {
    all.onclick();
  };
} else {
  const section__header = getElement(".section__header h2");
  const rating = getElement(".rating");
  const viewnums = getElement(".viewnums");
  const byWho = getElement(".byWho");
  const info__desc = getElement(".info__desc");
  const info__view = getElement(".info__view span");
  const section__video = getElement(".section__video");
  const ingre__list = getElement(".ingre__list");
  const direc__list = getElement(".direc__list");
  const direc__img = getElement(".direc__img img");
  const auth__name = getElement(".auth-name");
  const auth__posts = getElement(".auth-posts span");
  const auth__follower = getElement(".auth-follower span");
  let numberOfPosts = 1;
  const rel__list = getElement(".rel-list");
  const other__post = getElement(".op-list");

  window.onload = function () {
    var docTitle = document.title;
    var x = productsList.filter((e) => {
      return e.name === docTitle;
    })[0];

    console.log(x);
    section__header.innerHTML = `${x.name}`;
    function getRated() {
      var text = ``;
      for (let i = 0; i < x.rate; i++) {
        text += `<i class="fa-solid fa-star rating-icon"></i>`;
      }
      text += `<p>(${x.rate})</p>`;
      return text;
    }

    function getIngredients() {
      let innerText = ``;
      for (let i = 0; i < x.ingredients.length; i++) {
        innerText += `<li class="ingre_item">${x.ingredients[i]}</li>`;
      }
      return innerText;
    }

    function getDirections(params) {
      let innerText = ``;
      for (let i = 0; i < x.directions.length; i++) {
        innerText += `<li class="direc__item">
      <h5 class="direc__step">Step ${i + 1}</h5>
      <p class="direc__text">
        ${x.directions[i]}
      </p>
    </li>`;
      }
      return innerText;
    }

    rating.innerHTML = getRated();
    viewnums.innerHTML = `${x.view}`;
    info__desc.innerHTML = `${x.desc}`;
    info__view.innerHTML = `${x.day}`;
    section__video.innerHTML = `${x.video}`;
    ingre__list.innerHTML = getIngredients();
    direc__list.innerHTML = getDirections();
    direc__img.src = `${x.src}`;
    byWho.innerHTML = `Recipe by ${x.by}`;

    auth__name.innerHTML = `${x.by}`;

    let rel__item = ``;
    productsList.forEach((e) => {
      if (e.by == x.by && e.name != x.name) {
        rel__item += `<a href="${e.href}" target= "blank">
        <div class="rel-item d-flex-bet">
          <img
            src="${e.src}"
            alt=""
            class="rel-img"
          />
          <p class="rel-name">${e.name}</p>
        </div>
      </a>`;
        numberOfPosts++;
      }
    });
    rel__list.innerHTML = rel__item;
    auth__posts.innerHTML = numberOfPosts;
    authorList.forEach((e) => {
      if (e.name == x.by) {
        auth__follower.innerHTML = `${e.followers}`;
      }
    });
    if (numberOfPosts == 1) {
      rel__list.innerHTML = `This author doesnt have other tutorials than this`;
    }

    let nums = 0;
    let arr = [];
    let item = ``;
    while (nums < 5) {
      for (let i = 0; i < productsList.length; i++) {
        if (Math.floor(Math.random() * (1 + 1))) {
          if (!arr.includes(productsList[i]) && nums < 5 && productsList[i].name !== docTitle) {
            arr.push(productsList[i]);
            nums++;
          }
        }
      }
    }

    arr.forEach((e) => {
      item += `
    <a href="${e.href}" class="op-link" target="blank">
      <div class="op-item d-flex-bet">
        <img src="${e.src}" alt="" class="op-img" />
        <p class="op-name">${e.name}</p>
      </div>
    </a>
    `;
    });
    other__post.innerHTML = item;
  };
}
