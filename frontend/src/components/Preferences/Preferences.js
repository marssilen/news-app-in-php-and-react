import React, {useCallback, useEffect, useState} from 'react';
import api from "../../services/api";
import Button from "react-bootstrap/Button";
import Form from 'react-bootstrap/Form';
import Alert from "react-bootstrap/Alert";
import NewsSource from "./NewsSource";

export default function Preferences({token}) {
    const [sources, setSources] = useState([]);
    const [categories, setCategories] = useState([]);
    const [authors, setAuthors] = useState([]);

    const preferencesEndpoint = "/preferences";
    const [error, setError] = useState();
    const [errors, setErrors] = useState();

    const handleSubmit = async e => {
        e.preventDefault();
        try {
            const {data} = api.savePreferences(preferencesEndpoint, token, {sources, categories, authors}).catch((error) => {
                setError(error.response.data.message);
                setErrors(error.response.data.errors);
            }).then(data => {
                setAuthors(data.data.data.authors);
                setCategories(data.data.data.categories);
                setSources(data.data.data.sources);
            })
        } catch (error) {
            console.log(error);
        }
    }

    const fetchData = useCallback(() => {
        const {data} = api.getPreferences(preferencesEndpoint, token).catch((error) => {
            setError(error.response.data.message);
            setErrors(error.response.data.errors);
        }).then(data => {
            setAuthors(data.data.data.authors);
            setCategories(data.data.data.categories);
            setSources(data.data.data.sources);
        })
    }, [])

    useEffect(() => {
        fetchData()
    }, [fetchData]);

    return (
        <>
            <h2>Preferences</h2>
            <Form onSubmit={handleSubmit}>
                {error && (
                    <p role="alert" className="Error">
                        {error}
                    </p>
                )}
                <Form.Group className="mb-3" controlId="formBasicEmail">
                    <Form.Label>sources address</Form.Label>
                    <NewsSource setSources={setSources}/>
                    {
                        errors && errors.sources && (
                            errors.sources.map((error) => (
                                <Alert variant="warning">
                                    {error}
                                </Alert>
                            ))
                        )
                    }
                </Form.Group>

                <Form.Group className="mb-3" controlId="formBasicPassword">
                    <Form.Label>categories</Form.Label>
                    <Form.Control placeholder="categories" value={categories} onChange={e => setCategories(e.target.value)}/>
                    {
                        errors && errors.categories && (
                            errors.categories.map((error) => (
                                <Alert variant="warning">
                                    {error}
                                </Alert>
                            ))
                        )
                    }
                </Form.Group>

                <Form.Group className="mb-3" controlId="authors">
                    <Form.Label>authors</Form.Label>
                    <Form.Control placeholder="authors" value={authors} onChange={e => setAuthors(e.target.value)}/>
                    {
                        errors && errors.authors && (
                            errors.authors.map((error) => (
                                <Alert variant="warning">
                                    {error}
                                </Alert>
                            ))
                        )
                    }
                </Form.Group>

                <Button variant="primary" type="submit">
                    save preferences
                </Button>
            </Form>
        </>
    );
}