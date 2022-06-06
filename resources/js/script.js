// ---> Section 3

let activeUsersNumber = document.querySelector("#activeUsersNumber");
let announcePostedNumber = document.querySelector("#announcePostedNumber");
let positiveUsersNumber = document.querySelector("#positiveUsersNumber");

const incrementalArray = [
  { endNumber: 320, element: activeUsersNumber },
  { endNumber: 100, element: announcePostedNumber },
  { endNumber: 576, element: positiveUsersNumber },
];

let counterInited = false;
const initCounter = (incrementalArray) => {
  if (counterInited) return;
  counterInited = true;
  let maxNumber;

  incrementalArray.forEach((incremental) => {
    if (!maxNumber || incremental.endNumber > maxNumber)
      maxNumber = incremental.endNumber;
  });

  let counter = 0;

  const interval = setInterval(() => {
    if (counter > maxNumber) return clearInterval(interval);
    setTargetsWithCounter(incrementalArray, counter);
    counter++;
  }, 10);
};

const setTargetsWithCounter = (incrementalArray, counter) => {
  incrementalArray.forEach((incremental) => {
    if (counter <= incremental.endNumber)
      incremental.element.innerHTML = `+${counter}`;
  });
};

document.addEventListener("scroll", () => {
  if (window.scrollY > 1500) initCounter(incrementalArray);
});

// Recensioni

const addReview = () => {
    let swiperWrapper = document.querySelector("#swiperWrapper");
  
    let review = [
      {
        name: "Matteo",
        text: "lorem ipsum dolor and dolor sempre dolor",
        stars: 5,
      },
      {
        name: "Dennis",
        text: "lorem ipsum dolor and dolor sempre dolor, lorem ipsum dolor and dolor sempre dolor lorem ipsum dolor and dolor sempre dolor",
        stars: 3,
      },
      {
        name: "Tommaso",
        text: "lorem ilorem ipsum dolor and dolor sempre dolorpsum dolor and dolor sempre dolor",
        stars: 4,
      },
      {
        name: "Nicolò",
        text: "lorem ipsum lorem ipsum dolor and dolor sempre dolorlorem ipsum dolor and dolor sempre dolorlorem ipsum dolor and dolor sempre dolordolor and dolor sempre dolor",
        stars: 5,
      },
      {
        name: "Giuseppe",
        text: "Dolor dolor dolor Dolor dolor dolorDolor dolor dolorDolor dolor dolorDolor dolor dolorDolor dolor dolor Dolor dolor dolor Dolor dolor dolor",
        stars: 1,
      },
      {
        name: "Leo",
        text: "AummaUMMA AummaUMMAA ummaUMMAA ummaUMMAAummaUMMAAu mmaUMMA AummaUMMA AummaUMMA AummaUMMA AummaUMMA AummaUMMA ",
        stars: 5,
      },
      {
        name: "Davide",
        text: "Caro blade {{$Bravissimi}} Caro blade {{$Bravissimi}} Caro blade {{$Bravissimi}}  Caro blade {{$Bravissimi}} Caro blade {{$Bravissimi}} Caro blade {{$Bravissimi}} Caro blade {{$Bravissimi}} ",
        stars: 5,
      },
      {
        name: "Matteo",
        text: "Povero gabbianoPovero gabbianoPovero gabbianoPovero gabbianoPovero gabbianoPovero gabbianoPovero gabbianoPovero gabbianoPovero gabbianoPovero gabbianoPovero gabbianoPovero gabbiano",
        stars: 4,
      },
      {
        name: "Giancarlo BOSS",
        text: "Bellissimo non avrei saputo fare di meglio Bellissimo non avrei saputo fare di meglio Bellissimo non avrei saputo fare di meglio Bellissimo non avrei saputo fare di meglio",
        stars: 5,
      },
    ];
  
    review.forEach((el) => {
      let div = document.createElement("div");
  
      div.classList.add(
        "swiper-slide",
        "d-flex",
        "justify-content-center",
        "align-items-center"
      );
  
      let starsWrapperContent = "";
      for (let i = 0; i < 5; i++) {
        starsWrapperContent += `<i  class="fa${
          i < el.stars ? "s" : "r"
        } fa-star fa-2x my-2 color-yellow"></i>`;
      }
  
      div.innerHTML = `
        <div class="cardReview p-2 bg-white">
        <div class="d-flex justify-content-end align-items-center">
  
        ${starsWrapperContent}
  
        </div>
        <div class="d-flex justify-content-center align-items-center heigth">
          <p class="text-center pt-2 mt-2">
            ${el.text}
          </p>
        </div>
        <div class="d-flex justify-content-end align-items-center">
          <h5 class="mx-2">- ${el.name}</h5>
        </div>
      </div>
       `;
  
      swiperWrapper.appendChild(div);
    });
  };
  
  addReview();



  