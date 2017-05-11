
/*OpenLayers.Lang["tr"] = OpenLayers.Util
		.applyDefaults(

		{
			"oleCleanFeature" : "Seçili geometriyi temizle",
			"oleDeleteFeature" : "Seçili geometriyi sil",
			"oleDeleteAllFeatures" : "Bütün geometrileri sil",
			"oleDownloadFeature" : "Geometrileri indir",
			"oleDownloadFeatureEmpty" : "İndirilebilir geometri bulunamadı",
			"oleDownloadFeatureFileFormat" : "Dosya formatı seçiniz",
			"oleUploadFeature" : "Geometrileri bilgisayarımdaki dosyadan yükle",
			"oleUploadFeatureNoFile" : "Dosya belirtilmemiş. Lütfen dosyayı seçip, tekrar deneyiniz.",
			"oleUploadFeatureNone" : "Dosyada her hangibir geometri bulunamadı veya okunamadı",
			"oleUploadFeatureReplace" : "Katmanda var olan geometrileri başkasıyla değiştir",
			"oleDragFeature" : "Geometriyi sürükle",
			"oleDrawHole" : "Delik çiz",
			"oleDrawPolygon" : "Poligon çiz",
			"oleDrawPath" : "Hat çiz",
			"oleDrawPoint" : "Nokta çiz",
			"oleDrawText" : "Yazı katmanı ekle",
			"oleDrawTextEdit" : "Yazı katmanını kutucuğa girip, entera basınız ",
			"oleDrawRegular" : "Düzenli poligon çiz",
			"oleDrawRegularShape" : "şekil(shape)",
			"oleDrawRegularIrregular" : "düzensiz",
			"oleDrawRegularSides3" : "üçgen",
			"oleDrawRegularSides4" : "kare",
			"oleDrawRegularSides5" : "beşgen",
			"oleDrawRegularSides6" : "altıgen",
			"oleDrawRegularCircle" : "çember",
			"oleImportFeature" : "Seçili geometriyi içe aktar",
			"oleImportFeatureSourceLayer" : "Hiçbir kaynak katman bulunamadı.",
			"oleImportFeatureSourceFeature" : "Lütfen önce geometriyi seçiniz.",
			"oleLayerSettingsImportHeader" : "İçe aktar",
			"oleLayerSettingsImportLabel" : "Kaynak katman olarak kullan",
			"oleLayerSettingsLegendHeader" : "G&#246;sterge",
			"oleLayerSettingsOpacityHeader" : "Opaklık (%)",
			"oleMergeFeature" : "Seçili geometrileri birleştir",
			"oleMergeFeatureSelectFeature" : "Bu işlem için en az iki geometri seçmelisiniz.",
			"oleModifyFeature" : "Geometriyi düzenle",
			"oleNavigation" : "Navigasyon",
			"olePixelUnit" : "px",
			"oleSelectFeature" : "Geometriyi seç",
			"oleSnappingSettings" : "Yapışkanlık ayarları",
			"oleSnappingSettingsLayer" : "Yapışkanlık katmanı",
			"oleSnappingSettingsTolerance" : "Yapışkanlık toleransı",
			"oleSplitFeature" : "Seçili geometriyi böle",
			"oleTransformFeature" : "Geometriyi döndür, boyutlandır veya hareket ettir",
			"oleCADTools" : "CAD Araçları",
			"oleCADToolsDialogParallelDrawing" : "Paralel Çizim",
			"oleCADToolsDialogGuidedDrawing" : "Klavuzlu Çizim",
			"oleCADToolsDialogShowLayer" : "Klavuz Çizgilerini Göster",
			"oleCADToolsDialogTolerance" : "px toleransı",
			"oleDialogCancelButton" : "Iptal",
			"oleDialogSaveButton" : "Kaydet",
			"oleDialogOkButton" : "Tamam"
		});
*/

/*
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
Ext.namespace("Ostim.i18n");

/** api: (define)
 *  module = Ostim.i18n
 *  class = Ostim.i18n.dict (en_US)
 *  base_link = `Ext.form.ComboBox <http://dev.sencha.com/deploy/ext-3.3.1/docs/?class=Ext.form.ComboBox>`_
 */

/**
 * Define dictionary for the US locale.
 * Maintained by: Ostim devs
 */
Ostim.i18n.dict = {
    // 0.67
    'Active Layers': 'Aktif Katmanlar',
    'Base Layer': 'Harita Altlıkları',
    'Base Layers': 'Ana Katmanlar',
    'BaseMaps': 'Ana Haritalar',
    'Choose a Base Layer': 'Ana katman seçiniz',
    'Legend': 'Lejant',
    'Feature Info': 'Özellik Bilgisi',
    'Feature Data': 'Özellik Datası',
    'Feature(s)': 'özellikler',
    'No layer selected': 'Katman seçilmedi..',
    'Save Features': 'Nesne Kaydet',
    'Get Features': 'Nesne Getir',
    'Feature information': 'Özellik bilgisi',
    'No Information found': 'Bilgi bulunamadı',
    'Layer not added': 'Katman eklenemedi',
    'Attribute': 'Özellik',
    'Value': 'Değer',
    'Recieving data': 'Data alınıyor..',
    'Layers': 'Katmanlar',
    'No match': 'Eşleşme bulunamadı',
    'Loading...': 'Yüklüyor...',
    'Bookmarks': 'Yer tutucu imleri',
    'Places': 'Lokasyonlar',
    'Unknown': 'Bilinmeyen',
    'Feature Info unavailable': 'Özellik bilgisi bulunamadı',
    'Pan': 'Pan',
    'Leg': 'Leg',
    'Measure length': 'Ölçüm uzunluğu',
    'Measure area': 'Ölçüm alanı',
    'Length': 'Uzunluk',
    'Area': 'Alan',
    'Result >': 'Sonuç >',
    '< Search': '< Arama',
    'Search': 'Arama',
    'Search Nominatim': 'Ad ve adrese göre (OSM) bilgisi ara',
    'Search OpenLS': 'OpenLs servisi ile ara',
    'Search PDOK': 'hollanda milli adres sistemi bilgisi tuşla',
    'Searching...': 'Arıyor...',
    'Search Completed: ': 'Arama tamamlandı: ',
    'services': 'Servisler',
    'service': 'Servis',
    'Type Nominatim': 'Yer bilgi veya adres giriniz...',
    'Overlays': 'Katmanlar',
    'Waiting for': 'Bekliyor',
    'Warning': 'Uyarı',
    'Zoom in': 'Zoom yap',
    'Zoom out': 'Zoom azalt',
    'Zoom to full extent': 'Tam zoomla',
    'Zoom previous': 'Öncekine zoomla',
    'Zoom next': 'Sonrakine zoomla',

    // 0.68
    'Scale': 'Skala',
    'Resolution': 'Çözünürlük',
    'Zoom': 'Zoom seviyesi',

    // 0.70
    'Export': 'Export',
    'Choose a Display Option': 'Ekran opsiyonu seçin',
    'Display': 'Ekran',
    'Grid': 'Grid',
    'Tree': 'Ağaç yapısı',
    'XML': 'XML',
    'Invalid export format configured: ': 'Uygun olmayan ihraç formatı: ',
    'No features available or non-grid display chosen': 'Nesne bulunamadı yada grid olmayan ekran seçeneği seçili',
    'Choose an Export Format': 'Çıktı formatı seçiniz',
    'Print Visible Map Area Directly': 'Görünür harita alanın çıktısını al',
    'Direct Print Demo': 'Harita çıktısı demosuna git',
    'This is a simple map directly printed.': 'Bu basit bir harita çıktısı örneğidir.',
    'Print Dialog Popup with Preview Map': 'Harita önizlemesi ile diyalog aç',
    'Print Preview': 'Çıktı önizlemesi',
    'Print Preview Demo': 'Demo önizlemesi çıktısı al',
    'Error getting Print options from server: ': 'Çıktı özellkilerini sunucudan alırken hata oluştu: ',
    'Error from Print server: ': 'Çıktı sunucusundan hata alındı: ',
    'No print provider url property passed in hropts.': 'Çıktı kaynağı hropts konfigürasyonunda bulunamadı.',
    'Create PDF...': 'PDF oluştur...',
    'Loading print data...': 'Çıktı datası yükleniyor...',

    // 0.71
    'Go to coordinates': 'Koordinatlara git',
    'Go!': 'Go!',
    'Pan and zoom to location': 'Lokasyona pan ve zoom yap',
    'Enter coordinates to go to location on map': 'Lokasyona gitmek için koordinat bilgilerini giriniz',
    'Active Themes': 'Aktif temalar',
    'Move up': 'Üst seviye',
    'Move down': 'Alt seviye',
    'Opacity': 'Opaklık',
    'Remove layer from list': 'Katmanı listeden çıkar',
    'Tools': 'Araçlar',
    'Removing': 'Kaldırılıyor',
    'Are you sure you want to remove the layer from your list of layers?': 'Katmanı katmanlar listesinden kaldırmak istediğinizden emin misiniz?',
    'You are not allowed to remove the baselayer from your list of layers!': 'Ana katmanı katman listesinden çıkaramazsınız!',

    // 0.72
    'Draw Features': 'Özellik çiz',

    // 0.73
    'Spatial Search': 'Coğrafik arama',
    'Search by Drawing': 'Çizerek ara',
    'Select the Layer to query': 'Sorgu için katman seç',
    'Choose a geometry tool and draw with it to search for objects that touch it.': 'CCoğrafi arama araçı seçerek belirlenen alan içerisindeki nesneleri ara.',
    'Seconds': 'Saniyeler',
    'Working on it...': 'işlem devam ediyor...',
    'Still searching, please be patient...': 'Hala arıyor, lütfen bekleyiniz...',
    'Still searching, have you selected an area with too many objects?': 'Hala arıyor, seçili alanda çok fazla nesne olabilirmi?',
    'as': 'olarak',
    'Undefined (check your config)': 'Tanımsız (Konfigürasyonu kontrol ediniz)',
    'Objects': 'Nesneler',
    'objects': 'nesneler',
    'Features': 'Özellikler',
    'features': 'özellikler',
    'Result': 'Sonuç',
    'Results': 'Sonuçlar',
    'of': 'of',
    'Using geometries from the result: ': 'Sonuç kümesinden coğrafi nesneleri kullanıyor: ',
    'with': 'ile',
    'Too many geometries for spatial filter: ': 'Coğrafi filtreleme için çok fazla nesne bulunuyor: ',
    'Bookmark current map context (layers, zoom, extent)': 'Harita durumunu sakla (katmanlar, zoom, kapsam)',
    'Add a bookmark': 'Yer imi ekle',
    'Bookmark name cannot be empty': 'Yer imi ismi girmelisiniz',
    'Your browser does not support local storage for user-defined bookmarks': 'Tarayıcınız kullanıcı tanımlı yer imleri için lokal depolama alanı barındırmıyor',
    'Return to map navigation': 'Harita navigsyona geri dön',
    'Draw point': 'Nokta çiz',
    'Draw line': 'çizgi çiz',
    'Draw polygon': 'Poligon çiz',
    'Draw circle (click and drag)': 'Çember çiz (tıkla ve sürükle)',
    'Draw Rectangle (click and drag)': 'Dörtgen çiz (tıkla ve sürükle)',
    'Sketch is saved for use in Search by Selected Features': 'Seçilen özelliklerin aramasında kullanılmak için kroki kaydedilmiştir',
    'Select a search...': 'Arama kriteri seçiniz...',
    'Clear': 'Temizle',

    // 0.74
    'Project bookmarks': 'Proje yer imleri',
    'Your bookmarks': 'Yer imleriniz',
    'Name': 'İsim',
    'Description': 'Tanım',
    'Add': 'Ekle',
    'Cancel': 'Vazgeç',
    'Remove bookmark:': 'Yer imini kaldır:',
    'Restore map context:': 'Harite içeriğini yeniden oluştur:',
    'Error: No \'BookmarksPanel\' found.': 'Hata: \'Yer İmi Paneli\' bulunamadı.',
    'Input system': 'Sistem girdisi',
    'Choose input system...': 'Sistem giridisi seç...',
    'Map system': 'Harita sistemi',
    'X': 'X',
    'Y': 'Y',
    'Enter X-coordinate...': 'X-Koordinatı gir...',
    'Enter Y-coordinate...': 'Y-Koordinatı gir...',
    'Choose scale...': 'Ölçek seç...',
    'no zoom': 'Zoom özelliği yok',
    'Mode': 'Mod',
    'Remember locations': 'Lokasyonları hatırla',
    'Hide markers on close': 'Kapanışta işaretleyicileri gizle',
    'Remove markers on close': 'Kapanışta işaretleyicileri kaldır',
    'Remove markers': 'İşaretleyiicileri kaldır',
    'Location': 'Lokasyon',
    'Marker position: ': 'İşaretleyici pozisyonu: ',
    'No features found': 'Özellik bulunamadı',
    'Feature Info unavailable (you may need to make some layers visible)': 'Özellik bilgisi bulunamadı (Bazı katmanları görünür yapmanız gerekiyor olabilir)',
    'Search by Feature Selection': 'Özellik seçimi ile ara',
    'Download': 'İndir',
    'Choose a Download Format': 'indirme formatı seç',
    'Remove all results': 'Bütün sonuçları kaldır',
    'Download URL string too long (max 2048 chars): ': 'indirme linki çok uzun(mak 2048 karakter): ',

    // 0.75
    'Query Panel': 'Sorgu paneli',
    'Cancel current search': 'Mevcut sorguyu iptal et',
    'Search in target layer using the selected filters': 'Belirlenmiş filtrelere göre hedef katmanda arama yap',
    'Ready': 'Hazır',
    'Search Failed': 'Arama gerçekleştirilemedi',
    'Search aborted': 'Arama işlemi iptal edildi',

    // 0.76
    'No query layers found': 'Sorgu katmanı bulunamadı',
    'Edit Layer Style': 'Katman stilini düzenle',
    'Zoom to Layer Extent': 'Katman kapsamına zoomla',
    'Get Layer information': 'Katman bilgisini getir',
    'Change Layer opacity': 'Katman opaklığını değiştir',
    'Select a drawing tool and draw to search immediately': 'Çizme aracı seçin ve hemen aramak için çizim yapın',
    'Search in': 'İçerikte ara',
    'Search Canceled': 'arama iptal edildi',
    'Help and info for this example': 'Bu örnek için yardım ve detay bilgisi',

    // 1.0.1
    'Details': 'Detaylar',
    'Table': 'Tablo',
    'Show record(s) in a table grid': 'Kayıtları tablo yapısında göster',
    'Show single record': 'Tek kayıt göster',
    'Show next record': 'Sonraki kaydı göster',
    'Show previous record': 'Önceki kaydı göster',
	'Feature tooltips' : 'Özellik ipuçları',
	'FeatureTooltip' : 'FeatureTooltip',
	'Upload features from local file' : 'Özellikleri yerel dosyadan yükle',
	'My Upload' : 'Yüklemelerim',
	'Anything is allowed here' : 'Buraya herhangi bir şey girilebilir',
	'Edit vector Layer styles' : 'Vektör katman stillerini editle',
	'Style Editor' : 'Stil editörü',
	'Open a map context (layers, styling, extent) from file' : 'Harita içeriğini (katman, stil, kapsam) dosyadan aç',
	'Save current map context (layers, styling, extent) to file' : 'Mevcut harita içeriğini (katman, stil, kapsam) dosyaya kaydet',
	'Upload' : 'Yükle',
	'Uploading file...' : 'Dosya yüklüyor...',
    'Change feature styles': 'Özellik stillerini değiştir',
    'Error reading map file, map has not been loaded.': 'Harita dosyasını okurken hata oluştu, harite yüklenemedi.',
    'Error on removing layers.': 'Katmanları kaldırırken hata oluştu.',
    'Error loading map file.': 'Harita dosyaını yüklerken hata oluştu.',
    'Error reading layer tree.': 'Katman ağaç yapısını ukurken hata oluştu.',

    // 1.0.2
    'No file specified.': 'Dosya belirtilmedi.',
	'Cannot render draw controls': 'Çizim kontrollerini oluşturamıyor',
	'Warning - Line Length is ': 'Uyarı- satır uzunluğu ',
	'You drew a line with length above the layer-maximum of ': 'Belirlenen maksimum değerlerin üzerinde bir çizgi çizdiniz ',
	'Warning - Area is ': 'Uyarı- Alan ',
	'You selected an area for this layer above its maximum of ': 'Bu katman için belirlenen sınırların üzerinde bir alan seçtiniz ',
	'Error creating Layer': 'Katman oluştururken hata',
	'Error in ajax request': 'Ajax isteğinde hata',
    'Add layers': 'Katmanlar ekle',
    'Remove layer': 'Katmanı kaldır',
    
    /**
     * zeynel dağlı
     * 09-12-2014
     * harita üzerinde yeni eklenen mesaj değerleri
     */
    'Grid loading': 'Bilgiler yükleniyor, lütfen bekleyiniz',
            /**
     * zeynel dağlı
     * 10-12-2014
     * firma akış ve process bilgileri ile 
     * ilgili değişkenler yerleştirildi
     */
     'Company flow grid title': 'Üretim Akış Bilgileri',
     'Company process grid title': 'Üretim Proses Bilgileri',
     'Company Eco-Tracking grid title': 'Eco-Tracking Data',
     'Get flow grid': 'Şirket Akış Bilgilerini Görüntüle',
     'Get process grid': 'Şirket Proses Bilgilerini Görüntüle',
     'Get equipment grid': 'Şirket Ekipman Bilgilerini Görüntüle',
     'Get eco-tracking grid': 'Şirket Eco-Tracking Bilgilerini Görüntüle',
     
     'Min Rate': 'Min.Oran',
     'Min Rate Unit': 'Min.Oran.Brm',
     'Type Rate': 'Tip Oran',
     'Type Rate Unit': 'Tip Oran Bir.',
     'Max Rate': 'Mak.Oran',
     'Max Rate Unit': 'Mak.Oran.Bir.',
     
     'Flow': 'Akış',
     'Quantity': 'Miktar',
     'Unit': 'Birim',
     'Quality': 'Kalite',
     'Flow Type': 'Akış Tipi',
     
     'Equipment Name': 'Ekipman',
     'Equipment Type Name': 'Ekipman Tipi',
     
     'Company': 'Firma',
     'Power A': 'Güç A',
     'Power B': 'Güç B',
     'Power C': 'Güç C',
     'Date': 'Tarih,'
};
