require('./bootstrap');

function love(userId, gigId) {
    const url = `/api/love/${userId}/${gigId}`;
    window.axios.post(url).then(r => console.log(r));
}

function unlove(userId, gigId) {
    const url = `/api/love/${userId}/${gigId}`;
    window.axios.delete(url).then(r => console.log(r));
}
