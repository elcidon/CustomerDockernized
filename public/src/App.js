import React from "react";
import Customers from "./customers/customers";

import { Container, Site, Page } from "tabler-react";

function App() {
  return (
    <div className="App">
      <Site.Header>Clientes.DevX3</Site.Header>

      <Container>
        <Page.Header>Lista de clientes</Page.Header>
        <Customers />
      </Container>

      <Site.Footer copyright="© Copyright | All rights reserved for DevX3"></Site.Footer>
    </div>
  );
}

export default App;
