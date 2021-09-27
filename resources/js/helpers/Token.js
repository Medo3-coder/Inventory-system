class Token {

    //Javascript payload formatters allow you to write your own functions to encode or decode messages.

    isValid(token) {
        const payload = this.payload(token)
        if (payload) {
            return payload.iss = "http://127.0.0.1:8000/api/auth/login" || "http://127.0.0.1:8000/api/auth/register" ? true : false
        }
        return false
    }


    payload(token) {
        const payload = token.split('.')[1]
        return this.decode(payload)
    }

    //The atob() and btoa() methods allow authors to transform content to and from the base64 encoding.
    decode(payload) {
        return JSON.parse(atob(payload))
    }



}

export default Token = new Token()
