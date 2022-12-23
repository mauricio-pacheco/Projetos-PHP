
<title>:::...   R&aacute;dio On Line   ...:::</title>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#000C38">
<script language="JavaScript" type="text/javascript">
<!--
   function PlayClick ()
    {
        document.WMPlay.Play();
    }
	
    function StopClick ()
    {
        numero=1;
        document.WMPlay.Stop();
	if (navigator.appName.indexOf('Netscape') != -1)
            document.WMPlay.SetCurrentPosition(0);
        else
            document.WMPlay.CurrentPosition = 0;
    }

    function UpVolumeClick()
    {
	if (document.WMPlay.Volume <= -300) 
        	document.WMPlay.Volume = document.WMPlay.Volume + 300;
    }

    function DownVolumeClick()
    {
	if ( document.WMPlay.Volume >= -8000) 
        	document.WMPlay.Volume = document.WMPlay.Volume - 300;
    }
	-->
                    </script>
<table width="470" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center"><a onClick="StopClick();" 
            ><img src="stop.jpg" alt="STOP" title="STOP" /></a></td>
        <td align="center">&nbsp;</td>
        <td align="center"><a onClick="PlayClick();" 
            ><img src="play.jpg" alt="PLAY" title="PLAY"  /></a></td>
        <td align="center"><font 
                                class="fontetabela">
          <object id="WMPlay" height="24" width="250" border="0"
            classid="CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95">
            <param name="AutoStart" value="False" />
            <param name="FileName" value="../universalfm.m3u" />
            <param name="TransparentAtStart" value="True" />
            <param name="ShowControls" value="0" />
            <param name="ShowDisplay" value="0" />
            <param name="ShowStatusBar" value="1" />
            <param name="AutoSize" value="0" />
            <embed type="application/x-mplayer2" 
            pluginspage="http://www.microsoft.com/Windows/MediaPlayer/" 
            		src="../universalfm.m3u" 		autostart="1" 
            		width="160" height="140"> </embed>
          </object>
        </font></td>
        <td align="center"><a onClick="DownVolumeClick();" 
            ><img src="menos.jpg" alt="Volume Menos" title="Volume Menos" /></a></td>
        <td align="center"><img src="volume.jpg" /></td>
        <td align="center"><a onClick="UpVolumeClick();" 
            ><img src="mais.jpg" alt="Volume Mais" title="Volume Mais" /></a></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
