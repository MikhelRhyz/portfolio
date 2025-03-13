document.addEventListener('DOMContentLoaded', function () {
  const lightbox = document.getElementById('lightbox')
  const lightboxImg = document.getElementById('lightbox-img')
  const thumbnails = document.querySelectorAll('.thumbnail')
  const closeBtn = document.querySelector('.close-btn')
  const hero = document.getElementById('about')
  const themeMode = document.querySelector('.toggle-screen')
  const body = document.body
  let lightMode = document.querySelector('.light-mode')
  let darkMode = document.querySelector('.dark-mode')
  const savedTheme = localStorage.getItem('theme')

  if (savedTheme === 'dark') {
    body.classList.add('dark-mode')
    darkMode.style.display = 'none'
    lightMode.style.display = 'block'
  } else {
    darkMode.style.display = 'block'
    lightMode.style.display = 'none'
  }

  themeMode.addEventListener('click', () => {
    body.classList.toggle('dark-mode')
    if (body.classList.contains('dark-mode')) {
      localStorage.setItem('theme', 'dark')
      darkMode.style.display = 'none'
      lightMode.style.display = 'block'
    } else {
      darkMode.style.display = 'block'
      lightMode.style.display = 'none'
    }
  })

  thumbnails.forEach(thumbnail => {
    thumbnail.addEventListener('click', function () {
      lightboxImg.src = this.src
      lightbox.classList.add('active') // Open with animation
    })
  })

  function closeLightbox () {
    lightbox.classList.add('closing') // Add closing animation class
    setTimeout(() => {
      lightbox.classList.remove('active', 'closing') // Remove active after animation
    }, 400) // Matches the CSS transition duration (0.4s)
  }

  closeBtn.addEventListener('click', closeLightbox)

  lightbox.addEventListener('click', function (e) {
    if (e.target !== lightboxImg) {
      closeLightbox()
    }
  })

  function createParticle () {
    const particle = document.createElement('div')
    particle.classList.add('particle')

    const size = Math.random() * 6 + 3 + 'px'
    particle.style.width = size
    particle.style.height = size

    particle.style.left = Math.random() * 100 + 'vw'
    particle.style.animationDuration = Math.random() * 3 + 2 + 's'

    hero.appendChild(particle)

    setTimeout(() => {
      particle.remove()
    }, 5000)
  }

  setInterval(createParticle, 400)

  document
    .getElementById('contact-form')
    .addEventListener('submit', function (event) {
      event.preventDefault()

      let name = document.getElementById('name').value.trim()
      let email = document.getElementById('email').value.trim()
      let message = document.getElementById('message').value.trim()
      let status = document.getElementById('form-status')

      if (!name || !email || !message) {
        status.innerText = 'Please fill out all fields!'
        status.style.color = 'red'
        return
      }

      if (!email.includes('@')) {
        status.innerText = 'Enter a valid email!'
        status.style.color = 'red'
        return
      }

      status.innerText = 'Message sent successfully!'
      status.style.color = 'green'
    })
})
