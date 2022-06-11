
function closeModale(){
    const modale = document.querySelector('#modale');
    modale.classList.add('hidden');
    document.body.classList.remove('no-scroll');
    const text = document.querySelector('#info');
    text.textContent="";
    const foto = document.querySelector('#picture');
    foto.textContent="";
    const commento = document.getElementById('commento');
    commento.textContent="";
}

function fetchLikeJson(json) {
    console.log(json);
    const info = document.querySelector('#info');
    info.textContent = "Like: " + json;

}

function fetchCommentiJson(json) {
    console.log(json);
    const commento = document.getElementById('commento');
    if(!json.length){
        console.log("commento non trovato");
    }else{
        for(var i=0 ; i<json.length ; i++){
            const com = document.createElement('div');
            com.classList.add('com');
            com.textContent= json[i].username + ": "+ json[i].text ;
            commento.appendChild(com);
        }
    }

}


function fetchResponse(response) {
    if (!response.ok) {return null};
    return response.json();
}


function seleziona(event){
    const modale = document.querySelector('#modale');
    modale.classList.remove('hidden');
    document.body.classList.add('no-scroll');
    const image = document.createElement('img');
    image.classList.add('img-modale');
    image.src = event.currentTarget.src;
    const select = document.querySelector('#picture');
    select.appendChild(image);
    fetch("/post/fetch_like", {method: 'post', 
    body: "foto="+image.src,
        headers: {
        "Content-Type": "application/x-www-form-urlencoded",
        "X-CSRF-TOKEN": token
        }
    }).then(fetchResponse).then(fetchLikeJson);

    fetch("/post/fetch_comments", {method: 'post', 
    body: "foto="+image.src,
        headers: {
        "Content-Type": "application/x-www-form-urlencoded",
        "X-CSRF-TOKEN": token
        }
    }).then(fetchResponse).then(fetchCommentiJson);
}


function fetchFotoJson(json){
    console.log(json);
    const pag = document.querySelector('#album');
    for(var i = 0; i<json.length; i++){
        const box = document.createElement('div');
        box.classList.add('box');
        const image = document.createElement('img');
        image.classList.add('foto');
        image.src = json[i].url;
        image.addEventListener('click', seleziona);
        box.appendChild(image);
        pag.appendChild(box);
    }
}

fetch("/profilo/fetch_foto").then(fetchResponse).then(fetchFotoJson);

const exit = document.querySelector('#exit');
exit.addEventListener('click', closeModale);


const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');