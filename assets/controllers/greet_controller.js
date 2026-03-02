import { Controller } from '@hotwired/stimulus'

export default class extends Controller {
    static values = {
        default: String,
    }

    static targets = ['input', 'result']

    connect() {
        console.log("Controller `greet` instancié !")
        console.log(`- Default: ${this.defaultValue}`)
    }

    salut() {
        const name = this.inputTarget.value.trim() === ''
            ? this.defaultValue
            : this.inputTarget.value.trim()
        this.resultTarget.textContent = `Salut ${name} !`
    }

    reset() {
        this.inputTarget.value = ''
        this.resultTarget.textContent = ''
    }
}
