/**
 * Interval
 *
 * A replacement for setInterval() using the requestAnimationFrame API
 * featuring a couple of useful goodies.
 *
 * Instantiated with the "new" keyword, and has two methods: .start() and .stop()
 *
 * @param {Function} callback
 * @param {number} milliseconds
 * @param {boolean} startWithCallback
 *
 * @return {Object} Interval object
 *
 */

const timing = {
    Interval: function(
        callback,
        milliseconds = 25,
        startWithCallback = false,
    ) {
        if (!callback) {
            throw new Error('timing.Interval — No callback provided!')
        }

        this.now = null
        this.elapsed = null
        this.then = null
        this.startTime = null

        this.animationFrame = null
        this.isRunning = false

        this.loop = (...args) => {
            this.animationFrame = window.requestAnimationFrame(this.loop)
            this.now = Date.now()
            this.elapsed = this.now - this.then

            if (this.elapsed > milliseconds) {
                this.then = this.now - (this.elapsed % milliseconds)
                callback.call(this, ...args)
            }
        }

        this.start = () => {
            if (this.isRunning) {
                return null
            }

            if (!startWithCallback) {
                this.then = Date.now()
            }

            this.loop()
            this.isRunning = true
        }

        this.stop = () => {
            if (!this.isRunning || !this.animationFrame) {
                return null
            }

            window.cancelAnimationFrame(this.animationFrame)
            this.animationFrame = null
            this.isRunning = false
        }

        return this
    }
}

export default timing