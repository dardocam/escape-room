(function () {
  var respuestas = new Set();
  var optMapa = {
    "AR-B": { color: "#0072bb", label: "Buenos Aires", isClicked: false },
    "AR-C_1_": { color: "#0072bb", label: "Capital Federal", isClicked: false },
    "AR-K": { color: "#0072bb", label: "Catamarca", isClicked: false },
    "AR-H": { color: "#0072bb", label: "Chaco", isClicked: false },
    "AR-U": { color: "#0072bb", label: "Chubut", isClicked: false },
    "AR-X": { color: "#0072bb", label: "Córdoba", isClicked: false },
    "AR-W": { color: "#0072bb", label: "Corrientes", isClicked: false },
    "AR-E": { color: "#0072bb", label: "Entre Ríos", isClicked: false },
    "AR-P": { color: "#0072bb", label: "Formosa", isClicked: false },
    "AR-Y": { color: "#0072bb", label: "Jujuy", isClicked: false },
    "AR-L": { color: "#0072bb", label: "La Pampa", isClicked: false },
    "AR-F": { color: "#0072bb", label: "La Rioja", isClicked: false },
    "AR-M": { color: "#0072bb", label: "Mendoza", isClicked: false },
    "AR-N": { color: "#0072bb", label: "Misiones", isClicked: false },
    "AR-Q": { color: "#0072bb", label: "Neuquén", isClicked: false },
    "AR-R": { color: "#0072bb", label: "Río Negro", isClicked: false },
    "AR-A": { color: "#0072bb", label: "Salta", isClicked: false },
    "AR-J": { color: "#0072bb", label: "San Juan", isClicked: false },
    "AR-D": { color: "#0072bb", label: "San Luis", isClicked: false },
    "AR-Z": { color: "#0072bb", label: "Santa Cruz", isClicked: false },
    "AR-S": { color: "#0072bb", label: "Santa Fe", isClicked: false },
    "AR-G": {
      color: "#0072bb",
      label: "Santiago del Estero",
      isClicked: false,
    },
    "AR-V": {
      color: "#0072bb",
      label: "Tierra del Fuego, Antártida e Islas del Atlántico Sur",
      isClicked: false,
    },
    "AR-T": { color: "#0072bb", label: "Tucumán", isClicked: false },
  };

  function initMapa() {
    let claves = Object.keys(optMapa); //array de claves
    for (let i = 0; i < claves.length; i++) {
      let clave = claves[i];
      let provincia = document.getElementById(clave);
      if (provincia) {
        provincia.addEventListener("click", function (e) {
          if (!optMapa[clave].isClicked) {
            provincia.setAttribute("fill", "yellow");
            optMapa[clave].isClicked = true;
            respuestas.add(optMapa[clave].label);
          } else {
            provincia.setAttribute("fill", "green");
            optMapa[clave].isClicked = false;
            respuestas.delete(optMapa[clave].label);
          }
          enviarRespuesta();
        });
        provincia.addEventListener("dblclick", function (e) {
          console.log("doble click");
        });
        provincia.addEventListener("mouseover", function (e) {
          if (!optMapa[clave].isClicked) {
            provincia.setAttribute("fill", "rgba(255,255,255,0.5)");
          }
        });
        provincia.addEventListener("mouseleave", function (e) {
          if (!optMapa[clave].isClicked) {
            provincia.setAttribute("fill", "#DDDDDD");
          }
        });
      }
    }
  }

  function enviarRespuesta() {
    postData(
      "http://localhost/escape-room/index.php?controller=respuestas&activity=game",
      { resp: Array.from(respuestas) }
    ).then((data) => {
      console.log(data); // JSON data parsed by `data.json()` call
    });
  }

  async function postData(url, data) {
    // Opciones por defecto estan marcadas con un *
    const response = await fetch(url, {
      method: "POST", // *GET, POST, PUT, DELETE, etc.
      mode: "no-cors", // no-cors, *cors, same-origin
      cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
      credentials: "same-origin", // include, *same-origin, omit
      headers: {
        "Content-Type": "application/json",
        "Content-Type": "application/x-www-form-urlencoded",
      },
      redirect: "follow", // manual, *follow, error
      referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
      body: JSON.stringify(data), // body data type must match "Content-Type" header
    });
    return response.json(); // parses JSON response into native JavaScript objects
  }

  initMapa();
})();
