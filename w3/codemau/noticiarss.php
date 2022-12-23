<script language="JavaSCript" type="text/javascript"> 
var RSSDoc = new ActiveXObject("Microsoft.XMLHTTP");
RSSDoc.open("GET", "http://www.estado.rs.gov.br/rss/rss.php?id_canal=127", true);
RSSDoc.onreadystatechange = function() {
if (RSSDoc.readyState == 4) {
if (RSSDoc.status == 200) {
var XML_RSS = RSSDoc.responseXML; 
var ItensRSS = XML_RSS.getElementsByTagName("item");
var HTML_new = "";
HTML_new += '<MARQUEE behavior="scroll" align="center" direction="up" height="180" scrollamount="1" scrolldelay="10"'
HTML_new += 'onmouseover=this.stop() onmouseout=this.start()>'
for (var i = 0; i < ItensRSS.length; i++) {
var Title = ItensRSS[i].getElementsByTagName("title")[0].firstChild.nodeValue;
var URL = ItensRSS[i].getElementsByTagName("link")[0].firstChild.nodeValue;
HTML_new += '<a href="' + URL + '" target="_blank">• ' + Title + '</a><br>';
}
document.write(HTML_new);
} else {
alert("Erro no RSS: " + RSSDoc.statusText + " (" + RSSDoc.status + ")");
}
}
} 
RSSDoc.send(null);
</script>
</MARQUEE>