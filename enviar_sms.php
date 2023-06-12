<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener los valores del formulario
  $telefono = $_POST['telefono'];
  $mensaje = $_POST['mensaje'];

  // Validar los campos, realizar las validaciones adicionales según tus requisitos

  // Realizar la solicitud a la API de Banco Ganadero
  $url = 'https://api.bg.com.bo/bgdev/int/notifc/v1/sms/send';

  $data = array(
    'data' => array(
      'toPhone' => $telefono,
      'message' => $mensaje,
      'typeMessage' => 3,
      'idRequestor' => 10000,
      'funcionalityId' => 21
    ),
    'metadata' => array(
      'codUsuario' => 'JBK',
      'codSucursal' => 70,
      'codAplicacion' => 1
    )
  );

  $headers = array(
    'Content-Type: application/json',
    'Authorization: Bearer {eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJ5U2ZUVTdtZDFpd2RoMEcyaW1DVzF0ektyMTFQaUlTY1Fick1vTV9PS2FFIn0.eyJleHAiOjE2ODY2MDM2MDEsImlhdCI6MTY4NjYwMDAwMSwianRpIjoiNDJlMDE3YjYtM2YxNy00NTc1LTk4ZDItYmQ0MTVjOWZjOGVjIiwiaXNzIjoiaHR0cDovL2tleWNsb2FrLmtvbmcuc3ZjLmNsdXN0ZXIubG9jYWwvcmVhbG1zL2JnYS1hcHBzLWludGVybmFzLWRlc2Fycm9sbG8iLCJhdWQiOiJhY2NvdW50Iiwic3ViIjoiOWYwYjJlOWYtMjRlOS00ZmNhLWI4NGMtYWNlZGE3MjkxN2RkIiwidHlwIjoiQmVhcmVyIiwiYXpwIjoiYmdhLWFwcC1hcGktY3JtLTAxIiwiYWNyIjoiMSIsInJlYWxtX2FjY2VzcyI6eyJyb2xlcyI6WyJvZmZsaW5lX2FjY2VzcyIsInVtYV9hdXRob3JpemF0aW9uIiwiZGVmYXVsdC1yb2xlcy1iZ2EtYXBwcy1pbnRlcm5hcy1kZXNhcnJvbGxvIl19LCJyZXNvdXJjZV9hY2Nlc3MiOnsiYWNjb3VudCI6eyJyb2xlcyI6WyJtYW5hZ2UtYWNjb3VudCIsIm1hbmFnZS1hY2NvdW50LWxpbmtzIiwidmlldy1wcm9maWxlIl19fSwic2NvcGUiOiJlbWFpbCBwcm9maWxlIiwiY2xpZW50SG9zdCI6IjEwLjI0NC4xLjIxMyIsImNsaWVudElkIjoiYmdhLWFwcC1hcGktY3JtLTAxIiwiZW1haWxfdmVyaWZpZWQiOmZhbHNlLCJwcmVmZXJyZWRfdXNlcm5hbWUiOiJzZXJ2aWNlLWFjY291bnQtYmdhLWFwcC1hcGktY3JtLTAxIiwiY2xpZW50QWRkcmVzcyI6IjEwLjI0NC4xLjIxMyJ9.GQwGE5U18Q-KuZeqsMbtA_n90VKLizEoTpKEvGV9v5GknY1OunwLG8UdHmfykSTSbUtqS8hWDg-2v_LDvMmD3cvrwm4XFlq3eCcKN4bQ__dcpZH0cbtx0m-6o3-dwIgtp6OuhkDn0_cQWQ2ogH6-Ol1mM6BNp-occ3dWJF0eVqRTI1JVIgoMarM5bYE5xA9_SCFqYqWtwCdwpRUFQzC-NcOnvZs6sRtxMjBODcf-cSn119Zikm0txk8c41_HX9wMYduC52hUJFWdt3vMay-x73rfl0CDzy1De1O2LLjB9oCcU4y2k7XfvVvWiwIJ0yT7dyuUlKZZ0wYnEnewEiNuPw}'
  );

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($ch);
  curl_close($ch);

  // Procesar la respuesta de la API de Banco Ganadero y mostrar un mensaje al usuario
  $result = json_decode($response);
  if ($result && isset($result->status) && $result->status === 'success') {
    echo "El SMS se ha enviado correctamente.";
  } else {
    echo "Error al enviar el SMS. Por favor, inténtalo de nuevo.";
  }
}
?>
