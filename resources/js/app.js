import './bootstrap';
import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'
import focus from '@alpinejs/focus'

window.Alpine = Alpine

Alpine.plugin(persist)

Alpine.plugin(focus)

Alpine.start()

if (typeof Alpine === 'undefined') {
  window.Alpine = {}
}

Alpine.store('darkMode', {
    on: false,

    toggle() {
      this.on = !this.on
      document.documentElement.classList.toggle('dark')
    }
  }
)
