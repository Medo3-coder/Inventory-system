class AppStorage {

    storeToken(token) {
        localStorage.setItem('token', token)
    }

    storeUser(user) {
        localStorage.setItem('user', user)
    }

    // to store all our  value
    store(token, user) {
        this.storeToken(token)
        this.storeUser(user)
    }

    // to remove all our  value
    clear() {
        localStorage.removeItem('token')
        localStorage.removeItem('user')
    }

    //to get specific token
    getToken() {
        localStorage.getItem(token)
    }

    //to get specific user
    getUser() {
        localStorage.getItem(user)
    }

}

export default AppStorage = new AppStorage();