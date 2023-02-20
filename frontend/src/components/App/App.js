import React from 'react';
import {BrowserRouter, Route, Routes} from 'react-router-dom';
import './App.css';
import Login from '../Login/Login';
import Register from '../Register/Register';
import Preferences from '../Preferences/Preferences';
import Whoops404 from '../Whoops404/Whoops404';
import useToken from './useToken';
import News from "../News/News";
import Navigation from "../Navigation/Navigation";

function App() {

    const {token, setToken} = useToken();

    if (!token) {
        return (
            <BrowserRouter>
                <Routes>
                    <Route path="/" element={<Login setToken={setToken}/>}/>
                    <Route path="/login" element={<Login setToken={setToken}/>}/>
                    <Route path="/register" element={<Register setToken={setToken}/>}/>
                </Routes>
            </BrowserRouter>
        );
    }

    return (
        <div className="wrapper">
            <Navigation setToken={setToken}/>
            <h1>Application</h1>
            <BrowserRouter>
                <Routes>
                    <Route path="/" element={<News/>}/>
                    <Route path="/preferences" element={<Preferences token={token} />}/>
                    <Route path="*" element={<Whoops404/>}/>
                </Routes>
            </BrowserRouter>
        </div>
    );
}

export default App;