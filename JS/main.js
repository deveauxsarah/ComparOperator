

function names(e)
{
    console.log(e.classList[1]);

// carousel
let widthInput = document.getElementById("slider-width");

widthInput.addEventListener("change", (e) => {
	let currentValue = e.currentTarget.value;
	let pSliderWidth = document.getElementById("pSlider");
	pSliderWidth.style.width = `${currentValue}px`;
	let liSlideWidth = document.getElementsByClassName(".li_slide");
	for(let i = 0; i < liSlideWidth.length; i++) {
		liSlideWidth[i].style.width = `${currentValue}px`;
	}
})

let heightInput = document.getElementById("slider-height");

heightInput.addEventListener("change", (e) => {
	let currentValue = e.currentTarget.value;
	let pSliderWidth = document.getElementById("pSlider");
	pSliderWidth.style.height = `${currentValue}px`;
	let liSlideWidth = document.getElementsByClassName(".li_slide");
	for(let i = 0; i < liSlideWidth.length; i++) {
		liSlideWidth[i].style.height = `${currentValue}px`;
	}
})



function names(e)
{
    console.log(e.classList[1]);
	document.location.href="./process/destinationSetter.php?name="+e.classList[1]; 

}  

window.onload = () => {
    // On va chercher toutes les étoiles
    const stars = document.querySelectorAll(".la-star");
    
    // On va chercher l'input
    const note = document.querySelector("#note");

    // On boucle sur les étoiles pour le ajouter des écouteurs d'évènements
    for(star of stars){
        // On écoute le survol
        star.addEventListener("mouseover", function(){
            resetStars();
            this.style.color = "red";
            this.classList.add("las");
            this.classList.remove("lar");
            // L'élément précédent dans le DOM (de même niveau, balise soeur)
            let previousStar = this.previousElementSibling;

            while(previousStar){
                // On passe l'étoile qui précède en rouge
                previousStar.style.color = "red";
                previousStar.classList.add("las");
                previousStar.classList.remove("lar");
                // On récupère l'étoile qui la précède
                previousStar = previousStar.previousElementSibling;
            }
        });

        // On écoute le clic
        star.addEventListener("click", function(){
            note.value = this.dataset.value;
        });

        star.addEventListener("mouseout", function(){
            resetStars(note.value);
        });
    }

    /**
     * Reset des étoiles en vérifiant la note dans l'input caché
     * @param {number} note 
     */
    function resetStars(note = 0){
        for(star of stars){
            if(star.dataset.value > note){
                star.style.color = "black";
                star.classList.add("lar");
                star.classList.remove("las");
            }else{
                star.style.color = "red";
                star.classList.add("las");
                star.classList.remove("lar");
            }
        }
    }

}
}
