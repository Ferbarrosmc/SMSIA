const express = require('express');
const axios = require('axios');
const app = express();
const port = process.env.PORT || 3000;

app.use(express.json());

app.post('/', async (req, res) => {
  try {
    const token = await generateToken();
    const { toPhone, message } = req.body;

    const response = await sendSMS(token, toPhone, message);
    res.json(response.data);
  } catch (error) {
    res.status(500).json({ error: error.message });
  }
});

app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});

async function generateToken() {
  const url = 'https://api.bg.com.bo/bgdev/api-oauth/oauth2/token';
  const params = new URLSearchParams({
    client_id: 'bga-app-api-crm-01',
    client_secret: '8DrLhkRINhafvUtw1Kf83aLuTIWE1eEa',
    grant_type: 'client_credentials',
  });

  const response = await axios.post(url, params);
  return response.data.access_token;
}

async function sendSMS(token, toPhone, message) {
  const url = 'https://api.bg.com.bo/bgdev/int/notifc/v1/sms/send';
  const data = {
    data: {
      toPhone,
      message,
      typeMessage: 3,
      idRequestor: 10000,
      funcionalityId: 30,
    },
    metadata: {
      codUsuario: 'JBK',
      codSucursal: 70,
      codAplicacion: 1,
    },
  };

  const config = {
    headers: {
      Authorization: `Bearer ${token}`,
    },
  };

  return axios.post(url, data, config);
}
