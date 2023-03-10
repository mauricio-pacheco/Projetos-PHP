<?php
/* $Id: arabic-windows-1256.inc.php,v 2.3 2003/11/26 14:42:59 lem9 Exp $ */

/**
 * Original translation to Arabic by Fisal <fisal77 at hotmail.com>
 * Update by Tarik kallida <kallida at caramail.com>
 * Final Update on November 25, 2003 by Ossama Khayat <okhayat at yahoo.com>
 */

$charset = 'windows-1256';
$allow_recoding = TRUE;
$text_dir = 'rtl'; // ('ltr' for left to right, 'rtl' for right to left)
$left_font_family = 'Tahoma, verdana, arial, helvetica, sans-serif';
$right_font_family = '"Windows UI", Tahoma, verdana, arial, helvetica, sans-serif';
$number_thousands_separator = ',';
$number_decimal_separator = '.';
// shortcuts for Byte, Kilo, Mega, Giga, Tera, Peta, Exa
//$byteUnits = array('????', '????????', '????????', '????????');
$byteUnits = array('Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB');

$day_of_week = array('?????', '???????', '????????', '????????', '??????', '??????', '?????');
$month = array('?????', '??????', '????', '?????', '????', '?????', '?????', '?????', '??????', '??????', '??????', '??????');
// See http://www.php.net/manual/en/function.strftime.php to define the
// variable below
$datefmt = '%d %B %Y ?????? %H:%M';

$timespanfmt = '%s ???? %s ???ɡ %s ????? ?%s ?????';

$strAPrimaryKey = '??? ????? ??????? ??????? ?? %s';
$strAbortedClients = '????';
$strAbsolutePathToDocSqlDir = '?????? ????? ?????? ?????? ??? ???? ?????? ??? ???? docSQL';
$strAccessDenied = '??? ?????';
$strAccessDeniedExplanation = '???? phpMyAdmin ??????? ????? MySQL? ???? ?????? ???????. ???? ?? ????? ?? ???????ݡ ?? ??? ???????? ????? ?????? ?? ??? ??????? config.inc.php ?????? ???? ?????? ????????? ??????? ???? ?? ??? ??????? ?? ???? MySQL.';  
$strAction = '???????';
$strAddAutoIncrement = '??? ???? AUTO_INCREMENT';  
$strAddConstraints = '??? ??????'; 
$strAddDeleteColumn = '?????/??? ???? ???';
$strAddDeleteRow = '?????/??? ?? ???';
$strAddDropDatabase = '??? ?? ???? ????? ??????';
$strAddIntoComments = '??? ??? ?????????';
$strAddNewField = '????? ??? ????';
$strAddPriv = '????? ?????? ????';
$strAddPrivMessage = '??? ???? ?????? ????.';
$strAddPrivilegesOnDb = '????? ????????? ??? ????? ???????? ???????';
$strAddPrivilegesOnTbl = '????? ????????? ??? ?????? ??????';
$strAddSearchConditions = '??? ???? ????? (??? ?? ?????? "where" clause):';
$strAddToIndex = '????? ????? &nbsp;%s&nbsp;??(???)';
$strAddUser = '??? ?????? ????';
$strAddUserMessage = '??? ???? ?????? ????.';
$strAddedColumnComment = '?? ????? ??????? ??????';
$strAddedColumnRelation = '?? ????? ??????? ??????';
$strAdministration = '?????';
$strAffectedRows = '???? ?????:';
$strAfter = '??? %s';
$strAfterInsertBack = '?????? ??? ?????? ???????';
$strAfterInsertNewInsert = '????? ????? ????';
$strAll = '????';
$strAllTableSameWidth = '???? ?? ??????? ???? ????ֿ';
$strAlterOrderBy = '????? ????? ?????? ??';
$strAnIndex = '??? ????? ?????? ?? %s';
$strAnalyzeTable = '????? ??????';
$strAnd = '?';
$strAny = '??';
$strAnyColumn = '?? ????';
$strAnyDatabase = '?? ????? ??????';
$strAnyHost = '?? ????';
$strAnyTable = '?? ????';
$strAnyUser = '?? ??????';
$strArabic = '???????';  
$strArmenian = '????????';  
$strAscending = '????????';
$strAtBeginningOfTable = '?? ????? ??????';
$strAtEndOfTable = '?? ????? ??????';
$strAttr = '??????';
$strAutodetect = '?????? ????????';  
$strAutomaticLayout = '???? ??????';  

$strBack = '????';
$strBaltic = '???????';  
$strBeginCut = '??? ?????';
$strBeginRaw = '??? ?????? ??????';
$strBinary = '?????';
$strBinaryDoNotEdit = '????? - ???????';
$strBookmarkAllUsers = '???? ??? ?????????? ?????? ??? ??? ??????? ????????';
$strBookmarkDeleted = '??? ????? ??????? ????????.';
$strBookmarkLabel = '?????';
$strBookmarkOptions = '?????? ????????';
$strBookmarkQuery = '????? ?????? SQL-???????';
$strBookmarkThis = '???? ????? ?????? SQL-???????';
$strBookmarkView = '??? ???';
$strBrowse = '???????';
$strBrowseForeignValues = '?????? ????? ???????';  
$strBulgarian = '?????????';  
$strBzError = '?? ????? phpMyAdmin ??? ??? ???????? ???? ??? ?? ?????? Bz2 ?? ????? PHP. ?????? ?? ????? ???? ????? <code>$cfg[\'BZipDump\']</code> ?? ??? ??????? phpMyAdmin ??? <code>FALSE</code>. ?? ??? ???? ??????? ????? ??? Bz2? ???? ???????? ??? ????? ???? ?? PHP. ????? ?? ????????? ???? ?? ????? ??? PHP %s.';
$strBzip = '"bzipped"';

$strCSVOptions = '?????? ????? ???????? ?????? )CSV(';
$strCannotLogin = '?? ???? ?????? ??? ???? MySQL';
$strCantLoad = '?? ???? ????? ???????? %s?<br />???? ???? ?? ??????? PHP.';
$strCantLoadMySQL = '?????? ????? ?????? MySQL,<br />?????? ??? ??????? PHP.';
$strCantLoadRecodeIconv = '?? ???? ????? iconv ?? ????? ????? ???????? ??????? ?????? ????? ?????ݡ ?????? ????? PHP ????? ???????? ??? ?????????? ?? ??? ??? ??????? ?? phpMyAdmin.';
$strCantRenameIdxToPrimary = '?????? ????? ??? ?????? ??? ???????!';
$strCantUseRecodeIconv = '?? ???? ??????? iconv ??? libiconv ??? ????? recode_string ?? ??? ???? ???????? ??? ?????. ????? ?? ??????? PHP.';
$strCardinality = 'Cardinality';
$strCarriage = '????? ???????: \\r';
$strCaseInsensitive = '??? ???? ????? ??????';  
$strCaseSensitive = '???? ????? ??????';  
$strCentralEuropean = '?????? ??????';  
$strChange = '?????';
$strChangeCopyMode = '??? ??? ?????? ???? ???? ????????? ?...';  
$strChangeCopyModeCopy = ' ... ??? ??????.';  
$strChangeCopyModeDeleteAndReload = ' ... ???? ???????? ?? ????? ?????????? ???? ????? ????????? ??? ???.';  
$strChangeCopyModeJustDelete = ' ... ???? ?????? ?? ????? ??????????.';  
$strChangeCopyModeRevoke = ' ... ????? ?? ????????? ??????? ?? ???????? ?????? ??? ???.';  
$strChangeCopyUser = '???? ??????? ?????? / ???? ??? ??????';  
$strChangeDisplay = '???? ????? ???????';
$strChangePassword = '????? ???? ????';
$strCharset = '?????? ???????';  
$strCharsetOfFile = '????? ???? ?????:';
$strCharsets = '??????? ???????';  
$strCharsetsAndCollations = '??????? ??????? ?Collations';  
$strCheckAll = '???? ????';
$strCheckDbPriv = '??? ?????? ????? ????????';
$strCheckOverhead = '???? ?? overheaded';
$strCheckPrivs = '???? ?? ?????????';  
$strCheckPrivsLong = '???? ?? ????????? ?????? ?????? &quot;%s&quot;.';  
$strCheckTable = '?????? ?? ??????';
$strChoosePage = '????? ???? ???? ????????';
$strColComFeat = '????? ??????? ??????';
$strCollation = 'Collation';  
$strColumn = '????';
$strColumnNames = '??? ??????';
$strColumnPrivileges = '??????? ???? ??????';
$strCommand = '????';
$strComments = '???????';
$strCompleteInserts = '??????? ??? ?????';
$strCompression = '?????';
$strConfigFileError = '?? ????? phpMyAdmin ?? ???? ??? ????????!<br />?? ???? ??? ???? ?? PHP ??? ??? ?? ??????? ??? ?? ??? ?? ?????? ?? ??? ?????.<br />????? ???? ????? ???? ????? ???????? ?????? ????? ????? ????? ????? ???????. ?? ???? ??????? ?? ???? ????? ??????? ?? ????? ??????? ???????? ????? ?? ???? ??.<br />?? ???? ??? ???? ????ɡ ???? ??? ??? ?? ????.';
$strConfigureTableCoord = '???? ????? ?????? ?????? %s';
$strConfirm = '?? ???? ???? ?? ???? ??߿';
$strConnections = '???????';
$strConstraintsForDumped = '???? ??????? ????????';
$strConstraintsForTable = '?????? ??????'; 
$strCookiesRequired = '??? ????? ??? ??????? ?? ??? ???????.';
$strCopyTable = '??? ?????? ???';
$strCopyTableOK = '?????? %s ??? ?? ???? ??? %s.';
$strCopyTableSameNames = '?? ???? ??? ?????? ??? ????!';  
$strCouldNotKill = '?? ????? phpMyAdmin ????? ???????? %s. ???? ???? ????? ??????.';
$strCreate = '?????';
$strCreateIndex = '????? ????? ???&nbsp;%s&nbsp;????';
$strCreateIndexTopic = '????? ????? ?????';
$strCreateNewDatabase = '????? ????? ?????? ?????';
$strCreateNewTable = '????? ???? ???? ?? ????? ???????? %s';
$strCreatePage = '???? ???? ?????';
$strCreatePdfFeat = '????? ????? PDF';
$strCreationDates = '?????? ???????/???????/???????';
$strCriteria = '????????';
$strCroatian = '?????????';  
$strCyrillic = '?????????';  
$strCzech = '????????';  

$strDBComment = '?????? ????? ????????: ';
$strDBGContext = '??????';
$strDBGContextID = '??? ??????';
$strDBGHits = '?????????';
$strDBGLine = '???';
$strDBGMaxTimeMs = '???? ??ʡ ??';
$strDBGMinTimeMs = '??? ??ʡ ??';
$strDBGModule = '??????';
$strDBGTimePerHitMs = '???/???????? ??';
$strDBGTotalTimeMs = '????? ?????? ??';
$strDanish = '?????????';  
$strData = '??????';
$strDataDict = '????? ????????';
$strDataOnly = '?????? ???';
$strDatabase = '????? ???????? ';
$strDatabaseExportOptions = '?????? ????? ????? ??????';
$strDatabaseHasBeenDropped = '????? ?????? %s ??????.';
$strDatabaseNoTable = '?? ????? ????? ???????? ??? ??? ?????!';
$strDatabaseWildcard = '????? ??????:';
$strDatabases = '????? ??????';
$strDatabasesDropped = '?? ??? ????? ???????? %s ?????.';  
$strDatabasesStats = '???????? ????? ????????';
$strDatabasesStatsDisable = '???? ??????????';  
$strDatabasesStatsEnable = '???? ??????????';  
$strDatabasesStatsHeavyTraffic = '??????: ????? ???????? ????? ???????? ??? ?? ???? ???? ?????? ???? ??? ???? ???? ????? MySQL.';  
$strDbPrivileges = '??????? ???? ?????? ????????';
$strDbSpecific = '??? ?????? ??????';  
$strDefault = '???????';
$strDefaultValueHelp = '????? ?????????ɡ ?????? ???? ???? ????ɡ ??? ?????? ???? ?? ????ա ???????? ???????: a';  
$strDelOld = '????? ?????? ??????? ????? ?????? ?? ??? ??????. ?? ??? ??? ??? ??????ڿ';  
$strDelayedInserts = '?????? ???????? ????????';
$strDelete = '???';
$strDeleteAndFlush = '???? ?????????? ??? ?????? ????? ????????? ??? ???.';
$strDeleteAndFlushDescr = '??? ?? ???? ????ɡ ??? ????? ????? ????????? ?? ?????? ??? ?????.';
$strDeleteFailed = '????? ????!';
$strDeleteUserMessage = '??? ???? ???????? %s.';
$strDeleted = '??? ?? ??? ????';
$strDeletedRows = '?????? ????????:';
$strDeleting = '???? ???? %s';
$strDescending = '????????';
$strDescription = '?????';  
$strDictionary = '?????';  
$strDisabled = '?????';
$strDisplay = '???';
$strDisplayFeat = '????? ???????';
$strDisplayOrder = '????? ?????:';
$strDisplayPDF = '????? ???? ??? PDF';
$strDoAQuery = '???? "??????? ?????? ??????" (wildcard: "%")';
$strDoYouReally = '?? ???? ???? ?????';
$strDocu = '??????? ???????';
$strDrop = '???';
$strDropDB = '??? ????? ?????? %s';
$strDropSelectedDatabases = '???? ????? ???????? ???????';  
$strDropTable = '??? ????';
$strDropUsersDb = '???? ????? ???????? ???? ??? ??? ????? ??????????.';
$strDumpComments = '???? ??????? ?????? ???????? SQL ??? ?????';
$strDumpSaved = '?? ??? ???Dump ??? ????? %s.';  
$strDumpXRows = '???? %s ??? ???? ?? ????? %s.';
$strDumpingData = '????? ?? ??????? ?????? ??????';
$strDynamic = '????????';

$strEdit = '?????';
$strEditPDFPages = '???? ????? PDF';
$strEditPrivileges = '????? ??????????';
$strEffective = '????';
$strEmpty = '????? ?????';
$strEmptyResultSet = 'MySQL ??? ?????? ????? ????? ????? (?????. ?? ????).';
$strEnabled = '?????';
$strEnd = '?????';
$strEndCut = '?????? ?????';
$strEndRaw = '?????? ???????? ???????';
$strEnglish = '??????????';  
$strEnglishPrivileges = ' ??????: ??? ???????? ??MySQL ???? ?????? ?????? ?????????? ??? ';
$strError = '???';
$strEstonian = '?????????';  
$strExcelEdition = '?????? ????';
$strExcelOptions = '?????? ????';  
$strExecuteBookmarked = '???? ??????? ????? ?????? ??????';  
$strExplain = '???? SQL';
$strExport = '?????';
$strExportToXML = '????? ?????? XML';
$strExtendedInserts = '????? ????';
$strExtra = '?????';

$strFailedAttempts = '??????? ?????';
$strField = '?????';
$strFieldHasBeenDropped = '??? ????? %s';
$strFields = ' ??? ??????';
$strFieldsEmpty = ' ????? ????? ????! ';
$strFieldsEnclosedBy = '??? ???? ??';
$strFieldsEscapedBy = '??? ??????? ??';
$strFieldsTerminatedBy = '??? ????? ??';
$strFileAlreadyExists = '???? %s ????? ????? ??? ??????. ??? ????? ?? ??? ???? ??????? ??? ????? ???????.';  
$strFileCouldNotBeRead = '?? ???? ????? ?????';
$strFileNameTemplate = '???? ??? ?????';
$strFileNameTemplateHelp = '?????? __DB__ ???? ????? ???????ʡ __TABLE__ ???? ?????? ? %sany strftime%s ??????? ????? ????ʡ ???? ??? ????? ????????. ??? ??? ???????? ??? ?? ???.';
$strFileNameTemplateRemember = '???? ??????';
$strFixed = '????';
$strFlushPrivilegesNote = '??????: ???? phpMyAdmin ??????? ?????????? ?? ????? ????????? ?? ???? MySQL ???????. ??????? ??? ??????? ?? ????? ?? ????????? ???? ???????? ?????? ??? ?? ??? ??????? ????? ???????. ?? ??? ?????ɡ ???? %s ?????? ????? ????????? %s ??? ?? ????.';
$strFlushTable = '????? ????? ?????? ("FLUSH")';
$strFormEmpty = '???? ???? ?????? ???????? !';
$strFormat = '????';
$strFullText = '???? ?????';
$strFunction = '????';

$strGenBy = '???? ??????';
$strGenTime = '???? ??';
$strGeneralRelationFeat = '??????? ??????? ??????';
$strGerman = '?????????';  
$strGlobal = '????';  
$strGlobalPrivileges = '???????? ?????';
$strGlobalValue = '???? ?????';
$strGo = '&nbsp;???????&nbsp;';
$strGrantOption = '??????';
$strGrants = 'Grants';
$strGreek = '?????????';  
$strGzip = '"gzipped"';

$strHasBeenAltered = '??? ?????.';
$strHasBeenCreated = '??? ????.';
$strHaveToShow = '???? ?????? ???? ???? ??? ????? ?????';
$strHebrew = '???????';  
$strHome = '?????? ????????';
$strHomepageOfficial = '?????? ???????? ??????? ?? phpMyAdmin';
$strHomepageSourceforge = 'Sourceforge phpMyAdmin ???? ???????';
$strHost = '??????';
$strHostEmpty = '??? ???????? ????!';
$strHungarian = '?????????';  

$strId = '???';
$strIdxFulltext = '???? ??????';
$strIfYouWish = '??? ??? ???? ?? ?? ???? ??? ????? ?????? ???, ??? ???????? ???? ???? ????? ?????.';
$strIgnore = '?????';
$strIgnoringFile = '????? ????? %s';
$strImportDocSQL = '??????? ????? docSQL';
$strImportFiles = '?????? ???????';
$strImportFinished = '????? ?????????';
$strInUse = '??? ?????????';
$strIndex = '?????';
$strIndexHasBeenDropped = '????? ?????? %s';
$strIndexName = '??? ??????&nbsp;:';
$strIndexType = '??? ??????&nbsp;:';
$strIndexes = '?????';
$strInnodbStat = '??? InnoDB';  
$strInsecureMySQL = '????? ??? ???????? ????? ?? ??????? )???????? root ??? ???? ????( ????? ???? ??? ???? ???????? ??????? ??MySQL. ???? MySQL ???? ???? ???? ???????? ?????????? ???? ???? ????????? ????? ?? ???? ?????? ???? ?????? ??? ?? ???? ??? ????.';
$strInsert = '?????';
$strInsertAsNewRow = '????? ?????? ????';
$strInsertNewRow = '????? ????? ????';
$strInsertTextfiles = '????? ??? ??? ?? ??????';
$strInsertedRowId = '??? ????? ?????? ??????:';  
$strInsertedRows = '???? ?????:';
$strInstructions = '???????';
$strInternalNotNecessary = '* ??????? ???????? ??? ?????? ????? ???? ?????? ?????? ?? InnoDB.';
$strInternalRelations = '???????? ????????';
$strInvalidName = '"%s" ???? ??????, ??????? ????????? ???? ????? ??????/????/???.';

$strJapanese = '?????????';  
$strJumpToDB = '???? ??? ????? ?????? &quot;%s&quot;.';  
$strJustDelete = '??? ?? ???? ?????????? ?? ???? ?????????.';
$strJustDeleteDescr = '??? ???? ?????????? &quot;?????????&quot; ?????? ??? ?????? ?????? ??????? ??? ??? ????? ????? ?????????.';

$strKeepPass = '?????? ???? ????';
$strKeyname = '??? ???????';
$strKill = '?????';
$strKorean = '???????';  

$strLaTeX = '????????';
$strLaTeXOptions = '?????? ?????';  
$strLandscape = '??? ??????';
$strLatexCaption = '????? ??????';
$strLatexContent = '???????? ?????? __TABLE__';
$strLatexContinued = '(????)';
$strLatexContinuedCaption = '????? ???? ????';
$strLatexIncludeCaption = '??? ??????? ??????';
$strLatexLabel = 'Label key';
$strLatexStructure = '???? ?????? __TABLE__';
$strLength = '?????';
$strLengthSet = '?????/??????*';
$strLimitNumRows = '??? ??????? ??? ????';
$strLineFeed = '???? ?????: \\n';
$strLines = '????';
$strLinesTerminatedBy = '???? ?????? ??';
$strLinkNotFound = '?? ???? ????? ??????';
$strLinksTo = '????? ??';
$strLithuanian = '??????????';  
$strLoadExplanation = '???? ????? ????? ???? ???????? ??? ??? ????? ??????? ?? ?? ????.';  
$strLoadMethod = '???? LOAD';  
$strLocalhost = '????';
$strLocationTextfile = '???? ??? ???';
$strLogPassword = '???? ????:';
$strLogServer = '???? ??????';
$strLogUsername = '??? ?????????:';
$strLogin = '????';
$strLoginInformation = '?????? ??????';
$strLogout = '????? ????';

$strMIME_MIMEtype = '??? MIME';
$strMIME_available_mime = '????? MIME ????????';
$strMIME_available_transform = '????????? ????????';
$strMIME_description = '?????';
$strMIME_file = '??? ?????';
$strMIME_nodescription = '??? ???? ??? ????? ???? ???????.<br />???? ???? ?????ѡ ?? ????? %s.';
$strMIME_transformation = '????? ???????';
$strMIME_transformation_note = '???? ????? ??????? ??????? ???????? ?????? ??????? MIME ?????? ??ǡ ???? ??? %s?????? ???????%s';
$strMIME_transformation_options = '?????? ???????';
$strMIME_transformation_options_note = '????? ???? ????? ??????? ??????? ???????? ??? ???????: \'a\',\'b\',\'c\'...<br />??? ????? ?? ??? ????? ????? ("\") ?? ????? ????? ("\'") ??? ??? ?????? ?????? ?????? ????? )??? ???? ?????? \'\\\\xyz\' ?? \'a\\\'b\'(.';
$strMIME_without = '????? MIME ???? ???? ????? ????? ??? ??? ????? ????? ??????';
$strMissingBracket = '???? ??? ????';
$strModifications = '??? ?????????';
$strModify = '?????';
$strModifyIndexTopic = '????? ???????';
$strMoreStatusVars = '???????? ???? ??????';
$strMoveTable = '??? ???? ??? (????? ??????<b>.</b>????):';
$strMoveTableOK = '%s ???? ?? ???? ??? %s.';
$strMoveTableSameNames = '?????? ??? ?????? ??? ????!';  
$strMultilingual = '????? ??????';  
$strMustSelectFile = '??? ?? ???? ????? ???? ???? ?? ?????.';  
$strMySQLCharset = '????? ???? MySQL';
$strMySQLReloaded = '?? ????? ????? MySQL ?????.';
$strMySQLSaid = 'MySQL ???: ';
$strMySQLServerProcess = 'MySQL %pma_s1%  ??? ?????? %pma_s2% -  ???????? : %pma_s3%';
$strMySQLShowProcess = '??? ????????';
$strMySQLShowStatus = '??? ???? ?????? MySQL';
$strMySQLShowVars ='??? ??????? ?????? MySQL';

$strName = '?????';
$strNext = '??????';
$strNo = '??';
$strNoDatabases = '?????? ????? ??????';
$strNoDatabasesSelected = '?? ????? ?????? ?????';  
$strNoDescription = '???? ???';
$strNoDropDatabases = '???? "??? ????? ??????"????? ';
$strNoExplain = '????? ??? SQL';
$strNoFrames = 'phpMyAdmin ???? ?????? ?? ?????? <b>????????</b>.';
$strNoIndex = '???? ??? ????!';
$strNoIndexPartsDefined = '????? ??????? ??? ?????!';
$strNoModification = '?? ???????';
$strNoOptions = '??? ??????? ??? ?? ?? ??????';
$strNoPassword = '?? ???? ??';
$strNoPermission = '???? ???? ??? ???? ?????? ???? ????? %s.';  
$strNoPhp = '???? ????? PHP';
$strNoPrivileges = '?????? ??? ?????';
$strNoQuery = '???? ??????? SQL!';
$strNoRights = '??? ???? ?????? ??????? ??? ???? ??? ????!';
$strNoSpace = '?? ???? ????? ????? ???? ????? %s.';  
$strNoTablesFound = '?????? ????? ?????? ?? ????? ???????? ???!.';
$strNoUsersFound = '????????(???) ?? ??? ???????.';
$strNoUsersSelected = '?? ??? ????? ??????.';
$strNoValidateSQL = '????? ??????? ?? SQL';
$strNone = '????';
$strNotNumber = '??? ??? ???!';
$strNotOK = '??? ??????';
$strNotSet = '?????? <b>%s</b> ??? ????? ?? ???? ?? %s';
$strNotValidNumber = ' ??? ??? ??? ?? ????!';
$strNull = '????';
$strNumSearchResultsInTable = '%s ?????? ?? ?????? <i>%s</i>';
$strNumSearchResultsTotal = '<b>???????:</b> <i>%s</i>??????';
$strNumTables = '?????';

$strOK = '?????';
$strOftenQuotation = '?????? ?????? ????????. ??????? ???? ??? ??????  char ? varchar ???? ?? " ".';
$strOperations = '???????';
$strOptimizeTable = '??? ??????';
$strOptionalControls = '???????. ?????? ?? ????? ????? ?? ????? ?????? ?? ????? ??????.';
$strOptionally = '???????';
$strOptions = '??????';
$strOr = '??';
$strOverhead = '??????';
$strOverwriteExisting = '??? ??? ??????? ???????? ?????';  

$strPHP40203 = '??? ?????? ??????? 4.2.3 ?? PHP ????? ????? ??? ???? ???? ?? ??????? ?? ?????? ?????? ?????? (mbstring). ???? ?? ????? ??? PHP ??? 19404. ?? ???? ???????? ??? ?????? ?? PHP ?? phpMyAdmin.';
$strPHPVersion = ' PHP ??????';
$strPageNumber = '???? ???:';
$strPaperSize = '??? ?????';  
$strPartialText = '???? ?????';
$strPassword = '???? ????';
$strPasswordChanged = '?? ????? ???? ?????? ?? %s ?????.';
$strPasswordEmpty = '???? ???? ????? !';
$strPasswordNotSame = '????? ???? ??? ????????? !';
$strPdfDbSchema = '???? ????? ???????? "%s" - ?????? %s';
$strPdfInvalidPageNum = '??? ???? PDF ??? ?????!';
$strPdfInvalidTblName = '?????? "%s" ??? ?????!';
$strPdfNoTables = '?? ???? ?????';
$strPerHour = '??? ????';
$strPerMinute = '??? ?????';
$strPerSecond = '??? ?????';
$strPhoneBook = '???? ??????';  
$strPhp = '???? ????? PHP';
$strPmaDocumentation = '??????? ??????? ?? phpMyAdmin (???????????)';
$strPmaUriError = '??????? <span dir="ltr"><tt>$cfg[\'PmaAbsoluteUri\']</tt></span> ??? ?????? ?? ??? ??????? !';
$strPortrait = '??? ??????';
$strPos1 = '?????';
$strPrevious = '????';
$strPrimary = '?????';
$strPrimaryKey = '????? ?????';
$strPrimaryKeyHasBeenDropped = '??? ?? ??? ??????? ???????';
$strPrimaryKeyName = '??? ??????? ??????? ??? ?? ???? ?????... PRIMARY!';
$strPrimaryKeyWarning = '("???????" <b>???</b> ??? ?? ???? ????? <b>?????? ???</b> ??????? ???????!)';
$strPrint = '????';
$strPrintView = '??? ???? ???????';
$strPrintViewFull = '??? ??????? (?? ?????? ???????).';
$strPrivDescAllPrivileges = '?????? ?? ?????????? ??? GRANT.';
$strPrivDescAlter = '???? ?????? ???? ??????? ???????? ??????.';
$strPrivDescCreateDb = '???? ?????? ????? ?????? ?????? ?????.';
$strPrivDescCreateTbl = '???? ?????? ????? ?????.';
$strPrivDescCreateTmpTable = '???? ?????? ????? ??????.';
$strPrivDescDelete = '???? ???? ????????.';
$strPrivDescDropDb = '???? ???? ????? ????????.';
$strPrivDescDropTbl = '???? ???? ???????.';
$strPrivDescExecute = '???? ?????? ????????? ???????? )stored procedures(? ??? ?? ?? ????? ?? ??? ?????? ?? ???? MySQL.';
$strPrivDescFile = '???? ???????? ?????? ???????? ?? ???? ????????.';
$strPrivDescGrant = '???? ?????? ?????????? ?????????? ??? ????? ????? ????? ?????????.';
$strPrivDescIndex = '???? ?????? ???? ???????.';
$strPrivDescInsert = '???? ?????? ???????? ????????.';
$strPrivDescLockTables = '???? ???? ??????? ???????? ????????.';
$strPrivDescMaxConnections = '???? ?? ??? ????????? ??????? ???? ???? ???????? ????? ??? ????.';
$strPrivDescMaxQuestions = '???? ??? ??????????? ???? ?????? ???????? ??????? ??? ?????? ??? ????.';
$strPrivDescMaxUpdates = '???? ??? ??????? ???? ?????? ???????? ??? ???ɡ ????? ???? ?? ???? ?? ????? ??????.';
$strPrivDescProcess3 = '???? ?????? ??????? ?????????? ???????.';
$strPrivDescProcess4 = '???? ???? ????????? ??????? ?? ??? ????????.';
$strPrivDescReferences = '??? ?? ?? ????? ?? ???? MySQL ????????.';
$strPrivDescReload = '???? ?????? ????? ??????? ?????? ?????? ??? ??????.';
$strPrivDescReplClient = '???? ???? ???????? ??????? ?? ???? ???? slaves/masters.';
$strPrivDescReplSlave = '????? ?????? ????????.';
$strPrivDescSelect = '???? ?????? ????????.';
$strPrivDescShowDb = '???? ??????? ?????? ????? ???? ????? ????????.';
$strPrivDescShutdown = '???? ?????? ??? ??????.';
$strPrivDescSuper = '???? ????????? ??? ?? ??? ??? ??? ????????? ??????.? ????? ?????? ???????? ???? ????????? ??????? other users.';
$strPrivDescUpdate = '???? ?????? ????????.';
$strPrivDescUsage = '?? ???????.';
$strPrivileges = '??????????';
$strPrivilegesReloaded = '?? ????? ????? ????????? ?????.';
$strProcesslist = '??? ?????????';
$strProperties = '?????';
$strPutColNames = '?? ????? ?????? ?? ????? ?????';

$strQBE = '??????? ?????? ????';
$strQBEDel = 'Del';
$strQBEIns = 'Ins';
$strQueryFrame = '????? ?????????';
$strQueryFrameDebug = '??????? ????? ???????';
$strQueryFrameDebugBox = '????????? ???????? ?????? ?????????:\n????? ??????: %s\n????: %s\n????: %s\n\n????????? ??????? ?????? ?????????:\n????? ??????: %s\n????: %s\n????: %s\n\n???? ??????: %s\n???? ?????? ????????: %s.';
$strQueryOnDb = '?? ????? ???????? SQL-??????? <b>%s</b>:';
$strQuerySQLHistory = '???? SQL ?????';
$strQueryStatistics = '<b>???????? ?????????</b>: %s ??????? ???? ??? ?????? ??? ??????.';
$strQueryTime = '?????? ????????? %01.4f ?????';
$strQueryType = '??? ?????????';
$strQueryWindowLock = '?? ???? ??? ??? ????????? ?? ???? ???????';  

$strReType = '??? ?????';
$strReceived = '???????';
$strRecords = '?????????';
$strReferentialIntegrity = '????? ??????? ???????:';
$strRelationNotWorking = '??? ????? ??????? ???????? ????? ???????? ?????????. ?????? ????? ???? %s???%s.';
$strRelationView = '??? ???????';
$strRelationalSchema = '???? ??????????';
$strRelations = '???????';  
$strReloadFailed = ' ????? ????? ?????MySQL.';
$strReloadMySQL = '????? ????? MySQL';
$strReloadingThePrivileges = '??? ????? ????? ?????????.';
$strRememberReload = '????? ?????? ????? ??????.';
$strRemoveSelectedUsers = '???? ?????????? ????????';
$strRenameTable = '????? ??? ???? ???';
$strRenameTableOK = '?? ????? ????? ??? %s  ????%s';
$strRepairTable = '????? ??????';
$strReplace = '???????';
$strReplaceNULLBy = '?????? NULL ??';  
$strReplaceTable = '??????? ?????? ?????? ??????';
$strReset = '?????';
$strResourceLimits = '???? ???????';
$strRevoke = '?????';
$strRevokeAndDelete = '?????? ?? ????????? ??????? ?? ?????????? ?? ?????? ??? ???.';
$strRevokeAndDeleteDescr = '??? ???? ???????? USAGE ??? ?????????? ??? ??? ????? ????? ?????????.';
$strRevokeGrant = '????? Grant';
$strRevokeGrantMessage = '??? ????? ?????? Grant ?? %s';
$strRevokeMessage = '??? ????? ?????????? ?? %s';
$strRevokePriv = '????? ????????';
$strRowLength = '??? ????';
$strRowSize = ' ???? ???? ';
$strRows = '????';
$strRowsFrom = '???? ???? ??';
$strRowsModeFlippedHorizontal = ')?????? ??????( ??????';
$strRowsModeHorizontal = '????';
$strRowsModeOptions = ' %s ? ????? ?????? ??? %s ???';
$strRowsModeVertical = '?????';
$strRowsStatistic = '????????';
$strRunQuery = '????? ?????????';
$strRunSQLQuery = '????? ???????/????????? SQL ??? ????? ?????? %s';
$strRunning = ' ??? ?????? %s';
$strRussian = '???????';  

$strSQL = 'SQL';
$strSQLExportType = '??? ???????'; 
$strSQLOptions = '?????? SQL';
$strSQLParserBugMessage = '???? ?????? ??? ???? ??? ??? ?? ????? SQL. ????? ????? ???????? ????ɡ ?????? ?? ?? ?????? ??????? ????? ????????. ??? ????? ??????? ?????? ?? ???? ??? ????? ????? ??? ????? ??? ?????? ??? ????? ???? ????? ???????. ????? ????? ????? ???????? ?????? ??? ????? MySQL. ?? ?????? ????? ??? ???? MySQL ?????? ?? ???? ???? ????ɡ ??? ????? ???????. ?? ??? ???? ????? ?? ?? ???? ??????? ?? ??? ??? ??????? ??? ??????ѡ ????? ???? ??? ???????? ???????? ???? ???? ??????ɡ ??? ?????? ????? ??? ?? ??? ???????? ?? ????? ????? ?????:';
$strSQLParserUserError = '???? ?? ???? ??? ?? ??????? SQL. ??? ?????? ????? ????? ?? ???? MySQL ????? ?? ????? ??????ɡ ?? ??? ???? ????ɡ.';
$strSQLQuery = '???????-SQL';
$strSQLResult = '???? ??????? SQL';
$strSQPBugInvalidIdentifer = '????? ??? ????';
$strSQPBugUnclosedQuote = '????? ????? ??? ?????';
$strSQPBugUnknownPunctuation = '?? ????? ??? ?????';
$strSave = '?????';
$strSaveOnServer = '???? ??? ?????? ?? ?????? %s';  
$strScaleFactorSmall = '???? ????? ??????? ????? ??? ??????? ?????? ?? ???? ?????.';
$strSearch = '????';
$strSearchFormTitle = '???? ?? ????? ????????';
$strSearchInTables = '???? ??????)???????(:';
$strSearchNeedle = '??????? ?? ????? ??????? ????? ???? (wildcard: "%"):';
$strSearchOption1 = '??? ????? ??? ???????';
$strSearchOption2 = '?? ???????';
$strSearchOption3 = '?????? ??????';
$strSearchOption4 = '????? ??????';
$strSearchResultsFor = '???? ?? ??????? ?? "<i>%s</i>" %s:';
$strSearchType = '????:';
$strSecretRequired = '????? ??? ??????? ???? ??? ???? ?????? ???????.';  
$strSelect = '??????';
$strSelectADb = '???? ????? ?????? ?? ???????';
$strSelectAll = '????? ????';
$strSelectFields = '?????? ???? (??? ????? ????):';
$strSelectNumRows = '?? ?????????';
$strSelectTables = '???? ???????';
$strSend = '??? ????';
$strSent = '??????';
$strServer = '???? %s';
$strServerChoice = '?????? ??????';
$strServerStatus = '?????? ???????';
$strServerStatusUptime = '??? ??? ??? ???? MySQL ??? %s. ??? ????? ?? %s.';
$strServerTabProcesslist = '????????';
$strServerTabVariables = '????????';
$strServerTrafficNotes = '<b>???? ??????</b>: ???? ??? ??????? ???????? ???? ?????? ?????? ???? ?????? ??? ??????.';
$strServerVars = '???????? ???????? ??????';
$strServerVersion = '?????? ??????';
$strSessionValue = '???? ??????';
$strSetEnumVal = '??? ??? ??? ????? ?? "enum" ?? "set", ?????? ????? ????? ???????? ??? ???????: \'a\',\'b\',\'c\'...<br />??? ??? ????? ??? ??? ????? ?????? ??????? ?????? ("\") ?? ????? ???????? ??????? ("\'") ???? ??? ??? ?????, ?????? ????? ????? ?????? (????? \'\\\\xyz\' ?? \'a\\\'b\').';
$strShow = '???';
$strShowAll = '???? ????';
$strShowColor = '???? ?????';
$strShowCols = '???? ???????';
$strShowDatadictAs = '????? ????? ????????';
$strShowFullQueries = '???? ??????????? ?????';  
$strShowGrid = '???? ????? ??????';
$strShowPHPInfo = '??? ????????? ???????? ?  PHP';
$strShowTableDimension = '????? ????? ???????';
$strShowTables = '???? ??????';
$strShowThisQuery = ' ??? ??? ????????? ??? ??? ???? ';
$strShowingRecords = '?????? ??????? ';
$strSimplifiedChinese = '??????? ???????';  
$strSingly = '(????)';
$strSize = '?????';
$strSort = '?????';
$strSortByKey = '???? ??? ???????';
$strSpaceUsage = '??????? ????????';
$strSplitWordsWithSpace = '??????? ?????? ???? ????? (" ").';
$strStatCheckTime = '?????? ??????';
$strStatCreateTime = '???????';
$strStatUpdateTime = '??????? ??????';
$strStatement = '?????';
$strStatus = '????';
$strStrucCSV = '?????? CSV';
$strStrucData = '?????? ?????????';
$strStrucDrop = ' ????? \'??? ???? ??? ??? ??????\' ?? ???????';
$strStrucExcelCSV = '?????? CSV ??????? ????????? ????';
$strStrucOnly = '?????? ???';
$strStructPropose = '????? ???? ??????';
$strStructure = '????';
$strSubmit = '?????';
$strSuccess = '????? ?? ?? ?????? ????? SQL-???????';
$strSum = '???????';
$strSwedish = '????????';  
$strSwitchToTable = '???? ??? ?????? ???????';  

$strTable = '?????? ';
$strTableComments = '??????? ??? ??????';
$strTableEmpty = '??? ?????? ????!';
$strTableHasBeenDropped = '???? %s ?????';
$strTableHasBeenEmptied = '???? %s ?????? ?????????';
$strTableHasBeenFlushed = '??? ?? ????? ????? ?????? %s  ?????';
$strTableMaintenance = '????? ??????';
$strTableOfContents = '???? ?????????';
$strTableOptions = '?????? ??????';  
$strTableStructure = '???? ??????';
$strTableType = '??? ??????';
$strTables = '%s  ???? (?????)';
$strTblPrivileges = '??????? ???? ???????';
$strTextAreaLength = ' ???? ????,<br /> ??? ??????? ?? ??? ????? ??? ???? ??????? ';
$strThai = '??????????';  
$strTheContent = '??? ?? ????? ??????? ????.';
$strTheContents = '??? ?? ??????? ??????? ?????? ?????? ?????? ???????? ?????? ?? ??????? ??????? ???? ???????? ?????.';
$strTheTerminator = '???? ??????.';
$strThisHost = '??? ??????';
$strThisNotDirectory = '?? ??? ??? ??????';
$strThreadSuccessfullyKilled = '?? ????? ???????? %s ?????.';
$strTime = '???';
$strToggleScratchboard = 'toggle scratchboard';  
$strTotal = '???????';
$strTotalUC = '????? ????';
$strTraditionalChinese = '??????? ?????????';  
$strTraffic = '?????? ???';
$strTransformation_image_jpeg__inline = '???? ???? ????? ????? ????ǡ ????????:  ????֡ ???????? ??????? )????? ??????? ?????? ?????(.';  
$strTransformation_image_jpeg__link = '???? ?????? ???? ?????? (direct blob download, i.e.).';
$strTransformation_image_png__inline = '???? ???/jpeg: ???? ?????';  
$strTransformation_text_plain__dateformat = '?????? TIME, TIMESTAMP ?? DATETIME ???????? ???????? ????? ??????? ?????? ????? ??. ?????? ????? ?? ??????? )????????) ????? ??? ???? ??? timestamp )??? ???? ???????(. ?????? ?????? ?? ????? ????? ????? ????? ??? ????????? ???????? ??PHP strftime().';
$strTransformation_text_plain__external = '????? ???: ????? ??????? ??????? ? ???? ?????? ?????? ????? ??? ?????? ?????????. ?????? ?????? ??????? ??????????. ?????? ?????????? ?? Tidy? ?? ???? ????? ?? HTML ???? ????. ?????? ????ɡ ???? ?? ???? ?????? ????? libraries/transformations/text_plain__external.inc.php ?????? ??????? ???? ???? ?? ???? ??? ??????. ?????? ????? ??? ??? ?? ??? ???????? ???? ???? ?? ??????? ??????? ?????? ?? ????????? ????????. ??? ???? ?????? ?????ˡ ?? ??? ????? 1? ?????? ???????? ???????? htmlspecialchars() )?????? ?????????? 1(. ????? ???ڡ ?? ??? ????? 1 ??? ???? ????? NOWRAP ??? ?????? ??????? ??? ???? ?????? ?????? ??? ????? ????? )?????? ?????????? 1(.';
$strTransformation_text_plain__formatted = '????? ??????? ?????? ?????. ?? ??? ??? ?? Escaping.';
$strTransformation_text_plain__imagelink = '???? ???? ????ء ????? ????? ??? ??? ????ݡ ?????? ????? ?? ????? ??? "http://domain.com/"? ??????? ?????? ?? ????? ???????? ??????? ?? ????????.';  
$strTransformation_text_plain__link = '???? ??????? ????? ????? ??? ????ݡ ??????? ????? ?? ????? ??? "http://domain.com/"? ??????? ?????? ?? ??????? ??????.';  
$strTransformation_text_plain__substr = '???? ??? ???? ?? ????. ?????? ????? ???? ???? ??? ???? ???? )??? ???? ???????(. ?????? ?????? ?? ????? ??? ???? ????????. ?? ??? ??????? ?????? ?? ???? ??????. ?????? ?????? ???? ?? ?? ?????? ??? ???? ??? ???????? ??? ??????? ??? ?? ???? )... ???? ???????(.';
$strTransformation_text_plain__unformatted = '???? ?? ????? HTML ??????. ?? ???? ?? ????? HTML.';
$strTruncateQueries = '???? ??????????? ????????';  
$strTurkish = '???????';  
$strType = '?????';

$strUkrainian = '?????????';  
$strUncheckAll = '????? ????? ????';
$strUnicode = '???????';  
$strUnique = '????';
$strUnknown = '??? ??????';  
$strUnselectAll = '????? ????? ????';
$strUpdComTab = '???? ???? ??????? ?????? ????? ???? Column_comments.';  
$strUpdatePrivMessage = '??? ???? ????? ?????????? ?? %s.';
$strUpdateProfile = '????? ????? ???????:';
$strUpdateProfileMessage = '??? ?? ????? ????? ???????.';
$strUpdateQuery = '????? ???????';
$strUpgrade = '???? ??????? ??? %s %s ?? ?????.';
$strUsage = '???????';
$strUseBackquotes = '????? ????? ??????? ? ?????? ? "`" ';
$strUseHostTable = '?????? ?????? ??????';  
$strUseTables = '?????? ??????';
$strUseTextField = '?????? ??? ???';
$strUseThisValue = '?????? ??? ??????';  
$strUser = '????????';
$strUserAlreadyExists = '??? ???????? %s ????? ??????!';
$strUserEmpty = '??? ???????? ????!';
$strUserName = '??? ????????';
$strUserNotFound = '???????? ?????? ??? ????? ?? ???? ?????????.';
$strUserOverview = '??????? ????????';
$strUsers = '??????????';
$strUsersDeleted = '?? ??? ?????????? ???????? ?????.';
$strUsersHavingAccessToDb = '?????????? ??? ?????? ?????? ??? &quot;%s&quot;';  

$strValidateSQL = '?????? ?? ??????? SQL';
$strValidatorError = '?? ???? ????? ???? SQL. ?????? ?????? ??? ??? ??? ?????? ?????? PHP ??? ?? ????? ?? %s???????%s.';
$strValue = '??????';
$strVar = '??????';
$strViewDump = '??? ???? ?????? ';
$strViewDumpDB = '??? ???? ????? ????????';
$strViewDumpDatabases = '???? ?? ???? ???? ????? ????????.';

$strWebServerUploadDirectory = '???? ????? ??????? ??? ???? ??????';
$strWebServerUploadDirectoryError = '?????? ???? ????? ?????? ???? ?? ???? ?????? ????.';
$strWelcome = '????? ?? ?? %s';
$strWestEuropean = '?????? ???????';  
$strWildcard = '??? ????';  
$strWindowNotFound = '?? ???? ????? ????? ??????? ?????????. ???? ??? ????? ???????? ?? ?? ??????? ???? ??????? ??? ??????? ???? ??????? ??????.';  
$strWithChecked = ': ??? ??????';
$strWritingCommentNotPossible = '????? ??????? ??? ????';
$strWritingRelationNotPossible = '????? ??????? ??? ?????';
$strWrongUser = '??? ??? ????????/???? ????. ?????? ?????.';

$strXML = 'XML';

$strYes = '???';

$strZeroRemovesTheLimit = '??????: ????? ??? ???????? ????? 0 )???( ???? ?????.';
$strZip = '"zipped" "?????"';

?>
