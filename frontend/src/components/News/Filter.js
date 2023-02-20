import { BiSearch, BiCaretDown, BiCheck } from "react-icons/bi"
import React, { useState } from 'react';
import Form from "react-bootstrap/Form";
import Button from "react-bootstrap/Button";

const DropDown = ({ toggle, sortBy, onSortByChange, orderBy, onOrderByChange }) => {
  if (!toggle) {
    return null;
  }
  return (
    <div>
      <div className="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
        <div onClick={() => onSortByChange('category')}
          role="menuitem">Pet Name {(sortBy === 'category') && <BiCheck />}</div>

        <div onClick={() => onSortByChange('source')}
          role="menuitem">Owner Name {(sortBy === 'source') && <BiCheck />}</div>

        <div onClick={() => onSortByChange('pub_date')}

          role="menuitem">Date {(sortBy === 'pub_date') && <BiCheck />}</div>

        <div onClick={() => onOrderByChange('asc')}
          role="menuitem">Asc {(orderBy === 'asc') && <BiCheck />}</div>
        <div onClick={() => onOrderByChange('desc')}
          role="menuitem">Desc {(orderBy === 'desc') && <BiCheck />}</div>
      </div>
    </div>
  )
}

const Filter = ({ query, onQueryChange, sortBy, onSortByChange, orderBy, onOrderByChange }) => {
  let [toggleSort, setToggleSort] = useState(false);
  return (
      <Form className="d-flex">
        <Form.Control
            type="search"
            placeholder="Filter"
            className="me-2"
            name="query"
            id="query" value={query}
            onChange={(event) => { onQueryChange(event.target.value) }}
        />
        <Button variant="outline-success" onClick={() => { setToggleSort(!toggleSort) }}>Sort By <BiCaretDown className="ml-2"  id="options-menu" /></Button>
        <DropDown toggle={toggleSort}
                  sortBy={sortBy}
                  onSortByChange={mySort => onSortByChange(mySort)}
                  orderBy={orderBy}
                  onOrderByChange={myOrder => onOrderByChange(myOrder)}
        />
      </Form>

  )
}

export default Filter