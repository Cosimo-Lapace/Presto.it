(function () {
    let small = document.getElementsByClassName('small');
if(small.length != 0){
    small[0].innerText = small[0].innerText.replace(/Showing|to|of|results/gi, function(match) {
      switch(match.toLowerCase()) {
        case 'showing':
          return 'Ci sono da';
        case 'to':
          return 'a';
        case 'of':
          return 'di';
        case 'results':
          return 'risultati';
        default:
          return match;
      }
    })};
    /* checkbox filter annunci */
    let checkboxcategory = document.querySelectorAll('.checkboxcategory');

    function uncheckAllExcept(checkbox) {
        for (var i = 0; i < checkboxcategory.length; i++) {
            if (checkboxcategory[i] !== checkbox) {
                checkboxcategory[i].checked = false;
            }
        }
    }

    checkboxcategory.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                uncheckAllExcept(this);
            }
        });
    });
    let checkspan = document.querySelectorAll('.checkspan');

    checkspan.forEach(function(span) {
        span.addEventListener('click', function(e) {
            e.preventDefault();
          let checkbox = this.previousElementSibling;
          if (checkbox.checked) {
            checkbox.checked = false;
          } else {
            checkbox.checked = true;
            uncheckAllExcept(checkbox);
          }
        });
      });
/* fine checkbox filter annunci */


})()
