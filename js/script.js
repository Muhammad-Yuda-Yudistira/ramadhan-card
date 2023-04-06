const jumHujan = 4;
const container = document.querySelector('.container')

for(let i = 1; i <= jumHujan; i++) {
    const hujan = document.createElement('span')
    hujan.classList.add('hujan')

    const butir = Math.floor(Math.random() * 100 + 1)
    hujan.style.transform = "rotate(45deg) scale(" + butir * 2 + "%)"
    hujan.style.left = butir + "%"
    hujan.style.animationDuration = butir / 3 + "s"
    hujan.style.animationDelay = butir / 10 + "s"

    container.appendChild(hujan)
}