!function(c){c((function(){var t=window.location.href,_=void 0!==document.title?document.title:"",o=void 0!==screen.width&&screen.width>1024?"no":"yes",e=window.ht_ctc_admin_demo_var?window.ht_ctc_admin_demo_var:{},s="2";!function(){if(c(".ctc_demo_style").on("click",(function(){var c=ht_ctc_admin_demo_var.number,s=ht_ctc_admin_demo_var.pre_filled;try{var n=e.site?e.site:"";s=(s=(s=(s=(s=s.replaceAll("%","%25")).replaceAll("{site}",n)).replaceAll("{url}",t)).replaceAll("{title}",_)).replace(/\[url]/gi,t),s=encodeURIComponent(decodeURI(s))}catch(c){}var a="https://wa.me/"+c+"?text="+s,i=e.url_target_d?e.url_target_d:"_blank",l=e.url_structure_d?e.url_structure_d:"",r=e.url_structure_m?e.url_structure_m:"";"yes"==o?("wa_colon"==r&&(a="whatsapp://send?phone="+c+"&text="+s,i="_self"),e.custom_url_m&&""!==e.custom_url_m&&(a=e.custom_url_m)):("web"==l&&(a="https://web.whatsapp.com/send?phone="+c+"&text="+s),e.custom_url_d&&""!==e.custom_url_d&&(a=e.custom_url_d));var d="popup"==i?"scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=788,height=514,left=100,top=100":"noopener";""==c?b(e.m1):"_self"==i?b(e.m2):window.open(a,i,d)})),c("body").hasClass("toplevel_page_click-to-chat")){var n="";function a(){var t=c(".call_to_action").val();if(c(".ctc_demo_style .ctc_cta").text(t),c(".ctc_demo_style").hide(),c(".ctc_demo_style_"+s).show(),"close"!==n)try{c(".ht-ctc-admin-sidebar .collapsible").collapsible("close"),n="close"}catch(c){}c(".ht-ctc-admin-sidebar .collapsible").on("click",(function(){c(".ctc_demo_style").hide(),y(),n="open"})),y(),c(".ctc_ad_links").show()}c(".select_style_item").on("click",(function(){s=c(".select_style_desktop").val(),a()})),c(".m_select_style_item").on("click",(function(){s=c(".select_style_mobile").val(),a()})),c(".ctc_ad_main_page_on_change_input").on("change input paste",(function(){a()})),c(".ctc_ad_main_page_on_change_input_update_var").on("change input paste",(function(){e[c(this).attr("data-var")]=c(this).val(),a()})),document.addEventListener("ht_ctc_admin_event_valid_number",(function(c){a()})),c(".ctc_demo_position").on("change input paste",(function(){c(this).val();!function(){var t=c(".ctc_demo_position").val(),_="top"==t?"bottom":"top",o=c(".position_right_left").val(),e="left"==o?"right":"left",s=/^\d+$/,n=c(".position_right_left_value").val();""==n?n="0px":s.test(n)&&(n+="px");var i=c(".position_bottom_top_value").val();""==i?i="0px":s.test(i)&&(i+="px");var l={[t]:i,[o]:n,[_]:"unset",[e]:"unset"};c(".ctc_demo_load").css(l),function(){var t=c(".position_right_left").val();"left"==t?(c(".ctc_s_2 .ctc_cta").css("order","1"),c(".ctc_s_3 .ctc_cta").css("order","1"),c(".ctc_s_3_1 .ctc_cta").css("order","1"),c(".ctc_s_7 .ctc_cta").css("order","1"),c(".ctc_s_5 .s5_content ").css("order","1"),c(".ctc_s_5 .s5_content ").removeClass("right").addClass("left"),c(".ctc_s_7_1 .ctc_cta").css({order:"1","padding-left":"0px","padding-right":"21px"})):(c(".ctc_s_2 .ctc_cta").css("order","0"),c(".ctc_s_3 .ctc_cta").css("order","0"),c(".ctc_s_3_1 .ctc_cta").css("order","0"),c(".ctc_s_7 .ctc_cta").css("order","0"),c(".ctc_s_5 .s5_content").css("order","0"),c(".ctc_s_5 .s5_content ").removeClass("left").addClass("right"),c(".ctc_s_7_1 .ctc_cta").css({order:"0","padding-left":"21px","padding-right":"0px"}))}(),a(),y(),c(".ctc_menu_at_demo .ctc_ad_links").remove()}()}))}if(c("body").hasClass("click-to-chat_page_click-to-chat-other-settings")){c(".ctc_demo_style").show();var i="";c(".select_an_type").val();function l(){c(".ctc_demo_style").removeClass(i);var t=c(".select_an_type").val();i="ht_ctc_an_"+t,c(".ctc_demo_style").addClass(i);var _=c("#an_delay").val(),o=c("#an_itr").val(),e={"animation-delay":_?_+"s":"0","animation-iteration-count":o||"1"};c(".ctc_demo_style.ht_ctc_animation").css(e),"no-animation"==t?c(".ctc_an_demo_btn").hide():c(".ctc_an_demo_btn").show()}c(".select_an_type").on("change",(function(c){l()})),c(".ctc_an_demo_btn").on("click",(function(t){c(".ctc_demo_style").removeClass(i),setTimeout((()=>{l()}),100)}));var r="";c(".select_an_type").val();function d(){c(".ctc_demo_style").removeClass(i),c(".ctc_demo_style").removeClass(r);c(".ctc_demo_style.ht_ctc_animation").css({"animation-delay":"unset","animation-iteration-count":"unset"}),c(".ctc_demo_style").hide();var t=c(".show_effect").val();"From Center"==t?(r="ht_ctc_an_entry_center",c(".ctc_demo_style").addClass(r),c(".ctc_demo_style").show()):"From Corner"==t&&setTimeout((()=>{c(".ctc_demo_style").show(180)}),100),"no-show-effects"==t?c(".ctc_ee_demo_btn").hide():c(".ctc_ee_demo_btn").show()}c(".show_effect").on("change",(function(c){d()})),c(".ctc_ee_demo_btn").on("click",(function(t){c(".ctc_demo_style").removeClass(r),setTimeout((()=>{d()}),100)}));var h,m="";if(c(".notification_badge").is(":checked")){m="yes";var v=c(".field_notification_time").val();v=v&&""!=v?v:0,setTimeout((()=>{u(),p()}),1e3*v)}function u(){if(c(".notification_badge").is(":checked")){m="yes",c(".ctc_ad_notification").show();var t=c(".field_notification_bg_color").val();c(".ctc_ad_badge").css("background-color",t);var _=c(".field_notification_text_color").val();c(".ctc_ad_badge").css("color",_)}else m="no",c(".ctc_ad_notification").hide()}function f(){var t=c(".field_notification_border_color").val();border=""!==t?"2px solid "+t:"none",c(".ctc_ad_badge").css("border",border)}function p(){if(document.querySelector(".ctc_nb")){var t=c(".ctc_ad_badge").closest(".ctc_demo_style");c(".ctc_ad_badge").css({top:c(t).find(".ctc_nb").attr("data-nb_top"),right:c(t).find(".ctc_nb").attr("data-nb_right")})}}c(".notification_badge").on("change",(function(c){u(),p(),f()})),c(".notification_border_color_field .wp-picker-container").on("click",(function(c){f()})),c(document).on("change, input, keyup",".field_notification_bg_color, .field_notification_text_color, .field_notification_border_color",(function(){u()})),c(".field_notification_count").on("change",(function(){var t=c(this).val();c(".ctc_ad_badge").text(t)})),c(".field_notification_time").on("change",(function(){c(".ctc_ad_notification").hide(),clearTimeout(h);var t=c(this).val();t=t&&""!=t?t:0,h=setTimeout((()=>{"yes"==m&&c(".ctc_ad_notification").show()}),1e3*t)}))}var g;function b(t=""){var _;clearTimeout(_),c(".ctc_ad_links").hide(),c(".ctc_demo_messages").html(t),c(".ctc_demo_messages").hide().fadeIn(500),_=setTimeout((()=>{c(".ctc_demo_messages").hide(120),c(".ctc_ad_links").show(120)}),9e3)}function y(){c(".ctc_demo_messages").hide(),c(".ctc_ad_links").hide(),c(".ctc_no_demo_notice").hide()}c("body").hasClass("click-to-chat_page_click-to-chat-customize-styles")&&(c(".ht_ctc_customize_style").on("click",(function(){var t=c(this).attr("data-style");c(".ctc_demo_style_"+t).show(),c(".ctc_demo_style").not(".ctc_demo_style_"+t).hide()})),c(".wp-picker-container").on("click",(function(){var t=c(this).closest(".ht_ctc_customize_style"),_=c(t).attr("data-style");_&&(c(".ctc_demo_style_"+_).show(),c(".ctc_demo_style").not(".ctc_demo_style_"+_).hide())})),c(".ctc_s_3_1").hover((function(){c(".ctc_s_3_1 .ht_ctc_padding").css("background-color",c("#s3_1_bg_color_hover").val()),!c("#s3_box_shadow").is(":checked")&&c("#s3_box_shadow_hover").is(":checked")&&c(".ctc_s_3_1 .ht_ctc_padding").css("box-shadow","0px 0px 11px rgba(0,0,0,.5)")}),(function(){c(".ctc_s_3_1 .ht_ctc_padding").css("background-color",c("#s3_1_bg_color").val()),!c("#s3_box_shadow").is(":checked")&&c("#s3_box_shadow_hover").is(":checked")&&c(".ctc_s_3_1 .ht_ctc_padding").css("box-shadow","unset")})),c("#s3_box_shadow").on("change",(function(t){c("#s3_box_shadow").is(":checked")?c(".ctc_s_3_1 .ht_ctc_padding").css("box-shadow","0px 0px 11px rgba(0,0,0,.5)"):c(".ctc_s_3_1 .ht_ctc_padding").css("box-shadow","unset")})),c(".s4_img_position").on("change",(function(t){var _=c(this).val();"left"==_?(c(".ctc_s_4 .s4_img").css("margin","0 8px 0 -12px"),c(".ctc_s_4 .s4_img").css("order","0")):"right"==_&&(c(".ctc_s_4 .s4_img").css("margin","0 -12px 0 8px"),c(".ctc_s_4 .s4_img").css("order","1"))})),c(".ctc_s_6").hover((function(){c(".ctc_s_6").css({color:c("#s6_txt_color_on_hover").val(),"text-decoration":c("#s6_txt_decoration_on_hover").find(":selected").val()})}),(function(){c(".ctc_s_6").css({color:c("#s6_txt_color").val(),"text-decoration":c("#s6_txt_decoration").find(":selected").val()})})),c(".ctc_s_7").hover((function(){c(".ctc_s_7 svg path").css("fill",c("#s7_icon_color_hover").val()),c(".ctc_s_7 .ctc_s_7_icon_padding").css("background-color",c("#s7_border_color_hover").val())}),(function(){c(".ctc_s_7 svg path").css("fill",c("#s7_icon_color").val()),c(".ctc_s_7 .ctc_s_7_icon_padding").css("background-color",c("#s7_border_color").val())})),c(".ctc_s_7_1").hover((function(){c(".ctc_s_7_1 svg path").css("fill",c("#s7_1_icon_color_hover").val()),c(".ctc_s_7_1 .ctc_s_7_1_cta").css("color",c("#s7_1_icon_color_hover").val()),c(".ctc_s_7_1").css("background-color",c("#s7_1_bgcolor_hover").val()),c(".ctc_s_7_1 .ctc_s_7_icon_padding").css("background-color",c("#s7_1_bgcolor_hover").val())}),(function(){c(".ctc_s_7_1 svg path").css("fill",c("#s7_1_icon_color").val()),c(".ctc_s_7_1 .ctc_s_7_1_cta").css("color",c("#s7_1_icon_color").val()),c(".ctc_s_7_1").css("background-color",c("#s7_1_bgcolor").val()),c(".ctc_s_7_1 .ctc_s_7_icon_padding").css("background-color",c("#s7_1_bgcolor").val())})),c(".ctc_s_8").hover((function(){c(".ctc_s_8 .s_8").css({"background-color":c("#s8_bg_color_on_hover").val()}),c(".ctc_s_8 .s8_span").css("color",c("#s8_txt_color_on_hover").val()),c(".ctc_s_8 svg path").css("fill",c("#s8_icon_color_on_hover").val())}),(function(){c(".ctc_s_8 .s_8").css({"background-color":c("#s8_bg_color").val()}),c(".ctc_s_8 .s8_span").css("color",c("#s8_txt_color").val()),c(".ctc_s_8 svg path").css("fill",c("#s8_icon_color").val())})),c(".ctc_oninput").on("change paste keyup",(function(t){var _=c(this).attr("data-update-type");y();var o=c(this).val(),e=c(this).attr("data-update-selector");if(_&&e)if("text"==_)c(e).text(o);else if("cta"==_){var s=c(e).closest(".ctc_demo_style");"show"==o?(c(e).show(),c(e).removeClass("ht-ctc-cta-hover"),c(s).removeAttr("title")):"hide"==o?(c(e).hide(),c(e).removeClass("ht-ctc-cta-hover"),c(s).attr("title","Call to action")):"hover"==o&&(c(e).hide(),c(e).addClass("ht-ctc-cta-hover"),c(s).removeAttr("title"))}else{c(e).css(_,o);var n=c(this).attr("data-update-type-2");n&&c(e).css(n,o)}}))),c(".ctc_no_demo").on("change paste keyup",(function(t){y(),clearTimeout(g),c(".ctc_no_demo_notice").hide().fadeIn(500),g=setTimeout((()=>{c(".ctc_no_demo_notice").hide(120)}),5e3)})),c(".ctc_demo_style").hover((function(){c(".ctc_demo_style .ht-ctc-cta-hover").show(120)}),(function(){c(".ctc_demo_style .ht-ctc-cta-hover").hide(100)}))}()}))}(jQuery);