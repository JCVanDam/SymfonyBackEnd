var elem = document.getElementsByClassName("box");
var serviceUrl = window.location.href.substr(50);

if (serviceUrl === "frequentation"
  || serviceUrl === "phylica"
  || serviceUrl === "hfi"){
  for (item in elem){
    if (elem[item].childNodes == null || elem[item].childNodes[1] == null){
      break;
    }
    var serviceTitle = elem[item].childNodes[1].childNodes[1].childNodes[0].data;
    var serviceTitleClean = serviceTitle.normalize('NFD').replace(/[\u0300-\u036f]/g, "").toLowerCase();
    serviceTitleClean = (serviceTitleClean == "habitat flore invertebre") ? "hfi" : serviceTitleClean;
    if (serviceTitleClean != serviceUrl){
      elem[item].style.display = 'none';
    }
  }
}
