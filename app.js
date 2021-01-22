const listEl = document.querySelector('#list')

const getFish = async () => {
    try {
        const response = await fetch('getFish.php')

        return response.json()
    } catch (err) {
        console.log(err)
    }
}

const renderFish = async () => {
    const fish = await getFish()

    fish.forEach(element => {
        const liEl = document.createElement('li')

        liEl.textContent = `${element.name} występowanie: ${element.appearance}`
        listEl.appendChild(liEl)
    });
}

window.addEventListener('DOMContentLoaded', () => {
    renderFish()
});