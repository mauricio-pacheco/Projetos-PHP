function txtBoxFormat(objeto, sMask, evtKeyPress) {
    var i, nCount, sValue, fldLen, mskLen,bolMask, sCod, nTecla;


    if(document.all) { // Internet Explorer
        nTecla = evtKeyPress.keyCode;
    } else if(document.layers) { // Nestcape
        nTecla = evtKeyPress.which;
    } else {
        nTecla = evtKeyPress.which;
        if (nTecla == 8) {
            return true;
        }
    }

    sValue = objeto.value;

    // Limpa todos os caracteres de formatação que
    // já estiverem no campo.
    sValue = sValue.toString().replace( "-", "" );
    sValue = sValue.toString().replace( "-", "" );
    sValue = sValue.toString().replace( ".", "" );
    sValue = sValue.toString().replace( ".", "" );
    sValue = sValue.toString().replace( "/", "" );
    sValue = sValue.toString().replace( "/", "" );
    sValue = sValue.toString().replace( ":", "" );
    sValue = sValue.toString().replace( ":", "" );
    sValue = sValue.toString().replace( "(", "" );
    sValue = sValue.toString().replace( "(", "" );
    sValue = sValue.toString().replace( ")", "" );
    sValue = sValue.toString().replace( ")", "" );
    sValue = sValue.toString().replace( " ", "" );
    sValue = sValue.toString().replace( " ", "" );
    fldLen = sValue.length;
    mskLen = sMask.length;

    i = 0;
    nCount = 0;
    sCod = "";
    mskLen = fldLen;

    while (i <= mskLen) {
        bolMask = ((sMask.charAt(i) == "-") || (sMask.charAt(i) == ".") || (sMask.charAt(i) == "/") || (sMask.charAt(i) == ":"))
        bolMask = bolMask || ((sMask.charAt(i) == "(") || (sMask.charAt(i) == ")") || (sMask.charAt(i) == " "))

        if (bolMask) {
            sCod += sMask.charAt(i);
            mskLen++;
        }
        else {
            sCod += sValue.charAt(nCount);
            nCount++;
        }

        i++;
    }

    objeto.value = sCod;

    if (nTecla != 8) { // backspace
        if (sMask.charAt(i-1) == "9") { // apenas números...
            return ((nTecla > 47) && (nTecla < 58));
        }
        else { // qualquer caracter...
            return true;
        }
    }
    else {
        return true;
    }
}

function makenum(nro){

    var valid    = "0123456789";
    var numerook = "";
    var temp;
    for(var i = 0; i < nro.length; i++)
    {
        temp = nro.substr(i, 1);
        if (valid.indexOf(temp) != -1)
            numerook = numerook + temp;
    }
    return(numerook);
}

function mascaraValor(objeto, e, tammax, decimais){

    // var tecla  = (window.event) ? e.which : e.keyCode;
    var tecla = e.keyCode ? e.keyCode : e.which;
    var tamObj = objeto.value.length;

    if ((tecla == 8) && (tamObj == tammax))
        tamObj = tamObj - 1;

    vr = makenum(objeto.value);
    tam = vr.length;

    if (((tecla == 8) || (tecla >= 48 && tecla <= 57) || (tecla >= 96 && tecla <= 105)) && (parseInt(tamObj) + 1 <= parseInt(tammax)))
    {
        if ((tam < tammax) && (tecla != 8))
            tam = vr.length + 1;
        if ((tecla == 8) && (tam > 1))
            tam = tam - 1;
        if ((tam >= (decimais)))
            objeto.value = vr.substr(0, (tam - decimais)) + "." + vr.substr((tam - decimais), tam);
    }
    else if((tecla != 8) && (tecla != 9) && (tecla != 13) && (tecla != 18) && (tecla != 35) && (tecla != 36) && (tecla != 37) && (tecla != 39))
    {
        return false;
    }
}