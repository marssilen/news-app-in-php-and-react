import {useState} from 'react';

export default function useToken() {

    const getToken = () => {
        const tokenString = localStorage.getItem('token');
        // const userToken = JSON.parse(tokenString);
        // return userToken?.token
        return tokenString;
    };

    const [token, setToken] = useState(getToken());

    const saveToken = userToken => {
        if (!userToken) {
            localStorage.removeItem('token');
        } else {
            localStorage.setItem('token', userToken);
        }
        // setToken(userToken.token);
        setToken(userToken);
    };

    return {
        setToken: saveToken,
        token
    }
}