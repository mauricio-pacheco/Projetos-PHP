class myFunctions
{
    function myFunctions()
    {
    } // End of the function
    static function MoveMe(mc, prop, transition, end, duration)
    {
        var _start = eval("mc." + prop);
        var _transition = "mx.transitions.easing." + transition;
        var foobarTween = new mx.transitions.Tween(mc, prop, eval(_transition), _start, end, duration, false);
    } // End of the function
    static var blah = mx.transitions.easing.Strong;
    static var blah1 = mx.transitions.easing.Bounce;
    static var blah2 = mx.transitions.easing.Elastic;
    static var blah3 = mx.transitions.easing.Regular;
    static var blah4 = mx.transitions.easing.Back;
    static var blah5 = mx.transitions.easing.None;
} // End of Class
