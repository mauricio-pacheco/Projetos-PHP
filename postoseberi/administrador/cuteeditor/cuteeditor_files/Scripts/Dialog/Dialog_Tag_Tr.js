var OxO7b69=["inp_width","inp_height","sel_align","sel_valign","inp_bgColor","inp_borderColor","inp_borderColorLight","inp_borderColorDark","inp_class","inp_id","inp_tooltip","value","bgColor","backgroundColor","style","","id","borderColor","borderColorLight","borderColorDark","className","width","height","align","vAlign","title","ValidNumber","ValidID","class","valign","onclick"];var inp_width=Window_GetElement(window,OxO7b69[0],true);var inp_height=Window_GetElement(window,OxO7b69[1],true);var sel_align=Window_GetElement(window,OxO7b69[2],true);var sel_valign=Window_GetElement(window,OxO7b69[3],true);var inp_bgColor=Window_GetElement(window,OxO7b69[4],true);var inp_borderColor=Window_GetElement(window,OxO7b69[5],true);var inp_borderColorLight=Window_GetElement(window,OxO7b69[6],true);var inp_borderColorDark=Window_GetElement(window,OxO7b69[7],true);var inp_class=Window_GetElement(window,OxO7b69[8],true);var inp_id=Window_GetElement(window,OxO7b69[9],true);var inp_tooltip=Window_GetElement(window,OxO7b69[10],true);SyncToView=function SyncToView_Tr(){inp_bgColor[OxO7b69[11]]=element.getAttribute(OxO7b69[12])||element[OxO7b69[14]][OxO7b69[13]]||OxO7b69[15];inp_id[OxO7b69[11]]=element.getAttribute(OxO7b69[16])||OxO7b69[15];inp_bgColor[OxO7b69[14]][OxO7b69[13]]=inp_bgColor[OxO7b69[11]];inp_borderColor[OxO7b69[11]]=element.getAttribute(OxO7b69[17])||OxO7b69[15];inp_borderColor[OxO7b69[14]][OxO7b69[13]]=inp_borderColor[OxO7b69[11]];inp_borderColorLight[OxO7b69[11]]=element.getAttribute(OxO7b69[18])||OxO7b69[15];inp_borderColorLight[OxO7b69[14]][OxO7b69[13]]=inp_borderColorLight[OxO7b69[11]];inp_borderColorDark[OxO7b69[11]]=element.getAttribute(OxO7b69[19])||OxO7b69[15];inp_borderColorDark[OxO7b69[14]][OxO7b69[13]]=inp_borderColorDark[OxO7b69[11]];inp_class[OxO7b69[11]]=element[OxO7b69[20]];inp_width[OxO7b69[11]]=element.getAttribute(OxO7b69[21])||element[OxO7b69[14]][OxO7b69[21]]||OxO7b69[15];inp_height[OxO7b69[11]]=element.getAttribute(OxO7b69[22])||element[OxO7b69[14]][OxO7b69[22]]||OxO7b69[15];sel_align[OxO7b69[11]]=element.getAttribute(OxO7b69[23])||OxO7b69[15];sel_valign[OxO7b69[11]]=element.getAttribute(OxO7b69[24])||OxO7b69[15];inp_tooltip[OxO7b69[11]]=element.getAttribute(OxO7b69[25])||OxO7b69[15];} ;SyncTo=function SyncTo_Tr(element){if(inp_bgColor[OxO7b69[11]]){if(element[OxO7b69[14]][OxO7b69[13]]){element[OxO7b69[14]][OxO7b69[13]]=inp_bgColor[OxO7b69[11]];} else {element[OxO7b69[12]]=inp_bgColor[OxO7b69[11]];} ;} else {element.removeAttribute(OxO7b69[12]);} ;element[OxO7b69[17]]=inp_borderColor[OxO7b69[11]];element[OxO7b69[18]]=inp_borderColorLight[OxO7b69[11]];element[OxO7b69[19]]=inp_borderColorDark[OxO7b69[11]];element[OxO7b69[20]]=inp_class[OxO7b69[11]];if(element[OxO7b69[14]][OxO7b69[21]]||element[OxO7b69[14]][OxO7b69[22]]){try{element[OxO7b69[14]][OxO7b69[21]]=inp_width[OxO7b69[11]];element[OxO7b69[14]][OxO7b69[22]]=inp_height[OxO7b69[11]];} catch(er){alert(CE_GetStr(OxO7b69[26]));} ;} else {try{element[OxO7b69[21]]=inp_width[OxO7b69[11]];element[OxO7b69[22]]=inp_height[OxO7b69[11]];} catch(er){alert(CE_GetStr(OxO7b69[26]));} ;} ;var Ox49c=/[^a-z\d]/i;if(Ox49c.test(inp_id.value)){alert(CE_GetStr(OxO7b69[27]));return ;} ;element[OxO7b69[23]]=sel_align[OxO7b69[11]];element[OxO7b69[16]]=inp_id[OxO7b69[11]];element[OxO7b69[24]]=sel_valign[OxO7b69[11]];element[OxO7b69[25]]=inp_tooltip[OxO7b69[11]];if(element[OxO7b69[16]]==OxO7b69[15]){element.removeAttribute(OxO7b69[16]);} ;if(element[OxO7b69[12]]==OxO7b69[15]){element.removeAttribute(OxO7b69[12]);} ;if(element[OxO7b69[17]]==OxO7b69[15]){element.removeAttribute(OxO7b69[17]);} ;if(element[OxO7b69[18]]==OxO7b69[15]){element.removeAttribute(OxO7b69[18]);} ;if(element[OxO7b69[7]]==OxO7b69[15]){element.removeAttribute(OxO7b69[7]);} ;if(element[OxO7b69[20]]==OxO7b69[15]){element.removeAttribute(OxO7b69[20]);} ;if(element[OxO7b69[20]]==OxO7b69[15]){element.removeAttribute(OxO7b69[28]);} ;if(element[OxO7b69[23]]==OxO7b69[15]){element.removeAttribute(OxO7b69[23]);} ;if(element[OxO7b69[24]]==OxO7b69[15]){element.removeAttribute(OxO7b69[29]);} ;if(element[OxO7b69[25]]==OxO7b69[15]){element.removeAttribute(OxO7b69[25]);} ;if(element[OxO7b69[21]]==OxO7b69[15]){element.removeAttribute(OxO7b69[21]);} ;if(element[OxO7b69[22]]==OxO7b69[15]){element.removeAttribute(OxO7b69[22]);} ;} ;inp_borderColor[OxO7b69[30]]=function inp_borderColor_onclick(){SelectColor(inp_borderColor);} ;inp_bgColor[OxO7b69[30]]=function inp_bgColor_onclick(){SelectColor(inp_bgColor);} ;inp_borderColorLight[OxO7b69[30]]=function inp_borderColorLight_onclick(){SelectColor(inp_borderColorLight);} ;inp_borderColorDark[OxO7b69[30]]=function inp_borderColorDark_onclick(){SelectColor(inp_borderColorDark);} ;