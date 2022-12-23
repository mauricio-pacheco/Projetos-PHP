class zigo.tweenManager
{
    var updateTime, tweenList, lockedTweens, __set__controllerDepth, __get__controllerDepth, __set__updateInterval, __get__updateInterval;
    function tweenManager()
    {
        var _loc1 = this;
        _loc1.playing = false;
        _loc1.autoStop = false;
        _loc1.broadcastEvents = false;
        _loc1.autoOverwrite = true;
        _loc1.ints = new Array();
        _loc1.lockedTweens = new Object();
        _loc1.tweenList = new Array();
    } // End of the function
    function cleanUp()
    {
        var _loc1 = this;
        if (!(_loc1.tweenList instanceof Array && _loc1.tweenList.length > 0))
        {
            return;
        } // end if
        for (var _loc2 in _loc1.tweenList)
        {
            if (_loc1.tweenList[_loc2].mc._x == undefined)
            {
                _loc1.tweenList.splice(Number(_loc2), 1);
            } // end if
        } // end of for...in
        if (_loc1.tweenList.length == 0)
        {
            _loc1.tweenList = [];
            _loc1.deinit();
        } // end if
        for (var _loc2 in _loc1.ints)
        {
            if (_loc1.ints[_loc2] != undefined && _loc1.ints[_loc2].mc._x == undefined)
            {
                _loc1.removeDelayedTween(Number(_loc2));
            } // end if
        } // end of for...in
    } // End of the function
    function set updateInterval(time)
    {
        var _loc1 = this;
        if (_loc1.playing)
        {
            _loc1.deinit();
            _loc1.updateTime = time;
            _loc1.init();
        }
        else
        {
            _loc1.updateTime = time;
        } // end else if
        //return (_loc1.updateInterval());
    } // End of the function
    function get updateInterval()
    {
        return (this.updateTime);
    } // End of the function
    function set controllerDepth(v)
    {
        var _loc1 = this;
        var _loc2 = v;
        if (_global.isNaN(_loc2) == true)
        {
        }
        else
        {
            if (_loc1.tweenHolder._name != undefined)
            {
                _loc1.tweenHolder.swapDepths(_loc2);
            }
            else
            {
                _loc1._th_depth = _loc2;
            } // end else if
            //return (_loc1.controllerDepth());
        } // end else if
    } // End of the function
    function get controllerDepth()
    {
        return (this._th_depth);
    } // End of the function
    function init()
    {
        var _loc1 = this;
        if (_loc1.updateTime > 0)
        {
            clearInterval(_loc1.updateIntId);
            _loc1.updateIntId = setInterval(_loc1, "update", _loc1.updateTime);
        }
        else
        {
            if (_loc1.tweenHolder._name == undefined)
            {
                _loc1.tweenHolder = _root.createEmptyMovieClip("_th_", _loc1._th_depth);
            } // end if
            var tm = _loc1;
            _loc1.tweenHolder.onEnterFrame = function ()
            {
                tm.update.call(tm);
            };
        } // end else if
        _loc1.playing = true;
        _loc1.now = getTimer();
    } // End of the function
    function deinit()
    {
        var _loc1 = this;
        _loc1.playing = false;
        clearInterval(_loc1.updateIntId);
        delete _loc1.tweenHolder.onEnterFrame;
    } // End of the function
    function update()
    {
        var _loc3 = this;
        var _loc1;
        var i;
        var _loc2;
        var missing = false;
        i = _loc3.tweenList.length;
        if (_loc3.broadcastEvents)
        {
            var ut;
            var et;
            var up;
            var ep;
            ut = {};
            et = {};
            up = {};
            ep = {};
        } // end if
        while (i--)
        {
            _loc1 = _loc3.tweenList[i];
            if (_loc1.mc._x == undefined)
            {
                missing = true;
                continue;
            } // end if
            if (_loc1.pt != -1)
            {
                continue;
            } // end if
            if (_loc1.ts + _loc1.d > _loc3.now)
            {
                if (_loc1.ctm == undefined)
                {
                    _loc1.mc[_loc1.pp] = _loc1.ef(_loc3.now - _loc1.ts, _loc1.ps, _loc1.ch, _loc1.d, _loc1.e1, _loc1.e2);
                }
                else
                {
                    var ttm = {};
                    for (var _loc2 in _loc1.ctm)
                    {
                        ttm[_loc2] = _loc1.ef(_loc3.now - _loc1.ts, _loc1.stm[_loc2], _loc1.ctm[_loc2], _loc1.d, _loc1.e1, _loc1.e2);
                    } // end of for...in
                    _loc1.c.setTransform(ttm);
                } // end else if
                if (_loc3.broadcastEvents)
                {
                    if (ut[targetPath(_loc1.mc)] == undefined)
                    {
                        ut[targetPath(_loc1.mc)] = _loc1.mc;
                    } // end if
                    if (up[targetPath(_loc1.mc)] == undefined)
                    {
                        up[targetPath(_loc1.mc)] = [];
                    } // end if
                    up[targetPath(_loc1.mc)].push(_loc1.ctm != undefined ? ("_ct_") : (_loc1.pp));
                } // end if
                if (_loc1.cb.updfunc != undefined)
                {
                    var f = _loc1.cb.updfunc;
                    if (typeof(f) == "string" && _loc1.cb.updscope != undefined)
                    {
                        f = _loc1.cb.updscope[f];
                    } // end if
                    f.apply(_loc1.cb.updscope, _loc1.cb.updargs);
                } // end if
                continue;
            } // end if
            if (_loc1.ctm == undefined)
            {
                _loc1.mc[_loc1.pp] = _loc1.ps + _loc1.ch;
            }
            else
            {
                var ttm = {};
                for (var _loc2 in _loc1.ctm)
                {
                    ttm[_loc2] = _loc1.stm[_loc2] + _loc1.ctm[_loc2];
                } // end of for...in
                _loc1.c.setTransform(ttm);
            } // end else if
            if (_loc3.broadcastEvents)
            {
                if (ut[targetPath(_loc1.mc)] == undefined)
                {
                    ut[targetPath(_loc1.mc)] = _loc1.mc;
                } // end if
                if (et[targetPath(_loc1.mc)] == undefined)
                {
                    et[targetPath(_loc1.mc)] = _loc1.mc;
                } // end if
                if (up[targetPath(_loc1.mc)] == undefined)
                {
                    up[targetPath(_loc1.mc)] = [];
                } // end if
                up[targetPath(_loc1.mc)].push(_loc1.ctm != undefined ? ("_ct_") : (_loc1.pp));
                if (ep[targetPath(_loc1.mc)] == undefined)
                {
                    ep[targetPath(_loc1.mc)] = [];
                } // end if
                ep[targetPath(_loc1.mc)].push(_loc1.ctm != undefined ? ("_ct_") : (_loc1.pp));
            } // end if
            if (_loc1.cb.updfunc != undefined)
            {
                var f = _loc1.cb.updfunc;
                if (typeof(f) == "string" && _loc1.cb.updscope != undefined)
                {
                    f = _loc1.cb.updscope[f];
                } // end if
                f.updfunc.apply(_loc1.cb.updscope, _loc1.cb.updargs);
            } // end if
            if (endt == undefined)
            {
                var endt = new Array();
            } // end if
            endt.push(i);
        } // end while
        if (missing)
        {
            _loc3.cleanUp();
        } // end if
        for (var _loc2 in ut)
        {
            ut[_loc2].broadcastMessage("onTweenUpdate", {target: ut[_loc2], props: up[_loc2]});
        } // end of for...in
        if (endt != undefined)
        {
            _loc3.endTweens(endt);
        } // end if
        for (var _loc2 in et)
        {
            et[_loc2].broadcastMessage("onTweenEnd", {target: et[_loc2], props: ep[_loc2]});
        } // end of for...in
        _loc3.now = getTimer();
        if (_loc3.updateTime > 0)
        {
            updateAfterEvent();
        } // end if
    } // End of the function
    function endTweens(tid_arr)
    {
        var _loc1;
        var tl;
        var _loc2;
        var cb;
        var j;
        _loc1 = [];
        tl = tid_arr.length;
        for (var _loc2 = 0; _loc2 < tl; ++_loc2)
        {
            cb = this.tweenList[tid_arr[_loc2]].cb;
            if (cb != undefined)
            {
                var exec = true;
                for (var j in _loc1)
                {
                    if (_loc1[j] == cb)
                    {
                        exec = false;
                        break;
                    } // end if
                } // end of for...in
                if (exec)
                {
                    _loc1.push(cb);
                } // end if
            } // end if
            this.tweenList.splice(tid_arr[_loc2], 1);
        } // end of for
        for (var _loc2 = 0; _loc2 < _loc1.length; ++_loc2)
        {
            var _loc3 = _loc1[_loc2].func;
            if (typeof(_loc3) == "string" && _loc1[_loc2].scope != undefined)
            {
                _loc3 = _loc1[_loc2].scope[_loc3];
            } // end if
            _loc3.apply(_loc1[_loc2].scope, _loc1[_loc2].args);
        } // end of for
        if (this.tweenList.length == 0)
        {
            this.deinit();
        } // end if
    } // End of the function
    function removeDelayedTween(index)
    {
        var _loc1 = this;
        clearInterval(_loc1.ints[index].intid);
        _loc1.ints[index] = undefined;
        var _loc2 = true;
        for (var _loc3 in _loc1.ints)
        {
            if (_loc1.ints[_loc3] != undefined)
            {
                _loc2 = false;
                break;
            } // end if
        } // end of for...in
        if (_loc2)
        {
            _loc1.ints = [];
        } // end if
    } // End of the function
    function addTween(mc, props, pEnd, sec, eqFunc, callback, extra1, extra2)
    {
        var _loc3 = this;
        var i;
        var pp;
        var addnew;
        var _loc2;
        var _loc1;
        if (!_loc3.playing)
        {
            _loc3.init();
        } // end if
        var ip = [];
        for (i in props)
        {
            pp = props[i];
            addnew = true;
            if (pp.substr(0, 4) != "_ct_")
            {
                var ch = typeof(pEnd[i]) == "string" ? (Number(pEnd[i])) : (pEnd[i] - mc[pp]);
                if (_loc3.autoOverwrite)
                {
                    for (var _loc2 in _loc3.tweenList)
                    {
                        _loc1 = _loc3.tweenList[_loc2];
                        if (_loc1.mc == mc && _loc1.pp == pp)
                        {
                            _loc1.ps = mc[pp];
                            _loc1.ch = ch;
                            _loc1.ts = _loc3.now;
                            _loc1.d = sec * 1000;
                            _loc1.ef = eqFunc;
                            _loc1.cb = callback;
                            _loc1.e1 = extra1;
                            _loc1.e2 = extra2;
                            _loc1.pt = -1;
                            addnew = false;
                            ip.push(_loc1.pp);
                            break;
                        } // end if
                    } // end of for...in
                } // end if
                if (addnew)
                {
                    _loc3.tweenList.unshift({mc: mc, pp: pp, ps: mc[pp], ch: ch, ts: _loc3.now, d: sec * 1000, ef: eqFunc, cb: callback, e1: extra1, e2: extra2, pt: -1});
                } // end if
                continue;
            } // end if
            var c = new Color(mc);
            var stm = c.getTransform();
            var ctm = {};
            for (var _loc2 in pEnd[i])
            {
                if (pEnd[i][_loc2] != stm[_loc2] && pEnd[i][_loc2] != undefined)
                {
                    ctm[_loc2] = typeof(pEnd[i][_loc2]) == "string" ? (stm[_loc2] + Number(pEnd[i][_loc2])) : (pEnd[i][_loc2] - stm[_loc2]);
                } // end if
            } // end of for...in
            if (_loc3.autoOverwrite)
            {
                for (var _loc2 in _loc3.tweenList)
                {
                    _loc1 = _loc3.tweenList[_loc2];
                    if (_loc1.mc == mc && _loc1.ctm != undefined)
                    {
                        _loc1.c = c;
                        _loc1.stm = stm;
                        (_loc1.ctm = ctm, _loc1.ts = _loc3.now);
                        _loc1.d = sec * 1000;
                        _loc1.ef = eqFunc;
                        _loc1.cb = callback;
                        _loc1.e1 = extra1;
                        _loc1.e2 = extra2;
                        _loc1.pt = -1;
                        addnew = false;
                        ip.push("_ct_");
                        break;
                    } // end if
                } // end of for...in
            } // end if
            if (addnew)
            {
                _loc3.tweenList.unshift({mc: mc, c: c, stm: stm, ctm: ctm, ts: _loc3.now, d: sec * 1000, ef: eqFunc, cb: callback, e1: extra1, e2: extra2, pt: -1});
            } // end if
        } // end of for...in
        if (_loc3.broadcastEvents)
        {
            if (ip.length > 0)
            {
                mc.broadcastMessage("onTweenInterrupt", {target: mc, props: ip});
            } // end if
            mc.broadcastMessage("onTweenStart", {target: mc, props: props});
        } // end if
        if (callback.startfunc != undefined)
        {
            var f = callback.startfunc;
            if (typeof(f) == "string" && callback.startscope != undefined)
            {
                f = callback.startscope[f];
            } // end if
            f.apply(callback.startscope, callback.startargs);
        } // end if
        if (sec == 0)
        {
            _loc3.update();
        } // end if
    } // End of the function
    function addTweenWithDelay(delay, mc, props, pEnd, sec, eqFunc, callback, extra1, extra2)
    {
        var _loc1 = this;
        var il;
        var intid;
        il = _loc1.ints.length;
        intid = setInterval(function (obj)
        {
            obj.removeDelayedTween(il);
            if (mc._x != undefined)
            {
                obj.addTween(mc, props, pEnd, sec, eqFunc, callback, extra1, extra2);
            } // end if
        }, delay * 1000, _loc1);
        _loc1.ints[il] = {mc: mc, props: props, pend: pEnd, intid: intid, st: getTimer(), delay: delay * 1000, args: arguments.slice(1), pt: -1};
        if (!_loc1.playing)
        {
            _loc1.init();
        } // end if
    } // End of the function
    function removeTween(mc, props)
    {
        var _loc2 = mc;
        var _loc3 = this;
        var all;
        var _loc1;
        var j;
        all = false;
        if (props == undefined && _loc3.broadcastEvents != true)
        {
            all = true;
        } // end if
        _loc1 = _loc3.tweenList.length;
        var ip = {};
        while (_loc1--)
        {
            if (_loc3.tweenList[_loc1].mc == _loc2)
            {
                if (all)
                {
                    _loc3.tweenList.splice(_loc1, 1);
                    continue;
                } // end if
                for (j in props)
                {
                    if (_loc3.tweenList[_loc1].pp == props[j])
                    {
                        _loc3.tweenList.splice(_loc1, 1);
                        if (ip[targetPath(_loc2)] == undefined)
                        {
                            ip[targetPath(_loc2)] = {t: _loc2, p: []};
                        } // end if
                        ip[targetPath(_loc2)].p.push(props[j]);
                        continue;
                    } // end if
                    if (props[j] == "_ct_" && _loc3.tweenList[_loc1].ctm != undefined && _loc3.tweenList[_loc1].mc == _loc2)
                    {
                        _loc3.tweenList.splice(_loc1, 1);
                        if (ip[targetPath(_loc2)] == undefined)
                        {
                            ip[targetPath(_loc2)] = {t: _loc2, p: []};
                        } // end if
                        ip[targetPath(_loc2)].p.push("_ct_");
                    } // end if
                } // end of for...in
            } // end if
        } // end while
        _loc1 = _loc3.ints.length;
        while (_loc1--)
        {
            if (_loc3.ints[_loc1].mc == _loc2)
            {
                if (all)
                {
                    _loc3.removeDelayedTween(Number(_loc1));
                    continue;
                } // end if
                for (j in props)
                {
                    for (var k in _loc3.ints[_loc1].props)
                    {
                        if (_loc3.ints[_loc1].props[k] == props[j])
                        {
                            _loc3.ints[_loc1].props.splice(k, 1);
                            _loc3.ints[_loc1].pend.splice(k, 1);
                            if (ip[targetPath(_loc2)] == undefined)
                            {
                                ip[targetPath(_loc2)] = {t: _loc2, p: []};
                            } // end if
                            ip[targetPath(_loc2)].p.push(props[j]);
                        } // end if
                    } // end of for...in
                    if (_loc3.ints[_loc1].props.length == 0)
                    {
                        clearInterval(_loc3.ints[_loc1].intid);
                    } // end if
                } // end of for...in
            } // end if
        } // end while
        if (_loc3.broadcastEvents)
        {
            for (var k in ip)
            {
                if (ip[k].p.length > 0)
                {
                    ip[k].t.broadcastMessage("onTweenInterrupt", {target: ip[k].t, props: ip[k].p});
                } // end if
            } // end of for...in
        } // end if
        if (_loc3.tweenList.length == 0)
        {
            _loc3.deinit();
        } // end if
    } // End of the function
    function isTweening(mc, prop)
    {
        var _loc2 = this;
        var _loc3 = prop;
        var allprops = _loc3 == undefined;
        for (var i in _loc2.tweenList)
        {
            var _loc1 = _loc2.tweenList[i];
            if (_loc2.tweenList[i].mc == mc && _loc2.tweenList[i].pt == -1 && (allprops || _loc3 == _loc1.pp || _loc3 == "_ct_" && _loc1.ctm != undefined))
            {
                return (true);
            } // end if
        } // end of for...in
        return (false);
    } // End of the function
    function getTweens(mc)
    {
        var _loc1 = this;
        var _loc3 = mc;
        var _loc2 = 0;
        for (var i in _loc1.tweenList)
        {
            if (_loc1.tweenList[i].mc == _loc3)
            {
                ++_loc2;
            } // end if
        } // end of for...in
        return (_loc2);
    } // End of the function
    function lockTween(mc, bool)
    {
        this.lockedTweens[targetPath(mc)] = bool;
    } // End of the function
    function isTweenLocked(mc)
    {
        if (this.lockedTweens[targetPath(mc)] == undefined)
        {
            return (false);
        }
        else
        {
            return (this.lockedTweens[targetPath(mc)]);
        } // end else if
    } // End of the function
    function ffTween(mc, propsObj)
    {
        var _loc1 = this;
        var all = mc == undefined;
        var allprops = propsObj == undefined;
        for (var i in _loc1.tweenList)
        {
            var _loc2 = _loc1.tweenList[i];
            if ((_loc2.mc == mc || all) && (allprops || propsObj[_loc2.pp] == true))
            {
                if (_loc2.pt != -1)
                {
                    _loc2.pt = -1;
                } // end if
                _loc2.ts = _loc1.now - _loc2.d;
            } // end if
        } // end of for...in
        for (var i in _loc1.ints)
        {
            if (_loc1.ints[i] != undefined)
            {
                if (_loc1.ints[i].mc == mc || all)
                {
                    if (_loc1.ints[i].mc._x != undefined)
                    {
                        var _loc3 = _loc1.ints[i].args;
                        _loc3[3] = 0;
                        _loc1.addTween.apply(_loc1, _loc3);
                    } // end if
                    _loc1.removeDelayedTween(Number(i));
                } // end if
            } // end if
        } // end of for...in
        _loc1.update();
    } // End of the function
    function rewTween(mc, propsObj)
    {
        var _loc1 = this;
        var _loc3 = mc == undefined;
        var allprops = propsObj == undefined;
        for (var i in _loc1.tweenList)
        {
            var _loc2 = _loc1.tweenList[i];
            if ((_loc2.mc == mc || _loc3) && (allprops || propsObj[_loc2.pp] == true))
            {
                if (_loc2.pt != -1)
                {
                    _loc2.pt = -1;
                } // end if
                _loc2.ts = _loc1.now;
            } // end if
        } // end of for...in
        for (var i in _loc1.ints)
        {
            if (_loc1.ints[i] != undefined)
            {
                if (_loc1.ints[i].mc == mc || _loc3)
                {
                    if (_loc1.ints[i].mc._x != undefined)
                    {
                        _loc1.addTween.apply(_loc1, _loc1.ints[i].args);
                    } // end if
                    _loc1.removeDelayedTween(Number(i));
                } // end if
            } // end if
        } // end of for...in
        _loc1.update();
    } // End of the function
    function isTweenPaused(mc, prop)
    {
        var _loc1 = this;
        var _loc3 = mc;
        if (_loc3 == undefined)
        {
            return (null);
        } // end if
        var allprops = prop == undefined;
        for (var i in _loc1.tweenList)
        {
            var _loc2 = _loc1.tweenList[i];
            if (_loc1.tweenList[i].mc == _loc3 && (allprops || prop == _loc2.pp || prop == "_ct_" && _loc2.ctm != undefined))
            {
                return (Boolean(_loc1.tweenList[i].pt != -1));
            } // end if
        } // end of for...in
        for (var i in _loc1.ints)
        {
            if (_loc1.ints[i] != undefined && _loc1.ints[i].mc == _loc3)
            {
                return (Boolean(_loc1.ints[i].pt != -1));
            } // end if
        } // end of for...in
        return (false);
    } // End of the function
    function pauseTween(mc, propsObj)
    {
        var _loc1 = this;
        var _loc3 = mc == undefined;
        if (_loc3 == false && _loc1.isTweenPaused(mc) == true)
        {
            return;
        } // end if
        var allprops = propsObj == undefined;
        for (var i in _loc1.tweenList)
        {
            var _loc2 = _loc1.tweenList[i];
            if (_loc2.pt == -1 && (_loc2.mc == mc || _loc3) && (allprops || propsObj[_loc2.pp] == true || propsObj._ct_ != undefined && _loc2.ctm != undefined))
            {
                _loc2.pt = _loc1.now;
            } // end if
        } // end of for...in
        for (var i in _loc1.ints)
        {
            if (_loc1.ints[i] != undefined)
            {
                if (_loc1.ints[i].pt == -1 && (_loc1.ints[i].mc == mc || _loc3))
                {
                    _loc1.ints[i].pt = _loc1.now;
                } // end if
            } // end if
        } // end of for...in
    } // End of the function
    function unpauseTween(mc, propsObj)
    {
        var _loc1 = this;
        var all = mc == undefined;
        if (all == false && _loc1.isTweenPaused(mc) === false)
        {
            return;
        } // end if
        var allprops = propsObj == undefined;
        if (!_loc1.playing)
        {
            _loc1.init();
        } // end if
        for (var _loc2 in _loc1.tweenList)
        {
            var _loc3 = _loc1.tweenList[_loc2];
            if (_loc3.pt != -1 && (_loc3.mc == mc || all) && (allprops || propsObj[_loc3.pp] == true) || propsObj._ct_ != undefined && _loc3.ctm != undefined)
            {
                _loc3.ts = _loc1.now - (_loc3.pt - _loc3.ts);
                _loc3.pt = -1;
            } // end if
        } // end of for...in
        for (var _loc2 in _loc1.ints)
        {
            if (_loc1.ints[_loc2] != undefined)
            {
                if (_loc1.ints[_loc2].pt != -1 && (_loc1.ints[_loc2].mc == mc || all))
                {
                    _loc1.ints[_loc2].delay = _loc1.ints[_loc2].delay - (_loc1.ints[_loc2].pt - _loc1.ints[_loc2].st);
                    _loc1.ints[_loc2].st = _loc1.now;
                    _loc1.ints[_loc2].intid = setInterval(function (obj, id)
                    {
                        var _loc1 = obj;
                        var _loc2 = id;
                        _loc1.addTween.apply(_loc1, _loc1.ints[_loc2].args);
                        clearInterval(_loc1.ints[_loc2].intid);
                        _loc1.ints[_loc2] = undefined;
                    }, _loc1.ints[_loc2].delay, _loc1, _loc2);
                } // end if
            } // end if
        } // end of for...in
    } // End of the function
    function pauseAll()
    {
        this.pauseTween();
    } // End of the function
    function unpauseAll()
    {
        this.unpauseTween();
    } // End of the function
    function stopAll()
    {
        var _loc1 = this;
        for (var _loc2 in _loc1.ints)
        {
            _loc1.removeDelayedTween(Number(_loc2));
        } // end of for...in
        _loc1.tweenList = new Array();
        _loc1.deinit();
    } // End of the function
    function toString()
    {
        return ("[AS2 tweenManager 1.2.0]");
    } // End of the function
    var _th_depth = 6789;
} // End of Class
