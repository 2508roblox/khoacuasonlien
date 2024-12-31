(function($){$.fn.tabs_new=function(){var wrap=$(this);var head=wrap.find('[data-head]');var content=wrap.find('[data-content]');this.reset=(function(){head.not(head.first()).removeClass('is-active');content.not(content.first()).hide()}).call(this);this.headClick=head.click(function(event){event.preventDefault();if($(this).hasClass('is-active')){return!1}
var content_target=$(this).attr('href');head.removeClass('is-active');content.hide();$(this).addClass('is-active');$(content_target).fadeIn()});return this}})(jQuery);function valueSelectOption(options){let value;for(let i=0;i<options.length;i++){if(options[i].selected===!0){value=options[i].value}}
return value}
function valueChekbox(Element){var value='';for(var i=0;i<Element.length;i++){if(Element[i].checked===!0){value+=`${Element[i].value}, `}}
return value}
function hasNumber(myString){return/\d/.test(myString)}
function validateName(name){var re=/^[a-zA-Z_àáảãạâầấẩẫậăằắẳẵặèéẻẽẹêềếểễệđìíỉĩịòóỏõọôồốổỗộơờớởỡợùúủũụưừứửữựỳýỷỹỵÀÁẢÃẠÂẦẤẨẪẬĂẰẮẲẴẶÈÉẺẼẸÊỀẾỂỄỆĐÌÍỈĨỊÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢÙÚỦŨỤƯỪỨỬỮỰỲÝỶỸỴÂĂĐÔƠƯ\s-']+$/;return re.test(String(name).toLowerCase())}
function validateEmail(email){var re=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;return re.test(String(email).toLowerCase())}
function validatePhonenumber(number){var re=/^08([0-9]{8})|09([0-9]{8})|07([0-9]{9})|03([0-9]{8})|05([0-9]{8})$/;return re.test(String(number))}