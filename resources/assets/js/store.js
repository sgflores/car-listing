import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import api from './api';

const store = new Vuex.Store({
    state: {
        isLoading: false,
        fullPage: true,
        color: '#20a8d8',
        loader: 'dots',
        cars: [],
        car: {}
    },

    // mutations will receive the state as first arguments
    // 2nd argument as the payload
    mutations: {
        setCars(state, cars) {
            state.cars = cars;
        },
        setCar(state, car) {
            state.car = {
                id: null,
                make_id: null,
                model_id: null,
                price: 0,
                year: null,
                description: null,
                photo: null
            };
        },
        updateIsLoading(state, isLoading) {
            state.isLoading = isLoading
        }
    },

    // getters will receive the state as first arguments
    // getters will also receive other getters as the 2nd argument:
    getters: {
        cars(state) {
            return state.cars;
        },
        car(state) {
            return state.car;
        },
        isLoading(state) {
            return state.isLoading;
        },
        fullPage(state) {
            return state.fullPage;
        },
        color(state) {
            return state.color;
        }
    },

    // Actions are similar to mutations, the differences being that:
    // Instead of mutating the state, actions commit mutations.
    // Actions can contain arbitrary asynchronous operations.
    // actions will receive the context as first arguments
    // 2nd argument as the payload
    actions: {
        setCars(context, cars) {
            context.commit('setCars', cars);
        },
        setCar(context, car) {
            context.commit('setCar', car);
        },
        all(context, payload) {
            return api.all('/cars', payload, context, 'setCars');
        },
        save(context, payload) {
            return api.save('/cars', payload, context, 'setCar');
        },
        updateIsLoading(context, isLoading) {
            context.commit('updateIsLoading', isLoading);
        },
        loadDependencies(context, payload) {
            return api.loadDependencies(payload);
        },
    },

    modules: {

    },
});

export default store;