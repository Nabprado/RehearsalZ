// constantes des boutons play, pause et stop
const playAll = document.querySelector('#play_all');
const stopAll =  document.querySelector('#stop_all');
const pauseAll =  document.querySelector('#pause_all');

// constantes des inputs checkbox batterie, guitares et voix
const drums = document.querySelector('#Drums');
const gtr = document.querySelector('#Guitars');
const voice = document.querySelector('#Voices');

// constantes des pistes audio batterie, guitares et voix
const drumsTrack = document.querySelector('.Drums');
const gtrTrack = document.querySelector('.Guitars');
const voiceTrack = document.querySelector('.Voices');

// remise à zéro des pistes audio au chargement de la page pour éviter des décalages de tempo entre les pistes
if(drumsTrack){
    drumsTrack.currentTime = 0;
}
if(gtrTrack){
    gtrTrack.currentTime = 0;
}
if(voiceTrack){
voiceTrack.currentTime = 0;
}


// au clic du bouton play, si les checkbox sont sélectionnées, lancer et mute off la piste correspondante
// [J'ai choisi d'utiliser le mute plutôt que de pauser car les pistes choisies ont un léger décalage en milisecondes,
// dû à l'enregistrement en studio, ce qui est problématique lorsque l'on re coche une piste:
// en récupérant le currentTime des autres pistes en lecture pour les caler ensemble il y avait un décalage de tempo.]
playAll.addEventListener('click', (e) => {
    if(drumsTrack){
    if(drums.checked == true){
        drumsTrack.play();
        drumsTrack.muted= false;
    }}
    if(gtrTrack){
    if(gtr.checked == true){
        gtrTrack.play();
        gtrTrack.muted= false;
    }}
    if(voiceTrack){
    if(voice.checked == true){
        voiceTrack.play();
        voiceTrack.muted= false;
    }}
    if(drumsTrack){
    if(drums.checked == false){
        drumsTrack.play();
        drumsTrack.muted= true;
    }}
    if(gtrTrack){
    if(gtr.checked == false){
        gtrTrack.play();
        gtrTrack.muted= true;
    }}
    if(voiceTrack){
    if(voice.checked == false){
        voiceTrack.play();
        voiceTrack.muted= true;
    }}
})

// au clic du bouton pause, pauser toutes les pistes
pauseAll.addEventListener('click', (e) => {
    if(drumsTrack){    
    drumsTrack.pause();
    }
    if(gtrTrack){
    gtrTrack.pause();
    }
    if(voiceTrack){
    voiceTrack.pause();
    }
})

// au clic du bouton stop, pauser toutes les pistes et les remettre à zéro
stopAll.addEventListener('click', (e) => {
    if(drumsTrack){ 
        drumsTrack.pause();
        drumsTrack.currentTime = 0;
    }
    if(gtrTrack){ 
        gtrTrack.pause();
        gtrTrack.currentTime = 0;
    }
    if(voiceTrack){ 
        voiceTrack.pause();
        voiceTrack.currentTime = 0;
    }
})


