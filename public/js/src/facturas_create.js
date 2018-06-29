function DetailInputContainer(props) {
  return (
    <React.Fragment>
      <input type="hidden" name={`detalles[${props.num}][producto_id]`} value={props.productoId} />
      <input type="hidden" name={`detalles[${props.num}][cantidad]`} value={props.cantidad} />
      <input type="hidden" name={`detalles[${props.num}][subtotal]`} value={props.subtotal} />
    </React.Fragment>
  );
}

class DetailsForm extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      detalles: [],
    };
    const form = $('#addDetalles');
    form.on('submit', (e) => {
      e.preventDefault();
      const productoIdInput = document.getElementById('productoId');
      const cantidadInput = document.getElementById('cantidad');
      const producto = productos.find(p => p.id == productoIdInput.value);
      const detalle = {
        productoId: productoIdInput.value,
        cantidad: cantidadInput.value,
        subtotal: Number(cantidadInput.value * producto.precio).toFixed(2)
      };
      this.setState({ detalles: [...this.state.detalles, detalle] });
      productoIdInput.value = "";
      cantidadInput.value = "";
      return false;
    });
  }

  render() {
    const { detalles } = this.state;
    return (
      <div>
        <table className="table">
          <thead>
            <tr>
              <th>Descripcion</th>
              <th>Cantidad</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            {detalles.map((detalle, index) => {
              const producto = productos.find(p => p.id == detalle.productoId);
              return (
                <tr key={index}>
                  <td>{producto.descripcion}</td>
                  <td>{detalle.cantidad}</td>
                  <td>${detalle.subtotal}</td>
                </tr>
              );
            })}
          </tbody>
        </table>
        {detalles.map((detalle, index) => (
          <DetailInputContainer num={index} {...detalle} key={index} />
        ))}
      </div>
    );
  }
}

$(document).ready(() => {
  ReactDOM.render(<DetailsForm/>, document.getElementById('root'));
  const form = $('#finalizar');
  form.on('submit', (e) => {
    if (!form.serializeArray().find(input => input.name.includes('detalles'))) {
      e.preventDefault();
      e.stopPropagation();
      $('#errorDetalles').modal('show');
    }
  });
});
