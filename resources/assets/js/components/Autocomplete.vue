<template>
   <vue-instant :suggestion-attribute="suggestionAttribute" v-model="value" :disabled="false"  @input="changed" @click-input="clickInput" @click-button="clickButton" @selected="selected"  @enter="enter" @key-up="keyUp" @key-down="keyDown" @key-right="keyRight" @clear="clear"  @escape="escape" :show-autocomplete="true" :autofocus="false" :suggestions="suggestions" name="customName" placeholder="custom placeholder" type="google"></vue-instant>

</template>

<script>
import 'vue-instant/dist/vue-instant.css';
// import VueInstant from 'vue-instant';
window.VueInstant = require('vue-instant');
Vue.use(VueInstant);
    export default {
        mounted() {
            console.log(VueInstant)
        },
         data(){
          return{
            value: '',
            suggestionAttribute: 'name',
            suggestions: [],
            selectedEvent: ""}
        },
        methods: {
            clickInput: function() {
                this.selectedEvent = 'click input'
            },
            clickButton: function() {
                this.selectedEvent = 'click button'
            },
            selected: function() {
                this.selectedEvent = 'selection changed'
            },
            enter: function() {
                this.selectedEvent = 'enter'
            },
            keyUp: function() {
                this.selectedEvent = 'keyup pressed'
            },
            keyDown: function() {
                this.selectedEvent = 'keyDown pressed'
            },
            keyRight: function() {
                this.selectedEvent = 'keyRight pressed'
            },
            clear: function() {
                this.selectedEvent = 'clear input'
            },
            escape: function() {
                this.selectedEvent = 'escape'
            },
            changed: function() {
                var that = this
                this.suggestions = []
                axios.get('http://localhost/olshop/public/api/products/search?val=' + this.value)
                    .then(function(response) {
                        response.data.data.forEach(function(a) {
                            that.suggestions.push(a)
                        })
                    })
            }
        },
        components: {
            'vue-instant': VueInstant.VueInstant
        }
    }
</script>
