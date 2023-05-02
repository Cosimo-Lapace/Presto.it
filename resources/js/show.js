(function () {
  const buttonfavorites = document.getElementById('buttonfavorites');
  if(buttonfavorites.getAttribute('data-check')==="1"){
    buttonfavorites.classList.remove('btn','btn-outline-danger');
    buttonfavorites.classList.add('btn','btn-danger')
  }else{
    buttonfavorites.classList.remove('btn','btn-danger')
    buttonfavorites.classList.add('btn','btn-outline-danger');
  }

    }) ()
