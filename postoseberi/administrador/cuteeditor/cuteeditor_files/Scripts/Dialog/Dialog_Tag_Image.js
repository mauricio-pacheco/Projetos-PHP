var OxOaed0=["inp_src","btnbrowse","AlternateText","inp_id","longDesc","Align","optNotSet","optLeft","optRight","optTexttop","optAbsMiddle","optBaseline","optAbsBottom","optBottom","optMiddle","optTop","Border","bordercolor","bordercolor_Preview","inp_width","imgLock","inp_height","constrain_prop","HSpace","VSpace","outer","img_demo","onclick","src","width","height","value","cssText","style","","src_cetemp","id","vspace","hspace","border","borderColor"," ","backgroundColor","align","alt","ValidNumber","ValidID","longdesc","checked","../Images/locked.gif","../Images/1x1.gif","length"];var inp_src=Window_GetElement(window,OxOaed0[0],true);var btnbrowse=Window_GetElement(window,OxOaed0[1],true);var AlternateText=Window_GetElement(window,OxOaed0[2],true);var inp_id=Window_GetElement(window,OxOaed0[3],true);var longDesc=Window_GetElement(window,OxOaed0[4],true);var Align=Window_GetElement(window,OxOaed0[5],true);var optNotSet=Window_GetElement(window,OxOaed0[6],true);var optLeft=Window_GetElement(window,OxOaed0[7],true);var optRight=Window_GetElement(window,OxOaed0[8],true);var optTexttop=Window_GetElement(window,OxOaed0[9],true);var optAbsMiddle=Window_GetElement(window,OxOaed0[10],true);var optBaseline=Window_GetElement(window,OxOaed0[11],true);var optAbsBottom=Window_GetElement(window,OxOaed0[12],true);var optBottom=Window_GetElement(window,OxOaed0[13],true);var optMiddle=Window_GetElement(window,OxOaed0[14],true);var optTop=Window_GetElement(window,OxOaed0[15],true);var Border=Window_GetElement(window,OxOaed0[16],true);var bordercolor=Window_GetElement(window,OxOaed0[17],true);var bordercolor_Preview=Window_GetElement(window,OxOaed0[18],true);var inp_width=Window_GetElement(window,OxOaed0[19],true);var imgLock=Window_GetElement(window,OxOaed0[20],true);var inp_height=Window_GetElement(window,OxOaed0[21],true);var constrain_prop=Window_GetElement(window,OxOaed0[22],true);var HSpace=Window_GetElement(window,OxOaed0[23],true);var VSpace=Window_GetElement(window,OxOaed0[24],true);var outer=Window_GetElement(window,OxOaed0[25],true);var img_demo=Window_GetElement(window,OxOaed0[26],true);btnbrowse[OxOaed0[27]]=function btnbrowse_onclick(){function Ox481(Ox260){if(Ox260){function Actualsize(){var Ox50a= new Image();Ox50a[OxOaed0[28]]=Ox260;if(Ox50a[OxOaed0[29]]>0&&Ox50a[OxOaed0[30]]>0){inp_width[OxOaed0[31]]=Ox50a[OxOaed0[29]];inp_height[OxOaed0[31]]=Ox50a[OxOaed0[30]];FireUIChanged();} else {setTimeout(Actualsize,400);} ;} ;inp_src[OxOaed0[31]]=Ox260;setTimeout(Actualsize,400);} ;} ;editor.SetNextDialogWindow(window);if(Browser_IsSafari()){editor.ShowSelectImageDialog(Ox481,inp_src.value,inp_src);} else {editor.ShowSelectImageDialog(Ox481,inp_src.value);} ;} ;UpdateState=function UpdateState_Image(){img_demo[OxOaed0[33]][OxOaed0[32]]=element[OxOaed0[33]][OxOaed0[32]];if(Browser_IsWinIE()){img_demo.mergeAttributes(element);} ;if(element[OxOaed0[28]]){img_demo[OxOaed0[28]]=element[OxOaed0[28]];} else {img_demo.removeAttribute(OxOaed0[28]);} ;} ;SyncToView=function SyncToView_Image(){var src;src=element.getAttribute(OxOaed0[28])+OxOaed0[34];if(element.getAttribute(OxOaed0[35])){src=element.getAttribute(OxOaed0[35])+OxOaed0[34];} ;inp_src[OxOaed0[31]]=src;inp_width[OxOaed0[31]]=element[OxOaed0[29]];inp_height[OxOaed0[31]]=element[OxOaed0[30]];inp_id[OxOaed0[31]]=element[OxOaed0[36]];if(element[OxOaed0[37]]<=0){VSpace[OxOaed0[31]]=OxOaed0[34];} else {VSpace[OxOaed0[31]]=element[OxOaed0[37]];} ;if(element[OxOaed0[38]]<=0){HSpace[OxOaed0[31]]=OxOaed0[34];} else {HSpace[OxOaed0[31]]=element[OxOaed0[38]];} ;Border[OxOaed0[31]]=element[OxOaed0[39]];if(Browser_IsWinIE()){bordercolor[OxOaed0[31]]=element[OxOaed0[33]][OxOaed0[40]];} else {var arr=revertColor(element[OxOaed0[33]].borderColor).split(OxOaed0[41]);bordercolor[OxOaed0[31]]=arr[0];} ;bordercolor[OxOaed0[33]][OxOaed0[42]]=bordercolor[OxOaed0[31]]||OxOaed0[34];bordercolor[OxOaed0[33]][OxOaed0[42]]=bordercolor[OxOaed0[31]];bordercolor_Preview[OxOaed0[33]][OxOaed0[42]]=bordercolor[OxOaed0[31]];Align[OxOaed0[31]]=element[OxOaed0[43]];AlternateText[OxOaed0[31]]=element[OxOaed0[44]];longDesc[OxOaed0[31]]=element[OxOaed0[4]];} ;SyncTo=function SyncTo_Image(element){element[OxOaed0[28]]=inp_src[OxOaed0[31]];element.setAttribute(OxOaed0[35],inp_src.value);element[OxOaed0[39]]=Border[OxOaed0[31]];element[OxOaed0[38]]=HSpace[OxOaed0[31]];element[OxOaed0[37]]=VSpace[OxOaed0[31]];try{element[OxOaed0[29]]=inp_width[OxOaed0[31]];element[OxOaed0[30]]=inp_height[OxOaed0[31]];} catch(er){alert(CE_GetStr(OxOaed0[45]));return false;} ;if(element[OxOaed0[33]][OxOaed0[29]]||element[OxOaed0[33]][OxOaed0[30]]){try{element[OxOaed0[33]][OxOaed0[29]]=inp_width[OxOaed0[31]];element[OxOaed0[33]][OxOaed0[30]]=inp_height[OxOaed0[31]];} catch(er){alert(CE_GetStr(OxOaed0[45]));return false;} ;} ;var Ox49c=/[^a-z\d]/i;if(Ox49c.test(inp_id.value)){alert(CE_GetStr(OxOaed0[46]));return ;} ;element[OxOaed0[36]]=inp_id[OxOaed0[31]];element[OxOaed0[43]]=Align[OxOaed0[31]];element[OxOaed0[44]]=AlternateText[OxOaed0[31]];element[OxOaed0[4]]=longDesc[OxOaed0[31]];element[OxOaed0[33]][OxOaed0[40]]=bordercolor[OxOaed0[31]];if(element[OxOaed0[47]]==OxOaed0[34]||element[OxOaed0[47]]==null){element.removeAttribute(OxOaed0[47]);} ;if(element[OxOaed0[4]]==OxOaed0[34]||element[OxOaed0[4]]==null){element.removeAttribute(OxOaed0[4]);} ;if(element[OxOaed0[29]]==0){element.removeAttribute(OxOaed0[29]);} ;if(element[OxOaed0[30]]==0){element.removeAttribute(OxOaed0[30]);} ;if(element[OxOaed0[38]]==OxOaed0[34]){element.removeAttribute(OxOaed0[38]);} ;if(element[OxOaed0[37]]==OxOaed0[34]){element.removeAttribute(OxOaed0[37]);} ;if(element[OxOaed0[36]]==OxOaed0[34]){element.removeAttribute(OxOaed0[36]);} ;if(element[OxOaed0[43]]==OxOaed0[34]){element.removeAttribute(OxOaed0[43]);} ;if(element[OxOaed0[39]]==OxOaed0[34]){element.removeAttribute(OxOaed0[39]);} ;} ;function toggleConstrains(){if(constrain_prop[OxOaed0[48]]){imgLock[OxOaed0[28]]=OxOaed0[49];checkConstrains(OxOaed0[29]);} else {imgLock[OxOaed0[28]]=OxOaed0[50];} ;} ;var checkingConstrains=false;function checkConstrains(Ox523){if(checkingConstrains){return ;} ;checkingConstrains=true;try{var Ox2b8,Ox45e;if(constrain_prop[OxOaed0[48]]){var Ox50a= new Image();Ox50a[OxOaed0[28]]=inp_src[OxOaed0[31]];var Ox524=Ox50a[OxOaed0[29]];var Ox525=Ox50a[OxOaed0[30]];if((Ox524>0)&&(Ox525>0)){var Ox26c=inp_width[OxOaed0[31]];var Ox487=inp_height[OxOaed0[31]];if(Ox523==OxOaed0[29]){if(Ox26c[OxOaed0[51]]==0||isNaN(Ox26c)){inp_width[OxOaed0[31]]=OxOaed0[34];inp_height[OxOaed0[31]]=OxOaed0[34];} else {Ox487=parseInt(Ox26c*Ox525/Ox524);inp_height[OxOaed0[31]]=Ox487;} ;} ;if(Ox523==OxOaed0[30]){if(Ox487[OxOaed0[51]]==0||isNaN(Ox487)){inp_width[OxOaed0[31]]=OxOaed0[34];inp_height[OxOaed0[31]]=OxOaed0[34];} else {Ox26c=parseInt(Ox487*Ox524/Ox525);inp_width[OxOaed0[31]]=Ox26c;} ;} ;} ;} ;} finally{checkingConstrains=false;} ;} ;bordercolor[OxOaed0[27]]=bordercolor_Preview[OxOaed0[27]]=function bordercolor_onclick(){SelectColor(bordercolor,bordercolor_Preview);} ;