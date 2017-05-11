<?php $this->load->view('template/header'); ?>
<div class="container" >
	<?php if($this->session->userdata('site_lang') == "turkish"): ?>
	<div class="col-md-10">
		<div class="swissheader"><?php echo lang("help"); ?></div>

		<div class="helpheader">Bir akış nasıl eklenir?</div><div class="helpbody">Firma sayfası aracılığı ile erişilen veri yönetimi modülü üzerinde akış tabına basın ve "akış ekle" tuşu ile açılan formu doldurun. Formu onayladığınızda firmaya ait akış eklenecektir. </div>
<div class="helpheader">Bir bileşeni nasıl eklerim?</div><div class="helpbody">Firma sayfası aracılığı ile erişilen veri yönetimi modülü üzerinde bileşen tabına basın ve açılan formu doldurun. Formu onayladığınızda firmaya ait akışa bağlı bileşen eklenecektir. </div>
<div class="helpheader">Bir işlemi nasıl eklerim?</div><div class="helpbody">Firma sayfası aracılığı ile erişilen veri yönetimi modülü üzerinde işlem tabına basın ve açılan formu doldurun. Formu onayladığınızda firmaya ait akışa bağlı işlem eklenecektir. </div>
<div class="helpheader">Bir ekipmanı nasıl eklerim?</div><div class="helpbody">Firma sayfası aracılığı ile erişilen veri yönetimi modülü üzerinde ekipman tabına basın ve açılan formu doldurun. Formu onayladığınızda firmaya ait işleme bağlı ekipman eklenecektir. </div>
<div class="helpheader">Bir ürünü nasıl eklerim?</div><div class="helpbody">Firma sayfası aracılığı ile erişilen veri yönetimi modülü üzerinde ürün tabına basın ve açılan formu doldurun. Formu onayladığınızda firmaya ait ürün eklenecektir. </div>
<div class="helpheader">Firmaya ait Fayda-Maliyet Analizini nasıl yapabilirim?</div><div class="helpbody">Proje açtıkdan sonra Analizler sekmesinde bulunan Fayda-Maliyet Analizi tuşuna basılarak ilgili sayfaya erişilir.
KPI analizi sayfasında tanımlanan ve analiz için seçilen potansiyeller bu sayfada listelenecektir. 
Potansiyele ait ilgili değerleri tablo içerisine girip kaydet tuşuna bastığınızda sistem otomatik olarak grafik ve tablo analiz sonuçlarını oluşturacaktır. </div>
<div class="helpheader">Temiz Üretim potansiyellerini nasıl listelerim?</div><div class="helpbody">Proje açtıkdan sonra Analizler tabında Temiz Üretim tuşuna basın.
Firmalara ait paylaştırma bilgileri listelenecektir. 
Paylaştırmalar düzenlenebilir ve yeni paylaştırma "Paylaştırma Tanımla" tuşuna basılarak yeni paylaştırma tanımlanabilir. </div>
<div class="helpheader">Firmalara ait Eko-takip bilgilerini nasıl görebilirim?</div><div class="helpbody">Proje açtıkdan sonra o projeye dahil firmalara ait ekipmanlar üzerine kurulmuş eko-takip sistemi verilerine Analizler sekmesinde bulunan Firma Takibi tuşuna basarak erişebilirsiniz. Aynı zamanda firma verileri sayfasında ekipman sekmesine ekipman tablolalarında bulunan Tracking Data tuşuna basarak ekipmana ait eko-takip verilerine erişebilirsiniz. </div>
<div class="helpheader">Nasıl kayıt olurum ?</div><div class="helpbody">Anasayfada bulunan üye ol tuşuna basın, çıkan formu eksiksiz olarak doldurun. Captcha onayını doldurmayı unutmayın ve "Üye ol" tuşuna basın. </div>
<div class="helpheader">Sisteme nasıl girerim ?</div><div class="helpbody">Anasayfada bulunan giriş yap tuşuna basın ve kullanıcı adı şifrenizi girerek formu onaylayın </div>
<div class="helpheader">Danışman kaydımı nasıl yapabilirim?</div><div class="helpbody">Giriş yaptıkdan sonra erişilen kullanıcı sayfasında bulunan "Danışman ol" tuşuna basarak danışman olabilirsiniz. </div>
<div class="helpheader">Danışman listesini nasıl görebilirim ?</div><div class="helpbody">Profiller sekmesinden Danışmanlar sayfasına giderek sistemde bulunan tüm danışmanları listeleyebilirsiniz. </div>
<div class="helpheader">Nasıl firma eklerim?</div><div class="helpbody">Giriş yaptıkdan sonra Firmalar sekmesine tıklayın ve Firma oluştur tuşuna basın. Formu eksiksiz bir şekilde doldurun ve "firma oluştur" tuşuna basın </div>
<div class="helpheader">Firma verilerini nasıl eklerim ve düzenlerim?</div><div class="helpbody">Firmalar sekmesine tıklayın ve tüm firmalar sekmesine geçin. İzniniz olan firmaların isimleri yanında bulunan "firma verisini düzenle" tuşuna basın. Akış sekmesi altında "akış ekle" butonuna tıkladığınızda beliren formu doldurun ve "akış ekle" tuşuna basın. Aynı zamanda firma sayfasından da veri yönetimi sayfasına aynı şekilde erişebilirsiniz. </div>
<div class="helpheader">Nasıl proje oluştururum?</div><div class="helpbody">- Projeler sekmesinden Proje oluştur tuşuna basın
- Formu doldurun
- "Proje oluştur" tuşuna basın ve sistem yeni oluşturulan proje sayfasına sizi yönlendirecektir. </div>
<div class="helpheader">Nasıl proje açarım?</div><div class="helpbody">- Projeler sekmesinden Projelerim sayfasına gidin.
- Açmak istediğiniz proje ismi yanında bulunan "projeyi aç" tuşuna basın.
- Proje açıldıktan sonra projelerim sekmesinde görünecektir. Aynı zamanda proje sayfası açılacaktır. </div>
<div class="helpheader">Nasıl projeyi kapatırım?</div><div class="helpbody">- Projelerim sekmesine gidin ve "Projeyi kapat" tuşuna basın. </div>
<div class="helpheader">KPI bilgisini nasıl düzenler ve kaydederim</div><div class="helpbody">Proje açtıkdan sonra Analizler sekmesine girin ve "Temiz Üretim" tuşuna basın. Temiz üretim yönetim ekranında firma tablolarının içinde bulunan "KPI verilerini görüntüle" tuşuna basın ve KPI sayfasına erişin. Oluşturulan paylaştırma tablosunda Benchmark KPI bilgilerini girip Kaydet tuşuna bastığınızda sistem KPI karşılaştırmalarını otomatik olarak yapıp gerekli analiz grafik ve tablolalarını oluşturacaktır. </div>
<div class="helpheader">Firma ve detay bilgilerine harita üzerinde nasıl erişirim?</div><div class="helpbody">Kullanıcı sisteme giriş yaptıktan sonra , kullanıcı menüsü üzerindeki 'CBS' butonuna tıklar (Kullanıcı bir proje açmış olmak zorundadır)  </div>
<div class="helpheader">Otomatik ve manuel IS potansiyeli biribirinden nasıl ayrılır?</div><div class="helpbody">Kullanıcı 'IS potansiyel Belirleme' butonuna bastığında aşağı kayan menü açılır.
 Kullanıcı 'Otomatik IS' linkine tıklayabilir. Otomatik seçim belirlemede sistem belirli akışlara göre sabit nalizler yapar ve kullanıcıya hazır seçenekler sunar.
 Manuel potansiyel belirleme işleminde ise sistem kendi eşleniklerinin yanında kullanıcıya potansiyel eşlenikleri belirlenme ve atama olanağı sağlar. </div>
<div class="helpheader"> Otomatik IS potansiyeli belirleme aracı nasıl çalışır?</div><div class="helpbody">Adım 1 : Akışlar (Sol üst tablo) : Kullanıcı IS poansiyel seçimleri için akışları belirler (Birden çok akış seçilebilir)
 Adım 2 : Firma seçiniz ve potansiyel IS dökümünü yapınız (Sağ üst tablo) : Bu adımda kullanıcı firma ve akışlarını seçerek muhtemel IS akışları içinde hesaplanmasını sağlar
 2.1 Firma seçmek için kullanıcı tablodak şirket ismine tıklamak zorundadır. Seçilen satır 'sarı' arka plan rengine döner (*1 nolu şekil 'Otomatik IS seçim bölümü'). Birden çok seçenek mümkündür.
 Eğer kullanıcı tüm firmaları seçmek isterse , 'Tüm firmaları seç' butonuna basabilir (*2 şekil 'Otomatik IS seçim bölümü')
 Notes : * Akışlar 2. adımda seçilmeyecektir * Sadece açılan projelerdeki firmalar listelenecektir
 2.2 Kullanıcı hangi tip IS dökümünün yapılmasına karar vermek için açılır menüden 'IS senaryo tipi' seçer (*3 şekil 'Otomatik IS seçim bölümü'). Seçilen senaryoya göre IS potansiyeli bir sonraki
 adımda gösterilecektir
 • Akışları ikame etmek için (eğer senaryo 'girdi ve çıktı ikamesi' ise)
 • Akışları tedarik veya bertaraf edilmesi (eğer senaryo 'girdi ikamesi' veya 'çıktı ikamesi' ise)
 • Tüm potansiyeller (eğer senaryo 'Tüm seçenekler' ise)
 Son olarak kullanıcı 'IS potansiyeli hesapla' butonuna tıklayarak (*4 şekil 'Otomatik IS seçim bölümü') işlemi başlataır
 Sonuçlar 'adım 3' içinde görülen tablosunda görüntülenir
 Adım 3 : Is potansiyelleri arasında seçim yapılır (Sol alt tablo). Bu aşamada kullanıcı daha derinlemesine incelemek istediği seçenekleri seçer,
 3.1 Sonuçların analizi : Bu tablo tüm tanımlanmış IS potansiyellerini listeler. Her satır bir eşleşmeyi gösterir;
 • Belirli bir akış ve miktarı
 • Akışların kullanıldığı firmalar
 • Firmaların akışlarının yönleri, bu bilgiler akışların girdi eya çıktı olarak ve senaryo tiplerine göre ayrıştırılmasını sağlar
 3.2 Kullanıcı bir eşleşmeyi seçmek için ilgili satıra tıklar, seçilen satır arka plan rengi 'sarı' renge dönüşür (*5 şekil 'Otomatik IS seçim bölümü')
 3.3 Son olarak kullanıcı 'Is potansiyel ekle' butonuna tıklayarak (*6 şekil 'Otomatik IS seçim bölümü') 4.adımda belirlenen akış şamalarını potansiyel olarak belirler
 Adım 4 : Potansiyel IS eşleşmelerinin kaydı (Sağ alt tablo) Adım 1 ve Adım 3' e kadar olan adımlar tekrar edilerek farklı senaryo ve firmalara göre elşleşmeler görüntülenebilir.
 Kullanıcı belirlenen potansiyeli bir senaryo adı altında sisteme kaydedebilir (*7 şekil 'Otomatik IS seçim bölümü'). Açılır pencerede gerekli alanları dolduran kullanıcı daha sonraki
 incelemek üzere eşleşmeleri sisteme kaydeder. </div>
<div class="helpheader">Manual IS potansiyeli belirleme aracı nasıl çalışır? </div><div class="helpbody">Adım 1. : Kullanıcı firma belirler
1.1 Kullanıcı firm atablosundaki satırları seçerek seçimini yapar (bakınız *1 şekil 6 )
Notlar  • 1.Adımda belirli bir akış seçilmez
 • Sadece seçilmiş projelerdeki firmalar sistemde gözükür
1.2 Daha sonra kullanıcı 'Akış detaylarını getir' düğmesine tıklar (bakınız şekil *2 )
Adım 2 : Kullanıcı firma akışlarından seçer (sol alt panel)
2.1 Kullanıcı akış seçmek için akış isminin olduğu satırı seçer. Seçilen satır arka plan rengi 'sarı' olacaktır (bakınız *3 in şekil 6)
2.2 Daha sonra Kullanaıcı 'Belirlenmiş akış bilgisini getir' düğmesine tıklar (bakınız *4 şekil 6)
Adım 3 : Belirlenmiş Akış (Sağ alt tablo) Bu adımda kullanıcı daha önce adım 2'de seçilen ve bu adımda seçilen akış iki akış arasında bir ilişki oluşturur. Bu işleyişde
Kullanıcı manuel olarak eşleşme gerçekleştirebilmektedir.
 Adım 4 : Potansiyel IS eşleşmelerinin kaydı farklı senaryo ve firmalara göre elşleşmeler görüntülenebilir.
 Kullanıcı belirlenen potansiyeli bir senaryo adı altında sisteme kaydedebilir . Açılır pencerede gerekli alanları dolduran kullanıcı daha sonraki
 incelemek üzere eşleşmeleri sisteme kaydeder. </div>
<div class="helpheader">Bir firma için IS senaryoları nasıl listelenir?</div><div class="helpbody">Kullanıcı sisteme giriş yaptıktan sonra , kullanıcı menüsü üzerindeki 'Analiz' butonuna tıklar (Kullanıcı bir proje açmış olmak zorundadır) ve 'IS Senaryoları' menüsüne tıklar </div>

	</div>
<?php else: ?>
	<div class="col-md-10">
		<div class="swissheader"><?php echo lang("help"); ?></div>

		<div class="helpheader">How do I add a flow ?</div><div class="helpbody">When you login, choose a company and open Dataset Management, then press Add Flow and fill the information </div>
<div class="helpheader">How do I add a component ?</div><div class="helpbody">When you login, choose a company and open Dataset Management, then press Add Component and fill the information </div>
<div class="helpheader">How do I add a process ?</div><div class="helpbody">When you login, choose a company and open Dataset Management, then press Add Process and fill the information </div>
<div class="helpheader">How do I add an equipment?</div><div class="helpbody">When you login, choose a company and open Dataset Management, then press Add Equipment and fill the information </div>
<div class="helpheader">How do I add a product?</div><div class="helpbody">When you login, choose a company and open Dataset Management, then press Add Product and fill the information </div>
<div class="helpheader">How I do observe the Cost-Benefit Analysis of a company ?</div><div class="helpbody">When you login, press Analysis tab on top, then press Cost-Benefit Analysis button, then select the company of which you want to observe the CBA </div>
<div class="helpheader">How do I list CP Potentials for a company ?</div><div class="helpbody">When you login press Analysis tab on top, then press CP-Potentials Identification button (You need to open a project first, if you have not done so), then press View CP Potentials Identifications button </div>
<div class="helpheader">How do I see the Ecotracking info for a company ?</div><div class="helpbody">When you login, press Analysis tab on top, then press Ecotracking button on the rightside of the menu, then select the company you need the Ecotracking Data by pressing the corresponding button </div>
<div class="helpheader">How do I register ?</div><div class="helpbody">Click on Register button on home page, the registration page will follow, fill in the information provided, you can also include a photo. DO not forget to type in the Captcha, then press "Register" </div>
<div class="helpheader">How do I login ?</div><div class="helpbody">Click on Login button on home page (You need to be registered first), then enter your Username and Password, then press Login </div>
<div class="helpheader">How to register as a consultant</div><div class="helpbody">First access to the profile page. If the user wants to change his status to “consultant” for an existing profile, he can access the profile page by logging in. Once the profile page displays, the user clicks on the “become a consultant” button, located in the left upper corner of the page. </div>
<div class="helpheader">How do I see the list of consultants ?</div><div class="helpbody">Press Profiles tab on Top at home page, then press consultants button </div>
<div class="helpheader">How do I add a company ?</div><div class="helpbody">When you login, press Companies tab on top, then press Create Company button, then fill in the information and press "Create Company" when finished </div>
<div class="helpheader">How to add some company flow data?</div><div class="helpbody">First access to the company page. Note that the company page will automatically be displayed when finalizing the creation of a new company (see previous paragraph). If the user wants to add flows to an existing company, he can access the company page by going on the “companies” tab menu, then click on the “My companies” or on “All companies” button to access the list of companies in which the targeted company is included. 
Once the company page displays, the user clicks on the “edit company data” button, located in the left upper corner of the page. </div>
<div class="helpheader">How to create a project ?</div><div class="helpbody">-  In the “Projects” tab menu, the user clicks on the “create project” button. The “create project” page then displays.
-  The user fills in the form. 
-  To finish, the user then click on the “create project” button at the lower end of the page. The page of the new project then displays. </div>
<div class="helpheader">How do I open a project ?</div><div class="helpbody">- Access the project page by going on the “projects” tab menu, then click on the “My projects” button to access the list of projects in which the targeted project is included. The user then click on the targeted project to access to the project page. Note that the user only can access the project page of the projects to which he was assigned or that he created.
- Once the project page displays, the user clicks on the “Open Project” button, located in the left upper corner of the page </div>
<div class="helpheader">How do I close a project ?</div><div class="helpbody">You can press Projects tab on top, then it will show you the project that youare working on on the far right side, then you can press close project button on the far right. </div>
<div class="helpheader">How I edit and/or view KPI information for a company ?</div><div class="helpbody">When you login, open a project, then press Analysis tab on top, then press CP-Potential Identification button, then press the View and Edit KPI Calculation button of the corresponding company that you are interested in for the project </div>
<div class="helpheader">How do I see the map and GIS data for a company ?</div><div class="helpbody">When you login and open a project, you can press ANalysis tab on top, then press GIS button, it will show you the companies that are related to the project </div>
<div class="helpheader">What is the difference between a automated and a manual IS potential identification?</div><div class="helpbody">When the user clicks on the “IS-Potential Identification” button, a scroll down menu appears. The user can choose to:
-  Operate a automatic IS detection (“Automated IS” button). When operating an Automated IS detection, Ecoman automatically detects Potential IS by matching the flows that have the same name. The user then selects from the pool of Potential IS the ones that seem the most relevant.
-   Operate a manual IS detection (“Manual IS” button). When operating a Manual IS detection, Ecoman displays all available flows from the opened project and the user himself matches the flow that can be mutualized.  </div>
<div class="helpheader">How to operate an automated IS Potential Detection?</div><div class="helpbody">1. Step 1: Flows (left upper table) : The user selects the flows that will be considered in the IS potential detection (multiple choice is possible).2. Step 2: Select a company and calculate IS potentials (right upper panel): During this step, the user selects the companies and the type of IS that will be considered in the IS potential detection:

2.1 To select a company, the user needs to click on the company name in the table. The selected line will then highlight in yellow (see *1 in Figure  "Automated IS Potential Detection"). Multiple choices are possible. If the user would like all the company to be selected, he can click on the “select all companies” (see *2 in Figure "Automated IS Potential Detection")
Notes:
•        No specific flows are selected in step 2 (even if a flow name is linked to the line that is selected).
•        Only the company of the opened project will display 

2.2  To choose which type of IS to consider, the user click on the “IS Scenarios Type” scroll down menu (see *3 in Figure "Automated IS Potential Detection"). 
Depending on the “IS scenario type” selected, the results displayed in the next step will show:
•        Potentials to exchange a flow (if selected IS scenario type is “input and output mutualisation” 
•        Potentials to mutualize the supply or the clearing of a flow (if selected IS Scenarios type is “input mutualisation” or output mutualisation”)
•        All Potentials (if selected IS Scenarios type is “All candidates”). 
Finally, the user clicks on the “calculate IS potentials” button (see *4 in Figure  "Automated IS Potential Detection") to operate the IS detection. The results display in “step 3 “ table (see bellow).
3. Step 3: Select IS potentials from table (left lower table): During this step, the user selects the IS potentials he further wants to analyze. 

3.1 Understanding the results: This specific table displays all identified IS Potentials. Each line correspond to one IS Potential, with each 
•        A specific flow and corresponding quantity (in the “flow”, “quantity” and “units” column)
•        The concerned companies (in the “from company” and “to company” columns) 
•        The direction of the flow for each company (in the two “Flow type” columns). Those columns inform the user if the flow is an input or an output respectively for each company, and therefore informs the type of IS scenario. E.g. If the line shows “input” twice, the IS scenario type is an “input mutualisation”. 

3.2 To select a IS potential, the user needs to click on the line of the targeted potential name in the table (the selected line will then highlight in yellow) (see *5 in Figure  "Automated IS Potential Detection"). 

3.3 Finally, the user clicks on the “add potential IS” button (see *6 in Figure  "Automated IS Potential Detection") to add the selected potential in the “step 4” table. All the selected IS potentials appear in the “step 4 “ table (see bellow).
Notes:
•        Multiple choices are not possible when selecting the IS potential, but multiple potential can be selected by just repeating the whole step 3

4. Step 4: Save IS potentials (right lower table)

The steps 1 to 3 can be repeated to progressively fill in the table of step 4 with new IS potentials. When the user has completed his analysis, he can save the Potentials of the table of step 4 in a “scenario” by clicking on the.”save a table with relevant IS potentials” button (see *7 in Figure  "Automated IS Potential Detection"). A pop out will then display, into which the name of the scenario and the status will be informed. The scenario can then be further analyzed in the “IS Scenario page” (see “IS Scenario” paragraph). </div>
<div class="helpheader">How to operate a manual IS Potential Detection?</div><div class="helpbody">1. Step 1: Select a company for witch flow matching is required (left upper table): During this step, the user selects the company for witch a flow matching is required.

1.1 To select a company, the user needs to click on the company name in the table. The selected line will then highlight in yellow (see *1 Figure 6 )
Notes:
•        No specific flows are selected in step 1 (even if a flow name is linked to the line that is selected).
•        Only the company of the opened project will display 
1.2 Then, the user click on the “get flow details for this company" button (see *2 in Figure )

2. Step 2: Select flow from the company (left lower panel): During this step, the user selects the flow that will be considered in the matching process

2.1 To select a flow, the user needs to click on the flow name in the table. The selected line will then highlight in yellow (see *3 in Figure 6). 
2.2 Then, the user clicks on the “Get specific flow info” button (see *4 in Figure 6) to operate the flow matching. 

3. Step 3: Specific flow (right lower table): During this step, the user creates a matching between two flows: the previously selected flow in step 2 and a flow to select from the table of this step. This is done if a flow does not have the same name as the flow selected in step 2 but is actually exchangeable. In this case, through the manual IS, the user can match the two flows and create a Potential IS. Understanding the table of step 3: The table displays all flows of this project. 

3.1 To create a matching of flows that do not have the same name, the user needs to click on the line of the targeted flow in the table (the selected line will then highlight in yellow) (see *5 in Figure 6). 
3.2 Finally, the user clicks on the “add potential IS” button (see *6 in Figure 6) to add the selected potential in the “step 4” table. All the selected IS potentials appear in the “step 4 “ table (see bellow).

Notes:
•        Multiple matching and Potential IS creation can be selected by just repeating the whole step 3.

4. Step 4: Save IS potentials (right upper table)

4.1 This specific table displays all added IS Potentials. Each line correspond to one IS Potential, with each 
•        A specific flow and corresponding quantity (in the “flow”, “quantity” and “units” column)
•        The concerned companies (in the “from company” and “to company” columns) 
•        The direction of the flow for each company (in the two “Flow type” columns). Those columns inform the user if the flow is an input or an output respectively for each company, and therefore informs the type of IS scenario. E.g. If the line shows “input” twice, the IS scenario type is an “input mutualisation”.
4.2 The steps 1 to 3 can be repeated to progressively fill in the table of step 4 with new IS potentials. 
4.3 When the user has completed his matching and Potential IS creation, he can save the potentials of the table of step 4 in a “scenario” by clicking on the.”save a table with relevant IS potentials” button (see *7 in Figure 6). A pop out will then display, into which the name of the scenario and the status will be informed. The scenario can then be further analyzed in the “IS Scenario page” (see “IS Scenario” paragraph). </div>
<div class="helpheader">How do I list IS Scenarios for a company ?</div><div class="helpbody">When you login press Analysis tab on top, then press IS-Potentials Identification button (You need to open a project first, if you have not done so), then choose IS Scenarios from the list </div>

	</div>
	<?php endif ?>
	<div class="col-md-2">
		
	<a href="<?php echo asset_url('CELEROusermanual.pdf'); ?>"><div class="swissheader" style="background-color:green;"><?php echo lang("usermanual"); ?></div></a>
	</div>
</div>
<?php $this->load->view('template/footer'); ?>