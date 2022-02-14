let imgChoise1 		= document.querySelector('.imgChoise1')
let imgChoise2 		= document.querySelector('.imgChoise2')
let imgChoise3 		= document.querySelector('.imgChoise3')
let left 	   		= document.querySelector('.left')
let right 	   		= document.querySelector('.right')
let divImg     		= document.createElement('img')
let divImg2    		= document.createElement('img')

let count 	   		= document.querySelector('.count')
let timer 	   		= document.querySelector('.timer')
let modalBack  		= document.createElement('div')
let modal 	   		= document.createElement('div')
let modalTxt   		= document.createElement('h2')
let modalBtn   		= document.createElement('button')
let points 	   		= 0
let timerCount 		= 31


divImg.className 	= 'imgLeft'
divImg2.className 	= 'imgRight'

modalBack.className	= 'modalBack'
modal.className		= 'modal'
modalTxt.className	= 'modalTxt'
modalBtn.className  = 'modalBtn'
modalBtn.innerText 	= 'Начать заново'

image 				=  new Array();
image[0]			= "./img/1.png"
image[1]			= "./img/2.png"
image[2]			= "./img/3.png"
count.innerText 	= points

setInterval(()=> {
	timerCount -= 1
	timer.innerText = timerCount
	if (timerCount <= 0) {
		document.body.appendChild(modalBack)
		modalBack.appendChild(modal)
		modal.appendChild(modalTxt)
		modal.appendChild(modalBtn)
		modalTxt.innerText = 'Время вышло!'
		timerCount = 31
		points = 0
		count.innerText = points
	} else if (timerCount != 0 && points === 10) {
		document.body.appendChild(modalBack)
		modalBack.appendChild(modal)
		modal.appendChild(modalTxt)
		modal.appendChild(modalBtn)
		modalTxt.innerText = 'Ты смог пройти всю игру!'
		timerCount = 31
		points = 0
		count.innerText = points
	}
}, 1000)

function winnersCounts() {
	points += 1
	timerCount += 10
	count.innerText = points
	if (points === 10) {
		points = 0
		count.innerText = points
		modalTxt.innerText = 'Вы прошли всю игру! https://sundiger.ru'
		modalTxt.style.textAlign = 'center'
		timerCount
	}
}

function losersCounts() {
	points -= 1
	count.innerText = points
	if (points <= 0) {
		points = 0
		count.innerText = points
		if (modalTxt.innerText === 'Время вышло!') {
			return false
		} else {
			modalTxt.innerText = 'Не сдавайся!'
		}
	}
}

modalBtn.onclick = () => {
	modalBack.remove()
	modal.remove()
	modalTxt.remove()
	modalBtn.remove()
	divImg.remove()
	divImg2.remove()
	if (modalTxt.innerText === 'Время вышло!') {
		timerCount 		 = 31
	}
}

imgChoise1.onclick = () => {
	divImg.src = 'img/1.png'
	left.appendChild(divImg)
	let rndmDivImg 		= Math.round(Math.random()*2)
	setTimeout(()=> {
		divImg2.src = image[rndmDivImg]
		right.appendChild(divImg2)
	},1000)
	setTimeout(()=> {
		document.body.appendChild(modalBack)
		modalBack.appendChild(modal)
		modal.appendChild(modalTxt)
		modal.appendChild(modalBtn)

		if (image[rndmDivImg] == './img/1.png') {
			modalTxt.innerText = 'ничья'
			divImg.remove()
			divImg2.remove()
		} else if (image[rndmDivImg] == './img/2.png') {
			modalTxt.innerText = 'Победа'
			divImg.remove()
			divImg2.remove()
			winnersCounts()
		} else {
			divImg.remove()
			divImg2.remove()
			modalTxt.innerText = 'проиграл'
			losersCounts()
		}
	}, 2000)
}

imgChoise2.onclick = () => {
	divImg.src = 'img/2.png'
	left.appendChild(divImg)
	let rndmDivImg 		= Math.round(Math.random()*2)
	setTimeout(()=> {
		divImg2.src = image[rndmDivImg]
		right.appendChild(divImg2)
	},1000)
	setTimeout(()=> {
		document.body.appendChild(modalBack)
		modalBack.appendChild(modal)
		modal.appendChild(modalTxt)
		modal.appendChild(modalBtn)

		if (image[rndmDivImg] == './img/1.png') {
			modalTxt.innerText = 'Проиграл!'
			divImg.remove()
			divImg2.remove()
			losersCounts()
		} else if (image[rndmDivImg] == './img/2.png') {
			modalTxt.innerText = 'Ничья!'
			divImg.remove()
			divImg2.remove()
		} else {
			divImg.remove()
			divImg2.remove()
			modalTxt.innerText = 'Победа!'
			winnersCounts()
		}
	}, 2000)
}

imgChoise3.onclick = () => {
	divImg.src = 'img/3.png'
	left.appendChild(divImg)
	let rndmDivImg 		= Math.round(Math.random()*2)
	setTimeout(()=> {
		divImg2.src = image[rndmDivImg]
		right.appendChild(divImg2)
	},1000)
	setTimeout(()=> {
		document.body.appendChild(modalBack)
		modalBack.appendChild(modal)
		modal.appendChild(modalTxt)
		modal.appendChild(modalBtn)

		if (image[rndmDivImg] == './img/1.png') {
			modalTxt.innerText = 'Победа!'
			divImg.remove()
			divImg2.remove()
			winnersCounts()
		} else if (image[rndmDivImg] == './img/2.png') {
			modalTxt.innerText = 'Проиграл!'
			divImg.remove()
			divImg2.remove()
			losersCounts()
		} else {
			divImg.remove()
			divImg2.remove()
			modalTxt.innerText = 'Ничья!'
		}
	}, 2000)
}