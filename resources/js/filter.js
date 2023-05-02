
(function () {
    function changecontentfirstelement(select,option){
        if(select){
        select.addEventListener('click', function() {
            option.textContent = "";
          });

          select.addEventListener('blur', function() {
            if (select.value == "") {
                option.textContent = "-";
            }

          })};
      }
  const searchLatestandOldest = document.querySelector('select[name="searchLatestandOldest"]');
  const selectlatestolders = document.getElementById('selectlatestolders');
  changecontentfirstelement(searchLatestandOldest,selectlatestolders)
  const searchcategories = document.querySelector('select[name="searchcategories"]')
  const selectcategories = document.getElementById('selectcategories')
  changecontentfirstelement(searchcategories,selectcategories)
  /* filtro avanzato */
  const advancedsearcategories = document.querySelector('select[name="advancedsearcategories"]')
  const advancedsearcategorieselect = document.getElementById('advancedsearcategorieselect')
  changecontentfirstelement(advancedsearcategories,advancedsearcategorieselect)
  const advancedsearchlatestoldest = document.querySelector('select[name="advancedsearchlatestoldest"]')
  const advancedsearchlatestoldestselect = document.getElementById('advancedsearchlatestoldestselect')
  changecontentfirstelement(advancedsearchlatestoldest,advancedsearchlatestoldestselect)
  const advancedsearchtype = document.querySelector('select[name="advancedsearchtype"]')
  const advancedsearchtypeselect = document.getElementById('advancedsearchtypeselect')
  changecontentfirstelement(advancedsearchtype,advancedsearchtypeselect)
  /* fine filtro avanzato */

}) ()
