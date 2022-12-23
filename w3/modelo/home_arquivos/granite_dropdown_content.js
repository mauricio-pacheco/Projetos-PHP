	// set up drop downs anywhere in the body of the page. I think the bottom of the page is better.. 
	// but you can experiment with effect on loadtime.
	if (graniteDropDown.isSupported()) {

		//==================================================================================================
		// create a set of dropdowns
		//==================================================================================================
		// the first param should always be down, as it is here
		//
		// The second and third param are the top and left offset positions of the menus from their actuators
		// respectively. To make a menu appear a little to the left and bottom of an actuator, you could use
		// something like -5, 5
		//
		// The last parameter can be .topLeft, .bottomLeft, .topRight, or .bottomRight to inidicate the corner
		// of the actuator from which to measure the offset positions above. Here we are saying we want the 
		// menu to appear directly below the bottom left corner of the actuator
		//==================================================================================================
		var ms = new graniteDropDownSet(graniteDropDown.direction.down, 0, 0, graniteDropDown.reference.bottomLeft);

		//==================================================================================================
		// create a dropdown menu
		//==================================================================================================
		// the first parameter should be the HTML element which will act actuator for the menu
		//==================================================================================================
		//var menu1 = ms.addMenu(document.getElementById("menu1"));
		//menu1.addItem("- Code of Conduct", "#"); // send no URL if nothing should happen onclick
		
		var menu2 = ms.addMenu(document.getElementById("menu2"));
		menu2.addItem("- Code of Conduct", urlRoot + "/about-us/codeofconduct.cfm"); // send no URL if nothing should happen onclick
		menu2.addItem("- Safety", urlRoot + "/about-us/safety.cfm");
		menu2.addItem("- Environmental", urlRoot + "/about-us/environment.cfm");
		menu2.addItem("- Our Company", "/about-us/ourcompany.cfm");
		menu2.addItem("- Board of Directors", urlRoot + "/about-us/boardofdirectors.cfm");
		menu2.addItem("- Our History", urlRoot + "/about-us/ourhistory.cfm");
		menu2.addItem("- Our Achievements", urlRoot + "/about-us/reputation-awards.cfm");
		menu2.addItem("- Location Search", urlRoot + "/about-us/locationsearch.cfm");
		menu2.addItem("- Granite Store", urlRoot + "/transfer.cfm?redirect=https://www.costore.com/graniteconstruction");
		
		
		//==================================================================================================

		//==================================================================================================
		// add a sub-menu
		//==================================================================================================
		// to add a sub menu to an existing menu object, call it's addMenu method and pass it the item from
		// the parent menu which should act as it's actuator. To add a submenu to the fourth item of a menu
		// called "theMenu", you would do theMenu.addMenu(theMenu.items[3])
		//==================================================================================================
		// submenu
		var subMenu2 = menu2.addMenu(menu2.items[3]);
		subMenu2.addItem("- Administration", urlRoot + "/about-us/administration.cfm");
		subMenu2.addItem("- Granite East", "/about-us/granite_east.cfm");
		subMenu2.addItem("- Granite West", "/about-us/granite_west.cfm");
		subMenu2.addItem("- Equipment Department", urlRoot + "/about-us/equipment.cfm");
		subMenu2.addItem("- Granite Land Company", urlRoot + "/about-us/granite-land-company.cfm");
		subMenu2.addItem("- Leadership", urlRoot + "/about-us/leadership.cfm");
		subMenu2.addItem("- Affiliates", "/about-us/affiliates.cfm");
		subMenu2.addItem("- Partnerships", urlRoot + "/about-us/partnerships.cfm");
		
		// submenu
		var subMenu2 = menu2.addMenu(menu2.items[6]);
		subMenu2.addItem("- Environmental & Community Awards", urlRoot + "/about-us/environmental-community-awards.cfm");
		subMenu2.addItem("- Construction Materials Awards",  urlRoot +"/about-us/materials-awards.cfm");
		subMenu2.addItem("- Construction & Projects Awards", urlRoot + "/about-us/construction-project-awards.cfm");
		
		// menu
    	var menu3 = ms.addMenu(document.getElementById("menu3"));
		menu3.addItem("- Roads & Highway Construction", urlRoot + "/construction-services/roads-hwy-construction.cfm");
		menu3.addItem("- Grading & Paving", urlRoot + "/construction-services/grading-paving.cfm");
		menu3.addItem("- Excavation & Mining", urlRoot + "/construction-services/excavation-mining.cfm");
		menu3.addItem("- Design/Build", urlRoot + "/construction-services/design-build.cfm");
		menu3.addItem("- Bridges & Structures", urlRoot + "/construction-services/bridges-structures.cfm");
		menu3.addItem("- Airport Infrastructure", urlRoot + "/construction-services/airport-infrastructure.cfm");
		menu3.addItem("- Rapid Transit & Railway", urlRoot + "/construction-services/rapid-transit-railway.cfm");
		menu3.addItem("- Dams, Locks & Levees", urlRoot + "/construction-services/dams-locks-levees.cfm");
		menu3.addItem("- Commercial/Residential Sitework", urlRoot + "/construction-services/comm-res-sitework.cfm");
		menu3.addItem("- Private Markets/Custom Work", urlRoot + "/construction-services/private-custom.cfm");
		menu3.addItem("- Underground, Pipe & Utilities", urlRoot + "/construction-services/underground.cfm");
		menu3.addItem("- Water/Waste Water Systems", urlRoot + "/construction-services/water-systems.cfm");
		menu3.addItem("- Recreational Facilities/Golf Courses", urlRoot + "/construction-services/recfacilities-golf.cfm");
		menu3.addItem("- Pavement Maintenance", urlRoot + "/construction-services/pavement.cfm");
		menu3.addItem("- Landfill/Environmental Remediation", urlRoot + "/construction-services/landfill-environmental.cfm");
		menu3.addItem("- Project & Land Development", urlRoot + "/construction-services/project-land-dev.cfm");
		
		// menu
		var menu4 = ms.addMenu(document.getElementById("menu4"));
		menu4.addItem("- Locate Facilities", urlRoot + "/construction-materials/locate-facilities.cfm");
		menu4.addItem("- Products", "/construction-materials/products.cfm");
		menu4.addItem("- Materials Safety Data Sheets", "/construction-materials/msds.cfm");
		menu4.addItem("- Career Opportunities", "http://granite.hodesiq.com/");
		menu4.addItem("- Credit Applications", urlRoot + "/construction-materials/materials-creditapp.cfm");
		menu4.addItem("- Engineering Services QC/QA", urlRoot + "/construction-materials/engineering-services.cfm");
		menu4.addItem("- Our Neighborhood", urlRoot + "/construction-materials/our-neighborhood.cfm");
		menu4.addItem("- Materials Calculators", urlRoot + "/construction-materials/materials-calculators.cfm");
		menu4.addItem("- Surplus Equipment For Sale", urlRoot + "/construction-materials/surplusequipment.cfm");

		// submenu
		var subMenu4 = menu4.addMenu(menu4.items[1]);
		subMenu4.addItem("- Ready Mix", urlRoot + "/construction-materials/readymix.cfm");
		subMenu4.addItem("- Aggregate", urlRoot + "/construction-materials/aggregate.cfm");
		subMenu4.addItem("- Hot Mix Asphalt", urlRoot + "/construction-materials/asphalt-concrete.cfm");
		
		// submenu
		var subMenu4 = menu4.addMenu(menu4.items[7]);
		subMenu4.addItem("- Aggregate", urlRoot + "/construction-materials/aggregate-calculator.cfm");
		subMenu4.addItem("- Concrete", urlRoot + "/construction-materials/concrete-calculator.cfm");
		subMenu4.addItem("- Road Materials", urlRoot + "/construction-materials/roadmaterials-calculator.cfm");
		subMenu4.addItem("- Unit Conversion", urlRoot + "/construction-materials/unit-calculator.cfm");

		// menu
		var menu5 = ms.addMenu(document.getElementById("menu5"));
		menu5.addItem("- Granite Overview", urlRoot + "/investor-relations/granite-overview.cfm");
		menu5.addItem("- Stock Quote", urlRoot + "/investor-relations/stock-quote.cfm");
		menu5.addItem("- News Releases", urlRoot + "/investor-relations/news-releases.cfm");
		menu5.addItem("- Email Alerts", urlRoot + "/investor-relations/email-alerts.cfm");
		menu5.addItem("- Calendar", urlRoot + "/investor-relations/calendar.cfm");
		menu5.addItem("- Presentations", urlRoot + "/investor-relations/presdisclaimer.cfm");
		menu5.addItem("- Webcasts", urlRoot + "/investor-relations/webcasts.cfm");
		menu5.addItem("- Corporate Governance Highlights", "/investor-relations/corporate-governance.cfm");
		menu5.addItem("- Annual Report", urlRoot + "/investor-relations/annual-report.cfm");
		menu5.addItem("- Financials", urlRoot + "/investor-relations/financial-info.cfm");
		menu5.addItem("- Earnings Estimates", urlRoot + "/investor-relations/earnings-estimates.cfm");
		menu5.addItem("- SEC Filings", urlRoot + "/investor-relations/sec-filings.cfm");
		menu5.addItem("- Stock Purchase", urlRoot + "/investor-relations/stock-purchase.cfm");
		menu5.addItem("- Proxy Materials", urlRoot + "/investor-relations/proxy_materials.cfm");
		menu5.addItem("- FAQ", urlRoot + "/investor-relations/faq.cfm");
		menu5.addItem("- Information Request", urlRoot + "/investor-relations/info-request.cfm");
		
		var subMenu5 = menu5.addMenu(menu5.items[7]);
		subMenu5.addItem("- Board of Directors", urlRoot + "/investor-relations/board-of-directors.cfm");
		subMenu5.addItem("- Leadership", urlRoot + "/investor-relations/leadership.cfm");

		// menu
		var menu6 = ms.addMenu(document.getElementById("menu6"));
		menu6.addItem("- Why Granite?", "/careers/why-granite.cfm");
		menu6.addItem("- Life at Granite", urlRoot + "/careers/life-at-granite.cfm");
		menu6.addItem("- Current Opportunities", "http://granite.hodesiq.com/");
		menu6.addItem("- Career Contacts", urlRoot + "/careers/career-contacts.cfm");
		menu6.addItem("- College Recruiting", urlRoot + "/careers/college-recruiting.cfm");
		menu6.addItem("- Benefits", urlRoot + "/careers/benefits.cfm");

		var subMenu6 = menu6.addMenu(menu6.items[0]);
		subMenu6.addItem("- Employee Development", urlRoot + "/careers/edi.cfm");
		subMenu6.addItem("- Character", urlRoot + "/careers/character.cfm");
		subMenu6.addItem("- Social Responsibility", urlRoot + "/careers/social-responsibility.cfm");
		subMenu6.addItem("- Community Involvement", urlRoot + "/careers/community-involvement.cfm");
		subMenu6.addItem("- Making a Difference", urlRoot + "/careers/making-a-difference.cfm");
		
		var subMenu6 = menu6.addMenu(menu6.items[4]);
		subMenu6.addItem("- Const. Mgmt. Competition", urlRoot + "/careers/constr-mgmt-competition.cfm");

		// menu
		var menu7 = ms.addMenu(document.getElementById("menu7"));

		menu7.addItem("- Map & Directions", urlRoot + "/contact-us/corpmap.cfm");

		//==================================================================================================
		// write drop downs into page
		//==================================================================================================
		// this method writes all the HTML for the menus into the page with document.write(). It must be
		// called within the body of the HTML page.
		//==================================================================================================
		graniteDropDown.renderAll();
	}
