import axios from "axios";
import useToken from "../components/App/useToken";

// const baseUrl = /*process.env.REACT_APP_API_URL || */"http://api.apiato.test";
const baseUrl = "/v1";


const api = {
  register: (endpoint, data) => axios.post(baseUrl + endpoint, data),
  login: (endpoint, data) => axios.post(baseUrl + endpoint, data),
  get: (endpoint) => axios.get(baseUrl + endpoint),
  getPreferences: (endpoint, token) => axios.get(baseUrl + endpoint, {
    headers: { Authorization: `Bearer ${token}` }
  }),
  getArticles: (endpoint) => axios.get(baseUrl + endpoint),
  savePreferences: (endpoint, token, data) => axios.patch(baseUrl + endpoint, data, {
    headers: { Authorization: `Bearer ${token}` }
  }),
  remove: (endpoint) => axios.delete(baseUrl + endpoint),
};

export default api;
