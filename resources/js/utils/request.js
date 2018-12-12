import axios from 'axios';

const requestInstance = axios.create({
	baseURL: 'http://localhost:8000/api',
	timeout: 10000,
});

export default requestInstance;
