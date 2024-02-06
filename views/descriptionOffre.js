
function ajaxDescriptionRequest(numOffre){
    let xhttp=new XMLHttpRequest();
    console.log(numOffre);
    xhttp.open('GET',`chercheur.php?numoffre=${numOffre}`,false);
    xhttp.setRequestHeader('Content-Type', 'application/json');
    xhttp.onreadystatechange=function(){
        if(xhttp.readyState===4 && xhttp.status===200){
           let details=JSON.parse(xhttp.responseText);
           let detailsOffre=document.getElementById('details-offre');
           let titreOffre=document.getElementById('titre-Offre');
           let dateOffre=document.getElementById('date-offre');
           let enterpriseOffre=document.getElementById('enterprise-offre');
           let experianceOffre=document.getElementById('experiance-offre');
           let descriptionOffre=document.getElementById('description-offre');
           let domaine=document.getElementById('domaine-offre');
           let numOffre=document.getElementById('linkOffre');
           numOffre.setAttribute('href','./appliquer.php?numoffre='+details[0]['num_offre']);
           titreOffre.textContent=details[0]['titre'];
           enterpriseOffre.textContent=details[0]['nom_en'];
           dateOffre.textContent=details[0]['datepublication'];
           experianceOffre.textContent=details[0]['anneexperience']+" anne ou plus";
           descriptionOffre.textContent=details[0]['description'];
           domaine.textContent=details[0]['nom'];
           detailsOffre.classList.remove('hidden');
    
            }
            else{
                    console.log("Request Error:"+ xhttp.status);
                }
    }
    xhttp.send();
}
let offres=document.getElementsByClassName('description-offre');
for(let i=0;i<offres.length;i++){
    offres[i].onclick=(e)=>{
            ajaxDescriptionRequest(offres[i].id);
    }
}

