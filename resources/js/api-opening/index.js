import $ from 'jquery'
import axios from 'axios'

const hoverClass = 'hover:bg-blue-700',
    blueBgClass = 'bg-blue-500',
    grayBgClass = 'bg-gray-400'
$('.house-device-action').click(async function () {
    const deviceId = $(this).data('deviceId'),
        button = $(this)

    let secondsLeft = 7
    button.prop('disabled', true)
        .addClass(grayBgClass)
        .removeClass(hoverClass)
        .removeClass(blueBgClass)
        .css('width', button.outerWidth())
        .html(secondsLeft)

    const timerId = setInterval(() => {
        secondsLeft--
        button.html(secondsLeft)
        if (secondsLeft === 0) {
            clearInterval(timerId)
            button.prop('disabled', false)
                .addClass(blueBgClass)
                .addClass(hoverClass)
                .removeClass(grayBgClass)
                .html('Открыть/Закрыть')
        }
    }, 1000)

    axios.post(`/api/house-devices/${deviceId}`)
})
