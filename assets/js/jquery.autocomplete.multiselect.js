// http://jsfiddle.net/mekwall/sgxKJ/

$.widget("ui.autocomplete", $.ui.autocomplete, {
    options : $.extend({}, this.options, {
        multiselect: false
    }),
    _create: function(){
        this._super();

        var self = this,
            o = self.options;

        if (o.multiselect) {
            console.log('multiselect true');

            self.selectedItems = {};           
            self.multiselect = $("<div class='form-control' id='companySearch'></div>")
                .addClass("ui-autocomplete-multiselect ui-state-default ui-widget")
                .css("width", self.element.width())
                .insertBefore(self.element)
                .append(self.element)
                .bind("click.autocomplete", function(){
                    self.element.focus();
                });
            
            var fontSize = parseInt(self.element.css("fontSize"), 10);
            function autoSize(e){
                // Hackish autosizing
                var $this = $(this);
                $this.width(1).width(this.scrollWidth+fontSize-1);
            };

            var kc = $.ui.keyCode;
            self.element.bind({
                "keydown.autocomplete": function(e){
                    if ((this.value === "") && (e.keyCode == kc.BACKSPACE)) {
                        var prev = self.element.prev();
                        delete self.selectedItems[prev.text()];
                        prev.remove();
                    }
                },
                // TODO: Implement outline of container
                "focus.autocomplete blur.autocomplete": function(){
                    self.multiselect.toggleClass("ui-state-active");
                },
                "keypress.autocomplete change.autocomplete focus.autocomplete blur.autocomplete": autoSize
            }).trigger("change");

            // TODO: There's a better way?
            o.select = o.select || function(e, ui) {
                if ($("#companySearch #"+ui.item.value).length > 0){
                    //do nothing
                    //item is selected already
                }else{

                    $("<div id="+ ui.item.value +"></div>")
                        .addClass("ui-autocomplete-multiselect-item")
                        .text(ui.item.label)
                        .append(
                            $("<span></span>")
                                .addClass("ui-icon ui-icon-close")
                                .click(function(){
                                    var item = $(this).parent();
                                    delete self.selectedItems[item.text()];
                                    item.remove();
                                    deleteOptions(ui.item.value);
                                })
                        )
                        .insertBefore(self.element);
                    
                    self.selectedItems[ui.item.label] = ui.item;
                    self._value("");
                    createOption(ui.item.value);
                    return false;
                }
            }

            /*self.options.open = function(e, ui) {
                var pos = self.multiselect.position();
                pos.top += self.multiselect.height();
                self.menu.element.position(pos);
            }*/
        }

        return this;
    }
});

function createOption(x){
    var company = x;
$.ajax({
    url: "contactperson",
    async: false,
    type: "POST",
    data: "company_id="+company,
    dataType: "json",

    success: function(data) {
        // gelen data array'i : database'den cekilen companylerin user'ları. 
        //$('#assignContactPerson option').remove();
        for (var k = 0; k < data.length; k++) { 

            for (var i = 0; i < data[k].length; i++) {
                var opt =data[k][i]['id'];
                if($("#assignContactPerson option[value='"+ opt +"']").length == 0)
                {
                   $("#assignContactPerson").append(new Option(data[k][i]['name']+' '+data[k][i]['surname']+' - '+data[k][i]['cmpny_name'],data[k][i]['id']));
                
                }else{
                   
                }
            }
        }                        
        // aklima takilan: eger contact person sectikten sonra , company assign listesinden remove edilirse ne yapacagiz?
        //cevap: remove edilen company'nin user'ları da remove edilecek.sistem şuan bu şekilde çalışmıyor. 
        //company id'si ile kontrol yapılabilir.
    }
})

}

function deleteOptions(x){
 var company = x;
$.ajax({
    url: "contactperson",
    async: false,
    type: "POST",
    data: "company_id="+company,
    dataType: "json",

    success: function(data) {
        // gelen data array'i : database'den cekilen companylerin user'ları. 
        //$('#assignContactPerson option').remove();
        for (var k = 0; k < data.length; k++) { 

            for (var i = 0; i < data[k].length; i++) {
                var opt =data[k][i]['id'];
                $("#assignContactPerson option[value='"+ opt +"']").remove();
                
            }
        }                        
    }
})   
}