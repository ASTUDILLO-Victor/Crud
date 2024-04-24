function aparezcaModal(Ecedu, Enom,Eape){
    $("#mimodal").modal("show");
    document.getElementById('Ecedu').value = Ecedu;
    document.getElementById('Enom').value = Enom;
    document.getElementById('Eape').value = Eape;
}

function cerrarModal(){
    $("#mimodal").modal("hide");
}

// function aparezcaModal(id, nom, cedu, fnaci){
//     $("#mimodal").modal("show");
//     $("#Enombre").val(nom);
//     $("#Eced").val(cedu);
//     $("#idempleado").val(id);
//     $("#Efnac").val(fnaci);
// }