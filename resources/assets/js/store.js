    import Vue from 'vue'
    import Vuex from 'vuex'
    import axios from "axios";
    Vue.use(Vuex)
    const state = {
        title:'',
        carts:null,
        amountCarts:null,
        products:[],
        ongkir:0,
        destination:{},
        code:'',
        service:''
    }
    const getters = {
      dataProducts:(state)=>{
        return state.products;
      }
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
          },
          SET_PRODUCTS(state,value){
            state.products = value;
          },
          SET_ONGKIR(state,value){
            state.ongkir = value;
          },
          SET_DESTINATION(state,value){
            state.destination = value;
          },
          SET_SERVICE(state,value){
            state.service=value;
          },
          SET_CODE(state,value){
            state.code = value;
          }
    }
    const actions = {
        FETCH_CARTS:({commit})=>{
            return axios.get('carts').then((response)=>{
                commit('SET_CARTS',response.data)
            });
        },
        FETCH_PRODUCTS:({commit})=>{
            return axios.get('api/products').then((response)=>{
                commit('SET_PRODUCTS',response.data)
            });
        },
    }
    
    const store = new Vuex.Store({  
      state,
      mutations,
      actions,
      getters
    })

    export default store