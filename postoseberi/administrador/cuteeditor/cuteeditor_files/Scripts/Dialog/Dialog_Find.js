var OxO7ee7=["stringSearch","stringReplace","MatchWholeWord","MatchCase","document","checked","length","value","Nothing to search.\x0APlease enter some text in the field labeled Find what:","selection","body","type","Control","text","Finished Searching the document. Would you like to start again from the top?","","textedit"," : ","Please use replace funtion."];var editwin=Window_GetDialogArguments(window);var stringSearch=Window_GetElement(window,OxO7ee7[0],true);var stringReplace=Window_GetElement(window,OxO7ee7[1],true);var MatchWholeWord=Window_GetElement(window,OxO7ee7[2],true);var MatchCase=Window_GetElement(window,OxO7ee7[3],true);var editdoc=editwin[OxO7ee7[4]];function get_ie_matchtype(){var Ox435=0;var Ox436=0;var Ox437=0;if(MatchCase[OxO7ee7[5]]){Ox436=4;} ;if(MatchWholeWord[OxO7ee7[5]]){Ox437=2;} ;Ox435=Ox436+Ox437;return (Ox435);} ;function checkInputString(){if(stringSearch[OxO7ee7[7]][OxO7ee7[6]]<1){alert(OxO7ee7[8]);return false;} else {return true;} ;} ;function IsMatchSearchValue(Oxb){if(!Oxb){return false;} ;if(stringSearch[OxO7ee7[7]]==Oxb){return true;} ;if(MatchCase[OxO7ee7[5]]){return false;} ;return stringSearch[OxO7ee7[7]].toLowerCase()==Oxb.toLowerCase();} ;var _ie_range=null;function IE_Restore(){editwin.focus();if(_ie_range!=null){_ie_range.select();} ;} ;function IE_Save(){editwin.focus();_ie_range=editdoc[OxO7ee7[9]].createRange();} ;function MoveToBodyStart(){if(Browser_UseIESelection()){range=document[OxO7ee7[10]].createTextRange();range.collapse(true);range.select();IE_Save();} else {editwin.getSelection().collapse(editdoc.body,0);} ;} ;function DoFind(){if(Browser_UseIESelection()){IE_Restore();var Ox259=editdoc[OxO7ee7[9]];if(Ox259[OxO7ee7[11]]==OxO7ee7[12]){MoveToBodyStart();} ;var Ox342=Ox259.createRange();Ox342.collapse(false);if(Ox342.findText(stringSearch.value,1000000000,get_ie_matchtype())){Ox342.select();IE_Save();return true;} ;} else {var Ox342=editwin.getSelection().getRangeAt(0);if(editwin.find(stringSearch.value,MatchCase.checked,false,false,MatchWholeWord.checked,false,false)){return true;} ;} ;} ;function DoReplace(){if(Browser_UseIESelection()){IE_Restore();var Ox259=editdoc[OxO7ee7[9]];if(Ox259[OxO7ee7[11]]!=OxO7ee7[12]){var Ox342=Ox259.createRange();if(IsMatchSearchValue(Ox342.text)){Ox342[OxO7ee7[13]]=stringReplace[OxO7ee7[7]];Ox342.collapse(false);IE_Save();return true;} ;} ;} else {var Ox259=editwin.getSelection();if(IsMatchSearchValue(Ox259.toString())){Ox259.deleteFromDocument();Ox259.getRangeAt(0).insertNode(editdoc.createTextNode(stringReplace.value));Ox259.getRangeAt(0).collapse(false);return true;} ;} ;return false;} ;function FindTxt(){if(!checkInputString()){return false;} ;while(true){if(DoFind()){return ;} ;if(!confirm(OxO7ee7[14])){return ;} ;MoveToBodyStart();} ;} ;function ReplaceTxt(){if(!checkInputString()){return ;} ;DoReplace();FindTxt();} ;function ReplaceAllTxt(){if(!checkInputString()){return ;} ;var Ox443=0;var msg=OxO7ee7[15];MoveToBodyStart();if(Browser_UseIESelection()){var Ox259=editdoc[OxO7ee7[9]];if(Ox259[OxO7ee7[11]]==OxO7ee7[12]){MoveToBodyStart();} ;var Ox444=Ox259.createRange();var Ox443=0;var msg=OxO7ee7[15];Ox444.expand(OxO7ee7[16]);Ox444.collapse();Ox444.select();while(Ox444.findText(stringSearch.value,1000000000,get_ie_matchtype())){Ox444.select();Ox444[OxO7ee7[13]]=stringReplace[OxO7ee7[7]];Ox443++;} ;if(Ox443==0){msg=WordNotFound;} else {msg=WordReplaced+OxO7ee7[17]+Ox443;} ;alert(msg);} else {if((stringReplace[OxO7ee7[7]]).indexOf(stringSearch.value)==-1){DoFind();while(DoReplace()){Ox443++;DoFind();FindTxt();} ;if(Ox443==0){msg=WordNotFound;} else {msg=WordReplaced+OxO7ee7[17]+Ox443;} ;alert(msg);} else {FindTxt();alert(OxO7ee7[18]);} ;} ;} ;