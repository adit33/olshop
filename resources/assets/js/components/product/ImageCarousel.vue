<template>
<div>
<flickity ref="flickity" :options="flickityOptions">
    <div class="carousel-cell" @click="alert">1</div>
    <div class="carousel-cell">2</div>
    <div class="carousel-cell">3</div>
    <div class="carousel-cell">4</div>
    <div class="carousel-cell">5</div>
</flickity>

<!-- if you don't want to use the buttons Flickity provides -->
<button @click="previous()">Custom Previous Button</button>
<button @click="next()">Custom Next Button</button>
</div>
</template>

<script type="text/javascript">
    export default{
    components: {
        Flickity
    },
    data () {
        return {
            flickityOptions: {
                initialIndex: 3,
                prevNextButtons: true,
                pageDots: false,
                wrapAround: true

                // any options from Flickity can be used
            }
        }
    },
    methods: {
        next() {
            this.$refs.flickity.next();
        },

        previous() {
            this.$refs.flickity.previous();
        },

        test(){
            alert('ok');
        }
    }
    }
</script>