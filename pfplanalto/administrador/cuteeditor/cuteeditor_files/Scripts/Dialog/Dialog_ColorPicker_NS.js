var OxOc819=["onload","onclick","btnCancel","btnOK","onkeyup","txtHSB_Hue","onkeypress","txtHSB_Saturation","txtHSB_Brightness","txtRGB_Red","txtRGB_Green","txtRGB_Blue","txtHex","btnWebSafeColor","rdoHSB_Hue","rdoHSB_Saturation","rdoHSB_Brightness","pnlGradient_Top","onmousemove","onmousedown","onmouseup","pnlVertical_Top","pnlWebSafeColor","pnlWebSafeColorBorder","pnlOldColor","lblHSB_Hue","lblHSB_Saturation","lblHSB_Brightness","length","\x5C{","\x5C}","BadNumber","A number between {0} and {1} is required. Closest value inserted.","Title","Color Picker","SelectAColor","Select a color:","OKButton","OK","CancelButton","Cancel","AboutButton","About","Recent","WebSafeWarning","Warning: not a web safe color","WebSafeClick","Click to select web safe color","HsbHue","H:","HsbHueTooltip","Hue","HsbHueUnit","%","HsbSaturation","S:","HsbSaturationTooltip","Saturation","HsbSaturationUnit","HsbBrightness","B:","HsbBrightnessTooltip","Brightness","HsbBrightnessUnit","RgbRed","R:","RgbRedTooltip","Red","RgbGreen","G:","RgbGreenTooltip","Green","RgbBlue","RgbBlueTooltip","Blue","Hex","#","RecentTooltip","Recent:","\x0D\x0ALewies Color Pickerversion 1.1\x0D\x0A\x0D\x0AThis form was created by Lewis Moten in May of 2004.\x0D\x0AIt simulates the color picker in a popular graphics application.\x0D\x0AIt gives users a visual way to choose colors from a large and dynamic palette.\x0D\x0A\x0D\x0AVisit the authors web page?\x0D\x0Awww.lewismoten.com\x0D\x0A","lblSelectColorMessage","lblRecent","lblRGB_Red","lblRGB_Green","lblRGB_Blue","lblHex","lblUnitHSB_Hue","lblUnitHSB_Saturation","lblUnitHSB_Brightness","pnlHSB_Hue","pnlHSB_Saturation","pnlHSB_Brightness","pnlRGB_Red","pnlRGB_Green","pnlRGB_Blue","frmColorPicker","Color","","FFFFFF","value","checked","ColorMode","ColorType","RecentColors","pnlRecent","border","style","0px","http://www.lewismoten.com","_blank","backgroundColor","target","rgb","(",")",",","display","none","title","innerHTML","backgroundPosition","px ","px","pnlGradientHsbHue_Hue","pnlGradientHsbHue_Black","pnlGradientHsbHue_White","pnlVerticalHsbHue_Background","pnlVerticalHsbSaturation_Hue","pnlVerticalHsbSaturation_White","pnlVerticalHsbBrightness_Hue","pnlVerticalHsbBrightness_Black","pnlVerticalRgb_Start","pnlVerticalRgb_End","pnlGradientRgb_Base","pnlGradientRgb_Invert","pnlGradientRgb_Overlay1","pnlGradientRgb_Overlay2","src","imgGradient","../Images/cpns_ColorSpace1.png","../Images/cpns_ColorSpace2.png","../Images/cpns_Vertical1.png","#000000","../Images/cpns_Vertical2.png","#ffffff","01234567879","which","abcdef","01234567879ABCDEF","opener","pnlGradientPosition","pnlNewColor","0123456789ABCDEFabcdef","000000","0","id","top","pnlVerticalPosition","backgroundImage","url(../Images/cpns_GradientPositionDark.gif)","url(../Images/cpns_GradientPositionLight.gif)","cancelBubble","pageX","pageY","className","GradientNormal","GradientFullScreen","_isverdown","=","; path=/;"," expires=",";","cookie","search","location","\x26","00336699CCFF","0x","do_select","frm","__cphex"];var POSITIONADJUSTX=22;var POSITIONADJUSTY=52;var POSITIONADJUSTZ=48;var ColorMode=1;var GradientPositionDark= new Boolean(false);var frm= new Object();var msg= new Object();var _xmlDocs= new Array();var _xmlIndex=-1;var _xml=null;LoadLanguage();window[OxOc819[0]]=window_load;function initialize(){frm[OxOc819[2]][OxOc819[1]]=btnCancel_Click;frm[OxOc819[3]][OxOc819[1]]=btnOK_Click;frm[OxOc819[5]][OxOc819[4]]=Hsb_Changed;frm[OxOc819[5]][OxOc819[6]]=validateNumber;frm[OxOc819[7]][OxOc819[4]]=Hsb_Changed;frm[OxOc819[7]][OxOc819[6]]=validateNumber;frm[OxOc819[8]][OxOc819[4]]=Hsb_Changed;frm[OxOc819[8]][OxOc819[6]]=validateNumber;frm[OxOc819[9]][OxOc819[4]]=Rgb_Changed;frm[OxOc819[9]][OxOc819[6]]=validateNumber;frm[OxOc819[10]][OxOc819[4]]=Rgb_Changed;frm[OxOc819[10]][OxOc819[6]]=validateNumber;frm[OxOc819[11]][OxOc819[4]]=Rgb_Changed;frm[OxOc819[11]][OxOc819[6]]=validateNumber;frm[OxOc819[12]][OxOc819[4]]=Hex_Changed;frm[OxOc819[12]][OxOc819[6]]=validateHex;frm[OxOc819[13]][OxOc819[1]]=btnWebSafeColor_Click;frm[OxOc819[14]][OxOc819[1]]=rdoHsb_Hue_Click;frm[OxOc819[15]][OxOc819[1]]=rdoHsb_Saturation_Click;frm[OxOc819[16]][OxOc819[1]]=rdoHsb_Brightness_Click;document.getElementById(OxOc819[17])[OxOc819[1]]=pnlGradient_Top_Click;document.getElementById(OxOc819[17])[OxOc819[18]]=pnlGradient_Top_MouseMove;document.getElementById(OxOc819[17])[OxOc819[19]]=pnlGradient_Top_MouseDown;document.getElementById(OxOc819[17])[OxOc819[20]]=pnlGradient_Top_MouseUp;document.getElementById(OxOc819[21])[OxOc819[1]]=pnlVertical_Top_Click;document.getElementById(OxOc819[21])[OxOc819[18]]=pnlVertical_Top_MouseMove;document.getElementById(OxOc819[21])[OxOc819[19]]=pnlVertical_Top_MouseDown;document.getElementById(OxOc819[21])[OxOc819[20]]=pnlVertical_Top_MouseUp;document.getElementById(OxOc819[22])[OxOc819[1]]=btnWebSafeColor_Click;document.getElementById(OxOc819[23])[OxOc819[1]]=btnWebSafeColor_Click;document.getElementById(OxOc819[24])[OxOc819[1]]=pnlOldClick_Click;document.getElementById(OxOc819[25])[OxOc819[1]]=rdoHsb_Hue_Click;document.getElementById(OxOc819[26])[OxOc819[1]]=rdoHsb_Saturation_Click;document.getElementById(OxOc819[27])[OxOc819[1]]=rdoHsb_Brightness_Click;frm[OxOc819[5]].focus();window.focus();} ;function formatString(Ox3d3){Ox3d3= new String(Ox3d3);for(var i=1;i<arguments[OxOc819[28]];i++){Ox3d3=Ox3d3.replace( new RegExp(OxOc819[29]+(i-1)+OxOc819[30]),arguments[i]);} ;return Ox3d3;} ;function AddValue(Ox3d5,Ox243){Ox243= new String(Ox243).toLowerCase();for(var i=0;i<Ox3d5[OxOc819[28]];i++){if(Ox3d5[i]==Ox243){return ;} ;} ;Ox3d5[Ox3d5[OxOc819[28]]]=Ox243;} ;function SniffLanguage(Oxd){} ;function LoadNextLanguage(){} ;function LoadLanguage(){msg[OxOc819[31]]=OxOc819[32];msg[OxOc819[33]]=OxOc819[34];msg[OxOc819[35]]=OxOc819[36];msg[OxOc819[37]]=OxOc819[38];msg[OxOc819[39]]=OxOc819[40];msg[OxOc819[41]]=OxOc819[42];msg[OxOc819[43]]=OxOc819[43];msg[OxOc819[44]]=OxOc819[45];msg[OxOc819[46]]=OxOc819[47];msg[OxOc819[48]]=OxOc819[49];msg[OxOc819[50]]=OxOc819[51];msg[OxOc819[52]]=OxOc819[53];msg[OxOc819[54]]=OxOc819[55];msg[OxOc819[56]]=OxOc819[57];msg[OxOc819[58]]=OxOc819[53];msg[OxOc819[59]]=OxOc819[60];msg[OxOc819[61]]=OxOc819[62];msg[OxOc819[63]]=OxOc819[53];msg[OxOc819[64]]=OxOc819[65];msg[OxOc819[66]]=OxOc819[67];msg[OxOc819[68]]=OxOc819[69];msg[OxOc819[70]]=OxOc819[71];msg[OxOc819[72]]=OxOc819[60];msg[OxOc819[73]]=OxOc819[74];msg[OxOc819[75]]=OxOc819[76];msg[OxOc819[77]]=OxOc819[78];msg[OxOc819[42]]=OxOc819[79];} ;function AssignLanguage(){} ;function localize(){SetHTML(document.getElementById(OxOc819[80]),msg.SelectAColor,document.getElementById(OxOc819[81]),msg.Recent,document.getElementById(OxOc819[25]),msg.HsbHue,document.getElementById(OxOc819[26]),msg.HsbSaturation,document.getElementById(OxOc819[27]),msg.HsbBrightness,document.getElementById(OxOc819[82]),msg.RgbRed,document.getElementById(OxOc819[83]),msg.RgbGreen,document.getElementById(OxOc819[84]),msg.RgbBlue,document.getElementById(OxOc819[85]),msg.Hex,document.getElementById(OxOc819[86]),msg.HsbHueUnit,document.getElementById(OxOc819[87]),msg.HsbSaturationUnit,document.getElementById(OxOc819[88]),msg.HsbBrightnessUnit);SetValue(frm.btnCancel,msg.CancelButton,frm.btnOK,msg.OKButton,frm.btnAbout,msg.AboutButton);SetTitle(frm.btnWebSafeColor,msg.WebSafeWarning,document.getElementById(OxOc819[22]),msg.WebSafeClick,document.getElementById(OxOc819[89]),msg.HsbHueTooltip,document.getElementById(OxOc819[90]),msg.HsbSaturationTooltip,document.getElementById(OxOc819[91]),msg.HsbBrightnessTooltip,document.getElementById(OxOc819[92]),msg.RgbRedTooltip,document.getElementById(OxOc819[93]),msg.RgbGreenTooltip,document.getElementById(OxOc819[94]),msg.RgbBlueTooltip);} ;function window_load(Ox272){frm=document.getElementById(OxOc819[95]);localize();initialize();var Ox255=GetQuery(OxOc819[96]).toUpperCase();if(Ox255==OxOc819[97]){Ox255=OxOc819[98];} ;if(Ox255[OxOc819[28]]==7){Ox255=Ox255.substr(1,6);} ;frm[OxOc819[12]][OxOc819[99]]=Ox255;Hex_Changed(Ox272);Ox255=Form_Get_Hex();SetBg(document.getElementById(OxOc819[24]),Ox255);frm[OxOc819[102]][ new Number(GetCookie(OxOc819[101])||0)][OxOc819[100]]=true;ColorMode_Changed(Ox272);var Ox3c8=GetCookie(OxOc819[103])||OxOc819[97];var Ox3da=msg[OxOc819[77]];for(var i=1;i<33;i++){if(Ox3c8[OxOc819[28]]/6>=i){Ox255=Ox3c8.substr((i-1)*6,6);var Ox3db=HexToRgb(Ox255);var title=formatString(msg.RecentTooltip,Ox255,Ox3db[0],Ox3db[1],Ox3db[2]);SetBg(document.getElementById(OxOc819[104]+i),Ox255);SetTitle(document.getElementById(OxOc819[104]+i),title);document.getElementById(OxOc819[104]+i)[OxOc819[1]]=pnlRecent_Click;} else {document.getElementById(OxOc819[104]+i)[OxOc819[106]][OxOc819[105]]=OxOc819[107];} ;} ;} ;function btnAbout_Click(){if(confirm(msg.About)){window.open(OxOc819[108],OxOc819[109]);} ;} ;function pnlRecent_Click(Ox272){var Ox250=Ox272[OxOc819[111]][OxOc819[106]][OxOc819[110]];if(Ox250.indexOf(OxOc819[112])!=-1){var Ox3db= new Array();Ox250=Ox250.substr(Ox250.indexOf(OxOc819[113])+1);Ox250=Ox250.substr(0,Ox250.indexOf(OxOc819[114]));Ox3db[0]= new Number(Ox250.substr(0,Ox250.indexOf(OxOc819[115])));Ox250=Ox250.substr(Ox250.indexOf(OxOc819[115])+1);Ox3db[1]= new Number(Ox250.substr(0,Ox250.indexOf(OxOc819[115])));Ox3db[2]= new Number(Ox250.substr(Ox250.indexOf(OxOc819[115])+1));Ox250=RgbToHex(Ox3db);} else {Ox250=Ox250.substr(1,6).toUpperCase();} ;frm[OxOc819[12]][OxOc819[99]]=Ox250;Hex_Changed(Ox272);} ;function pnlOldClick_Click(Ox272){frm[OxOc819[12]][OxOc819[99]]=document.getElementById(OxOc819[24])[OxOc819[106]][OxOc819[110]].substr(1,6).toUpperCase();Hex_Changed(Ox272);} ;function rdoHsb_Hue_Click(Ox272){frm[OxOc819[14]][OxOc819[100]]=true;ColorMode_Changed(Ox272);} ;function rdoHsb_Saturation_Click(Ox272){frm[OxOc819[15]][OxOc819[100]]=true;ColorMode_Changed(Ox272);} ;function rdoHsb_Brightness_Click(Ox272){frm[OxOc819[16]][OxOc819[100]]=true;ColorMode_Changed(Ox272);} ;function Hide(){for(var i=0;i<arguments[OxOc819[28]];i++){if(arguments[i]){arguments[i][OxOc819[106]][OxOc819[116]]=OxOc819[117];} ;} ;} ;function Show(){for(var i=0;i<arguments[OxOc819[28]];i++){if(arguments[i]){arguments[i][OxOc819[106]][OxOc819[116]]=OxOc819[97];} ;} ;} ;function SetValue(){for(var i=0;i<arguments[OxOc819[28]];i+=2){arguments[i][OxOc819[99]]=arguments[i+1];} ;} ;function SetTitle(){for(var i=0;i<arguments[OxOc819[28]];i+=2){arguments[i][OxOc819[118]]=arguments[i+1];} ;} ;function SetHTML(){for(var i=0;i<arguments[OxOc819[28]];i+=2){arguments[i][OxOc819[119]]=arguments[i+1];} ;} ;function SetBg(){for(var i=0;i<arguments[OxOc819[28]];i+=2){if(arguments[i]){arguments[i][OxOc819[106]][OxOc819[110]]=OxOc819[76]+arguments[i+1];} ;} ;} ;function SetBgPosition(){for(var i=0;i<arguments[OxOc819[28]];i+=3){arguments[i][OxOc819[106]][OxOc819[120]]=arguments[i+1]+OxOc819[121]+arguments[i+2]+OxOc819[122];} ;} ;function ColorMode_Changed(Ox272){for(var i=0;i<3;i++){if(frm[OxOc819[102]][i][OxOc819[100]]){ColorMode=i;} ;} ;SetCookie(OxOc819[101],ColorMode,60*60*24*365);Hide(document.getElementById(OxOc819[123]),document.getElementById(OxOc819[124]),document.getElementById(OxOc819[125]),document.getElementById(OxOc819[126]),document.getElementById(OxOc819[127]),document.getElementById(OxOc819[128]),document.getElementById(OxOc819[129]),document.getElementById(OxOc819[130]),document.getElementById(OxOc819[131]),document.getElementById(OxOc819[132]),document.getElementById(OxOc819[133]),document.getElementById(OxOc819[134]),document.getElementById(OxOc819[135]),document.getElementById(OxOc819[136]));switch(ColorMode){case 0:document.getElementById(OxOc819[138])[OxOc819[137]]=OxOc819[139];Show(document.getElementById(OxOc819[123]),document.getElementById(OxOc819[124]),document.getElementById(OxOc819[125]),document.getElementById(OxOc819[126]));Hsb_Changed(Ox272);break ;;case 1:document.getElementById(OxOc819[138])[OxOc819[137]]=OxOc819[140];document.getElementById(OxOc819[127])[OxOc819[137]]=OxOc819[141];Show(document.getElementById(OxOc819[123]),document.getElementById(OxOc819[127]));document.getElementById(OxOc819[123])[OxOc819[106]][OxOc819[110]]=OxOc819[142];Hsb_Changed(Ox272);break ;;case 2:document.getElementById(OxOc819[138])[OxOc819[137]]=OxOc819[140];document.getElementById(OxOc819[127])[OxOc819[137]]=OxOc819[143];Show(document.getElementById(OxOc819[123]),document.getElementById(OxOc819[127]));document.getElementById(OxOc819[123])[OxOc819[106]][OxOc819[110]]=OxOc819[144];Hsb_Changed(Ox272);break ;;default:break ;;} ;} ;function btnWebSafeColor_Click(Ox272){var Ox3db=HexToRgb(frm[OxOc819[12]].value);Ox3db=RgbToWebSafeRgb(Ox3db);frm[OxOc819[12]][OxOc819[99]]=RgbToHex(Ox3db);Hex_Changed(Ox272);} ;function checkWebSafe(){var Ox3db=Form_Get_Rgb();if(RgbIsWebSafe(Ox3db)){Hide(frm.btnWebSafeColor,document.getElementById(OxOc819[22]),document.getElementById(OxOc819[23]));} else {Ox3db=RgbToWebSafeRgb(Ox3db);SetBg(document.getElementById(OxOc819[22]),RgbToHex(Ox3db));Show(frm.btnWebSafeColor,document.getElementById(OxOc819[22]),document.getElementById(OxOc819[23]));} ;} ;function validateNumber(Ox272){var Ox3f0=String.fromCharCode(Ox272.which);if(IgnoreKey(Ox272)){return ;} ;if(OxOc819[145].indexOf(Ox3f0)!=-1){return ;} ;Ox272[OxOc819[146]]=0;} ;function validateHex(Ox272){if(IgnoreKey(Ox272)){return ;} ;var Ox3f0=String.fromCharCode(Ox272.which);if(OxOc819[147].indexOf(Ox3f0)!=-1){return ;} ;if(OxOc819[148].indexOf(Ox3f0)!=-1){return ;} ;} ;function IgnoreKey(Ox272){var Ox3f0=String.fromCharCode(Ox272.which);var Ox3f3= new Array(0,8,9,13,27);if(Ox3f0==null){return true;} ;for(var i=0;i<5;i++){if(Ox272[OxOc819[146]]==Ox3f3[i]){return true;} ;} ;return false;} ;function btnCancel_Click(){if(window[OxOc819[149]]){window[OxOc819[149]].focus();} ;top.close();} ;function btnOK_Click(){var Ox255= new String(frm[OxOc819[12]].value);if(window[OxOc819[149]]){try{window[OxOc819[149]].ColorPicker_Picked(Ox255);} catch(e){} ;window[OxOc819[149]].focus();} ;recent=GetCookie(OxOc819[103])||OxOc819[97];for(var i=0;i<recent[OxOc819[28]];i+=6){if(recent.substr(i,6)==Ox255){recent=recent.substr(0,i)+recent.substr(i+6);i-=6;} ;} ;if(recent[OxOc819[28]]>31*6){recent=recent.substr(0,31*6);} ;recent=frm[OxOc819[12]][OxOc819[99]]+recent;SetCookie(OxOc819[103],recent,60*60*24*365);top.close();} ;function SetGradientPosition(Ox272,Ox321,Ox2f1){Ox321=Ox321-POSITIONADJUSTX+5;Ox2f1=Ox2f1-POSITIONADJUSTY+5;Ox321-=7;Ox2f1-=27;Ox321=Ox321<0?0:Ox321>255?255:Ox321;Ox2f1=Ox2f1<0?0:Ox2f1>255?255:Ox2f1;SetBgPosition(document.getElementById(OxOc819[150]),Ox321-5,Ox2f1-5);switch(ColorMode){case 0:var Ox3f7= new Array(0,0,0);Ox3f7[1]=Ox321/255;Ox3f7[2]=1-(Ox2f1/255);frm[OxOc819[7]][OxOc819[99]]=Math.round(Ox3f7[1]*100);frm[OxOc819[8]][OxOc819[99]]=Math.round(Ox3f7[2]*100);Hsb_Changed(Ox272);break ;;case 1:var Ox3f7= new Array(0,0,0);Ox3f7[0]=Ox321/255;Ox3f7[2]=1-(Ox2f1/255);frm[OxOc819[5]][OxOc819[99]]=Ox3f7[0]==1?0:Math.round(Ox3f7[0]*360);frm[OxOc819[8]][OxOc819[99]]=Math.round(Ox3f7[2]*100);Hsb_Changed(Ox272);break ;;case 2:var Ox3f7= new Array(0,0,0);Ox3f7[0]=Ox321/255;Ox3f7[1]=1-(Ox2f1/255);frm[OxOc819[5]][OxOc819[99]]=Ox3f7[0]==1?0:Math.round(Ox3f7[0]*360);frm[OxOc819[7]][OxOc819[99]]=Math.round(Ox3f7[1]*100);Hsb_Changed(Ox272);break ;;} ;} ;function Hex_Changed(Ox272){var Ox255=Form_Get_Hex();var Ox3db=HexToRgb(Ox255);var Ox3f7=RgbToHsb(Ox3db);Form_Set_Rgb(Ox3db);Form_Set_Hsb(Ox3f7);SetBg(document.getElementById(OxOc819[151]),Ox255);SetupCursors(Ox272);SetupGradients();checkWebSafe();} ;function Rgb_Changed(Ox272){var Ox3db=Form_Get_Rgb();var Ox3f7=RgbToHsb(Ox3db);var Ox255=RgbToHex(Ox3db);Form_Set_Hsb(Ox3f7);Form_Set_Hex(Ox255);SetBg(document.getElementById(OxOc819[151]),Ox255);SetupCursors(Ox272);SetupGradients();checkWebSafe();} ;function Hsb_Changed(Ox272){var Ox3f7=Form_Get_Hsb();var Ox3db=HsbToRgb(Ox3f7);var Ox255=RgbToHex(Ox3db);Form_Set_Rgb(Ox3db);Form_Set_Hex(Ox255);SetBg(document.getElementById(OxOc819[151]),Ox255);SetupCursors(Ox272);SetupGradients();checkWebSafe();} ;function Form_Set_Hex(Ox255){frm[OxOc819[12]][OxOc819[99]]=Ox255;} ;function Form_Get_Hex(){var Ox255= new String(frm[OxOc819[12]].value);for(var i=0;i<Ox255[OxOc819[28]];i++){if(OxOc819[152].indexOf(Ox255.substr(i,1))==-1){Ox255=OxOc819[153];frm[OxOc819[12]][OxOc819[99]]=Ox255;alert(formatString(msg.BadNumber,OxOc819[153],OxOc819[98]));break ;} ;} ;while(Ox255[OxOc819[28]]<6){Ox255=OxOc819[154]+Ox255;} ;return Ox255;} ;function Form_Get_Hsb(){var Ox3f7= new Array(0,0,0);Ox3f7[0]= new Number(frm[OxOc819[5]].value)/360;Ox3f7[1]= new Number(frm[OxOc819[7]].value)/100;Ox3f7[2]= new Number(frm[OxOc819[8]].value)/100;if(Ox3f7[0]>1||isNaN(Ox3f7[0])){Ox3f7[0]=1;frm[OxOc819[5]][OxOc819[99]]=360;alert(formatString(msg.BadNumber,0,360));} ;if(Ox3f7[1]>1||isNaN(Ox3f7[1])){Ox3f7[1]=1;frm[OxOc819[7]][OxOc819[99]]=100;alert(formatString(msg.BadNumber,0,100));} ;if(Ox3f7[2]>1||isNaN(Ox3f7[2])){Ox3f7[2]=1;frm[OxOc819[8]][OxOc819[99]]=100;alert(formatString(msg.BadNumber,0,100));} ;return Ox3f7;} ;function Form_Set_Hsb(Ox3f7){SetValue(frm.txtHSB_Hue,Math.round(Ox3f7[0]*360),frm.txtHSB_Saturation,Math.round(Ox3f7[1]*100),frm.txtHSB_Brightness,Math.round(Ox3f7[2]*100));} ;function Form_Get_Rgb(){var Ox3db= new Array(0,0,0);Ox3db[0]= new Number(frm[OxOc819[9]].value);Ox3db[1]= new Number(frm[OxOc819[10]].value);Ox3db[2]= new Number(frm[OxOc819[11]].value);if(Ox3db[0]>255||isNaN(Ox3db[0])||Ox3db[0]!=Math.round(Ox3db[0])){Ox3db[0]=255;frm[OxOc819[9]][OxOc819[99]]=255;alert(formatString(msg.BadNumber,0,255));} ;if(Ox3db[1]>255||isNaN(Ox3db[1])||Ox3db[1]!=Math.round(Ox3db[1])){Ox3db[1]=255;frm[OxOc819[10]][OxOc819[99]]=255;alert(formatString(msg.BadNumber,0,255));} ;if(Ox3db[2]>255||isNaN(Ox3db[2])||Ox3db[2]!=Math.round(Ox3db[2])){Ox3db[2]=255;frm[OxOc819[11]][OxOc819[99]]=255;alert(formatString(msg.BadNumber,0,255));} ;return Ox3db;} ;function Form_Set_Rgb(Ox3db){frm[OxOc819[9]][OxOc819[99]]=Ox3db[0];frm[OxOc819[10]][OxOc819[99]]=Ox3db[1];frm[OxOc819[11]][OxOc819[99]]=Ox3db[2];} ;function SetupCursors(Ox272){var Ox3f7=Form_Get_Hsb();var Ox3db=Form_Get_Rgb();if(RgbToYuv(Ox3db)[0]>=0.5){SetGradientPositionDark();} else {SetGradientPositionLight();} ;if(Ox272[OxOc819[111]]!=null){if(Ox272[OxOc819[111]][OxOc819[155]]==OxOc819[17]){return ;} ;if(Ox272[OxOc819[111]][OxOc819[155]]==OxOc819[21]){return ;} ;} ;var Ox321;var Ox2f1;var Ox402;if(ColorMode>=0&&ColorMode<=2){for(var i=0;i<3;i++){Ox3f7[i]*=255;} ;} ;switch(ColorMode){case 0:Ox321=Ox3f7[1];Ox2f1=Ox3f7[2];Ox402=Ox3f7[0]==0?1:Ox3f7[0];break ;;case 1:Ox321=Ox3f7[0]==0?1:Ox3f7[0];Ox2f1=Ox3f7[2];Ox402=Ox3f7[1];break ;;case 2:Ox321=Ox3f7[0]==0?1:Ox3f7[0];Ox2f1=Ox3f7[1];Ox402=Ox3f7[2];break ;;} ;Ox2f1=255-Ox2f1;Ox402=255-Ox402;SetBgPosition(document.getElementById(OxOc819[150]),Ox321-5,Ox2f1-5);document.getElementById(OxOc819[157])[OxOc819[106]][OxOc819[156]]=(Ox402+27)+OxOc819[122];} ;function SetupGradients(){var Ox3f7=Form_Get_Hsb();var Ox3db=Form_Get_Rgb();switch(ColorMode){case 0:SetBg(document.getElementById(OxOc819[123]),RgbToHex(HueToRgb(Ox3f7[0])));break ;;case 1:SetBg(document.getElementById(OxOc819[127]),RgbToHex(HsbToRgb( new Array(Ox3f7[0],1,Ox3f7[2]))));break ;;case 2:SetBg(document.getElementById(OxOc819[127]),RgbToHex(HsbToRgb( new Array(Ox3f7[0],Ox3f7[1],1))));break ;;default:;} ;} ;function SetGradientPositionDark(){if(GradientPositionDark){return ;} ;GradientPositionDark=true;document.getElementById(OxOc819[150])[OxOc819[106]][OxOc819[158]]=OxOc819[159];} ;function SetGradientPositionLight(){if(!GradientPositionDark){return ;} ;GradientPositionDark=false;document.getElementById(OxOc819[150])[OxOc819[106]][OxOc819[158]]=OxOc819[160];} ;function pnlGradient_Top_Click(Ox272){Ox272[OxOc819[161]]=true;SetGradientPosition(Ox272,Ox272[OxOc819[162]]-5,Ox272[OxOc819[163]]-5);document.getElementById(OxOc819[17])[OxOc819[164]]=OxOc819[165];_down=false;} ;var _down=false;function pnlGradient_Top_MouseMove(Ox272){Ox272[OxOc819[161]]=true;if(!_down){return ;} ;SetGradientPosition(Ox272,Ox272[OxOc819[162]]-5,Ox272[OxOc819[163]]-5);} ;function pnlGradient_Top_MouseDown(Ox272){Ox272[OxOc819[161]]=true;_down=true;SetGradientPosition(Ox272,Ox272[OxOc819[162]]-5,Ox272[OxOc819[163]]-5);document.getElementById(OxOc819[17])[OxOc819[164]]=OxOc819[166];} ;function pnlGradient_Top_MouseUp(Ox272){_down=false;Ox272[OxOc819[161]]=true;SetGradientPosition(Ox272,Ox272[OxOc819[162]]-5,Ox272[OxOc819[163]]-5);document.getElementById(OxOc819[17])[OxOc819[164]]=OxOc819[165];} ;function Document_MouseUp(){e[OxOc819[161]]=true;document.getElementById(OxOc819[17])[OxOc819[164]]=OxOc819[165];} ;function SetVerticalPosition(Ox272,Ox402){var Ox402=Ox402-POSITIONADJUSTZ;if(Ox402<27){Ox402=27;} ;if(Ox402>282){Ox402=282;} ;document.getElementById(OxOc819[157])[OxOc819[106]][OxOc819[156]]=Ox402+OxOc819[122];Ox402=1-((Ox402-27)/255);switch(ColorMode){case 0:if(Ox402==1){Ox402=0;} ;frm[OxOc819[5]][OxOc819[99]]=Math.round(Ox402*360);Hsb_Changed(Ox272);break ;;case 1:frm[OxOc819[7]][OxOc819[99]]=Math.round(Ox402*100);Hsb_Changed(Ox272);break ;;case 2:frm[OxOc819[8]][OxOc819[99]]=Math.round(Ox402*100);Hsb_Changed(Ox272);break ;;} ;} ;function pnlVertical_Top_Click(Ox272){SetVerticalPosition(Ox272,Ox272[OxOc819[163]]-5);Ox272[OxOc819[161]]=true;} ;function pnlVertical_Top_MouseMove(Ox272){if(!window[OxOc819[167]]){return ;} ;if(Ox272[OxOc819[146]]!=1){return ;} ;SetVerticalPosition(Ox272,Ox272[OxOc819[163]]-5);Ox272[OxOc819[161]]=true;} ;function pnlVertical_Top_MouseDown(Ox272){window[OxOc819[167]]=true;SetVerticalPosition(Ox272,Ox272[OxOc819[163]]-5);Ox272[OxOc819[161]]=true;} ;function pnlVertical_Top_MouseUp(Ox272){window[OxOc819[167]]=false;SetVerticalPosition(Ox272,Ox272[OxOc819[163]]-5);Ox272[OxOc819[161]]=true;} ;function SetCookie(name,Ox243,Ox244){var Ox245=name+OxOc819[168]+escape(Ox243)+OxOc819[169];if(Ox244){var Ox22c= new Date();Ox22c.setSeconds(Ox22c.getSeconds()+Ox244);Ox245+=OxOc819[170]+Ox22c.toUTCString()+OxOc819[171];} ;document[OxOc819[172]]=Ox245;} ;function GetCookie(name){var Ox247=document[OxOc819[172]].split(OxOc819[171]);for(var i=0;i<Ox247[OxOc819[28]];i++){var Ox248=Ox247[i].split(OxOc819[168]);if(name==Ox248[0].replace(/\s/g,OxOc819[97])){return unescape(Ox248[1]);} ;} ;} ;function GetCookieDictionary(){var Ox24a={};var Ox247=document[OxOc819[172]].split(OxOc819[171]);for(var i=0;i<Ox247[OxOc819[28]];i++){var Ox248=Ox247[i].split(OxOc819[168]);Ox24a[Ox248[0].replace(/\s/g,OxOc819[97])]=unescape(Ox248[1]);} ;return Ox24a;} ;function GetQuery(name){var i=0;while(window[OxOc819[174]][OxOc819[173]].indexOf(name+OxOc819[168],i)!=-1){var Ox243=window[OxOc819[174]][OxOc819[173]].substr(window[OxOc819[174]][OxOc819[173]].indexOf(name+OxOc819[168],i));Ox243=Ox243.substr(name[OxOc819[28]]+1);if(Ox243.indexOf(OxOc819[175])!=-1){if(Ox243.indexOf(OxOc819[175])==0){Ox243=OxOc819[97];} else {Ox243=Ox243.substr(0,Ox243.indexOf(OxOc819[175]));} ;} ;return unescape(Ox243);} ;return OxOc819[97];} ;function RgbIsWebSafe(Ox3db){var Ox255=RgbToHex(Ox3db);for(var i=0;i<3;i++){if(OxOc819[176].indexOf(Ox255.substr(i*2,2))==-1){return false;} ;} ;return true;} ;function RgbToWebSafeRgb(Ox3db){var Ox412= new Array(Ox3db[0],Ox3db[1],Ox3db[2]);if(RgbIsWebSafe(Ox3db)){return Ox412;} ;var Ox413= new Array(0x00,0x33,0x66,0x99,0xCC,0xFF);for(var i=0;i<3;i++){for(var Ox1e6=1;Ox1e6<6;Ox1e6++){if(Ox412[i]>Ox413[Ox1e6-1]&&Ox412[i]<Ox413[Ox1e6]){if(Ox412[i]-Ox413[Ox1e6-1]>Ox413[Ox1e6]-Ox412[i]){Ox412[i]=Ox413[Ox1e6];} else {Ox412[i]=Ox413[Ox1e6-1];} ;break ;} ;} ;} ;return Ox412;} ;function RgbToYuv(Ox3db){var Ox415= new Array();Ox415[0]=(Ox3db[0]*0.299+Ox3db[1]*0.587+Ox3db[2]*0.114)/255;Ox415[1]=(Ox3db[0]*-0.169+Ox3db[1]*-0.332+Ox3db[2]*0.500+128)/255;Ox415[2]=(Ox3db[0]*0.500+Ox3db[1]*-0.419+Ox3db[2]*-0.0813+128)/255;return Ox415;} ;function RgbToHsb(Ox3db){var Ox417= new Array(Ox3db[0],Ox3db[1],Ox3db[2]);var Ox418= new Number(1);var Ox419= new Number(0);var Ox41a= new Number(1);var Ox3f7= new Array(0,0,0);var Ox41b= new Array();for(var i=0;i<3;i++){Ox417[i]=Ox3db[i]/255;if(Ox417[i]<Ox418){Ox418=Ox417[i];} ;if(Ox417[i]>Ox419){Ox419=Ox417[i];} ;} ;Ox41a=Ox419-Ox418;Ox3f7[2]=Ox419;if(Ox41a==0){return Ox3f7;} ;Ox3f7[1]=Ox41a/Ox419;for(var i=0;i<3;i++){Ox41b[i]=(((Ox419-Ox417[i])/6)+(Ox41a/2))/Ox41a;} ;if(Ox417[0]==Ox419){Ox3f7[0]=Ox41b[2]-Ox41b[1];} else {if(Ox417[1]==Ox419){Ox3f7[0]=(1/3)+Ox41b[0]-Ox41b[2];} else {if(Ox417[2]==Ox419){Ox3f7[0]=(2/3)+Ox41b[1]-Ox41b[0];} ;} ;} ;if(Ox3f7[0]<0){Ox3f7[0]+=1;} else {if(Ox3f7[0]>1){Ox3f7[0]-=1;} ;} ;return Ox3f7;} ;function HsbToRgb(Ox3f7){var Ox3db=HueToRgb(Ox3f7[0]);var Ox1ee=Ox3f7[2]*255;for(var i=0;i<3;i++){Ox3db[i]=Ox3db[i]*Ox3f7[2];Ox3db[i]=((Ox3db[i]-Ox1ee)*Ox3f7[1])+Ox1ee;Ox3db[i]=Math.round(Ox3db[i]);} ;return Ox3db;} ;function RgbToHex(Ox3db){var Ox255= new String();for(var i=0;i<3;i++){Ox3db[2-i]=Math.round(Ox3db[2-i]);Ox255=Ox3db[2-i].toString(16)+Ox255;if(Ox255[OxOc819[28]]%2==1){Ox255=OxOc819[154]+Ox255;} ;} ;return Ox255.toUpperCase();} ;function HexToRgb(Ox255){var Ox3db= new Array();for(var i=0;i<3;i++){Ox3db[i]= new Number(OxOc819[177]+Ox255.substr(i*2,2));} ;return Ox3db;} ;function HueToRgb(Ox420){var Ox421=Ox420*360;var Ox3db= new Array(0,0,0);var Ox422=(Ox421%60)/60;if(Ox421<60){Ox3db[0]=255;Ox3db[1]=Ox422*255;} else {if(Ox421<120){Ox3db[1]=255;Ox3db[0]=(1-Ox422)*255;} else {if(Ox421<180){Ox3db[1]=255;Ox3db[2]=Ox422*255;} else {if(Ox421<240){Ox3db[2]=255;Ox3db[1]=(1-Ox422)*255;} else {if(Ox421<300){Ox3db[2]=255;Ox3db[0]=Ox422*255;} else {if(Ox421<360){Ox3db[0]=255;Ox3db[2]=(1-Ox422)*255;} ;} ;} ;} ;} ;} ;return Ox3db;} ;function CheckHexSelect(){if(window[OxOc819[178]]&&window[OxOc819[179]]&&frm[OxOc819[12]]){var Ox250=OxOc819[76]+frm[OxOc819[12]][OxOc819[99]];if(Ox250[OxOc819[28]]==7){if(window[OxOc819[180]]!=Ox250){window[OxOc819[180]]=Ox250;window.do_select(Ox250);} ;} ;} ;} ;setInterval(CheckHexSelect,10);