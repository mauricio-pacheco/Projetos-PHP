# MySQL-Front 3.1  (Build 4.38)


# Host: Local    Database: agrobella
# ------------------------------------------------------
# Server version 5.0.51

#
# Table structure for table buscador
#

CREATE TABLE `buscador` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(250) NOT NULL,
  `area` varchar(20) NOT NULL,
  `link` varchar(1000) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

#
# Dumping data for table buscador
#

INSERT INTO `buscador` VALUES (1,'C�es','Pet','caes.php');
INSERT INTO `buscador` VALUES (2,'Peixes','Pet','peixes.php');
INSERT INTO `buscador` VALUES (3,'Coelhos','Pet','coelhos.php');
INSERT INTO `buscador` VALUES (4,'Codornas','Pet','codornas.php');
INSERT INTO `buscador` VALUES (5,'Su�nos','Comercial','suinos.php');
INSERT INTO `buscador` VALUES (6,'Aves','Comercial','aves.php');
INSERT INTO `buscador` VALUES (7,'Gado de Leite','Comercial','gadoleite.php');
INSERT INTO `buscador` VALUES (8,'Gado de Corte','Comercial','gadocorte.php');
INSERT INTO `buscador` VALUES (9,'Equinos','Comercial','equinos.php');
INSERT INTO `buscador` VALUES (10,'Ovinos e Caprinos','Comercial','ovinos.php');
INSERT INTO `buscador` VALUES (11,'Herbicidas Flex','Agricola','prod1.php');
INSERT INTO `buscador` VALUES (12,'Herbicidas FusiFlex','Agricola','prod2.php');
INSERT INTO `buscador` VALUES (13,'Herbicidas Fusilade','Agricola','prod3.php');
INSERT INTO `buscador` VALUES (14,'Herbicidas Gramocil','Agricola','prod4.php');
INSERT INTO `buscador` VALUES (15,'Herbicidas Gramoxone','Agricola','prod5.php');
INSERT INTO `buscador` VALUES (16,'Herbicidas Primatop','Agricola','prod6.php');
INSERT INTO `buscador` VALUES (17,'Herbicidas Robust','Agricola','prod7.php');
INSERT INTO `buscador` VALUES (18,'Herbicidas Zapp','Agricola','prod8.php');
INSERT INTO `buscador` VALUES (19,'Inseticidas Actara','Agricola','inset1.php');
INSERT INTO `buscador` VALUES (20,'Inseticidas Engeo Pleno','Agricola','inset2.php');
INSERT INTO `buscador` VALUES (21,'Inseticidas Karate Zeon','Agricola','inset3.php');
INSERT INTO `buscador` VALUES (22,'Inseticidas Match','Agricola','inset4.php');
INSERT INTO `buscador` VALUES (23,'Inseticidas Vertimec','Agricola','inset5.php');
INSERT INTO `buscador` VALUES (24,'Fungicidas Amistar','Agricola','funji1.php');
INSERT INTO `buscador` VALUES (25,'Fungicidas Mertin','Agricola','funji2.php');
INSERT INTO `buscador` VALUES (26,'Fungicidas Priori Xtra','Agricola','funji3.php');
INSERT INTO `buscador` VALUES (27,'Fungicidas Score','Agricola','funji4.php');
INSERT INTO `buscador` VALUES (28,'Fungicidas Ridomil Gold','Agricola','funji5.php');
INSERT INTO `buscador` VALUES (29,'Fungicidas Maxim XL','Agricola','semente1.php');
INSERT INTO `buscador` VALUES (30,'Fungicidas Spectro','Agricola','semente2.php');
INSERT INTO `buscador` VALUES (31,'Inseticidas Cruiser','Agricola','semente3.php');
INSERT INTO `buscador` VALUES (32,'Espalhante Adesivo Agral','Agricola','espalhante.php');

#
# Table structure for table fotos
#

CREATE TABLE `fotos` (
  `idgaleria` varchar(20) NOT NULL,
  `foto1` varchar(250) NOT NULL,
  `foto2` varchar(250) NOT NULL,
  `foto3` varchar(250) NOT NULL,
  `foto4` varchar(250) NOT NULL,
  `foto5` varchar(250) NOT NULL,
  `foto6` varchar(250) NOT NULL,
  `foto7` varchar(250) NOT NULL,
  `foto8` varchar(250) NOT NULL,
  `foto9` varchar(250) NOT NULL,
  `foto10` varchar(250) NOT NULL,
  `comen1` varchar(254) NOT NULL,
  `comen2` varchar(254) NOT NULL,
  `comen3` varchar(254) NOT NULL,
  `comen4` varchar(254) NOT NULL,
  `comen5` varchar(254) NOT NULL,
  `comen6` varchar(254) NOT NULL,
  `comen7` varchar(254) NOT NULL,
  `comen8` varchar(254) NOT NULL,
  `comen9` varchar(254) NOT NULL,
  `comen10` varchar(254) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Dumping data for table fotos
#

INSERT INTO `fotos` VALUES ('26','3.jpg','','','','','','','','','','','','','','','','','','','');
INSERT INTO `fotos` VALUES ('26','7.jpg','','','','','','','','','','fdgdfg','','','','','','','','','');
INSERT INTO `fotos` VALUES ('27','4.jpg','','','','','','','','','','Equipe de colaboradores','','','','','','','','','');
INSERT INTO `fotos` VALUES ('27','2.jpg','','','','','','','','','','Almoço de Confraternização ','','','','','','','','','');
INSERT INTO `fotos` VALUES ('27','3.jpg','','','','','','','','','','Concurso para familiares dos funcionários','','','','','','','','','');
INSERT INTO `fotos` VALUES ('27','Placa.jpg','','','','','','','','','','Entrega de Placa os Proprietários Benoni e Elenir em homenagem aos Dez Anos da AgroBella Alimentos.','','','','','','','','','');
INSERT INTO `fotos` VALUES ('28','Futebol01.jpg','','','','','','','','','','','','','','','','','','','');
INSERT INTO `fotos` VALUES ('28','Futebol02.jpg','','','','','','','','','','','','','','','','','','','');
INSERT INTO `fotos` VALUES ('28','Futebol03.jpg','','','','','','','','','','','','','','','','','','','');
INSERT INTO `fotos` VALUES ('29','futebol01.jpg','','','','','','','','','','','','','','','','','','','');
INSERT INTO `fotos` VALUES ('29','futebol02.jpg','','','','','','','','','','','','','','','','','','','');
INSERT INTO `fotos` VALUES ('29','futebol03.jpg','','','','','','','','','','Reinauguração do campo de futebol da AgroBella!!!','','','','','','','','','');

#
# Table structure for table galerias
#

CREATE TABLE `galerias` (
  `id` int(11) NOT NULL auto_increment,
  `nomegaleria` varchar(250) NOT NULL,
  `foto1` varchar(250) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

#
# Dumping data for table galerias
#

INSERT INTO `galerias` VALUES (29,'futebol','futebol01.jpg');

#
# Table structure for table login
#

CREATE TABLE `login` (
  `login` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Dumping data for table login
#

INSERT INTO `login` VALUES ('agrobella','bella');

#
# Table structure for table noticias
#

CREATE TABLE `noticias` (
  `id` int(8) NOT NULL auto_increment,
  `titulo` text NOT NULL,
  `data` varchar(40) NOT NULL,
  `hora` varchar(40) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

#
# Dumping data for table noticias
#

INSERT INTO `noticias` VALUES (2,'BC MANTÉM TAXA SELIC EM 11,25% PELA SEGUNDA VEZ SEGUIDA','24/01/2008','08:29:11','Seguindo as expectativas do mercado financeiro, o Comitê de Política Monetária do Banco Central (Copom) optou novamente pelo conservadorismo e manteve a taxa Selic em 11,25% ao ano. Os argumentos do Copom serão conhecidos na quinta-feira da próxima semana, quando será divulgada a ata da reunião encerrada há pouco. <br>\r\n\r\nA decisão foi unânime. Em nota, o BC informa que \"avaliando a conjuntura macroeconômica e as perspectivas para a inflação, o Copom decidiu por unanimidade manter a taxa Selic em 11,25% ao ano, sem viés. O Comitê irá acompanhar a evolução do cenário macroeconômico até sua próxima reunião, para então definir os próximos passos na sua estratégia de política monetária\". <br>\r\n\r\nEmbora a inflação tenha avançado nos últimos meses e o cenário externo seja de incertezas, o mercado já apostava que o Copom optaria pela manutenção da taxa básica de juros, como fez em seus dois últimos encontros. As 55 instituições financeiras ouvidas pela Agência Leia acreditavam na manutenção da taxa Selic. O dado é do Termômetro Leia, pesquisa feita com instituições de mercado com as estimativas para os principais indicadores econômicos do país. <br>\r\n\r\nDe acordo com o Boletim Focus da última segunda-feira, a previsão do mercado de manutenção da Selic nesta próxima reunião acontece pela décima terceira semana consecutiva. Para o fim de 2008, a previsão é a mesma, de 11,25% ao ano. Para o final de 2009, a aposta indicada pelo Focus é de 10% ao ano para a taxa básica de juros da economia brasileira. <br>\r\n\r\nNa ata da última reunião, de dezembro, o Copom justifica a manutenção dos juros destacando que houve elevação relevante da inflação tanto em economias maduras quanto nas emergentes, o que evidencia a intensificação de riscos inflacionários em escala global. O colegiado disse ainda na ocasião que segue atento ao movimento de repasse de preços do atacado para o varejo e que continuará acompanhando a evolução da inflação e das diferentes medidas do seu núcleo, assim como das expectativas de inflação dentro do horizonte de projeção. Na mesma ata, o Copom voltou também a afirmar que uma parte importante do efeito dos cortes realizados a partir de setembro de 2005 ainda não se sentiu na atividade econômica, bem como que os efeitos da atividade sobre a inflação ainda não se materializaram por completo. <br>\r\n\r\nCopom promoveu cortes sucessivos na taxa desde setembro 2005, mas diminuiu a velocidade da redução em janeiro, março e abril do ano passado, quando baixou a taxa em apenas 0,25 ponto percentual. Em junho e julho o ritmo dos cortes foi retomado e houve redução de 0,5 ponto percentual em cada uma das duas reuniões. Em setembro, no entanto, o corte foi menor, 0,25 ponto percentual. Em outubro e dezembro o Copom retomou o conservadorismo e manteve os juros em 11,25%, postura que deve ser adotada também nas próximas reuniões. <br>\r\n\r\nO próximo encontro do Copom acontece nos dias 4 e 5 de março. <br>\r\n\r\nAs informações são da Agência Leia. (FR) ');
INSERT INTO `noticias` VALUES (3,'TRIGO: BRASIL MANTÉM TARIFA PARA PRODUTO IMPORTADO DE FORA DO MERCOSUL ','30/01/2008','09:09:45',' Os ministros que integram a Câmara de Comércio Exterior (Camex) decidiram nesta terça-feira (29) manter em 10% a Tarifa Externa Comum (TEC) sobre o trigo em grão importado de países de fora do Mercosul. A decisão foi tomada após o anúncio de que o governo argentino vai reabrir os registros de exportação do produto, que estavam suspensos desde dezembro. <br>\r\nA Argentina é o principal fornecedor de trigo do Brasil, responsável por cerca de 90% das importações do cereal. Após a suspensão dos registros de exportação naquele país, o governo brasileiro passou a estudar a redução tarifária, a fim de facilitar a entrada de trigo do Canadá e dos Estados Unidos e evitar desabastecimento do grão. <br>\r\nDe acordo com informações da Secretaria de Agricultura do Ministério da Economia e Produção da Argentina, o país vai autorizar o registro de exportação de 2 milhões de toneladas de trigo nos próximos cinco meses. Não foi definida a quantidade a ser vendida ao Brasil. <br>\r\nO ministro das Relações Exteriores, Celso Amorim, disse considerar o anúncio argentino como \"um dado positivo\". Ressalvou, porém, que o Brasil avaliará as novas condições antes de decidir sobre a redução tarifária para outros países. \"A nota do governo argentino é baseada em estimativas. É preciso comparar com as nossas estimativas de desabastecimento. Isso vai ser estudado\", adiantou. <br>\r\n\"Vão ser examinados os estoques do produto. Por enquanto, nenhuma alteração vai ser feita. Como a Argentina informou que regularizou a exportação, provavelmente o Brasil comprará da Argentina e outras medidas não serão necessárias\", acrescentou a secretária-executiva da Camex, Lytha Spíndola. <br>\r\nDe acordo com o ministro da Agricultura, Reinhold Stephanes, o Brasil não corre riscos imediatos de desabastecimento de trigo. Em 2006, o país produziu apenas 22% do total consumido. <br>\r\nA Camex é o órgão do governo responsável pelas políticas relativas ao comércio exterior e é composta pelos ministros do Desenvolvimento, Indústria e Comércio Exterior, Casa Civil, Relações Exteriores, Fazenda, Planejamento, Agricultura e Desenvolvimento Agrário. Com informações da Agência Brasil. (AB) <br>\r\nFonte: CMA. \r\n');
INSERT INTO `noticias` VALUES (4,'Queda de Preços','30/01/2008','09:14:11','Nos últimos dias, os preços do milho seguiram em queda, pressionados pela demanda estável e pela maior oferta (produtores visam “limpar” os armazéns para a entrada do produto da nova safra e a colheita avança). Entre 21 e 28 de janeiro, o Indicador ESALQ/BM&F (Campinas – SP) caiu 3,64%, fechando a R$ 28,81 nessa segunda-feira, 28. No mês, o recuo acumulado já chega a 11,97%. Dados apontam que essa pressão sobre as cotações deve permanecer. Até essa segunda-feira, 28, os futuros do milho na BM&F apontavam preços no mercado interno entre R$ 23,00 e R$ 24,00/sc de 60 kg de março a setembro deste ano. Somente a partir do contrato Novembro/08 que as cotações voltariam para próximas de R$ 26,00/sc de 60 kg. O mercado futuro opera com base na região de Campinas (SP) para formação de preços. <br> \r\nNos últimos dias, o mercado interno de soja acompanhou as baixas da CBOT. Entre 18 e 25 de janeiro, os futuros da CBOT para os próximos três vencimentos caíram 3,2%. O Indicador CEPEA/ESALQ (estado do Paraná) recuou 0,66% no mesmo período, a R$ 46,45/sc de 60 kg, na sexta-feira, 25. Para o Indicador ESALQ/BM&F (produto posto porto de Paranaguá), a queda foi de 1,65%, a R$ 48,00/sc de 60 kg na sexta. Apesar das recentes baixas, os preços seguem a patamares atrativos e maiores se comparados aos do mesmo período de 2007. Esse fator somado às incertezas quanto aos preços para os próximos períodos fizeram com que produtores optassem por intensificar as vendas antecipadas de uma maior parte da produção da safra 2007/08. <br> \r\nCepea/Esalq\r\n');
INSERT INTO `noticias` VALUES (5,'Adiada a aprovação de milho transgênico','30/01/2008','09:16:21','O Conselho Nacional de Biossegurança (CNB), formado por representantes de onze ministérios brasileiros, adiou para o próximo mês a decisão sobre a liberação do plantio comercial de milho transgênico no país. A reunião na tarde de ontem, que durou pouco mais de duas horas, terminou sem conclusão. O conselho teria ainda questionamentos, mas o teor das dúvidas não foi divulgado até o fechamento desta edição. A próxima reunião deve ocorrer no dia 12. <br>\r\n\r\nO CNB deveria analisar a liberação de duas variedades de milho transgênico aprovadas no ano passado pelo Comissão Técnica Nacional de Biossegurança (CTNBio) - o Liberty Link, da Bayer CropScience, e o Guardian, da Monsanto. Uma terceira variedade, o Bt11, da Syngenta, aprovado em setembro, ainda não tem data marcada para apreciação pelo conselho. Se aprovadas na próxima reunião, a expectativa é que as variedades da Bayer e da Monsanto já estejam liberadas para a safra do ano que vem. <br>\r\n\r\nO plantio comercial do milho transgênico é altamente polêmico e sua avaliação foi adiada algumas vezes pela Justiça, que exigiu mais informações sobre o fluxo gênico e sobre as regras de monitoramento e transporte. Isso porque, ao contrário da soja, existe polinização no milho e, portanto, o risco de contaminação de plantas transgênicas no milho convencional e orgânico . <br>\r\n\r\nSegundo o Greenpeace, \"a possibilidade de contaminação de plantações de milho por variedades transgênicas é um desastre que o Brasil não pode arcar sem prejuízos sérios à agricultura\". Em entrevista anteontem à \"Folha de S. Paulo\", o ministro da Ciência e Tecnologia, Sérgio Rezende, fez uma afirmação que poderá pressionar ainda mais o CNB: já existiria plantio de milho transgênico contrabandeado no Sudeste e Centro-Oeste do país. <br>\r\n\r\nEm evento ontem em São Paulo, Ywao Miyamoto, presidente da Associação Brasileira de Sementes e Mudas (Abrasem), afirmou que tem notícias sobre a entrada ilegal de sementes transgênicas de milho no país. Mas seria um \"problema pontual\" e que tenderia a acabar quando o seu plantio comercial for aprovado. Além das variedades de milho, o Brasil já tem aprovadas a comercialização da soja Roundup Ready (RR), tolerante a herbicida, e o algodão Bollgard (BT), resistente a insetos. Ambos foram desenvolvidos pela Monsanto. <br>\r\n\r\nA economia com herbicidas tem sido o argumento mais comum da indústria para defender os transgênicos. As multinacionais apontam ainda outro fator: as sementes já são utilizadas há anos em países como Argentina. <br>\r\n\r\nDe qualquer forma, há um longo caminho para o consenso internacional. Muitos países europeus vêem com extrema cautela a inserção de organismos transgênicos na cadeia alimentar, temendo consequências ainda imprevisíveis para a saúde humana e o ambiente. Pesquisas refletem esse sentimento: sete em cada dez europeus dizem que não comeriam alimentos transgênicos. <br>\r\n\r\nRecentemente, a França decidiu invocar uma cláusula de salvaguarda da União Européia para barrar o cultivo da variedade MON 810, da Monsanto, depois que um órgão do governo disse ter dúvidas sobre o produto. Na Espanha, onde 10% de toda a produção de milho já é transgênica, cresce a pressão de setores da sociedade civil, que denunciam contaminações de plantações. <br>\r\n\r\n\r\nFonte: Valor Econômico<br>\r\nAutor: Bettina Barros\r\n<br>');
INSERT INTO `noticias` VALUES (6,'SOJA: NÚMERO DE FOCOS E SEVERIDADE DA FERRUGEM DEVE AUMENTAR EM MT','7/02/2008','08:28:14','A intensidade e a freqüência de chuvas ocorridas em janeiro e início de fevereiro em Mato Grosso, o início da colheita das cultivares de soja de ciclo super precoce e precoce (algumas com níveis elevados de esporos de ferrugem) provavelmente acarretarão um aumento de focos da ferrugem da soja no estado. Dados oficiais indicam que 21 focos da doença foram encontrados em regiões produtoras de MT. <br>\r\n\r\n\"Pelo que temos conversado e andado no estado, este número é muito maior. A maioria das regiões produtoras apresenta focos de ferrugem. Se descuidarmos agora, a lucratividade da safra ficará irremediavelmente comprometida, pois até serem colhidos as últimas lavouras de soja, temos em média entre 45 e 60 dias pela frente de uma verdadeira batalha contra a ferrugem\", alerta o pesquisador Fabiano Siqueri, da Fundação de Apoio à Pesquisa Agropecuária de Mato Grosso, Fundação MT. <br>\r\n\r\nDe acordo com Siqueri a situação da incidência da doença aumentou exponencialmente nos últimos dias e o comportamento da ferrugem até o fim da colheita será decisivo para o se confirmar ou não o sucesso da safra 2007/2008, tido como certo por muitos dos envolvidos no setor. Para que a recuperação da rentabilidade dos sojicultores, retomada na safra passada, não fique comprometida e os níveis de produtividade sejam os desejados, produtor e equipe precisam ficar em alerta máximo. <br>\r\n\r\nSiqueri recomenda monitorar a lavoura pelos menos a cada três dias, efetuar aplicações com produtos com alto poder curativo, ter informações sobre a incidência da ferrugem regionalmente e localmente e em caso de alta severidade da doença ou perda de timing correto de reaplicação, esta deverá ser repetida com intervalos mais curtos, podendo chegar até entre sete e 10 dias, dependendo da gravidade da situação. <br>\r\n\r\n\"Ainda que a evolução da ferrugem dependa basicamente de fatores climáticos, a reação dos produtores e técnicos com relação às pulverizações e a forma de monitorar a lavoura são fatores fundamentais para impedir que a doença provoque perda de produtividade e conseqüentes prejuízos\", informa Siqueri. <br>\r\n\r\nO maior risco de perdas com a doença, segundo o pesquisador, está nas regiões onde a semeadura foi mais atrasada e a janela de plantio foi maior. Como a idade média das plantas nestas áreas é menor, elas estão mais sujeitas ao ataque do fungo causador da ferrugem da soja, havendo maiores possibilidades de queda na produção. <br>\r\n\r\nO retardamento da entrada da doença em relação aos anos anteriores contribuiu para o que Siqueri chama de \"tranqüilidade aparente\" de muitos técnicos e produtores, o que ocasionou uma queda no grau de importância dado à doença, ficando relegada a um segundo plano, até agora. \"Mesmo com o relativo atraso da semeadura nesta safra, e a possibilidade da chegada mais antecipada da doença, o que efetivamente não ocorreu, grande parte dos produtores e técnicos voltaram sua atenção para os demais problemas enfrentados na busca de melhores produtividades, como pragas, ervas daninhas e outras doenças, como antracnose e mancha alvo. Com isso, percebeu-se os produtores entrando numa zona de risco maior, com atrasos nas aplicações e retardamentos excessivos nas reaplicações, aliados ao descuido no monitoramento da ferrugem. Isto ocorreu não só pelo excesso de preocupações, como a necessidade da colheita em campos já prontos, mas impossibilitada pelo excesso de chuvas, e falta de tempo, mas também pela dificuldade de realizar corretamente as amostragens nos campos devidamente, pelo mesmo motivo\". <br>\r\nFonte: CMA');
INSERT INTO `noticias` VALUES (7,'Aposta é que soja será mais cara na colheita','7/02/2008','09:22:48','O receio de mais um ano de oferta apertada está sustentando os preços da soja mesmo para o pico da colheita no Brasil, em abril. A cotação da soja está até mais alta na safra que na entressafra. O contrato de abril da saca posta no porto de Paranaguá está valendo US$ 27,40, ante o preço de US$ 26,80 negociado no mercado físico na última sexta-feira, dia 1 de fevereiro, pico da entressafra brasileira, segundo números do Centro de Estudos Avançados em Economia Aplicada (Cepea/Esalq/USP). <br> \r\n\r\nAs tradings estão agressivas no mercado e elevando muito os preços em algumas praças. Em São Paulo, por exemplo, onde a oferta de soja está a cada ano mais reduzida, a saca do grão subiu R$ em um único dia. John Ruggiero, gerente de comercialização da Sociedade Comercial de Café Noroeste Ltda (Socafé), tradding localizada no Noroeste de São Paulo, diz que o patamar de R$ 43 a saca - entrega em abril - saltou ontem para R$ 47 na região, com a oferta compradora de uma grande trading de soja. \"Não conseguimos fechar negócio, pois o porto não paga R$ 47 mais o frete\", explica Ruggiero. Por isso, o Socafé aguarda o recuo desses preços para fechar negócios. \"O máximo que conseguimos pagar é R$ 46,50 a saca, mas sem margem nenhuma. Assim, onde não for possível \"hedgiar\", vamos comprar no escuro, ou seja, sem fixar na Bolsa de Chicago (CBOT)\" e torcer para o preço subir depois, diz o gerente da Socafé, que movimenta por ano 20 mil toneladas do grão. <br> \r\n\r\nFlávio Roberto de França Júnior, diretor da Safras & Mercado, diz que ontem a saca também estava sendo negociada na maior parte das praças R$ 2 acima da cotação de sexta-feira, dia 1 de fevereiro. Em Rondonópolis (MT) a saca fechou em R$ 43,50,ante os R$ 41,50 de sexta-feira, e em Passo Fundo (RS) a R$ 50,50, ante as R$ 49 do dia 1 de fevereiro. <br> \r\n\r\nO mercado avalia escassez de soja no curto prazo, conforme explica Anderson Galvão, diretor da Consultoria Céleres. \"Existe uma preocupação quanto à safra na América do Sul, porque em algumas regiões chove demais e, em outras, de menos\", diz Galvão. No entanto, ele acrescenta que a alta na CBOT no começo desta semana se deveu muito à compra dos fundos, que aproveitaram a baixa anterior dos papéis para recomprá-los. <br> \r\n\r\nSegundo levantamento da Safras, a produção de soja na América do Sul será de 117,97 milhões de toneladas, 2,2% maior que a anterior. \"A safra argentina perdeu um pouco do seu potencial com a forte estiagem de janeiro, mas nada que justifique racionalmente esse movimento de alta em Chicago\", avalia Júnior. <br> \r\n\r\nPara ele, as altas expressam a expectativa do mercado em relação ao novo relatório do Departamento de Agricultura dos Estados Unidos (Usda), que deve indicar novo recuo dos estoques mundiais e americanos de soja. \"O último documento oficial do Usda indicou no mundo um estoque 25% menor que o inicial e, nos Estados Unidos, 70% menos. Tudo indica que haverá mais cortes nessa projeção\", diz Júnior. <br> \r\n\r\nLucílio Alves, pesquisador do Cepea, recorda que o movimento atípico de preços mais altos no pico de safra do que na entressafra começou a ficar mais forte na safra 2006/07 com demanda mais aquecida por grãos para consumo em biocombustíveis. No início de fevereiro de 2007, a saca valia US$ 16,17 em Paranaguá enquanto a indicação para abril era de US$ 16,85 mais um prêmio de US$ 0,32. \r\n<br> \r\nFonte: Gazeta Mercantil');
INSERT INTO `noticias` VALUES (8,'Produtores gaúchos estão insatisfeitos com preço do suíno','8/02/2008','08:12:43','no preço médio pago ao produtor do suíno tipo carne na semana no Rio Grande do Sul. O preço médio do produto, no mercado estadual, está em R$ 2,34 o quilo vivo. Os produtores em geral, estão insatisfeitos com a remuneração, visto que o alto custo dos insumos, principalmente no item que se refere à alimentação (milho e farelo de soja), diminui sua margem de rendimento, informou o relatório semanal divulgado pela Emater.');
INSERT INTO `noticias` VALUES (9,'Trigo argentino lota armazéns no Brasil','8/02/2008','08:14:53','As diversas paralisações das exportações argentinas de trigo durante os últimos meses concentraram os embarques do produto e o resultado é que os armazéns dos moinhos e dos portos estão abarrotados de trigo. Estima-se que entre dezembro do ano passado e janeiro deste ano tenham desembarcado entre 2,5 milhões e 3 milhões de toneladas do cereal no Brasil.  <br> \r\n\r\n\r\nA situação pode comprometer o andamento da exportação de soja e milho, cuja colheita já iniciou no País. \"Os silos estão ficando cheios, o que poderá pressionar o mercado de trigo quando começar a exportação de milho e soja\", diz Lucílio Alves, pesquisador do Centro de Estudos Avançados em Economia Aplicada (Cepea/Esalq/USP).  <br> \r\n\r\n\r\nLawrence Pih, presidente do Moinho Pacífico, estima que 3 milhões de toneladas de trigo argentino já tenham entrado no País desde o final do ano passado e que ainda haja mais 300 mil toneladas para desembarcar até o dia 20 de janeiro, prazo máximo de entrega firmado nos contratos de exportação argentinos. \"Os armazéns estão totalmente lotados, tanto os dos moinhos quanto dos portos. Empresas e tradings estão desesperadas atrás de espaço e procurando armazéns para alugar\", relata Pih. Ele acredita que as importações de trigo poderia ser até maiores se não houvesse essa limitação na estocagem.  <br> \r\n\r\n\r\nLuiz Martins, presidente do conselho deliberativo da Associação Brasileira das Indústrias de Trigo (Abitrigo), estima que 2,4 milhões de toneladas de trigo da Argentina já chegaram ao Brasil desde a liberação das exportações do vizinho, em novembro. Com mais 1 milhão de toneladas do produto liberados para importação de países de fora do Mercosul sem taxa, são 3,4 milhões de toneladas ofertados no mercado interno. Ele estima que em torno de 1,4 mil toneladas foram consumidos de janeiro até agora. O restante (2 milhões) são suficientes para dois meses e meio de consumo no Brasil. \"Assim, dependemos do volume a ser exportado pela Argentina a partir de março. Se importamos 400 mil toneladas mensais, conseguiremos nos abastecer até 30 de junho, fim do prazo de importação sem taxa\", diz Martins. <br> \r\nFonte: Gazeta Mercantil<br>\r\nAutor: Fabiana Batista<br>');
INSERT INTO `noticias` VALUES (10,'Dia de Campo na AgroBella !!!','8/02/2008','08:44:44','A AgroBella, Sementes Agroceres e a Monsanto têm o prazer de convidar você para participar de mais um grande evento. Nessa oportunidade você conhecerá os híbridos mais adequados à sua região, as mais avançadas técnicas de manejos da cultura, e os principais benefícios que a biotecnologia vem apresentanto, e você também terá acesso a resultados de produtividade que irão ajudá-lo a escolher os híbridos para o próximo plantio. E o mais importante: compartilhar suas histórias de sucesso com todos.<br>\r\n<br>\r\nA AgroBella tem a satisfação de contar com a presença de todos seus clientes!!!<br>\r\n<br>\r\nDia de Campo AgroBella<br>\r\nLocal: AgroBella Alimentos em Frederico Westphalen<br>\r\nData: 08/02/2008<br>\r\nHorário: A partir das 15:00 horas<br>');

