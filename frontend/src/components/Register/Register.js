import React, {useState} from 'react';
import PropTypes from 'prop-types';
import api from "../../services/api";
import './Register.css';
import Form from "react-bootstrap/Form";
import Alert from "react-bootstrap/Alert";
import Button from "react-bootstrap/Button";
import Nav from "react-bootstrap/Nav";
import {useNavigate } from "react-router-dom";
export default function Register({setToken}) {
    const loginEndpoint = "/register";

    const [email, setEmail] = useState();
    const [password, setPassword] = useState();
    const [error, setError] = useState();
    const [errors, setErrors] = useState();
    const navigate = useNavigate();
    const handleSubmit = async e => {
        e.preventDefault();

        try {
            const {data} = await api.login(loginEndpoint, {
                email,
                password
            }).catch((error) => {
                setError(error.response.data.message);
                setErrors(error.response.data.errors);
            });

            // console.log(data.access_token);
            navigate("/");
        } catch (error) {
            console.log(error);
        }
    }

    return (
        <div className="register-wrapper">
            <h1>Register</h1>

            <Form onSubmit={handleSubmit}>
                {error && (
                    <p role="alert" className="Error">
                        {error}
                    </p>
                )}
                <Form.Group className="mb-3" controlId="formBasicEmail">
                    <Form.Label>Email address</Form.Label>
                    <Form.Control type="email" placeholder="Enter email" onChange={e => setEmail(e.target.value)}/>
                    <Form.Text className="text-muted">
                        We'll never share your email with anyone else.
                    </Form.Text>
                    {
                        errors && errors.email && (
                            errors.email.map((error) => (
                                <Alert variant="warning">
                                    {error}
                                </Alert>
                            ))
                        )
                    }
                </Form.Group>

                <Form.Group className="mb-3" controlId="formBasicPassword">
                    <Form.Label>Password</Form.Label>
                    <Form.Control type="password" placeholder="Password" onChange={e => setPassword(e.target.value)}/>
                    {
                        errors && errors.password && (
                            errors.password.map((error) => (
                                <Alert variant="warning">
                                    {error}
                                </Alert>
                            ))
                        )
                    }
                </Form.Group>

                <Button variant="primary" type="submit">
                    Register
                </Button>

                <Nav.Link href="/login">Log In</Nav.Link>
            </Form>
        </div>
    )
}

Register.propTypes = {
    setToken: PropTypes.func.isRequired
};