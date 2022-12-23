<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/* Copyright (c) 2003 index.php                                         */
/* by Chris Karakas                                                     */
/* http://www.karakas-online.de                                         */
/*                                                                      */
/* Modulo do Guia Foca Desenvolvido Sob Plataforma do Modulo            */
/* Desenvoilvido por Chris Karakas                                      */
/*                     									*/
/* Desenvolvimento do Módulo Biblia							*/
/* Antonio Andrade - nuke@nukebrasil.org						*/
/* http://www.nukebrasil.org								*/
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/


if (!eregi("modules.php", $PHP_SELF)) {
die ("Voce não pode ter acesso aos arquivos desta seção...");
}

$index = 1;   // 0 : do not show right blocks - 1:show right blocks 
require_once("mainfile.php");
$module_name = basename(dirname(__FILE__));

include("header.php");


$ACCEPT_FILE['Inicio.htm'] = 'Inicio.htm';
$ACCEPT_FILE['1Corinti.htm'] = '1Corinti.htm';
$ACCEPT_FILE['1joao.htm'] = '1joao.htm';
$ACCEPT_FILE['1Pedro.htm'] = '1Pedro.htm';
$ACCEPT_FILE['1Tessalo.htm'] = '1Tessalo.htm';
$ACCEPT_FILE['1Timoteo.htm'] = '1Timoteo.htm';
$ACCEPT_FILE['2Corinti.htm'] = '2Corinti.htm';
$ACCEPT_FILE['2joao.htm'] = '2joao.htm';
$ACCEPT_FILE['2Pedro.htm'] = '2Pedro.htm';

$ACCEPT_FILE['2Tessalo.htm'] = '2Tessalo.htm';
$ACCEPT_FILE['2Timoteo.htm'] = '2Timoteo.htm';
$ACCEPT_FILE['3joao.htm'] = '3joao.htm';
$ACCEPT_FILE['Apocali.htm'] = 'Apocali.htm';
$ACCEPT_FILE['Atos.htm'] = 'Atos.htm';
$ACCEPT_FILE['back_169.htm'] = 'back_169.htm';
$ACCEPT_FILE['Biblia.htm'] = 'Biblia.htm';
$ACCEPT_FILE['bibliaFrame.htm'] = 'bibliaFrame.htm';
$ACCEPT_FILE['bibliaFrame2.htm'] = 'bibliaFrame2.htm';
$ACCEPT_FILE['Bibliano.htm'] = 'Bibliano.htm';
$ACCEPT_FILE['Colossen.htm'] = 'Colossen.htm';
$ACCEPT_FILE['direita.htm'] = 'direita.htm';
$ACCEPT_FILE['Efesios.htm'] = 'Efesios.htm';
$ACCEPT_FILE['Filemon.htm'] = 'Filemon.htm';
$ACCEPT_FILE['filipens.htm'] = 'filipens.htm';
$ACCEPT_FILE['Frame.htm'] = 'Frame.htm';
$ACCEPT_FILE['fundo.htm'] = 'fundo.htm';
$ACCEPT_FILE['Galatas.htm'] = 'Galatas.htm';
$ACCEPT_FILE['Hebreus.htm'] = 'Hebreus.htm';
$ACCEPT_FILE['index.htm'] = 'index.htm';
$ACCEPT_FILE['Intrapoc.htm'] = 'Intrapoc.htm';
$ACCEPT_FILE['Intratos.htm'] = 'Intratos.htm';
$ACCEPT_FILE['intrcolo.htm'] = 'intrcolo.htm';
$ACCEPT_FILE['Intrcori.htm'] = 'Intrcori.htm';
$ACCEPT_FILE['Intrefes.htm'] = 'Intrefes.htm';
$ACCEPT_FILE['intrfile.htm'] = 'intrfile.htm';
$ACCEPT_FILE['Intrfili.htm'] = 'Intrfili.htm';
$ACCEPT_FILE['Intrgala.htm'] = 'Intrgala.htm';
$ACCEPT_FILE['Intrhebr.htm'] = 'Intrhebr.htm';
$ACCEPT_FILE['Intrjoa2.htm'] = 'Intrjoa2.htm';
$ACCEPT_FILE['Intrjoao.htm'] = 'Intrjoao.htm';
$ACCEPT_FILE['intrjuda.htm'] = 'intrjuda.htm';
$ACCEPT_FILE['Intrluca.htm'] = 'Intrluca.htm';
$ACCEPT_FILE['Intrmarc.htm'] = 'Intrmarc.htm';
$ACCEPT_FILE['Intrmate.htm'] = 'Intrmate.htm';
$ACCEPT_FILE['Introma.htm'] = 'Introma.htm';
$ACCEPT_FILE['Intrpedr.htm'] = 'Intrpedr.htm';
$ACCEPT_FILE['Intrtess.htm'] = 'Intrtess.htm';
$ACCEPT_FILE['Intrtiag.htm'] = 'Intrtiag.htm';
$ACCEPT_FILE['Intrtimo.htm'] = 'Intrtimo.htm';
$ACCEPT_FILE['intrtito.htm'] = 'intrtito.htm';
$ACCEPT_FILE['Joao.htm'] = 'Joao.htm';
$ACCEPT_FILE['Judas.htm'] = 'Judas.htm';
$ACCEPT_FILE['Lucas.htm'] = 'Lucas.htm';
$ACCEPT_FILE['Marcos.htm'] = 'Marcos.htm';
$ACCEPT_FILE['Mateus.htm'] = 'Mateus.htm';
$ACCEPT_FILE['Novo.htm'] = 'Novo.htm';
$ACCEPT_FILE['Novof.htm'] = 'Novof.htm';
$ACCEPT_FILE['Romanos.htm'] = 'Romanos.htm';
$ACCEPT_FILE['Tiago.htm'] = 'Tiago.htm';
$ACCEPT_FILE['Tito.htm'] = 'Tito.htm';
$ACCEPT_FILE['Versao.htm'] = 'Versao.htm';

//Antigo Testamento

$ACCEPT_FILE['1cronica.htm'] = '1cronica.htm';
$ACCEPT_FILE['1Reis.htm'] = '1Reis.htm';
$ACCEPT_FILE['1Samuel.htm'] = '1Samuel.htm';
$ACCEPT_FILE['2Cronica.htm'] = '2Cronica.htm';
$ACCEPT_FILE['2Reis.htm'] = '2Reis.htm';
$ACCEPT_FILE['2samuel.htm'] = '2samuel.htm';
$ACCEPT_FILE['Abdias.htm'] = 'Abdias.htm';
$ACCEPT_FILE['Ageu.htm'] = 'Ageu.htm';
$ACCEPT_FILE['Amos.htm'] = 'Amos.htm';
$ACCEPT_FILE['canticos.htm'] = 'canticos.htm';
$ACCEPT_FILE['Daniel.htm'] = 'Daniel.htm';
$ACCEPT_FILE['deuteron.htm'] = 'deuteron.htm';
$ACCEPT_FILE['Dtintro.htm'] = 'Dtintro.htm';
$ACCEPT_FILE['eclesias.htm'] = 'eclesias.htm';
$ACCEPT_FILE['Esdras.htm'] = 'Esdras.htm';
$ACCEPT_FILE['Ester.htm'] = 'Ester.htm';
$ACCEPT_FILE['Exodo.htm'] = 'Exodo.htm';
$ACCEPT_FILE['Ezequiel.htm'] = 'Ezequiel.htm';
$ACCEPT_FILE['Genesis.htm'] = 'Genesis.htm';
$ACCEPT_FILE['Habacuq.htm'] = 'Habacuq.htm';
$ACCEPT_FILE['Intrageu.htm'] = 'Intrageu.htm';
$ACCEPT_FILE['Intramos.htm'] = 'Intramos.htm';
$ACCEPT_FILE['intrcant.htm'] = 'intrcant.htm';
$ACCEPT_FILE['intrcro2.htm'] = 'intrcro2.htm';
$ACCEPT_FILE['intrcron.htm'] = 'intrcron.htm';
$ACCEPT_FILE['Intrdani.htm'] = 'Intrdani.htm';
$ACCEPT_FILE['intrecle.htm'] = 'intrecle.htm';
$ACCEPT_FILE['Intreis.htm'] = 'Intreis.htm';
$ACCEPT_FILE['Intreis2.htm'] = 'Intreis2.htm';
$ACCEPT_FILE['Intresdr.htm'] = 'Intresdr.htm';
$ACCEPT_FILE['Intreste.htm'] = 'Intreste.htm';
$ACCEPT_FILE['Intrezeq.htm'] = 'Intrezeq.htm';
$ACCEPT_FILE['Intrhaba.htm'] = 'Intrhaba.htm';
$ACCEPT_FILE['Intrisai.htm'] = 'Intrisai.htm';
$ACCEPT_FILE['intrjere.htm'] = 'intrjere.htm';
$ACCEPT_FILE['Intrjo.htm'] = 'Intrjo.htm';
$ACCEPT_FILE['Intrjoel.htm'] = 'Intrjoel.htm';
$ACCEPT_FILE['Intrjona.htm'] = 'Intrjona.htm';
$ACCEPT_FILE['Intrjsue.htm'] = 'Intrjsue.htm';
$ACCEPT_FILE['intrjuiz.htm'] = 'intrjuiz.htm';
$ACCEPT_FILE['Intrlame.htm'] = 'Intrlame.htm';
$ACCEPT_FILE['Intrmala.htm'] = 'Intrmala.htm';
$ACCEPT_FILE['Intrmiqe.htm'] = 'Intrmiqe.htm';
$ACCEPT_FILE['Intrnaum.htm'] = 'Intrnaum.htm';
$ACCEPT_FILE['Intrneem.htm'] = 'Intrneem.htm';
$ACCEPT_FILE['Introbad.htm'] = 'Introbad.htm';
$ACCEPT_FILE['introex.htm'] = 'introex.htm';
$ACCEPT_FILE['introex1.htm'] = 'introex1.htm';
$ACCEPT_FILE['Introgen.htm'] = 'Introgen.htm';
$ACCEPT_FILE['Introlev.htm'] = 'Introlev.htm';
$ACCEPT_FILE['Introlev2.htm'] = 'Introlev2.htm';
$ACCEPT_FILE['intronum.htm'] = 'intronum.htm';
$ACCEPT_FILE['Introsei.html'] = 'Introsei.html';
$ACCEPT_FILE['Intrprov.htm'] = 'Intrprov.htm';
$ACCEPT_FILE['intrsalm.htm'] = 'intrsalm.htm';
$ACCEPT_FILE['Intrsofo.htm'] = 'Intrsofo.htm';
$ACCEPT_FILE['intrute.htm'] = 'intrute.htm';
$ACCEPT_FILE['intrzaca.htm'] = 'intrzaca.htm';
$ACCEPT_FILE['Isaias.htm'] = 'Isaias.htm';
$ACCEPT_FILE['Itrsamu2.htm'] = 'Itrsamu2.htm';
$ACCEPT_FILE['Itrsamue.htm'] = 'Itrsamue.htm';
$ACCEPT_FILE['Jeremias.htm'] = 'Jeremias.htm';
$ACCEPT_FILE['Jo.htm'] = 'Jo.htm';
$ACCEPT_FILE['Joel.htm'] = 'Joel.htm';
$ACCEPT_FILE['jonas.htm'] = 'jonas.htm';
$ACCEPT_FILE['Josue.htm'] = 'Josue.htm';
$ACCEPT_FILE['Juizes.htm'] = 'Juizes.htm';
$ACCEPT_FILE['Lamenta.htm'] = 'Lamenta.htm';
$ACCEPT_FILE['Levitico.htm'] = 'Levitico.htm';
$ACCEPT_FILE['Malaquia.htm'] = 'Malaquia.htm';
$ACCEPT_FILE['Miqueias.htm'] = 'Miqueias.htm';
$ACCEPT_FILE['Naum.htm'] = 'Naum.htm';
$ACCEPT_FILE['Neemias.htm'] = 'Neemias.htm';
$ACCEPT_FILE['Numeros.htm'] = 'Numeros.htm';
$ACCEPT_FILE['Oseias.htm'] = 'Oseias.htm';
$ACCEPT_FILE['Pentateu.htm'] = 'Pentateu.htm';
$ACCEPT_FILE['Proverb.htm'] = 'Proverb.htm';
$ACCEPT_FILE['Rute.htm'] = 'Rute.htm';
$ACCEPT_FILE['Salmo2.htm'] = 'Salmo2.htm';
$ACCEPT_FILE['salmos.htm'] = 'salmos.htm';
$ACCEPT_FILE['Sofonia.htm'] = 'Sofonia.htm';
$ACCEPT_FILE['Vocab.htm'] = 'Vocab.htm';
$ACCEPT_FILE['Zacarias.htm'] = 'Zacarias.htm';









OpenTable();
echo "<center><img src='tbibli.jpg'></center>";
CloseTable();
OpenTable();
echo "<br><center><a href='modules.php?name=biblia'><img src='indice.jpg' border='0'></a></center>";

$page = $_GET['page'];
$pagename = $ACCEPT_FILE[$page];

if (!isSet($pagename)) $pagename = "Inicio.htm";

include("modules/biblia/$pagename");

echo "<br><br>";
CloseTable();
include("footer.php");
?>