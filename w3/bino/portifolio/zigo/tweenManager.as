class zigo.tweenManager
{
    var playing, autoStop, broadcastEvents, autoOverwrite, ints, lockedTweens, tweenList, tweenHolder, now;
    function tweenManager()
    {
        playing = false;
        autoStop = false;
        broadcastEvents = false;
        autoOverwrite = true;
        ints = new Array();
        lockedTweens = new Object();
        tweenList = new Array();
        tweenHolder = _root.createEmptyMovieClip("_th_", 6789);
    } // End of the function
    function init()
    {
        if (tweenHolder._name == undefined)
        {
            tweenHolder = _root.createEmptyMovieClip("_th_", 6789);
        } // end if
        tweenHolder.onEnterFrame = function ()
        {
            _global.$tweenManager.update.call(_global.$tweenManager);
        };
        playing = true;
        now = getTimer();
    } // End of the function
    function deinit()
    {
        playing = false;
        delete tweenHolder.onEnterFrame;
    } // End of the function
    function update()
    {
        var _loc2;
        var _loc7;
        var _loc3;
        _loc7 = tweenList.length;
        if (broadcastEvents)
        {
            var _loc4;
            var _loc6;
            _loc4 = {};
            _loc6 = {};
        } // end if
        while (_loc7--)
        {
            _loc2 = tweenList[_loc7];
            if (_loc2.ts + _loc2.d > now)
            {
                if (_loc2.ctm == undefined)
                {
                    _loc2.mc[_loc2.pp] = _loc2.ef(now - _loc2.ts, _loc2.ps, _loc2.ch, _loc2.d, _loc2.e1, _loc2.e2);
                }
                else
                {
                    var _loc5 = {};
                    for (var _loc3 in _loc2.ctm)
                    {
                        _loc5[_loc3] = _loc2.ef(now - _loc2.ts, _loc2.stm[_loc3], _loc2.ctm[_loc3], _loc2.d, _loc2.e1, _loc2.e2);
                    } // end of for...in
                    _loc2.c.setTransform(_loc5);
                } // end else if
                if (broadcastEvents)
                {
                    if (_loc4[targetPath(_loc2.mc)] == undefined)
                    {
                        _loc4[targetPath(_loc2.mc)] = _loc2.mc;
                    } // end if
                } // end if
                if (_loc2.cb.updfunc != undefined)
                {
                    _loc2.cb.updfunc.apply(_loc2.cb.updscope, _loc2.cb.updargs);
                } // end if
                continue;
            } // end if
            if (_loc2.ctm == undefined)
            {
                _loc2.mc[_loc2.pp] = _loc2.ps + _loc2.ch;
            }
            else
            {
                _loc5 = {};
                for (var _loc3 in _loc2.ctm)
                {
                    _loc5[_loc3] = _loc2.stm[_loc3] + _loc2.ctm[_loc3];
                } // end of for...in
                _loc2.c.setTransform(_loc5);
            } // end else if
            if (broadcastEvents)
            {
                if (_loc4[targetPath(_loc2.mc)] == undefined)
                {
                    _loc4[targetPath(_loc2.mc)] = _loc2.mc;
                } // end if
                if (_loc6[targetPath(_loc2.mc)] == undefined)
                {
                    _loc6[targetPath(_loc2.mc)] = _loc2.mc;
                } // end if
            } // end if
            if (_loc2.cb.updfunc != undefined)
            {
                _loc2.cb.updfunc.apply(_loc2.cb.updscope, _loc2.cb.updargs);
            } // end if
            if (endt == undefined)
            {
                var endt = new Array();
            } // end if
            endt.push(_loc7);
        } // end while
        for (var _loc3 in _loc4)
        {
            _loc4[_loc3].broadcastMessage("onTweenUpdate");
        } // end of for...in
        if (endt != undefined)
        {
            this.endTweens(endt);
        } // end if
        for (var _loc3 in _loc6)
        {
            _loc6[_loc3].broadcastMessage("onTweenEnd");
        } // end of for...in
        now = getTimer();
    } // End of the function
    function endTweens(tid_arr)
    {
        var _loc2;
        var _loc8;
        var _loc3;
        var _loc4;
        var _loc7;
        _loc2 = [];
        _loc8 = tid_arr.length;
        for (var _loc3 = 0; _loc3 < _loc8; ++_loc3)
        {
            _loc4 = tweenList[tid_arr[_loc3]].cb;
            if (_loc4 != undefined)
            {
                var _loc5 = true;
                for (var _loc7 in _loc2)
                {
                    if (_loc2[_loc7] == _loc4)
                    {
                        _loc5 = false;
                        break;
                    } // end if
                } // end of for...in
                if (_loc5)
                {
                    _loc2.push(_loc4);
                } // end if
            } // end if
            tweenList.splice(tid_arr[_loc3], 1);
        } // end of for
        for (var _loc3 = 0; _loc3 < _loc2.length; ++_loc3)
        {
            _loc2[_loc3].func.apply(_loc2[_loc3].scope, _loc2[_loc3].args);
        } // end of for
        if (tweenList.length == 0)
        {
            this.deinit();
        } // end if
    } // End of the function
    function addTween(mc, props, pEnd, sec, eqFunc, callback, extra1, extra2)
    {
        var _loc4;
        var _loc12;
        var _loc6;
        var _loc3;
        var _loc2;
        if (!playing)
        {
            this.init();
        } // end if
        for (var _loc4 in props)
        {
            _loc12 = props[_loc4];
            _loc6 = true;
            if (_loc12.substr(0, 4) != "_ct_")
            {
                if (autoOverwrite)
                {
                    for (var _loc3 in tweenList)
                    {
                        _loc2 = tweenList[_loc3];
                        if (_loc2.mc == mc && _loc2.pp == _loc12)
                        {
                            _loc2.ps = mc[_loc12];
                            _loc2.ch = pEnd[_loc4] - mc[_loc12];
                            _loc2.ts = now;
                            _loc2.d = sec * 1000;
                            _loc2.ef = eqFunc;
                            _loc2.cb = callback;
                            _loc2.e1 = extra1;
                            _loc2.e2 = extra2;
                            _loc6 = false;
                            break;
                        } // end if
                    } // end of for...in
                } // end if
                if (_loc6)
                {
                    tweenList.unshift({mc: mc, pp: _loc12, ps: mc[_loc12], ch: pEnd[_loc4] - mc[_loc12], ts: now, d: sec * 1000, ef: eqFunc, cb: callback, e1: extra1, e2: extra2});
                } // end if
                continue;
            } // end if
            var _loc16 = new Color(mc);
            var _loc20 = _loc16.getTransform();
            var _loc19 = {};
            for (var _loc3 in pEnd[_loc4])
            {
                if (pEnd[_loc4][_loc3] != _loc20[_loc3] && pEnd[_loc4][_loc3] != undefined)
                {
                    _loc19[_loc3] = pEnd[_loc4][_loc3] - _loc20[_loc3];
                } // end if
            } // end of for...in
            if (autoOverwrite)
            {
                for (var _loc3 in tweenList)
                {
                    _loc2 = tweenList[_loc3];
                    if (_loc2.mc == mc && _loc2.ctm != undefined)
                    {
                        _loc2.c = _loc16;
                        _loc2.stm = _loc20;
                        (_loc2.ctm = _loc19, _loc2.ts = now);
                        _loc2.d = sec * 1000;
                        _loc2.ef = eqFunc;
                        _loc2.cb = callback;
                        _loc2.e1 = extra1;
                        _loc2.e2 = extra2;
                        _loc6 = false;
                        break;
                    } // end if
                } // end of for...in
            } // end if
            if (_loc6)
            {
                tweenList.unshift({mc: mc, c: _loc16, stm: _loc20, ctm: _loc19, ts: now, d: sec * 1000, ef: eqFunc, cb: callback, e1: extra1, e2: extra2});
            } // end if
        } // end of for...in
        if (broadcastEvents)
        {
            mc.broadcastMessage("onTweenStart", props[_loc4]);
        } // end if
        if (callback.startfunc != undefined)
        {
            callback.startfunc.apply(callback.startscope, callback.startargs);
        } // end if
    } // End of the function
    function addTweenWithDelay(delay, mc, props, pEnd, sec, eqFunc, callback, extra1, extra2)
    {
        var il = ints.length;
        var _loc2 = setInterval(function (obj)
        {
            obj.addTween(mc, props, pEnd, sec, eqFunc, callback, extra1, extra2);
            clearInterval(obj.ints[il].intid);
            obj.ints[il] = undefined;
        }, delay * 1000, this);
        ints[il] = {mc: mc, props: props, pend: pEnd, intid: _loc2};
    } // End of the function
    function removeTween(mc, props)
    {
        var _loc6;
        var _loc2;
        var _loc3;
        _loc6 = false;
        if (props == undefined)
        {
            _loc6 = true;
        } // end if
        _loc2 = tweenList.length;
        while (_loc2--)
        {
            if (tweenList[_loc2].mc == mc)
            {
                if (_loc6)
                {
                    tweenList.splice(_loc2, 1);
                    continue;
                } // end if
                for (var _loc3 in props)
                {
                    if (tweenList[_loc2].pp == props[_loc3])
                    {
                        tweenList.splice(_loc2, 1);
                        continue;
                    } // end if
                    if (props[_loc3] == "_ct_" && tweenList[_loc2].ctm != undefined)
                    {
                        tweenList.splice(_loc2, 1);
                    } // end if
                } // end of for...in
            } // end if
        } // end while
        _loc2 = ints.length;
        while (_loc2--)
        {
            if (ints[_loc2].mc == mc)
            {
                if (_loc6)
                {
                    clearInterval(ints[_loc2].intid);
                    ints[_loc2] = undefined;
                    continue;
                } // end if
                for (var _loc3 in props)
                {
                    for (var _loc5 in ints[_loc2].props)
                    {
                        if (ints[_loc2].props[_loc5] == props[_loc3])
                        {
                            ints[_loc2].props.splice(_loc5, 1);
                            ints[_loc2].pend.splice(_loc5, 1);
                        } // end if
                    } // end of for...in
                    if (ints[_loc2].props.length == 0)
                    {
                        clearInterval(ints[_loc2].intid);
                    } // end if
                } // end of for...in
            } // end if
        } // end while
        if (tweenList.length == 0)
        {
            this.deinit();
        } // end if
    } // End of the function
    function isTweening(mc)
    {
        for (var _loc3 in tweenList)
        {
            if (tweenList[_loc3].mc == mc)
            {
                return (true);
            } // end if
        } // end of for...in
        return (false);
    } // End of the function
    function getTweens(mc)
    {
        var _loc2 = 0;
        for (var _loc4 in tweenList)
        {
            if (tweenList[_loc4].mc == mc)
            {
                ++_loc2;
            } // end if
        } // end of for...in
        return (_loc2);
    } // End of the function
    function lockTween(mc, bool)
    {
        lockedTweens[targetPath(mc)] = bool;
    } // End of the function
    function isTweenLocked(mc)
    {
        if (lockedTweens[targetPath(mc)] == undefined)
        {
            return (false);
        }
        else
        {
            return (lockedTweens[targetPath(mc)]);
        } // end else if
    } // End of the function
    function toString()
    {
        return ("[AS2 tweenManager 1.1.6]");
    } // End of the function
} // End of Class
