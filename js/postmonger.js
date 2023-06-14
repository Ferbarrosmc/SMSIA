define(['postmonger'], function (Postmonger) {
  'use strict';

  var connection = new Postmonger.Session();

  $(window).ready(function () {
    connection.trigger('ready');

    connection.on('initActivity', function (data) {
      // Lógica de inicialización de la actividad
      // Aquí puedes realizar cualquier configuración necesaria al iniciar la actividad
      // Puedes acceder a los datos del flujo de trabajo a través del objeto "data"
    });

    connection.on('requestedTokens', function (tokens) {
      // Lógica para manejar los tokens solicitados
      // Aquí puedes acceder a los tokens solicitados (como el token de autenticación JWT)
      // Los tokens se pasan como parámetro en el objeto "tokens"
    });

    connection.on('requestedEndpoints', function (endpoints) {
      // Lógica para manejar los endpoints solicitados
      // Aquí puedes acceder a los endpoints solicitados (como la URL de la actividad personalizada)
      // Los endpoints se pasan como parámetro en el objeto "endpoints"
    });

    connection.on('clickedNext', function () {
      // Lógica para manejar el clic en el botón "Siguiente" en la interfaz de configuración de la actividad
      // Aquí puedes realizar cualquier validación o acción adicional antes de pasar al siguiente paso del flujo de trabajo
      // Si no hay ningún error, debes llamar a la función "connection.trigger('nextStep')" para avanzar al siguiente paso
    });

    // Otros eventos y lógica necesarios para la interacción con Journey Builder

  });
});
