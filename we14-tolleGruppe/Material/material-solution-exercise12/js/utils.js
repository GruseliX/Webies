
if ( localStorage.getItem("favStop") == null){
    localStorage.setItem('favStop', 0); 
}

let stops;

localStorage.setItem('favStop', 0);

function load(url, onComplete, onError){

}

function onComplete(data){

}

function onError(){

}

function setFavorite(id){
    localStorage.setItem('favStop', id);
    return favorite = id;
}

function getFavorite(){
    return localStorage.getItem('favStop');
}

function loadStops(callback, onError){
    stops = load("morgal.informatik.uni-ulm.de:8000/line/stop", callback, onError);
}

function toId(string){
    
}