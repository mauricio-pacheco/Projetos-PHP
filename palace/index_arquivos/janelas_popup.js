function fotos(URL,nome) {
  var width = 720;
  var height = 500;
  var left = 40;
  var top = 20;
  window.open(URL, nome, 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
}

function mail(URL,nome) {
  var width = 306;
  var height = 180;
  var left = 40;
  var top = 20;
  window.open(URL, nome, 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
}

function max(url) {
  window.open(url,'popupImageWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=100,height=100,screenX=150,screenY=150,top=150,left=150')
}