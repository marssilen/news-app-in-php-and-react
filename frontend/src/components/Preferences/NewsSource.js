import React, {useCallback, useEffect, useState} from 'react';
import Select from 'react-select'

const options = [
    {value: 'nytimes', label: 'The New York Time'},
    {value: 'bbc', label: 'BBC'},
    {value: 'theguardian', label: 'The Guardian'}
]

export default function NewsSource({setSources}) {
    const [selectedOptions, setSelectedOptions] = useState();

    function handleSelect(data) {
        setSources(data);
    }

    return (
        <>
            <Select
                isMulti
                options={options}
                placeholder="Select Source"
                value={selectedOptions}
                onChange={handleSelect}
            />
        </>
    )
}