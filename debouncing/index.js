// CODE #1

// function debounce(func, timeout = 300) {
//   let timer;
//   return (...args) => {
//     clearTimeout(timer);
//     timer = setTimeout(() => {
//       func.apply(this, args);
//     }, timeout);
//   };
// }
// function saveInput() {
//   console.log("Saving data");
// }
// const processChange = debounce(() => saveInput());

// CODE #2

const getApiData = function () {
  console.log("Fetching data for search string .... " + arguments[0]);
};
const debounce = function (fn, delayTime) {
  let timer;
  return function () {
    let context = this;
    let args = arguments;
    clearTimeout(timer);
    timer = setTimeout(function () {
      fn.apply(context, args);
    }, delayTime);
  };
};
const processChange = debounce(getApiData, 500);
