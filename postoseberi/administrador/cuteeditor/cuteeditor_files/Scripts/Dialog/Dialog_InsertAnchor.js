var OxO4680=["nodeName","INPUT","TEXTAREA","BUTTON","IMG","SELECT","TABLE","position","style","absolute","relative","|H1|H2|H3|H4|H5|H6|P|PRE|LI|TD|DIV|BLOCKQUOTE|DT|DD|TABLE|HR|IMG|","|","body","document","allanchors","anchor_name","editor","window","name","value","options","length","anchors","OPTION","text","#","images","className","cetempAnchor","anchorname","","--\x3E"," ","trim","prototype"];function Element_IsBlockControl(element){var name=element[OxO4680[0]];if(name==OxO4680[1]){return true;} ;if(name==OxO4680[2]){return true;} ;if(name==OxO4680[3]){return true;} ;if(name==OxO4680[4]){return true;} ;if(name==OxO4680[5]){return true;} ;if(name==OxO4680[6]){return true;} ;var Ox228=element[OxO4680[8]][OxO4680[7]];if(Ox228==OxO4680[9]||Ox228==OxO4680[10]){return true;} ;return false;} ;function Element_CUtil_IsBlock(Ox495){var Ox496=OxO4680[11];return (Ox495!=null)&&(Ox496.indexOf(OxO4680[12]+Ox495[OxO4680[0]]+OxO4680[12])!=-1);} ;function Window_SelectElement(Ox2c3,element){if(Browser_UseIESelection()){if(Element_IsBlockControl(element)){var Ox258=Ox2c3[OxO4680[14]][OxO4680[13]].createControlRange();Ox258.add(element);Ox258.select();} else {var Ox342=Ox2c3[OxO4680[14]][OxO4680[13]].createTextRange();Ox342.moveToElementText(element);Ox342.select();} ;} else {var Ox342=Ox2c3[OxO4680[14]].createRange();try{Ox342.selectNode(element);} catch(x){Ox342.selectNodeContents(element);} ;var Ox259=Ox2c3.getSelection();Ox259.removeAllRanges();Ox259.addRange(Ox342);} ;} ;var allanchors=Window_GetElement(window,OxO4680[15],true);var anchor_name=Window_GetElement(window,OxO4680[16],true);var obj=Window_GetDialogArguments(window);var editor=obj[OxO4680[17]];var editwin=obj[OxO4680[18]];var editdoc=obj[OxO4680[14]];var name=obj[OxO4680[19]];function insert_link(){var Ox49b=anchor_name[OxO4680[20]];var Ox49c=/[^a-z\d]/i;Ox49b=Ox49b.trim();if(Ox49c.test(Ox49b)){alert(ValidName);} else {Window_SetDialogReturnValue(window,Ox49b);Window_CloseDialog(window);} ;} ;function updateList(){while(allanchors[OxO4680[21]][OxO4680[22]]!=0){allanchors[OxO4680[21]].remove(allanchors.options(0));} ;if(Browser_IsWinIE()){for(var i=0;i<editdoc[OxO4680[23]][OxO4680[22]];i++){var Ox49e=document.createElement(OxO4680[24]);Ox49e[OxO4680[25]]=OxO4680[26]+editdoc[OxO4680[23]][i][OxO4680[19]];Ox49e[OxO4680[20]]=editdoc[OxO4680[23]][i][OxO4680[19]];allanchors[OxO4680[21]].add(Ox49e);} ;} else {var Ox49f=editdoc[OxO4680[27]];if(Ox49f){for(var Ox1e6=0;Ox1e6<Ox49f[OxO4680[22]];Ox1e6++){var img=Ox49f[Ox1e6];if(img[OxO4680[28]]==OxO4680[29]){var Ox49e=document.createElement(OxO4680[24]);Ox49e[OxO4680[25]]=OxO4680[26]+img.getAttribute(OxO4680[30]);Ox49e[OxO4680[20]]=img.getAttribute(OxO4680[30]);allanchors[OxO4680[21]].add(Ox49e);} ;} ;} ;} ;} ;function selectAnchor(Ox4a1){editor.FocusDocument();for(var i=0;i<editdoc[OxO4680[23]][OxO4680[22]];i++){if(editdoc[OxO4680[23]][i][OxO4680[19]]==Ox4a1){anchor_name[OxO4680[20]]=Ox4a1;Window_SelectElement(editwin,editdoc[OxO4680[23]][i]);} ;} ;} ;if(name&&name!=OxO4680[31]){name=name.replace(/[\s]*<!--[\s\S]*?-->[\s]*/g,OxO4680[31]);name=name.replace(OxO4680[32],OxO4680[33]);anchor_name[OxO4680[20]]=name;} ;updateList();String[OxO4680[35]][OxO4680[34]]=function (){return this.replace(/^\s*/,OxO4680[31]).replace(/\s*$/,OxO4680[31]);} ;