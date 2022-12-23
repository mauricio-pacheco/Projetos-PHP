scrollerObjs = {};
scrollerObj.speed = 100;


function scrollerObj(winId, lyrId, cntId) {
  this.id = winId; scrollerObjs[this.id] = this;
  this.animString = "scrollerObjs." + this.id;
  this.load(lyrId, cntId);
}

scrollerObj.loadLayer = function(winId, id, cntId) {
  if ( scrollerObjs[winId] ) scrollerObjs[winId].load(id, cntId);
}

scrollerObj.prototype.load = function(lyrId, cntId) {
  if (!document.getElementById) return;
  var windo, lyr;
  if (this.lyrId) {
    lyr = document.getElementById(this.lyrId);
    lyr.style.visibility = "hidden";
  }
  lyr = document.getElementById(lyrId);
  windo = document.getElementById(this.id);
  lyr.style.top = this.y = 0; lyr.style.left = this.x = 0;
  this.maxY = (lyr.offsetHeight - windo.offsetHeight > 0)? lyr.offsetHeight - windo.offsetHeight: 0;
  this.wd = cntId? document.getElementById(cntId).offsetWidth: lyr.offsetWidth;
  this.maxX = (this.wd - windo.offsetWidth > 0)? this.wd - windo.offsetWidth: 0;
  this.lyrId = lyrId;
  lyr.style.visibility = "visible";
  this.on_load(); this.ready = true;
}

scrollerObj.prototype.on_load = function() {}  

scrollerObj.prototype.shiftTo = function(lyr, x, y) {
  lyr.style.left = (this.x = x) + "px"; 
  lyr.style.top = (this.y = y) + "px";
}

scrollerObj.GeckoTableBugFix = function() {
  var i, windo, holderId, holder, x, y;
	if ( navigator.userAgent.indexOf("Gecko") > -1 && navigator.userAgent.indexOf("Firefox") == -1 ) {
    scrollerObj.hold = [];
    for (i=0; arguments[i]; i++) {
      if ( scrollerObjs[ arguments[i] ] ) {
        windo = document.getElementById( arguments[i] );
        holderId = windo.parentNode.id;
        holder = document.getElementById(holderId);
        document.body.appendChild( holder.removeChild(windo) );
        windo.style.zIndex = 1000;
        x = holder.offsetLeft; y = holder.offsetTop;
        windo.style.left = x + "px"; windo.style.top = y + "px";
        scrollerObj.hold[i] = [ arguments[i], holderId ];
      }
    }
   window.addEventListener("resize", scrollerObj.rePositionGecko, true);
  }
}


scrollerObj.rePositionGecko = function() {
  var i, windo, holder, x, y;
  if (scrollerObj.hold) {
    for (i=0; scrollerObj.hold[i]; i++) {
      windo = document.getElementById( scrollerObj.hold[i][0] );
      holder = document.getElementById( scrollerObj.hold[i][1] );
      x = holder.offsetLeft; y = holder.offsetTop;
      windo.style.left = x + "px"; windo.style.top = y + "px";
    }
  }
}


scrollerObj.stopScroll = function(winId) {
  if ( scrollerObjs[winId] ) scrollerObjs[winId].endScroll();
}


scrollerObj.doubleSpeed = function(winId) {
  if ( scrollerObjs[winId] ) scrollerObjs[winId].speed *= 2;
}

scrollerObj.resetScrollSpeed = function(winId) {
  if ( scrollerObjs[winId] ) scrollerObjs[winId].speed /= 2;
}

scrollerObj.initScroll = function(winId, deg, sp) {
  if ( scrollerObjs[winId] ) {
    var cosine, sine;
    if (typeof deg == "string") {
      switch (deg) {
        case "up"    : deg = 90;  break;
        case "down"  : deg = 270; break;
        case "left"  : deg = 180; break;
        case "right" : deg = 0;   break;
        default: 
          alert("Direction of scroll in mouseover scroll links should be 'up', 'down', 'left', 'right' or number: 0 to 360.");
       }
    } 
    deg = deg % 360;
    if (deg % 90 == 0) {
      cosine = (deg == 0)? -1: (deg == 180)? 1: 0;
      sine = (deg == 90)? 1: (deg == 270)? -1: 0;
    } else {
      var angle = deg * Math.PI/180;
      cosine = -Math.cos(angle); sine = Math.sin(angle);
    }
    scrollerObjs[winId].fx = cosine / ( Math.abs(cosine) + Math.abs(sine) );
    scrollerObjs[winId].fy = sine / ( Math.abs(cosine) + Math.abs(sine) );
    scrollerObjs[winId].endX = (deg == 90 || deg == 270)? scrollerObjs[winId].x:
      (deg < 90 || deg > 270)? -scrollerObjs[winId].maxX: 0; 
    scrollerObjs[winId].endY = (deg == 0 || deg == 180)? scrollerObjs[winId].y: 
      (deg < 180)? 0: -scrollerObjs[winId].maxY;
    scrollerObjs[winId].startScroll(sp);
  }
}

scrollerObj.prototype.startScroll = function(speed) {
  if (!this.ready) return; if (this.timerId) clearInterval(this.timerId);
  this.speed = speed || scrollerObj.speed;
  this.lyr = document.getElementById(this.lyrId);
  this.lastTime = ( new Date() ).getTime();
  this.on_scroll_start();  
  this.timerId = setInterval(this.animString + ".scroll()", 10); 
}

scrollerObj.prototype.scroll = function() {
  var now = ( new Date() ).getTime();
  var d = (now - this.lastTime)/1000 * this.speed;
  if (d > 0) {
    var x = this.x + this.fx * d; var y = this.y + this.fy * d;
    if (this.fx == 0 || this.fy == 0) {
      if ( ( this.fx == -1 && x > -this.maxX ) || ( this.fx == 1 && x < 0 ) || 
        ( this.fy == -1 && y > -this.maxY ) || ( this.fy == 1 && y < 0 ) ) {
        this.lastTime = now;
        this.shiftTo(this.lyr, x, y);
        this.on_scroll(x, y);
      } else {
        clearInterval(this.timerId); this.timerId = 0;
        this.shiftTo(this.lyr, this.endX, this.endY);
        this.on_scroll_end(this.endX, this.endY);
      }
    } else {
      if ( ( this.fx < 0 && x >= -this.maxX && this.fy < 0 && y >= -this.maxY ) ||
        ( this.fx > 0 && x <= 0 && this.fy > 0 && y <= 0 ) ||
        ( this.fx < 0 && x >= -this.maxX && this.fy > 0 && y <= 0 ) ||
        ( this.fx > 0 && x <= 0 && this.fy < 0 && y >= -this.maxY ) ) {
        this.lastTime = now;
        this.shiftTo(this.lyr, x, y);
        this.on_scroll(x, y);
      } else {
        clearInterval(this.timerId); this.timerId = 0;
        this.on_scroll_end(this.x, this.y);
      }
    }
  }
}

scrollerObj.prototype.endScroll = function() {
  if (!this.ready) return;
  if (this.timerId) clearInterval(this.timerId);
  this.timerId = 0;  this.lyr = null;
}

scrollerObj.prototype.on_scroll = function() {}
scrollerObj.prototype.on_scroll_start = function() {}
scrollerObj.prototype.on_scroll_end = function() {}


scrollerObj.slideDur = 500;


scrollerObj.scrollBy = function(winId, x, y, dur) {
  if ( scrollerObjs[winId] ) scrollerObjs[winId].glideBy(x, y, dur);
}

scrollerObj.scrollTo = function(winId, x, y, dur) {
  if ( scrollerObjs[winId] ) scrollerObjs[winId].glideTo(x, y, dur);
}


scrollerObj.prototype.glideBy = function(dx, dy, dur) {
  if ( !document.getElementById || this.sliding ) return;
  this.slideDur = dur || scrollerObj.slideDur;
  this.destX = this.destY = this.distX = this.distY = 0;
  this.lyr = document.getElementById(this.lyrId);
  this.startX = this.x; this.startY = this.y;
  if (dy < 0) this.distY = (this.startY + dy >= -this.maxY)? dy: -(this.startY  + this.maxY);
  else if (dy > 0) this.distY = (this.startY + dy <= 0)? dy: -this.startY;
  if (dx < 0) this.distX = (this.startX + dx >= -this.maxX)? dx: -(this.startX + this.maxX);
  else if (dx > 0) this.distX = (this.startX + dx <= 0)? dx: -this.startX;
  this.destX = this.startX + this.distX; this.destY = this.startY + this.distY;
  this.slideTo(this.destX, this.destY);
}

scrollerObj.prototype.glideTo = function(destX, destY, dur) {
  if ( !document.getElementById || this.sliding) return;
  this.slideDur = dur || scrollerObj.slideDur;
  this.lyr = document.getElementById(this.lyrId); 
  this.startX = this.x; this.startY = this.y;
  this.destX = -Math.max( Math.min(destX, this.maxX), 0);
  this.destY = -Math.max( Math.min(destY, this.maxY), 0);
  this.distY = this.destY - this.startY;
  this.distX =  this.destX - this.startX;
  this.slideTo(this.destX, this.destY);
}

scrollerObj.prototype.slideTo = function(destX, destY) {
  this.per = Math.PI/(2 * this.slideDur); this.sliding = true;
	this.slideStart = (new Date()).getTime();
	this.aniTimer = setInterval(this.animString + ".doSlide()",10);
  this.on_slide_start(this.startX, this.startY);
}

scrollerObj.prototype.doSlide = function() {
	var elapsed = (new Date()).getTime() - this.slideStart;
	if (elapsed < this.slideDur) {
		var x = this.startX + this.distX * Math.sin(this.per*elapsed);
		var y = this.startY + this.distY * Math.sin(this.per*elapsed);
    this.shiftTo(this.lyr, x, y); this.on_slide(x, y);
	} else {	// if time's up
    clearInterval(this.aniTimer); this.sliding = false;
		this.shiftTo(this.lyr, this.destX, this.destY);
    this.lyr = null; this.on_slide_end(this.destX, this.destY);
	}
}

scrollerObj.prototype.on_slide_start = function() {}
scrollerObj.prototype.on_slide = function() {}
scrollerObj.prototype.on_slide_end = function() {}


var dw_slidebar = {
  obj: null,
  slideDur: 500,
  init: function (bar, track, axis, x, y) {
    x = x || 0; y = y || 0;
    bar.style.left = x + "px"; bar.style.top = y + "px";
    bar.axis = axis; track.bar = bar;
    if (axis == "h") {
      bar.trkWd = track.offsetWidth;
      bar.maxX = bar.trkWd - bar.offsetWidth - x; 
      bar.minX = x; bar.maxY = y; bar.minY = y;
    } else {
      bar.trkHt = track.offsetHeight;
      bar.maxY = bar.trkHt - bar.offsetHeight - y; 
      bar.maxX = x; bar.minX = x; bar.minY = y;
    }
    bar.on_drag_start =  bar.on_drag =   bar.on_drag_end = 
    bar.on_slide_start = bar.on_slide =  bar.on_slide_end = function() {}
    bar.onmousedown = this.startDrag; track.onmousedown = this.startSlide;
  },
  
  startSlide: function(e) {
    if ( dw_slidebar.aniTimer ) clearInterval(dw_slidebar.aniTimer);
    e = e? e: window.event;
    var bar = dw_slidebar.obj = this.bar;
    e.offX = (typeof e.layerX != "undefined")? e.layerX: e.offsetX;
    e.offY = (typeof e.layerY != "undefined")? e.layerY: e.offsetY;
    bar.startX = parseInt(bar.style.left); bar.startY = parseInt(bar.style.top);
    if (bar.axis == "v") {
      bar.destX = bar.startX;
      bar.destY = (e.offY < bar.startY)? e.offY: e.offY - bar.offsetHeight;
      bar.destY = Math.min( Math.max(bar.destY, bar.minY), bar.maxY );
    } else {
      bar.destX = (e.offX < bar.startX)? e.offX: e.offX - bar.offsetWidth;
      bar.destX = Math.min( Math.max(bar.destX, bar.minX), bar.maxX );
      bar.destY = bar.startY;
    }
    bar.distX = bar.destX - bar.startX; bar.distY = bar.destY - bar.startY;
    dw_slidebar.per = Math.PI/(2 * dw_slidebar.slideDur);
  	dw_slidebar.slideStart = (new Date()).getTime();
    bar.on_slide_start(bar.startX, bar.startY);
  	dw_slidebar.aniTimer = setInterval("dw_slidebar.doSlide()",10);
  },
  
  doSlide: function() {
    if ( !dw_slidebar.obj ) { clearInterval(dw_slidebar.aniTimer); return; }    
    var bar = dw_slidebar.obj;     
    var elapsed = (new Date()).getTime() - this.slideStart;
  	if (elapsed < this.slideDur) {
  		var x = bar.startX + bar.distX * Math.sin(this.per*elapsed);
  		var y = bar.startY + bar.distY * Math.sin(this.per*elapsed);
      bar.style.left = x + "px"; bar.style.top = y + "px";
      bar.on_slide(x, y);
  	} else {
      clearInterval(this.aniTimer);
      bar.style.left = bar.destX + "px"; bar.style.top = bar.destY + "px";
      bar.on_slide_end(bar.destX, bar.destY);
      this.obj = null;
  	}
  },
  
  startDrag: function (e) {
    e = dw_event.DOMit(e);
    if ( dw_slidebar.aniTimer ) clearInterval(dw_slidebar.aniTimer);
    var bar = dw_slidebar.obj = this;
    bar.downX = e.clientX; bar.downY = e.clientY;
    bar.startX = parseInt(bar.style.left);
    bar.startY = parseInt(bar.style.top);
    bar.on_drag_start(bar.startX, bar.startY);
    dw_event.add( document, "mousemove", dw_slidebar.doDrag, true );
    dw_event.add( document, "mouseup",   dw_slidebar.endDrag,  true );
    e.stopPropagation();
  },

  doDrag: function (e) {
    e = e? e: window.event;
    if (!dw_slidebar.obj) return;
    var bar = dw_slidebar.obj; 
    var nx = bar.startX + e.clientX - bar.downX;
    var ny = bar.startY + e.clientY - bar.downY;
    nx = Math.min( Math.max( bar.minX, nx ), bar.maxX);
    ny = Math.min( Math.max( bar.minY, ny ), bar.maxY);
    bar.style.left = nx + "px"; bar.style.top  = ny + "px";
    bar.on_drag(nx,ny);
    return false;  
  },
  
  endDrag: function () {
    dw_event.remove( document, "mousemove", dw_slidebar.doDrag, true );
    dw_event.remove( document, "mouseup",   dw_slidebar.endDrag,  true );
    if ( !dw_slidebar.obj ) return;
    dw_slidebar.obj.on_drag_end( parseInt(dw_slidebar.obj.style.left), parseInt(dw_slidebar.obj.style.top) );
    dw_slidebar.obj = null;  
  }
  
}

scrollerObj.prototype.bSizeDragBar = true;

scrollerObj.prototype.createScrollbar = function(id, trkId, axis, offx, offy) {
  if (!document.getElementById) return;
  var bar = document.getElementById(id);
  var trk = document.getElementById(trkId);
  dw_slidebar.init(bar, trk, axis, offx, offy);
  bar.win = scrollerObjs[this.id];
  if (axis == "v") this.vBarId = id; else this.hBarId = id;
  if (this.bSizeDragBar) this.setBarSize();
  bar.on_drag_start = bar.on_slide_start = scrollerObj.getwindoLyrRef;
  bar.on_drag_end =   bar.on_slide_end =   scrollerObj.tosswindoLyrRef;
  bar.on_drag =       bar.on_slide =       scrollerObj.UpdatewindoLyrPos;
}

scrollerObj.getwindoLyrRef = function()  { this.winLyr = document.getElementById(this.win.lyrId); }
scrollerObj.tosswindoLyrRef = function() { this.winLyr = null; }

scrollerObj.UpdatewindoLyrPos = function(x, y) {
  var nx, ny;
  if (this.axis == "v") {
    nx = this.win.x;
    ny = -(y - this.minY) * ( this.win.maxY / (this.maxY - this.minY) ) || 0;
  } else {
    ny = this.win.y;
    nx = -(x - this.minX) * ( this.win.maxX / (this.maxX - this.minX) ) || 0;
  }
  this.win.shiftTo(this.winLyr, nx, ny);
}

scrollerObj.prototype.updateScrollbar = function(x, y) {
  var nx, ny;
  if ( this.vBarId ) {
    if (!this.maxY) return;
    ny = -( y * ( (this.vbar.maxY - this.vbar.minY) / this.maxY ) - this.vbar.minY );
    ny = Math.min( Math.max(ny, this.vbar.minY), this.vbar.maxY);  
    nx = parseInt(this.vbar.style.left);
    this.vbar.style.left = nx + "px"; this.vbar.style.top = ny + "px";
  } if ( this.hBarId ) {
    if (!this.maxX) return;
    nx = -( x * ( (this.hbar.maxX - this.hbar.minX) / this.maxX ) - this.hbar.minX );
    nx = Math.min( Math.max(nx, this.hbar.minX), this.hbar.maxX);
    ny = parseInt(this.hbar.style.top);
    this.hbar.style.left = nx + "px"; this.hbar.style.top = ny + "px";
  } 
  
}

scrollerObj.prototype.restoreScrollbars = function() {
  var bar;
  if (this.vBarId) {
    bar = document.getElementById(this.vBarId);
    bar.style.left = bar.minX + "px"; bar.style.top = bar.minY + "px";
  }
  if (this.hBarId) {
    bar = document.getElementById(this.hBarId);
    bar.style.left = bar.minX + "px"; bar.style.top = bar.minY + "px";
  }
}

scrollerObj.prototype.setBarSize = function() {
  var bar;
  var lyr = document.getElementById(this.lyrId);
  var win = document.getElementById(this.id);
  if (this.vBarId) {
    bar = document.getElementById(this.vBarId);
    //bar.style.height = (lyr.offsetHeight > win.offsetHeight)? bar.trkHt / ( lyr.offsetHeight / win.offsetHeight ) + "px": bar.trkHt - 2*bar.minY + "px";
    bar.style.height = (lyr.offsetHeight > win.offsetHeight)? bar.trkHt / ( lyr.offsetHeight / win.offsetHeight ) + "px": bar.trkHt - 2*bar.minY + "px";
	//add by mark to remove the bar if there's no scrolling needed
	bar.style.display = (lyr.offsetHeight > win.offsetHeight)? "inline": "none";
	bar.maxY = bar.trkHt - bar.offsetHeight - bar.minY; 
  }
  if (this.hBarId) {
    bar = document.getElementById(this.hBarId);
    bar.style.width = (this.wd > win.offsetWidth)? bar.trkWd / ( this.wd / win.offsetWidth ) + "px": bar.trkWd - 2*bar.minX + "px";
    bar.maxX = bar.trkWd - bar.offsetWidth - bar.minX; 
  }
}

scrollerObj.prototype.on_load = function() { 
  this.restoreScrollbars();
  if (this.bSizeDragBar) this.setBarSize();
}

scrollerObj.prototype.on_scroll = scrollerObj.prototype.on_slide = function(x,y) { this.updateScrollbar(x,y); }

scrollerObj.prototype.on_scroll_start = scrollerObj.prototype.on_slide_start = function() {
  if ( this.vBarId ) this.vbar = document.getElementById(this.vBarId);
  if ( this.hBarId ) this.hbar = document.getElementById(this.hBarId);
}

scrollerObj.prototype.on_scroll_end = scrollerObj.prototype.on_slide_end = function(x, y) { 
  this.updateScrollbar(x,y);
  this.lyr = null; this.bar = null; 
}

var dw_event = {
  
  add: function(obj, etype, fp, cap) {
    cap = cap || false;
    if (obj.addEventListener) obj.addEventListener(etype, fp, cap);
    else if (obj.attachEvent) obj.attachEvent("on" + etype, fp);
  }, 

  remove: function(obj, etype, fp, cap) {
    cap = cap || false;
    if (obj.removeEventListener) obj.removeEventListener(etype, fp, cap);
    else if (obj.detachEvent) obj.detachEvent("on" + etype, fp);
  }, 

  DOMit: function(e) { 
    e = e? e: window.event;
    e.tgt = e.srcElement? e.srcElement: e.target;
    
    if (!e.preventDefault) e.preventDefault = function () { return false; }
    if (!e.stopPropagation) e.stopPropagation = function () { if (window.event) window.event.cancelBubble = true; }
        
    return e;
  }
  
}

function showStatus(sMsg) {
    window.status = sMsg ;
    return true ;
}