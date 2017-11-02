    <template>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Example Component</div>
                        <div class="panel-body">
                            {{ title }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
    <script>
        // load mapState first
        import { mapState } from 'vuex';
        import Vuex from 'vuex';
        export default {
            name: 'Example',
            mounted () {
                // change title dynamically
                this.$store.commit('SET_TITLE', 'Hello Laravel, Vue, and Vuex')
            },
            computed: mapState({
                // read state from store
                title: state => state.title
            })
        }
    </script>