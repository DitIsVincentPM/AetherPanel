import axios from 'axios';
import Echo from 'laravel-echo';
import io from 'socket.io-client';

window.io = io;

window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: `${window.location.hostname}:3000`,
    transports: ['websocket', 'polling'], // Use WebSocket as a primary transport
    withCredentials: true, // Include credentials for CORS
});


window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


