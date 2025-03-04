import './bootstrap';
import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'
import focus from '@alpinejs/focus'
import intersect from '@alpinejs/intersect'

window.Alpine = Alpine

Alpine.plugin(persist)
Alpine.plugin(focus)
Alpine.plugin(intersect)

// Define store before starting Alpine
Alpine.store('darkMode', {
  on: Alpine.$persist(false).as('darkMode'),
  toggle() {
    this.on = !this.on
    document.documentElement.classList.toggle('dark')
  }
})

Alpine.start()
