import React, { Fragment } from 'react'
import { Grid, Card, Header } from 'tabler-react'

export default props => {

  const renderCard = () => {
    const list = props.list || [];

    if (list.length === 0) {
      return (
        <Fragment>
          <Header.H3>Parece que não tem nenhum cliente para mostrar ainda.</Header.H3>

          <p>
            Rode na raiz do laravel:
          </p>
          <code>$ php artisan db:seed --class=ClientesTableSeeder</code>

        </Fragment>
      )      
    } else {
      return list.map(cliente => (
        <Grid.Row cards deck key={cliente.id}>
          <Grid.Col md={6}>
            <Card
              title={cliente.name}
              body={`Telefone: ${cliente.telefone}`}
            />
          </Grid.Col>
        </Grid.Row>
      ));
    }
  }

  return (
    <Fragment>
      {renderCard()}  
    </Fragment>
  )
}