var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _toConsumableArray(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } else { return Array.from(arr); } }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

function DetailInputContainer(props) {
  return React.createElement(
    React.Fragment,
    null,
    React.createElement("input", { type: "hidden", name: "detalles[" + props.num + "][producto_id]", value: props.productoId }),
    React.createElement("input", { type: "hidden", name: "detalles[" + props.num + "][cantidad]", value: props.cantidad }),
    React.createElement("input", { type: "hidden", name: "detalles[" + props.num + "][subtotal]", value: props.subtotal })
  );
}

var DetailsForm = function (_React$Component) {
  _inherits(DetailsForm, _React$Component);

  function DetailsForm(props) {
    _classCallCheck(this, DetailsForm);

    var _this = _possibleConstructorReturn(this, (DetailsForm.__proto__ || Object.getPrototypeOf(DetailsForm)).call(this, props));

    _this.state = {
      detalles: []
    };
    var form = $('#addDetalles');
    form.on('submit', function (e) {
      e.preventDefault();
      var productoIdInput = document.getElementById('productoId');
      var cantidadInput = document.getElementById('cantidad');
      var producto = productos.find(function (p) {
        return p.id == productoIdInput.value;
      });
      var detalle = {
        productoId: productoIdInput.value,
        cantidad: cantidadInput.value,
        subtotal: Number(cantidadInput.value * producto.precio).toFixed(2)
      };
      _this.setState({ detalles: [].concat(_toConsumableArray(_this.state.detalles), [detalle]) });
      productoIdInput.value = "";
      cantidadInput.value = "";
      return false;
    });
    return _this;
  }

  _createClass(DetailsForm, [{
    key: "render",
    value: function render() {
      var detalles = this.state.detalles;

      return React.createElement(
        "div",
        null,
        React.createElement(
          "table",
          { className: "table" },
          React.createElement(
            "thead",
            null,
            React.createElement(
              "tr",
              null,
              React.createElement(
                "th",
                null,
                "Descripcion"
              ),
              React.createElement(
                "th",
                null,
                "Cantidad"
              ),
              React.createElement(
                "th",
                null,
                "Subtotal"
              )
            )
          ),
          React.createElement(
            "tbody",
            null,
            detalles.map(function (detalle, index) {
              var producto = productos.find(function (p) {
                return p.id == detalle.productoId;
              });
              return React.createElement(
                "tr",
                { key: index },
                React.createElement(
                  "td",
                  null,
                  producto.descripcion
                ),
                React.createElement(
                  "td",
                  null,
                  detalle.cantidad
                ),
                React.createElement(
                  "td",
                  null,
                  "$",
                  detalle.subtotal
                )
              );
            })
          )
        ),
        detalles.map(function (detalle, index) {
          return React.createElement(DetailInputContainer, Object.assign({ num: index }, detalle, { key: index }));
        })
      );
    }
  }]);

  return DetailsForm;
}(React.Component);

$(document).ready(function () {
  ReactDOM.render(React.createElement(DetailsForm, null), document.getElementById('root'));
  var form = $('#finalizar');
  form.on('submit', function (e) {
    if (!form.serializeArray().find(function (input) {
      return input.name.includes('detalles');
    })) {
      e.preventDefault();
      e.stopPropagation();
      $('#errorDetalles').modal('show');
    }
  });
});