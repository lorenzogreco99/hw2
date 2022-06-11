
function insertCom(event){
    event.preventDefault();
    const url= document.querySelector('.img-modale');
    const commento = event.currentTarget.querySelector('#testo_c').value;
    console.log(commento);
    fetch("/post/comments/upload", {method: 'post', 
    body: "commento="+commento + "&url=" + url.src,
        headers: {
        "Content-Type": "application/x-www-form-urlencoded",
        "X-CSRF-TOKEN": token
        }
    }).then(fetchResponse).then(fetchJsonCommento);

}


function fetchJsonCommento(json){
    console.log(json);
    const commento = document.querySelector('#commento');
    const com = document.createElement('div');
    com.classList.add('com');
    com.textContent =json.username +": "+ json.text;
    commento.appendChild(com);
    document.querySelector('#testo_c').value = "";



}

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
    info.textContent = "Like: " +json;

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

function modale(event){
    const modale = document.querySelector('#modale');
    modale.classList.remove('hidden');
    document.body.classList.add('no-scroll');
    const image = document.createElement('img');
    image.classList.add('img-modale');
    image.src = event.currentTarget.querySelector('img').src;
    console.log(image.src);
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

function mettilike(event){
    let num =  parseInt(event.currentTarget.parentNode.parentNode.querySelector('.nlikes').innerText);
    console.log(num);
    
    const foto= event.currentTarget.parentNode.parentNode.parentNode.querySelector('.foto img');
    console.log(foto.src);

    console.log(event.currentTarget.src);
    if(event.currentTarget.src==="http://127.0.0.1:8000/img/like.png"){
        //togli like
        console.log((num--).toString());
        event.currentTarget.src="img/nolike.png";
        fetch("/post/unlike", {method: 'post', 
            body: "foto="+foto.src,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            "X-CSRF-TOKEN": token
            }
        }).then(fetchResponse).then(fetchJson);

    }else if(event.currentTarget.src==="http://127.0.0.1:8000/img/nolike.png"){
        //metti like
        console.log((num++).toString());
        event.currentTarget.src="img/like.png";
        

        fetch("/post/like", {method: 'post', 
            body: "foto="+foto.src,
            headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            "X-CSRF-TOKEN": token
            }
        }).then(fetchResponse).then(fetchJson);

    }
    event.currentTarget.parentNode.parentNode.querySelector('.nlikes').innerText= num.toString();
}

function fetchJson(json){
    console.log(json);

}

function fetchchecklikeJson(json){
    if(json !== 0){
        const boxes = document.querySelectorAll(".imglike");
        boxes[json-1].src="img/like.png";

    }
}


function fetchPostsJson(json) {
    console.log(json);
    const pagina = document.getElementById('pagina');
    for(let i in json) {
        const post = document.getElementById('post_template').cloneNode(true).querySelector(".post");
        const name = post.querySelector(".nome");
        name.textContent = json[i].username;
        const nlikes = post.querySelector(".nlikes");
        nlikes.textContent = json[i].nlikes;

        const sezioneimg = post.querySelector(".foto");
        const image = document.createElement('img');
        image.classList.add('foto');
        image.src = json[i].url;
        sezioneimg.appendChild(image);
        pagina.appendChild(post);
        const likebox = post.querySelector(".likebox");
        const like = document.createElement('img');
        like.classList.add('imglike');
        like.src="img/nolike.png";
        likebox.appendChild(like);

        fetch("/feed/checklike/"+ json[i].id).then(fetchResponse).then(fetchchecklikeJson);

        const box = post.querySelector(".imglike");
        box.addEventListener('click', mettilike);

        const com = post.querySelector(".foto");
        com.addEventListener('click', modale);

    }


}

function fetchEmailJson(json){
    console.log(json);
    const rubrica = document.querySelector('#rubrica');
    for(var i=0 ; i<json.length ; i++){
        const box = document.querySelector('.email').cloneNode(true);
        const email = box.querySelector('.nome_email');
        email.textContent= json[i].email;
        box.appendChild(email);
        rubrica.appendChild(box);
    }
    document.querySelector('.email').classList.add('hidden')
}


function fetchResponse(response) {
    if (!response.ok) {return null};
    return response.json();
}



//INIZIO
fetch("/feed").then(fetchResponse).then(fetchPostsJson);

fetch("/feed/email").then(fetchResponse).then(fetchEmailJson);


const exit = document.querySelector('#exit');
exit.addEventListener('click', closeModale);

const comment = document.querySelector('#insert');
comment.addEventListener('submit', insertCom);


const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');