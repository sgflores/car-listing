export default {
    loadDependencies(payload) {
        return axios.post('/load-dependencies', payload)
        .then((response) => {
            // console.log(response);
            return response;
        })
        .catch((error) => {
            return Promise.reject(error);
        });
    },
    all(url, payload, store, callback) {
        return axios.get(url, {
            params: payload,
        })
        .then((response) => {
            // console.log(response);
            if (store != null && callback != null) {
                store.dispatch(callback, response.data)
            }
            return response;
        })
        .catch((error) => {
            return Promise.reject(error);
        });
    },
    save(url, payload, store, callback) {
        return axios.post(url, payload)
        .then((response) => {
            // console.log(response);
            if (store != null && callback != null) {
                store.dispatch(callback, response.data)
            }
            return response;
        })
        .catch((error) => {
            return Promise.reject(error);
        });
    },
}