var recipearray = [];
var arrlength = 0;
var recipetitle = [];
//get request here 
function getvals(){
    /*
    fetch("https://plantfoodapi.herokuapp.com/recipe/all").then(function(response){
    return response.json();
    })
    .then(function(json){
        for(r of json){
            let recipeBox = document.createElement("div");
            recipeBox.classList.add("indivRecipe");
            recipeBox.innerHTML = '<h3 id="a">' + r.title + '</h3>';
            allRecipes.appendChild(recipeBox);
        }
    });
    */
    let url = 'https://plantfoodapi.herokuapp.com/recipe/all';
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.send();
    xhr.onload = function (e) {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) { 
                recipearray.empty; 
                recipearray = JSON.parse(xhr.responseText); // parse get array -- need img and title
                updaterecipes();
            }
        }
    }
}
function pageLoaded(){
    getvals(); //replace with getvals() since updaterecipes already in get req
}
function updaterecipes(){
    //recipearray = ['<div class="col-md-6 col-lg-4 item"><a class="lightbox" href="assets/img/scenery/image1.jpg"><img class="img-thumbnail img-fluid image" src="assets/img/scenery/image1.jpg"></a></div>',
    //'<div class="col-md-6 col-lg-4 item"><a class="lightbox" href="assets/img/scenery/image4.jpg"><img class="img-thumbnail img-fluid image" src="assets/img/scenery/image4.jpg"></a></div>',
    //'<div class="col-md-6 col-lg-4 item"><a class="lightbox" href="assets/img/scenery/image6.jpg"><img class="img-thumbnail img-fluid image" src="assets/img/scenery/image6.jpg"></a></div>']
    let gallery = document.getElementById('recipegallery');
    for (let i = 0; i < recipearray.length; i++){
        var title = recipearray[i].title;
        let node= document.createElement("div");
        node.className = "col-md-6 col-lg-4 item";
        node.innerHTML = '<center>' + title + '</center>' + '<a class="lightbox" href="recipes/recipe' + recipearray[i].id + '.html"><img class="img-thumbnail img-fluid image" src="assets/img/img' + recipearray[i].id + '.jpg"></a>'; //can add clickable att to img
        gallery.appendChild(node);
    }
}