var OxO7518=["_forms","_getWordObject","_wordInputStr","_adjustIndexes","_isWordChar","_lastPos","wordChar","windowType","wordWindow","originalSpellings","suggestions","checkWordBgColor","pink","normWordBgColor","white","text","","textInputs","indexes","resetForm","totalMisspellings","totalWords","totalPreviousWords","getTextVal","setFocus","removeFocus","setText","writeBody","printForHtml","length","value","type","backgroundColor","style","size","document","\x3Cform name=\x22textInput","\x22\x3E","\x3Cdiv class=\x22plainText\x22\x3E","\x3C/div\x3E","\x3C/form\x3E","forms","elements","\x3Cinput readonly ","class=\x22blend\x22 type=\x22text\x22 value=\x22","\x22 size=\x22"];function wordWindow(){this[OxO7518[0]]=[];this[OxO7518[1]]=_getWordObject;this[OxO7518[2]]=_wordInputStr;this[OxO7518[3]]=_adjustIndexes;this[OxO7518[4]]=_isWordChar;this[OxO7518[5]]=_lastPos;this[OxO7518[6]]=/[a-zA-Z]/;this[OxO7518[7]]=OxO7518[8];this[OxO7518[9]]= new Array();this[OxO7518[10]]= new Array();this[OxO7518[11]]=OxO7518[12];this[OxO7518[13]]=OxO7518[14];this[OxO7518[15]]=OxO7518[16];this[OxO7518[17]]= new Array();this[OxO7518[18]]= new Array();this[OxO7518[19]]=resetForm;this[OxO7518[20]]=totalMisspellings;this[OxO7518[21]]=totalWords;this[OxO7518[22]]=totalPreviousWords;this[OxO7518[23]]=getTextVal;this[OxO7518[24]]=setFocus;this[OxO7518[25]]=removeFocus;this[OxO7518[26]]=setText;this[OxO7518[27]]=writeBody;this[OxO7518[28]]=printForHtml;} ;function resetForm(){if(this[OxO7518[0]]){for(var i=0;i<this[OxO7518[0]][OxO7518[29]];i++){this[OxO7518[0]][i].reset();} ;} ;return true;} ;function totalMisspellings(){var Ox21c=0;for(var i=0;i<this[OxO7518[17]][OxO7518[29]];i++){Ox21c+=this.totalWords(i);} ;return Ox21c;} ;function totalWords(Ox21e){return this[OxO7518[9]][Ox21e][OxO7518[29]];} ;function totalPreviousWords(Ox21e,Ox220){var Ox21c=0;for(var i=0;i<=Ox21e;i++){for(var Ox1e6=0;Ox1e6<this.totalWords(i);Ox1e6++){if(i==Ox21e&&Ox1e6==Ox220){break ;} else {Ox21c++;} ;} ;} ;return Ox21c;} ;function getTextVal(Ox21e,Ox220){var Ox222=this._getWordObject(Ox21e,Ox220);if(Ox222){return Ox222[OxO7518[30]];} ;} ;function setFocus(Ox21e,Ox220){var Ox222=this._getWordObject(Ox21e,Ox220);if(Ox222){if(Ox222[OxO7518[31]]==OxO7518[15]){Ox222.focus();Ox222[OxO7518[33]][OxO7518[32]]=this[OxO7518[11]];} ;} ;} ;function removeFocus(Ox21e,Ox220){var Ox222=this._getWordObject(Ox21e,Ox220);if(Ox222){if(Ox222[OxO7518[31]]==OxO7518[15]){Ox222.blur();Ox222[OxO7518[33]][OxO7518[32]]=this[OxO7518[13]];} ;} ;} ;function setText(Ox21e,Ox220,Ox216){var Ox222=this._getWordObject(Ox21e,Ox220);var Ox226;var Ox227;if(Ox222){var Ox228=this[OxO7518[18]][Ox21e][Ox220];var Ox229=Ox222[OxO7518[30]];Ox226=this[OxO7518[17]][Ox21e].substring(0,Ox228);Ox227=this[OxO7518[17]][Ox21e].substring(Ox228+Ox229[OxO7518[29]],this[OxO7518[17]][Ox21e].length);this[OxO7518[17]][Ox21e]=Ox226+Ox216+Ox227;var Ox22a=Ox216[OxO7518[29]]-Ox229[OxO7518[29]];this._adjustIndexes(Ox21e,Ox220,Ox22a);Ox222[OxO7518[34]]=Ox216[OxO7518[29]];Ox222[OxO7518[30]]=Ox216;this.removeFocus(Ox21e,Ox220);} ;} ;function writeBody(){var Ox22c=window[OxO7518[35]];var Ox22d=false;Ox22c.open();for(var Ox22e=0;Ox22e<this[OxO7518[17]][OxO7518[29]];Ox22e++){var Ox22f=0;var Ox230=0;Ox22c.writeln(OxO7518[36]+Ox22e+OxO7518[37]);var Ox231=this[OxO7518[17]][Ox22e];this[OxO7518[18]][Ox22e]=[];if(Ox231){var Ox232=this[OxO7518[9]][Ox22e];if(!Ox232){break ;} ;Ox22c.writeln(OxO7518[38]);for(var i=0;i<Ox232[OxO7518[29]];i++){do{Ox230=Ox231.indexOf(Ox232[i],Ox22f);Ox22f=Ox230+Ox232[i][OxO7518[29]];if(Ox230==-1){break ;} ;var Ox233=Ox231.charAt(Ox230-1);var Ox234=Ox231.charAt(Ox22f);} while(this._isWordChar(Ox233)||this._isWordChar(Ox234));;this[OxO7518[18]][Ox22e][i]=Ox230;for(var Ox1e6=this._lastPos(Ox22e,i);Ox1e6<Ox230;Ox1e6++){Ox22c.write(this.printForHtml(Ox231.charAt(Ox1e6)));} ;Ox22c.write(this._wordInputStr(Ox232[i]));if(i==Ox232[OxO7518[29]]-1){Ox22c.write(printForHtml(Ox231.substr(Ox22f)));} ;} ;Ox22c.writeln(OxO7518[39]);} ;Ox22c.writeln(OxO7518[40]);} ;this[OxO7518[0]]=Ox22c[OxO7518[41]];Ox22c.close();} ;function _lastPos(Ox22e,Ox206){if(Ox206>0){return this[OxO7518[18]][Ox22e][Ox206-1]+this[OxO7518[9]][Ox22e][Ox206-1][OxO7518[29]];} else {return 0;} ;} ;function printForHtml(Ox237){return Ox237;} ;function _isWordChar(Ox239){if(Ox239.search(this.wordChar)==-1){return false;} else {return true;} ;} ;function _getWordObject(Ox21e,Ox220){if(this[OxO7518[0]][Ox21e]){if(this[OxO7518[0]][Ox21e][OxO7518[42]][Ox220]){return this[OxO7518[0]][Ox21e][OxO7518[42]][Ox220];} ;} ;return null;} ;function _wordInputStr(Ox222){var Oxb=OxO7518[43];Oxb+=OxO7518[44]+Ox222+OxO7518[45]+Ox222[OxO7518[29]]+OxO7518[37];return Oxb;} ;function _adjustIndexes(Ox21e,Ox220,Ox22a){for(var i=Ox220+1;i<this[OxO7518[9]][Ox21e][OxO7518[29]];i++){this[OxO7518[18]][Ox21e][i]=this[OxO7518[18]][Ox21e][i]+Ox22a;} ;} ;