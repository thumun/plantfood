var recipearray = [];
var arrlength = 0;

//get request here 
function getvals(){
    let url = 'https://plantfoodapi.herokuapp.com/recipe/all';
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);

    xhr.onload = function (e) {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) { 
                recipearray.empty(); 
                recipearray = JSON.parse(xhr.responseText); // parse get array -- need img and title
                updaterecipes();
            }
        }
    }
}

function pageLoaded(){
    updaterecipes(); //replace with getvals() since updaterecipes already in get req

}

function updaterecipes(){
    //recipearray = ['<div class="col-md-6 col-lg-4 item"><a class="lightbox" href="assets/img/scenery/image1.jpg"><img class="img-thumbnail img-fluid image" src="assets/img/scenery/image1.jpg"></a></div>',
    //'<div class="col-md-6 col-lg-4 item"><a class="lightbox" href="assets/img/scenery/image4.jpg"><img class="img-thumbnail img-fluid image" src="assets/img/scenery/image4.jpg"></a></div>',
    //'<div class="col-md-6 col-lg-4 item"><a class="lightbox" href="assets/img/scenery/image6.jpg"><img class="img-thumbnail img-fluid image" src="assets/img/scenery/image6.jpg"></a></div>']

    let gallery = document.getElementById('recipegallery');

    if (type(recipearray.length / 7) == int){
        arrlength = recipearray.length / 7;
    }
    else{ 
        arrlength = Math.floor(recipearray.length / 7); 
    }

    for (let j = 0; j < recipearray.length; j++){
        if 
    }


    for (let i = 0; i < recipearray.length; i++){
        let node= document.createElement("div");
        node.className = "col-md-6 col-lg-4 item";
        node.innerHTML = '<a class="lightbox" href="assets/img/scenery/image1.jpg"><img class="img-thumbnail img-fluid image" src="assets/img/scenery/image1.jpg"></a>'; //can add clickable att to img

        gallery.appendChild(node);
    }
}