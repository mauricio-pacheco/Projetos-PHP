var OxOe876=["inp_action","sel_Method","inp_name","inp_id","inp_encode","sel_target","Name","value","name","id","action","method","encoding","application/x-www-form-urlencoded","","target"];var inp_action=Window_GetElement(window,OxOe876[0],true);var sel_Method=Window_GetElement(window,OxOe876[1],true);var inp_name=Window_GetElement(window,OxOe876[2],true);var inp_id=Window_GetElement(window,OxOe876[3],true);var inp_encode=Window_GetElement(window,OxOe876[4],true);var sel_target=Window_GetElement(window,OxOe876[5],true);UpdateState=function UpdateState_Form(){} ;SyncToView=function SyncToView_Form(){if(element[OxOe876[6]]){inp_name[OxOe876[7]]=element[OxOe876[6]];} ;if(element[OxOe876[8]]){inp_name[OxOe876[7]]=element[OxOe876[8]];} ;inp_id[OxOe876[7]]=element[OxOe876[9]];if(element[OxOe876[10]]){inp_action[OxOe876[7]]=element[OxOe876[10]];} ;if(element[OxOe876[11]]){sel_Method[OxOe876[7]]=element[OxOe876[11]];} ;if(element[OxOe876[12]]==OxOe876[13]){inp_encode[OxOe876[7]]=OxOe876[14];} else {inp_encode[OxOe876[7]]=element[OxOe876[12]];} ;if(element[OxOe876[15]]){sel_target[OxOe876[7]]=element[OxOe876[15]];} ;} ;SyncTo=function SyncTo_Form(element){element[OxOe876[8]]=inp_name[OxOe876[7]];if(element[OxOe876[6]]){element[OxOe876[6]]=inp_name[OxOe876[7]];} else {if(element[OxOe876[8]]){element.removeAttribute(OxOe876[8],0);element[OxOe876[6]]=inp_name[OxOe876[7]];} else {element[OxOe876[6]]=inp_name[OxOe876[7]];} ;} ;element[OxOe876[9]]=inp_id[OxOe876[7]];element[OxOe876[10]]=inp_action[OxOe876[7]];element[OxOe876[11]]=sel_Method[OxOe876[7]];try{element[OxOe876[12]]=inp_encode[OxOe876[7]];} catch(e){} ;element[OxOe876[15]]=sel_target[OxOe876[7]];if(element[OxOe876[15]]==OxOe876[14]){element.removeAttribute(OxOe876[15]);} ;if(element[OxOe876[6]]==OxOe876[14]){element.removeAttribute(OxOe876[6]);} ;if(element[OxOe876[10]]==OxOe876[14]){element.removeAttribute(OxOe876[10]);} ;} ;