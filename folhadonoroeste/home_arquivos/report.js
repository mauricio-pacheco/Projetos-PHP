if(!window.Msn)window.Msn={};Msn.Report=new function(){var b=this,a=window;this.TrackEvent=function(e,d,f,c,b){if(!b)b="";if(Msn.Linktracking){var h={prop11:e,prop13:d,prop14:f,prop16:b,prop15:a.s.pageName};Msn.Linktracking.TrackReport(c,h)}if(Msn.Gtracking){var g=Msn.Gtracking.CreateReport2(c,e,d,f,b);if(g)Msn.Gtracking.TrackReport(g)}};this.TrackForm=function(a){var b,c=true;if(Msn.Linktracking){b=Msn.Linktracking.CreateReport(a);if(b)c=Msn.Linktracking.TrackReport(a.getAttribute("action"),b)}if(Msn.Gtracking){var d=Msn.Gtracking.CreateReport(a);if(d)c=Msn.Gtracking.TrackReport(d)}return c};return this}