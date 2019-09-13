import React, { Fragment } from 'react'
import "tabler-react/dist/Tabler.css";
import { Page, Site } from "tabler-react";
import CustomerList from './customerList';

import axios from 'axios';

const URL = "http://laravel.test:81/api"

export default class Customers extends React.Component {

  constructor(props) {
    super(props);
    this.state = { list: [] }
    
    this.refresh();
  }
  
  refresh() {
    axios.get(`${URL}/clientes`)
      .then(resp => this.setState({...this.state, list: resp.data}))
  }

  render() {
    return (
      <Fragment>
        <CustomerList list={this.state.list}/>
      </Fragment>
    )
  }
}