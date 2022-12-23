<?php
//**************************************************
// Spanish translated
// Traducido por: Francisco Matias
//   18/12/01     fjmatiaso@terra.es
//                webmaster@ladridos.net
//                
//                http://www.ladridos.net
//**************************************************
// Admin
/* 1.1 */define(_GALADMIN, 'Administración de la Galería');
/* 2.5 */define(_GALCOPYRIGHTADMIN, 'HunterGay');

// Admin Panel Menu
/* 2.0 */define(_GALGENERALSETTINGS, 'Condiciones Generales');
/* 2.0 */define(_GALGENERALSETTINGSDESC, 'Configura tu categoría.');
/* 2.0 */define(_GALEDITCATEGORIES, 'Editar categorías');
/* 2.0 */define(_GALEDITCATEGORIESDESC, 'Añadir una nueva categoría aquí.');
/* 2.0 */define(_GALADDNEWMEDIA, 'Añadir un nuevo fichero');
/* 2.0 */define(_GALADDNEWMEDIADESC, 'Añadir imágenes a la base de datos.');
/* 2.0 */define(_GALEDITMEDIA, 'Editar un fichero existente');
/* 2.0 */define(_GALEDITMEDIADESC, 'Editar la información de la imágen existente en la base de datos.');
/* 2.0 */define(_GALBATCHBUILD, 'Construcción rápida');
/* 2.0 */define(_GALBATCHBUILDDESC, 'My_eGallery buscará en la estructura de directorio de la categoría todos los nuevos ficheros y subcategorías. Se añadirá a la base de datos todo lo que se encuentre.');
/* 2.0 */define(_GALPOSTEDMEDIA, 'Aprobar los ficheros insertados');
/* 2.0 */define(_GALPOSTEDMEDIADESC, 'Aquí es donde se guardarán los ficheros recibidos para añadirlos a la base de datos posteriormente (siempre que usted apruebe la recepción de ficheros)');
/* 2.0 */define(_GALNYA, 'No disponible!');
/* 2.4 */define(_GALEDITTEMPLATE, 'Editar plantillas');
/* 2.4 */define(_GALEDITTEMPLATEDESC, 'Añadir y editar plantillas aquí.');
/* 2.4 */define(_GALWAITING, '%d esperando');
/* 2.5 */define(_GALEDITMEDIATYPE, 'Maneje el tipo de fichero');
/* 2.5 */define(_GALEDITMEDIATYPEDESC, 'Si usted tiene un fichero para visualizar que necesita etiquetas especiales de HTML usted puede corregirlas aquí .');
/* 2.7.9*/define(_GALINSTALL,'Instalar - Actualizar - Desistalar My_eGallery');
/* 2.7.9*/define(_GALINSTALLDESC,'Script automatico que permite instalar,actualizar o desistalar My_eGallery');


// Admin Navigation Menu
/* 2.0 */define(_GALCONFIG, 'Configurar');
/* 2.0 */define(_GALVIEWMEDIA, 'Ver las imágenes existentes');
/* 2.0 */define(_GALVISITUPDATE, 'HunterGay');
/* 2.0 */define(_GALINSERTNMEDIA, 'Añadir imágen');
/* 2.0 */define(_GALEDITCATEGORY, 'Editar categoría');
/* 2.0 */define(_GALEDITALLCATEGORIES, 'Editar todas las categorías');
/* 2.0 */define(_GALCREATECATEGORY, 'Crear categoría');
/* 2.0 */define(_GALMOVECATEGORY, 'Mover confirmación');
/* 2.0 */define(_GALGENERALSETTINGS, 'Condiciones generales');

// Install / Uninstall
/* 2.7.9*/define(_GALINSTALLNEW,'Nueva Instalación');
/* 2.7.9*/define(_GALUPDATE,'Actualizar su actual instalación');
/* 2.7.9*/define(_GALUNINSTALL,'Desistalar las tablas de My_eGallery');


// General Settings

/* 2.0 */define(_GALMODULENAME, "<strong>Nombre del módulo:</strong><br>&nbsp;&nbsp;&nbsp;Si lo cambia, modificará el directorio de la galería. ¡No se olvide de comprobar los enlaces!");
/* 2.0 */define(_GALALLOWCOMMENTS, '<strong>Permitir introducir comentarios:</strong><br>&nbsp;&nbsp;&nbsp;<B>Sí</B>, todos los visitantes pueden insertar comentarios');
/* 2.0 */define(_GALANONCOMMENTS, '<strong>Restringir envío de comentarios:</strong><br>&nbsp;&nbsp;&nbsp;<B>Sí</B>, Solo los miembros pueden insertar comentarios<br>&nbsp;&nbsp;&nbsp;(siempre que se active la opción de insertar comentarios)');
/* 2.0 */define(_GALSORTASC, '<strong>Ordernar comentarios:</strong><br>&nbsp;&nbsp;&nbsp;<B>Sí</B> Ordenados por el más reciente; (NO), Ordenados por el más antiguo');
/* 2.0 */define(_GALALLOWPOSTPICS, '<strong>Permitir enviar ficheros:</strong><br>&nbsp;&nbsp;&nbsp;<B>Sí</B>, Todos los visitantes pueden enviar ficheros (con la aprobación del administrador)');
/* 2.0 */define(_GALANONPOSTPICS, '<strong>Restringir envío de ficheros:</strong><br>&nbsp;&nbsp;&nbsp;<B>Sí</B>, solo los miembros pueden proponer nuevos ficheros<br>&nbsp;&nbsp;&nbsp;(siempre que se active la opción de insertar ficheros)');
/* 2.0 */define(_GALLIMITSIZE, '<strong>Restringir el tamaño del fichero:</strong><br>&nbsp;&nbsp;&nbsp;<B>Sí</B>, se limitará el tamaño del fichero<br>&nbsp;&nbsp;&nbsp;(siempre que se active la opción de insertar ficheros)');
/* 2.0 */define(_GALMAXSIZE, '<strong>Anote el tamaño de los ficheros:</strong><br>&nbsp;&nbsp;&nbsp;Anote el tamaño máximo de los ficheros en bytes.<br>&nbsp;&nbsp;&nbsp;(siempre que se active la opción de restringir el tamaño de los ficheros)');
/* 2.0 */define(_GALALLOWRATE, '<strong>Calificar imágenes:</strong><br>&nbsp;&nbsp;&nbsp;<B>Sí</B>, los visitantes pueden calificar las imágenes');
/* 2.0 */define(_GALANONRATE, '<strong>Restringir calificación:</strong><br>&nbsp;&nbsp;&nbsp;<B>Sí</B>, Solos los miembros pueden calificar<br>&nbsp;&nbsp;&nbsp;(siempre que <i>calificar imágenes</i> esté activado)');
/* 2.0 */define(_GALSETRATECOOKIES, '<strong>Restringir calificación:</strong><br>&nbsp;&nbsp;&nbsp;<B>Sí</B>, Permitir que los miembros voten varias veces<br>&nbsp;&nbsp;&nbsp;(siempre que <i>calificar imágenes</i> esté activado)');
/* 2.0 */define(_GALDISPLAYDESC, '<strong>Descripción imágenes/video:</strong><br>&nbsp;&nbsp;&nbsp;<B>Sí</B>, Visualiza la descripción de las imágenes');
/* 2.0 */define(_GALDEFPICNAME, '<strong>Nombre del icono por defecto:</strong><br>&nbsp;&nbsp;&nbsp;Fije el nombre del icono de la galería por defecto<br>&nbsp;&nbsp;&nbsp;(esta imágen debe estar <strong>dentro</strong> del directorio de la galería)');
/* 2.0 */define(_GALDEFAULTTHEME, '<strong>Tema por defecto:</strong><br>&nbsp;&nbsp;&nbsp;Seleccione un tema para su galería');
/* 2.0 */define(_GALNUMBERMEDIA, '<strong>Nº de imágenes por página:</strong><br>&nbsp;&nbsp;&nbsp;Seleccione el nº de imágenes que se mostrarán en el visor gráficos de la galería');
/* 2.2 */define(_GALNUMCOLMAIN, '<strong>Número de columnas:</strong><br>&nbsp;&nbsp;&nbsp;Elija el nº de columnas que usted desea mostrar en la página principal de la galería.');
/* 2.4 */define(_GALDISPLAYTOP, '<strong>Ver top 10:</strong><br>&nbsp;&nbsp;&nbsp;<B>Sí</B>, Permitir que los visitantes vean el TOP 10');
/* 2.4 */define(_GALDISPLAYSORTBAR, '<strong>Ordernar el menu:</strong><br>&nbsp;&nbsp;&nbsp;<B>Sí</B>, visualice un menú en el visor gráfico para que los visitantes ordenen las imágenes');
/* 2.4 */define(_GALMAINTEMPLATE, '<strong>Seleccionar plantilla:</strong><br>&nbsp;&nbsp;&nbsp;Seleccione la plantilla que desea utilizar en la página principal de la galería.');
/* 2.4 */define(_GALIMAGESOFTWARE, "<strong>Seleccione el método del visualizador gráfico:</strong><br>&nbsp;&nbsp;&nbsp;Seleccione el método que quiere usar para ver los gráficos. No todos los métodos son aceptados en todos los servidores.<ul><li><strong>Ninguno</strong><br>No se ven las imágenes. Debe elegir el visualizador gráfico.</li><li><strong>Navegador</strong><br>El navegador visualiza las imágenes. Puede tardar en cargar la imágen</li><li><strong>Librería GD</strong><br>Librería PHP interna, no lo soportan todos los servidores. Crea imágenes de mala calidad, pero más conocido.<br>Solo soporta antiguos GIF o JPEG &amp; solo PNG.</li><li><strong>NetPBM</strong><br>Conversor de imágenes externo que crea grandes visualizadores gráficos.</li><li><strong>ImageMagik</strong><br>Conversor de imágenes externo que crea grandes visualizadores gráficos. Sin embardo no es tan común como la librería GD.</li></ul>");
/* 2.4 */define(_GALNONEIMAGESOFTWARE, 'Sin coversor de imágenes');
/* 2.4 */define(_GALGDIMAGESOFTWARE, 'GD Library');
/* 2.5.3 */define(_GALBROWSERIMAGESOFTWARE, 'Navegador');
/* 2.5 */define(_GALDEFAULTSORTMEDIA, '<strong>Ordenación por defecto:</strong><br>&nbsp;&nbsp;&nbsp;Seleccione el orden preferido para mostrar las imágenes.');
/* 2.5 */define(_GALDEFTHUMBWIDTH, '<strong>Anchura por defecto del visor gráfico:</strong><br>&nbsp;&nbsp;&nbsp;Introduzca la anchura por defecto para el creador gráfico. <b>Atención</b> Si cambia este valor, los antiguos visores gráficos no se verán afectados');
/* 2.6 */define(_GALDISPLAYSEARCHFORM,'<strong>Visualizar el formulario de búsqueda:</strong><br>&nbsp;&nbsp;&nbsp;<B>Sí</B>, Permitir que los visitantes busquen imágenes en la galería');
/* 2.6 */define(_GALPOSCARDLOCATION,'<strong>Dirección del script PostCard-Direct:</strong><br>&nbsp;&nbsp;&nbsp;Si existe este script CGI, los visitante pueden enviar imágenes como tarjetas digitales');
/* 2.6 */define(_GALALLOWPOSTCARD,'<strong>Permitir el envío de tarjetas digitales:</strong><br>&nbsp;&nbsp;&nbsp;<B>Sí</B>, Los visitantes pueden enviar tarjetas digitales (Solo si está instalado el script PostCard-Direct)<br>&nbsp;&nbsp;&nbsp;Este script CGI puede descargarlo <a class="content" target="_blank" href="http://www.ginini.com.au/tools/postcard-direct/">AQUI</a>');
/* 2.6 */define(_GALNETPBMIMAGESOFTWARE, 'NetPBM');
/* 2.7.0*/define(_GALALLOWPRINT,'<strong>Permitir la impresión de la imágen:</strong><br>&nbsp;&nbsp;&nbsp;<B>Sí</B>, Permite a los usuarios imprimir las imágenes de la galería');
/* 2.7.0*/define(_GALALLOWDOWNLOAD,'<strong>Permitir la descarga de imágenes:</strong><br>&nbsp;&nbsp;&nbsp;<B>Sí</B>, Permite a los usuarios descargar imágenes de la galería');
/* 2.7.0*/define(_GALDOWNLOADMODE,'<strong>Selecciona la extensión de archivo:</strong><br>&nbsp;&nbsp;&nbsp;Selecciona que extensión deben tener tus archivos.<br>&nbsp;&nbsp;&nbsp;NOTA: El nombre de archivo debe ser creado de la siguiente forma:<br>&nbsp;&nbsp;&nbsp;ZIP: fichero.jpg -> fichero.zip<br>&nbsp;&nbsp;&nbsp;GZ: fichero.jpg -> fichero.jpg.gz<br>&nbsp;&nbsp;&nbsp;El archivo debe localizarse en el mismo directorio que la imágen.');
/* 2.7.0*/define(_GALZIP,'ZIP');
/* 2.7.0*/define(_GALGZ,'GZ');
/* 2.7.0*/define(_GALPICSUBCAT,'<strong>Visualizar la subcategoría de visualizador gráfico:</strong><br>&nbsp;&nbsp;&nbsp;<B>Sí</B>, La subcategoría del visor gráfico se mostrará debajo del nombre de la subcategoría.');
/* 2.7.0*/define(_GALSUBCATWIDTH,'<strong>Anchura de la subcategoría de visualizador gráfico:</strong><br>&nbsp;&nbsp;&nbsp;(Siempre que la opción anterior sea <B>Sí</B>)');
/* 2.7.9*/define(_GALTEMPPATH,'<strong>Directorio Temporal:</strong><br>&nbsp;&nbsp;&nbsp;Se recomienda dejar sin cambio la opción por defecto');
/* 2.7.9*/define(_GALGDIMAGESOFTWAREPATH,'<strong>Path del soft de Conversion binaria (Opcional):</strong><br>&nbsp;&nbsp;&nbsp;Locacion del soft Binario selecionar (ImageMagick o NetPBM)');
/* 2.7.9*/define(_GALINSTALL,'<strong>Instalar - Actualizar - Desistalar My_eGallery');


// Edit, Add Media
/* 2.0 */define(_GALEDITBYCATEGORY, 'Editar por categorías');
/* 2.0 */define(_GALEDITBYCATEGORYDESC, 'Editar el fichero en una determinada categoría.  Elija su categoría aquí.');
/* 2.0 */define(_GALMEDIANAME, 'Nombre del video/imágen:');
/* 2.0 */define(_GALFILENAME, 'Nombre del fichero:');
/* 2.0 */define(_GALDESCRIPTION, 'Descripción:');
/* 2.0 */define(_GALSELECTCATEGORY, 'Seleccionar categoría:');
/* 2.0 */define(_GALDATEADDED, 'Fecha Inserción:');
/* 2.0 */define(_GALSAVECHANGES, 'Guardar cambios');
/* 2.0 */define(_GALDELETE, 'Borrar');
/* 2.0 */define(_GALDISPLAYMEDIAIN, 'Visualizar imagen en');
/* 2.0 */define(_GALNOWDISPLAYFILES, 'Ficheros visualizados ahora');
/* 2.0 */define(_GALJUMP2PAGE, 'ir a la página');
/* 2.5 */define(_GALWIDTHXHEIGHT, "Width x Height");
/* 2.5 */define(_GALNEWMEDIAADDED, "Nueva categoría '%s' añadido a la galería '%s'.");
/* 2.5 */define(_GALFILEADDED, "Fichero '%s' añadido a la galería '%s'.");
/* 2.5 */define(_GALNBMEDIAADDED, "%d añadido nuevo!");
/* 2.5 */define(_GALNONEWMEDIAFOUND, "No se han encontrados nuevos ficheros en '%s'");
/* 2.5 */define(_GALQUICKRECURSIVE, "Búsqueda recursiva:");
/* 2.5 */define(_GALQUICKSELECT, "Seleccione la categoría para explorar:");
/* 2.5 */define(_GALBATCHBUILDRESULT, 'Resultado');
/* 2.7.0 */define(_GALDEFAULTSUBMITTER, 'Enviado por:');
/* 2.7.0 */define(_GALDEFAULTSUBMITTERDESC, 'Introduce el nombre del enviador por defecto para todos los nuevos ficheros encontrados durante la búsqueda');
/* 2.7.0 */define(_GALDEFAULTDESCPIC, 'Descripción del fichero:');
/* 2.7.0 */define(_GALDEFAULTDESCPICDESC, 'Introduce la descripción del fichero por defecto para todos los nuevos ficheros encontrados durante la búsqueda');
/* 2.7.0 */define(_GALDEFAULTDESCCAT, 'Descripción de la categoría:');
/* 2.7.0 */define(_GALDEFAULTDESCCATDESC, 'Introduce la descripción por defecto para todas las categorías encontradas durante la búsqueda');

// Edit, Add Category
/* 2.0 */define(_GALECDCATEGORIES, 'Crear categorías<br><br>Edit Categories<br><br>Delete Categories');
/* 2.0 */define(_GALECDCATEGORIESDESC, 'Puede crear, editar y borrar categorías aquí. Simplemente pulse en el enlace apropiado para la opción deseada.<br><br><strong>¡¡ ATENCIÓN</strong> : Si borra una categoría, todas sus subcategorías serán también borradas !!');
/* 2.0 */define(_GALCLICK2CREATECAT, 'Pulse para crear un categoría');
/* 2.0 */define(_GALCATEDIT, 'Editar');
/* 2.0 */define(_GALCATMOVE, 'Mover');
/* 2.0 */define(_GALCATDELETE, 'Borrar');
/* 2.0 */define(_GALCATCREATESUB, 'Crear una subcategoría');
/* 2.0 */define(_GALCATMEDIACOUNT, 'Cuenta:');
/* 2.0 */define(_GALSUBCATEGORIES, 'SubCategorías:');
/* 2.0 */define(_GALCATAEGOYNAME, 'Nombre de la categoría:');
/* 2.0 */define(_GALCATAEGOYNAMEDESC, 'El nombre de la categoría será visualizada.');
/* 2.0 */define(_GALCATLOC, 'Localización de la Categoría:');
/* 2.0 */define(_GALCATLOCDESC, 'El nombre de la carpeta donde será guardada la categoría.');
/* 2.0 */define(_GALCATDESC, 'Descripción:');
/* 2.0 */define(_GALCATDESCDESC, 'La descripción de la categoría que se visualizará.');
/* 2.0 */define(_GALCATICON, 'Icono de la Categoría:');
/* 2.0 */define(_GALCATICONDESC, 'Este es el icono que se mostrará en el listado de categorías por páginas.');
/* 2.0 */define(_GALCATVISIBLE, 'Visible:');
/* 2.0 */define(_GALCATVISIBLEDESC, '¿Mostrar esta categoría en la galería? Útil cuando la categoría no está terminada.');
/* 2.0 */define(_GALCATDETAILS, 'Detalles de la categoría:');
/* 2.0 */define(_GALCATDETAILSDESC, 'Descripción detallada sobre la categoría.');
/* 2.0 */define(_GALMOVEOPTION, 'Mueva las opciones para la categoría');
/* 2.0 */define(_GALCATSTATE, 'Status:');
/* 2.0 */define(_GALCATISVISIBLE, 'Visible');
/* 2.0 */define(_GALCATISINVISIBLE, 'Invisible');
/* 2.2 */define(_GALNUMCOLCAT, 'Nº de columnas:');
/* 2.2 */define(_GALNUMCOLCATDESC, 'Elija el nº de columnas en el visualizador gráfico de la categoría');
/* 2.4 */define(_GALSURE2DELETECAT, '¿Está seguro de borrar esta categoría?');
/* 2.4 */define(_GALTEMPLATETYPE, 'Plantilla');
/* 2.4 */define(_GALTEMPLATETYPEDESC, 'Selecciona la plantilla que quieres usar para esta categoría y sus imágenes.');
/* 2.5 */define (_GALVISIBLEADMIN, 'Administrador');
/* 2.5 */define (_GALVISIBLEMEMBER, 'Miembros');
/* 2.5 */define (_GALVISIBLEPUBLIC, 'Público');
/* 2.5 */define (_GALCATSTATE, "Visible por:");
/* 2.5 */define (_GALMOVEWARNING, '<b>ATENCIÓN :</b> Las subcategorías se mueven con categoría');
/* 2.5 */define (_GALMOVESELECT, 'Seleccione un nuevo padre:');
/* 2.5 */define (_GALMOVE, 'Mueve');
/* 2.7.0 */define (_GALCATTHUMB, 'Anchura de los visualizadores gráficos');
/* 2.7.0 */define (_GALCATTHUMBDESC, 'Introduce la anchura por defecto para crear nuevos visualizadores gráficos en esta categoría.<br><b>Atención</b>: Si cambia este valor, los visualizadores gráficos existentes no se mueven. Deberías borrarlos');

// Validate New Post
/* 2.1 */define(_GALVALIDNEW, 'Validación');
/* 2.1 */define(_GALVALIDNEWMEDIA, 'Validar imágenes enviadas');

// Edit Templates
/* 2.4 */define(_GALEDITALLTEMPLATES, 'Editar plantillas');
/* 2.4 */define(_GALECDTEMPLATES, 'Crear plantillas<br><br>Editar plantillas<br><br>Borrar plantillas');
/* 2.4 */define(_GALECDTEMPLATESDESC, 'Aquí puedes crear, editar y borrar plantillas. Basta con pulsar en la opción deseada.');
/* 2.4 */define(_GALCLICK2CREATETEMP, 'Crear una nueva categoría y plantilla de imágenes.');
/* 2.4 */define(_GALCLICK2CREATETEMPMAIN, 'Crear una nueva plantilla de página principal de la galería.');
/* 2.4 */define(_GALEDIT, 'Editar');
/* 2.4 */define(_GALTEMPLCSS, 'Plantilla CSS');
/* 2.4 */define(_GALTEMPLCSSDESC, '<br>Insertar los nombres de las clases CSS predefinidas aquí...<br>');
/* 2.4 */define(_GALTEMPLATENAME, 'Nombre de la plantilla');
/* 2.4 */define(_GALTEMPLATENAMEDESC, 'Este nombre será usado en los listados de plantillas de la página del administrador.');
/* 2.4 */define(_GALTEMPLMAIN, 'Plantilla página principal de la galerría');
/* 2.4 */define(_GALTEMPLMAINDESC, '<br><b><:GALLNAME:></b><br>Visualice el nombre de la categoría<br><b><:IMAGE:></b><br>Visualiza el icono de la categoría<br><b><:DESCRIPTION:></b><br>Visualiza la descripción de la categoría<br><b><:SUBCATEGORIES:></b><br>Visualiza todas las subcategorías');
/* 2.4 */define(_GALEDITTEMPLATE, 'Editar la plantilla principal');
/* 2.4 */define(_GALCREATETEMPLATE, 'Crear una plantilla');
/* 2.2 */define(_GALTEMPLCAT, 'Plantilla de visualizadores gráficos');
/* 2.2 */define(_GALTEMPLCATDESC, '<br><b><:IMAGE:></b><br>&nbsp;Visualizar la imágen<br><b><:DESCRIPTION:></b><br>&nbsp;Visualizar la descripción<br><b><:RATE:></b><br>&nbsp;Visualiza la imágen<br><b><:FORMAT:></b><br>&nbsp;Visualiza el formato de la imágen<br><b><:SIZE:></b><br>&nbsp;Visualiza el tamaño de la imágen<br><b><:NBCOMMENTS:></b><br>&nbsp;Visualiza el nº de comentarios<br><b><:NEW:></b><br>&nbsp;Visualiza si la img. es nueva<br><b><:HITS:></b><br>&nbsp;Visualiza el nº de veces vista<br><b><:DATE:></b><br>&nbsp;Fecha de inserción de la imágen<br>');
/* 2.2 */define(_GALTEMPLPIC, 'Vista de la plantilla de imágen');
/* 2.6 */define(_GALTEMPLPICDESC, '<br><b><:IMAGE:></b><br>&nbsp;Visualiza la imágen<br><b><:NAMESIZE:></b><br>&nbsp;Ver nombre y tamaño<br><b><:SUBMITTER:></b><br>&nbsp;Ver la persona que ha enviado la imágen<br><b><:DATE:></b>Ver cuando ha sido insertada<br><b><:RATE:></b><br>&nbsp;Ver la valoración<br><b><:RATINGBAR:></b><br>&nbsp;Barra de valoración<br><b><:POSTCARD:></b><br>&nbsp;Proponga enviar una postal<br><b><:PRINT:></b><br>&nbsp;Abrir la imágen en otra ventana<br><b><:DOWNLOAD:></b><br>&nbsp;Proponga descargar la imágen.<br><b><:HITS:></b><br>&nbsp;Cuantas veces ha sido vista la imágen<br><b><:DESCRIPTION:></b><br>&nbsp;Ver la Descripción<br><b><:COMMENTS:></b><br>&nbsp;Ver comentarios sobre la imágen');

// Add, Edit, Delete Media Types
/* 2.5 */define(_GALMEDIATYPEDESC, 'Aquí es donde puedes añadir, borrar, y editar formatos de ficheros. Estos formatos, permiten que eGallery solo visualice la imágen.<br><br>Con la estructura usada aquí, es posible para eGallery soportar <b>cualquier</b> formato de ficheros, ahora y en el futuro.');
/* 2.5 */define(_GALMEDIAADDTYPE, 'Añadir un formato de fichero');
/* 2.5 */define(_GALEDITMEDIATYPES, 'Formatos existentes');
/* 2.5 */define(_GALMEDIACLASSTYPE, 'Clases');
/* 2.5 */define(_GALMEDIADESCTYPE, 'Descripción');
/* 2.5 */define(_GALMEDIAEXTENSION, 'Extensión');
/* 2.5 */define(_GALMEDIATHUMB, 'Visualizador gráfico por defecto');
/* 2.5 */define(_GALMEDIATAG, 'Ver código');
/* 2.7.0 */define(_GALSUBMITTER, 'Insertado por'); 
?>
