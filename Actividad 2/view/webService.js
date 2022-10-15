
 window.onload= function(){
    consumirWs();
 }

 
 //metodo para consumir el ws de deportenis
 function consumirWs() {
    const api_url ='https://my-json-server.typicode.com/dp-danielortiz/dptest_jsonplaceholder/items';
    const options = {
        method: 'GET'
    };

    fetch(api_url, options)
    .then(response => response.json())
    .then(json => { obtenerDatos(json) })
    .catch(err => console.error(err))
}

function obtenerDatos(json){
    const div = document.createElement('div');

    json.forEach(element => {

        if(element.color === 'red') {

            const id = document.createElement('li');
            id.textContent = element.id;

            const type = document.createElement('li');
            type.textContent = element.type;

            const color = document.createElement('li');
            color.textContent = element.color;

            const br = document.createElement('br');

            div.appendChild(id);
            div.appendChild(type);
            div.appendChild(color);
            div.appendChild(br);

            deportenis.appendChild(div);
        } 
    });
}