import React from 'react';
import {
    Link,
    UseLocation,
    Outlet
} from "react-router-dom"
import Container from 'react-bootstrap/Container';
import Nav from 'react-bootstrap/Nav';
import Navbar from 'react-bootstrap/Navbar';
import Button from 'react-bootstrap/Button';
import api from "../../services/api";

export default function Navigation({setToken}) {

    const handleLogOut = async e => {
        setToken("");
    }

    return (
        <Navbar bg="primary" expand="lg" variant="dark">
            <Container fluid>
                <Navbar.Brand href="/">Feed</Navbar.Brand>
                <Navbar.Toggle aria-controls="navbarScroll"/>
                <Navbar.Collapse id="navbarScroll">
                    <Nav
                        className="me-auto my-2 my-lg-0"
                        style={{maxHeight: '100px'}}
                        navbarScroll
                    >
                        <Nav.Link href="/preferences">Preferences</Nav.Link>

                    </Nav>
                    <Button variant="danger" onClick={handleLogOut}>Log out</Button>
                </Navbar.Collapse>
            </Container>
        </Navbar>
    );
}