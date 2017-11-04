    import Vue from 'vue'
    import Vuex from 'vuex'
    import axios from "axios";
    Vue.use(Vuex)
    const state = {
        title:'',
        carts:null,
        amountCarts:null,
    }
    const getters = {
    }
    const mutations = {
          SET_TITLE (state, value) {
            state.title = value
          },
          SET_CARTS(state,value){
            state.carts = value
          },
          SET_AMOUNTCARTS(state,value){
           state.amountCarts = value
          }
    }
    const actions = {
        FETCH_CARTS:({commit})=>{
            return axios.get('carts').then((response)=>{
                commit('SET_CARTS',response.data)
            });
        }
    }
    
    const store = new Vuex.Store({  
      state,
      mutations,
      actions,
      getters
    })

    export default store