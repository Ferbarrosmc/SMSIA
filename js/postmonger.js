(function () {
  'use strict';

  // Importar el objeto Postmonger
  var Postmonger = window.Postmonger;

  // Crea una instancia de Postmonger
  var connection = new Postmonger.Session();

  // Evento de inicialización
  connection.on('initActivity', function (data) {
    // Realiza cualquier configuración inicial que necesites aquí
    console.log('Actividad inicializada:', data);
    // Guarda los datos de configuración en caso de que los necesites más adelante
    // Ejemplo: var activityData = data;
    connection.trigger('ready');
  });

  // Evento de cambio de configuración
  connection.on('requestedTokens', function (tokens) {
    // Realiza cualquier acción necesaria cuando se reciben los tokens
    console.log('Tokens recibidos:', tokens);
  });

  // Evento de guardado de configuración
  connection.on('save', function (data) {
    // Realiza cualquier acción necesaria para guardar la configuración
    console.log('Datos guardados:', data);
    connection.trigger('saveActivity', data);
  });

  // Evento de validación de configuración
  connection.on('validate', function (data) {
    // Realiza cualquier validación necesaria en la configuración
    console.log('Datos validados:', data);
    connection.trigger('doneValidation', data);
  });

  // Evento de publicación de la actividad
  connection.on('publish', function (data) {
    // Realiza cualquier acción necesaria al publicar la actividad
    console.log('Actividad publicada:', data);
    connection.trigger('done');
  });

  // Evento de cancelación de la actividad
  connection.on('cancel', function () {
    // Realiza cualquier acción necesaria al cancelar la actividad
    console.log('Actividad cancelada');
    connection.trigger('done');
  });

  // Conectarse a Journey Builder
  connection.on('ready', function () {
    // Indicar que la actividad está lista
    connection.trigger('ready');
  });

  // Iniciar la conexión con Journey Builder
  connection.init();

})();
