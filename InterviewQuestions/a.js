let a = true;
let counter = 0;

setTimeout(() => {
    a = false;
    clearInterval(b);
}, 2000);

// setInterval(() => {
//     if(a) {
//         console.log(counter++);
//     }
// }, 200)

let b = setInterval(() => {
    if(a) {
        console.log(counter++);
    }
}, 200)

// while(a){
//     console.log(counter++);
// }