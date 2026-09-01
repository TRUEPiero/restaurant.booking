window.addEventListener('load', function () {
    new Vue({
        el: '#main_block',
        data: {},

        onMounted: () => {
            console.log('поехали');
        }
    })
})