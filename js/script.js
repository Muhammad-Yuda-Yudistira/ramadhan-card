const jumHujan = 10;
const container = document.querySelector('.container')

for(let i = 0; jumHujan; i++) {
    const hujan = document.createElement('span')
    hujan.classList.add('hujan')

    const butir = Math.floor(Math.random() * 100 + 1)
    hujan.style.transform = "rotate(45deg) scale(" + butir * 2 +"%)"
    hujan.style.left = butir + "%"
    hujan.style.animationDuration = butir / 10 + "s"
    hujan.style.animationDelay = butir / 10 + "s"

    container.appendChild(hujan)
}


// const hujan = document.querySelectorAll('.hujan')

// for(let i = 0; i < hujan.length; i++) {
//     const butir = Math.floor(Math.random() * 100 + 1)
//     hujan[i].style.transform = "rotate(45deg) scale(" + butir * 2 +"%)"
//     hujan[i].style.left = butir + "%"
//     hujan[i].style.animationDuration = butir / 10 + "s"
//     hujan[i].style.animationDelay = butir / 10 + "s"
//     console.log(butir)
// }